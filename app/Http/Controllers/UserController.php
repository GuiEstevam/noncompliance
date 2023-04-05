<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function list()
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
        $levels = [
            1 => 'Colaborador',
            2 => 'Coordenador',
            3 => 'Gerente'
        ];

        $user = User::all();
        return view('users.show', ['users' => $user, 'departaments' => $departaments, 'levels' => $levels]);
    }
}
