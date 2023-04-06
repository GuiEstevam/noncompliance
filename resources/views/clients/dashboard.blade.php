@extends('layouts.main')

@section('title', 'Usuários cadastrados')

@section('content') <div class="col-md-10 offset-md-1 dashboard-title-container">
    <div class="col-sm mt-3 text-right">
      <div class="btn-group" role="group">
        <a href="/clients/create">
          <button class="btn btn-primary">
            Criar
          </button>
        </a>
      </div>
    </div>
    <h2>CLIENTES </h2>
  </div>
  <div class="col-md-10 offset-md-1 dashboard-events-container">
    @if (count($clients) > 0)
      <table class="table table-hover">
        <thead>
          <tr>
            <th class="text-center" scope="col">ID</th>
            <th class="text-center" scope="col">Nome</th>
            <th class="text-center" scope="col">Ativo</th>
            <th class="text-center" scope="col">...</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($clients as $clients)
            <tr>
              <td class="text-center" scope="col">{{ $clients->id }}</td>
              <td class="text-center" scope="col">{{ $clients->name }}</td>
              <td class="text-center" scope="col">{{ $clients->disponibility ? 'Sim' : 'Não' }}</td>
              <td class="text-center" scope="col">
                <a href="/clients/edit/{{ $clients->id }}" class="btn btn-primary">Editar</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <p>Não há clientes cadastrados</p>
    @endif
  </div>
@endsection
