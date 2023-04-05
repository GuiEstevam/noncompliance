<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Compliance;
use App\Models\User;

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
        $compliance = Compliance::all();
        return view('welcome', ['compliance' => $compliance, 'departaments' => $departaments]);
    }


    public function create()
    {

        return view('compliance.create');
    }

    public function store(Request $request)
    {
        $compliance = new Compliance;

        $compliance->registeredBy = $request->registeredby;
        $compliance->compliance_date = $request->compliance_date;
        $compliance->classification = $request->classification;
        $compliance->client = $request->client;
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
