<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function list()
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
        $levels = [
            1 => 'Colaborador',
            2 => 'Coordenador',
            3 => 'Gerente'
        ];

        $user = User::all();
        return view('users.dashboard', ['users' => $user, 'departaments' => $departaments, 'levels' => $levels]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $users = new User;

        $users->name = trim($request->name);
        $users->username = trim($request->username);
        $users->password = Hash::make($request->password);
        $users->departament = $request->departament;
        $users->role_id = $request->role_id;

        $users->save();

        return back()->with('msg', 'Usuário cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $user = User::findOrfail($id);

        return view('users.edit', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $user = User::findOrFail($request->id);
        if ($user->username == $request->username) {

            $user->name = $request->name;
            $user->password = Hash::make($request->password);
            $user->departament = $request->departament;
            $user->role_id = $request->role_id;
            $user->status  = $request->status;

            $user->save();
        } else {
            $user->update($request->all());
        }
        return redirect('/users/listagem')->with('msg', 'Usuário alterado com sucesso!');
    }
}
