<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Departament;
use Illuminate\Http\Request;

class DepartamentController extends Controller
{
    public function list()
    {
        $departament = Departament::all();
        return view('departaments.dashboard', ['departaments' => $departament]);
    }

    public function create()
    {

        return view('departaments.create');
    }

    public function store(Request $request)
    {
        $departament = new Departament;

        $departament->name = trim($request->name);
        $departament->disponibility = $request->disponibility;

        $departament->save();
        return back()->with('msg', 'Departamento cadastrada com sucesso!');
    }
    public function edit($id)
    {
        $departament = Departament::findOrfail($id);

        return view('departaments.edit', ['departament' => $departament]);
    }

    public function update(Request $request)
    {
        Departament::findOrFail($request->id)->update($request->all());

        return redirect('departaments/listagem')->with('msg', 'Departamento alterado com sucesso!');
    }
}
