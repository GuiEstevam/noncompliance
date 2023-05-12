<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Classification;
use App\Models\Compliance;
use App\Models\Departament;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplianceController extends Controller
{
    public function index()
    {
        $status = [
            1 => 'Sem tratativa',
            2 => 'Em andamento',
            3 => 'Finalizado',
            4 => 'Em atraso',
        ];

        $user = auth::user();
        $departaments = Departament::with('compliances')->where('id', $user->departament)->get();

        $compliancesOwner = $user->compliances;

        $compliance = Compliance::with('classification', 'client', 'user', 'departament')->get();
        return view(
            'welcome',
            compact(
                'compliance',
                'departaments',
                'user',
                'compliancesOwner',
                'status'
            )
        );
    }


    public function create()
    {
        $authenticated = Auth::user();
        $compliances = Compliance::all();
        $clients = Client::where('disponibility', 1)->get();
        $users = User::all();
        $classifications = Classification::where('disponibility', 1)->get();
        $departaments = Departament::all();

        return view(
            'compliance.create',
            compact(
                'compliances',
                'clients',
                'users',
                'classifications',
                'authenticated',
                'departaments'
            )
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
        $compliance->departament_id = $request->departament_id;

        $compliance->save();

        return redirect()->route('compliance.show', $compliance->id)->with('msg', 'Não conformidade cadastrada com sucesso!');
    }

    public function edit($id)
    {

        $authenticated = Auth::user();
        $clients = Client::all();
        $classifications = Classification::all();
        $compliance = Compliance::findOrFail($id);
        $dealings_owners = User::where('role_id', 2)->where('departament', $compliance->departament_id)->get();
        $departaments = Departament::all();
        $users = User::all();
        $messages = $compliance->messages;

        if ($authenticated->role_id == 1) {
            return redirect('/')->with('msg', 'Você não pode acessar essa página');
        }
        return view('compliance.edit', compact(
            'authenticated',
            'classifications',
            'clients',
            'compliance',
            'dealings_owners',
            'departaments',
            'users',
            'messages'
        ));
    }
    public function update(Request $request)
    {
        $compliance = Compliance::findOrFail($request->id);
        $actionTime = $request->action_time;

        $today = Carbon::now()->startOfDay(); // Data atual
        $efficiencyCheck = $today->copy(); // Cópia da data atual para ser modificada
        switch ($actionTime) {
            case '1':
                $efficiencyCheck->addWeekdays(1); // Adiciona 1 dia útil
                $request->merge(['status' => 2]);
                break;
            case '2':
                $efficiencyCheck->addWeekdays(7); // Adiciona 7 dias úteis
                $request->merge(['status' => 2]);
                break;
            case '3':
                $efficiencyCheck->addWeekdays(15); // Adiciona 15 dias úteis
                $request->merge(['status' => 2]);
                break;
            case '4':
                $efficiencyCheck->addWeekdays(30); // Adiciona 30 dias úteis
                $request->merge(['status' => 2]);
                break;
        }

        $request->merge(['efficiency_check' => $efficiencyCheck]);
        if ($request->efficiency_status == '2' || $request->efficiency_status == '') {
            $request->merge(['status' => 2]);
        } else {
            $request->merge(['status' => 3]);
        };

        $compliance->update($request->all());

        return redirect()->route('compliance.show', $compliance->id)->with('msg', 'Não conformidade alterada com sucesso!');
    }

    public function show($id)
    {

        $status = [
            1 => 'Sem tratativa',
            2 => 'Em andamento',
            3 => 'Finalizado',
            4 => 'Em atraso',
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
