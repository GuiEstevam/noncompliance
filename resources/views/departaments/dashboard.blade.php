@extends('layouts.main')

@section('title', 'Classificações cadastradas')

@section('content') <div class="col-md-10 offset-md-1 dashboard-title-container">
    <div class="col-sm mt-3 text-right">
      <div class="btn-group" role="group">
        <a href="/departaments/create">
          <button class="btn btn-primary">
            Criar
          </button>
        </a>
      </div>
    </div>
    <h2>DEPARTAMENTOS</h2>
  </div>
  <div class="col-md-10 offset-md-1 dashboard-events-container">
    @if (count($departaments) > 0)
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
          @foreach ($departaments as $departaments)
            <tr>
              <td class="text-center" scope="col">{{ $departaments->id }}</td>
              <td class="text-center" scope="col">{{ $departaments->name }}</td>
              <td class="text-center" scope="col">{{ $departaments->disponibility ? 'Sim' : 'Não' }}</td>
              <td class="text-center" scope="col">
                <a href="/departaments/edit/{{ $departaments->id }}" class="btn btn-primary">Editar</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <p>Não há departamentos cadastrados.</p>
    @endif
  </div>
@endsection
