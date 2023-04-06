@extends('layouts.main')

@section('title', 'Relatórios cadastrados')

@section('content')
  <div class="col-md-10 offset-md-1 dashboard-title-container">
    <div class="col-sm mt-3 text-right">
      <div class="btn-group" role="group">
        <a href="/compliance/create">
          <button class="btn btn-primary">
            Criar
          </button>
        </a>
      </div>
    </div>
    <h2>RELATÓRIOS CADASTRADOS </h2>
  </div>
  <div class="col-md-10 offset-md-1 dashboard-events-container">
    @if (count($compliance) > 0)
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Registrado por</th>
            <th scope="col">Data de registro</th>
            <th scope="col">Classificação</th>
            <th scope="col">Cliente</th>
            <th scope="col">Não conformidade</th>
            <th scope="col">Ação imediata</th>
            <th scope="col">Departamento responsável</th>
            <th scope="col">...</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($compliance as $compliance)
            <tr>
              <td class="text-center">{{ $compliance->id }}</td>
              <td class="text-center">{{ $compliance->user->name }}</td>
              <td class="text-center">{{ \Carbon\Carbon::parse($compliance->compliance_date)->format('d/m/Y') }}</td>
              <td class="text-center">{{ $compliance->classification->name }}</td>
              <td class="text-center">{{ $compliance->client->name }}</td>
              <td class="text-center">{{ $compliance->non_compliance }}</td>
              <td class="text-center">{{ $compliance->instant_action }}</td>
              <td class="text-center">{{ $departaments[$compliance->responsable_departament] }}</td>
              <td>
                <a href="/compliance/edit/{{ $compliance->id }}" class="btn btn-primary">Editar</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <p>Não há relatórios cadastrados, <a href="/compliance/create">cadastrar relatórios</a></p>
    @endif
  </div>
@endsection
