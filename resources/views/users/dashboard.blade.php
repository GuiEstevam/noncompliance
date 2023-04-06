@extends('layouts.main')

@section('title', 'Usuários cadastrados')

@section('content') <div class="col-md-10 offset-md-1 dashboard-title-container">
    <div class="col-sm mt-3 text-right">
      <div class="btn-group" role="group">
        <a href="/users/create">
          <button class="btn btn-primary">
            Criar
          </button>
        </a>
      </div>
    </div>
    <h2>Usuários Cadastrados </h2>
  </div>
  <div class="col-md-10 offset-md-1 dashboard-events-container">
    @if (count($users) > 0)
      <table class="table table-hover">
        <thead>
          <tr>
            <th class="text-center" scope="col">ID</th>
            <th class="text-center" scope="col">Nome</th>
            <th class="text-center" scope="col">Departamento</th>
            <th class="text-center" scope="col">Nível do usuário</th>
            <th class="text-center" scope="col">...</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $users)
            <tr>
              <td class="text-center" scope="col">{{ $users->id }}</td>
              <td class="text-center" scope="col">{{ $users->name }}</td>
              <td class="text-center" scope="col">{{ $departaments[$users->departament] }}</td>
              <td class="text-center" scope="col">{{ $levels[$users->role_id] }}</td>
              <td class="text-center" scope="col">
                <a href="/users/edit/{{ $users->id }}" class="btn btn-primary">Editar</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <p>Não há relatórios cadastrados, <a href="/users/create">cadastrar relatórios</a></p>
    @endif
  </div>
@endsection
