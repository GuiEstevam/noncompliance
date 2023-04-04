@extends('layouts.main')

@section('title', 'Relatórios cadastrados')

@section('content')
  <div class="m-5">
    <table class="table table-bg">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nome</th>
          <th scope="col">Nome de usuário</th>
          <th scope="col">E-mail</th>
          <th scope="col">Departamento</th>
          <th scope="col">Função</th>
          <th scope="col">...</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          @foreach ($compliance as $compliance)
        <tr>
          <td class="text-center">{{ $compliance->id }}</td>
          <td class="text-center">{{ $compliance->registeredBy }}</td>
          <td class="text-center">{{ \Carbon\Carbon::parse($compliance->compliance_date)->format('d/m/Y') }}</td>
          <td class="text-center">{{ $compliance->classification }}</td>
          <td class="text-center">{{ $compliance->client }}</td>
          <td class="text-center">{{ $compliance->non_compliance }}</td>
          <td class="text-center">{{ $compliance->instant_action }}</td>
          <td class="text-center">{{ $compliance->responsable_departament }}</td>
          <td>
            @endforeach
          <td>

          </td>
        </tr>
      </tbody>
    </table>
  </div>
@endsection
