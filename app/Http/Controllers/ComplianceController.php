<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Compliance;

class ComplianceController extends Controller
{
    public function index()
    {
        $compliance = Compliance::all();
        return view('welcome', ['compliance' => $compliance]);
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
}
