<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function list()
    {
        $client = Client::all();
        return view('clients.dashboard', ['clients' => $client]);
    }

    public function create()
    {

        return view('clients.create');
    }

    public function store(Request $request)
    {
        $client = new Client;

        $client->name = trim($request->name);
        $client->disponibility = $request->disponibility;

        $client->save();
        return back();
    }
    public function edit($id)
    {
        $client = Client::findOrfail($id);

        return view('clients.edit', ['client' => $client]);
    }

    public function update(Request $request)
    {
        Client::findOrFail($request->id)->update($request->all());

        return redirect('clients/listagem')->with('msg', 'Cliente alterado com sucesso!');
    }
}
