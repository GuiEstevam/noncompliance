<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Classification;
use Illuminate\Http\Request;

class ClassificationController extends Controller
{
    public function list()
    {
        $classifications = Classification::all();
        return view('classifications.dashboard', ['classifications' => $classifications]);
    }

    public function create()
    {

        return view('classifications.create');
    }

    public function store(Request $request)
    {
        $classifications = new Classification;

        $classifications->name = trim($request->name);
        $classifications->disponibility = $request->disponibility;

        $classifications->save();

        return back()->with('msg', 'Classificação cadastrada com sucesso!');
    }

    public function edit($id)
    {
        $classification = Classification::findOrfail($id);

        return view('classifications.edit', ['classification' => $classification]);
    }

    public function update(Request $request)
    {
        classification::findOrFail($request->id)->update($request->all());

        return redirect('classifications/listagem')->with('msg', 'Classificação alterada com sucesso!');
    }
}
