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
        return view('welcome', ['compliance' => $compliance, 'departaments' => $departaments]);
    }


    public function create()
    {
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
                'last_register' => $last_register
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

        $compliance = Compliance::findOrFail($id);

        // $eventOwner = Compliance::where('id', $event->user_id)->first()->toArray();

        return view('compliance.show', ['compliance' => $compliance, 'departaments' => $departaments]);
    }
}
