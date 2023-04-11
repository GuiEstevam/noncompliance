<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Classification;
use App\Models\Compliance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplianceController extends Controller
{
    public function index()
    {
        $user = auth::user();

        $compliancesOwner = $user->compliances;

        $byDepartaments = Compliance::join('users', 'compliances.responsable_departament', '=', 'users.departament')
            ->where('users.id', $user->id)
            ->get();

        $departaments = [
            1 => 'Contábil',
            2 => 'Financeiro',
            3 => 'Fiscal',
            4 => 'Pessoal',
            5 => 'Qualidade',
            6 => 'Recursos Humanos',
            7 => 'Societário',
            8 => 'T.I',

        ];
        $compliance = Compliance::with('classification', 'client', 'user')->get();
        return view(
            'welcome',
            compact(
                'compliance',
                'departaments',
                'user',
                'compliancesOwner',
                'byDepartaments'
            )
        );
    }


    public function create()
    {
        $authenticated = Auth::user();
        $last_register = Compliance::latest()->value('id');
        $compliances = Compliance::all();
        $clients = Client::all();
        $users = User::all();
        $classifications = Classification::all();

        return view(
            'compliance.create',
            [
                'compliances' => $compliances,
                'clients' => $clients,
                'users' => $users,
                'classifications' => $classifications,
                'last_register' => $last_register,
                'authenticated' => $authenticated
            ]
        );
    }

    public function store(Request $request)
    {
        $compliance = new Compliance;

        $compliance->user_id = $request->user_id;
        $compliance->compliance_date = $request->compliance_date;
        $compliance->classification_id = $request->classification_id;
        $compliance->client_id = $request->client_id;
        $compliance->non_compliance = $request->non_compliance;
        $compliance->instant_action = $request->instant_action;
        $compliance->responsable_departament = $request->responsable_departament;

        $compliance->save();
        return redirect('/')->with('msg', 'Não conformidade cadastrada com sucesso!');
    }

    public function edit($id)
    {
        $authenticated = Auth::user();
        $compliance = Compliance::findOrFail($id);
        $user = User::all();
        $classification = Classification::all();
        $client = Client::all();
        $dealing_owners = User::where('role_id', 2)->get();
        return view('compliance.edit', [
            'compliance' => $compliance,
            'users' => $user,
            'classifications' => $classification,
            'clients' => $client,
            'dealings_owners' => $dealing_owners,
            'authenticated' => $authenticated,
        ]);
    }
    public function update(Request $request)
    {
        Compliance::findOrFail($request->id)->update($request->all());

        return redirect('/')->with('msg', 'Não conformidade alterada com sucesso!');
    }

    public function show($id)
    {

        $status = [
            1 => 'Sem trativa',
            2 => 'Em andamento',
            3 => 'Finalizado',
        ];

        $departaments = [
            1 => 'Contábil',
            2 => 'Financeiro',
            3 => 'Fiscal',
            4 => 'Pessoal',
            5 => 'Qualidade',
            6 => 'Recursos Humanos',
            7 => 'Societário',
            8 => 'T.I',

        ];
        $action_time = [
            1 => 'Imediato',
            2 => 'Curto prazo',
            3 => 'Médio prazo',
            4 => 'Longo prazo',
        ];

        $compliance = Compliance::findOrFail($id);

        // $eventOwner = Compliance::where('id', $event->user_id)->first()->toArray();

        return view('compliance.show', compact(
            'compliance',
            'departaments',
            'status',
            'action_time'
        ));
    }
}
