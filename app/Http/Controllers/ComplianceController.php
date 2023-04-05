<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Classification;
use App\Models\Compliance;
use App\Models\User;
use Illuminate\Http\Request;

class ComplianceController extends Controller
{
    public function index()
    {
        $departaments = [
            1 => 'Fiscal',
            2 => 'Contábil',
            3 => 'Pessoal',
            4 => 'Qualidade',
            5 => 'Recursos Humanos',
            6 => 'T.I',
            7 => 'Financeiro',
        ];
        $compliance = Compliance::with('classification', 'client', 'user')->get();
        return view('welcome', ['compliance' => $compliance, 'departaments' => $departaments]);
    }


    public function create()
    {
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
                'classifications' => $classifications
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
        return redirect('/');
    }

    public function edit($id)
    {
        $compliance = Compliance::findOrFail($id);
        $user = User::all();
        return view('compliance.edit', ['compliance' => $compliance, 'users' => $user]);
    }
}
