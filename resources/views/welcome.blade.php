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
  <div class="col-md-10 offset-md-1">
    <!-- Abas nav -->
    <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link {{ Auth::user()->role_id == 1 || Auth::user()->role_id == 2 ? 'active' : '' }}"
          id="personal-tab" data-toggle="tab" href="#personal" role="tab" aria-controls="personal"
          aria-selected="true">Minhas não conformidades</a>
      </li>
      @if (Auth::user()->role_id == 3)
        <li class="nav-item">
          <a class="nav-link {{ Auth::user()->role_id == 3 ? 'active' : '' }}" id="all-tab" data-toggle="tab"
            href="#all" role="tab" aria-controls="all" aria-selected="false">Todas as RNC</a>
      @endif
      </li>
      @if (Auth::user()->role_id == 2 || Auth::user()->role_id == 3)
        <li class="nav-item">
          <a class="nav-link" id="departament-tab" data-toggle="tab" href="#departament" role="tab"
            aria-controls="departament" aria-selected="false">Não conformidades do departamento</a>
        </li>
      @endif
    </ul>

    <!-- Painel de abas -->
    <div class="tab-content">
      <div class="tab-pane {{ Auth::user()->role_id == 1 || Auth::user()->role_id == 2 ? 'active' : '' }}" id="personal"
        role="tabpanel" aria-labelledby="personal-tab">
        @if (count($compliancesOwner) > 0)
          <table class="table table-responsive">
            <thead>
              <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Registrado por</th>
                <th class="text-center">Data de registro</th>
                <th class="text-center">Classificação</th>
                <th class="text-center">Cliente</th>
                <th class="text-center">Não conformidade</th>
                <th class="text-center">Ação imediata</th>
                <th class="text-center">Departamento responsável</th>
                <th class="text-center">...</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($compliancesOwner as $complianceOwner)
                <tr>
                  <td class="text-center">{{ $complianceOwner->id }}</td>
                  <td class="text-center">{{ $complianceOwner->user->name }}</td>
                  <td class="text-center">{{ \Carbon\Carbon::parse($complianceOwner->compliance_date)->format('d/m/Y') }}
                  </td>
                  <td class="text-center">{{ $complianceOwner->classification->name }}</td>
                  <td class="text-center">{{ $complianceOwner->client->name }}</td>
                  <td class="cell-size">{{ $complianceOwner->non_compliance }}</td>
                  <td class="cell-size">{{ $complianceOwner->instant_action }}</td>
                  <td class="text-center">{{ $departaments[$complianceOwner->responsable_departament] }}</td>
                  <td class="text-center">
                    <a href="/compliance/show/{{ $complianceOwner->id }}" class="btn btn-primary mt-2">Visualizar</a>
                    <a href="/compliance/edit/{{ $complianceOwner->id }}" class="btn btn-primary mt-2">Editar</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        @else
          <p class="mt-3"> Não há relatórios cadastrados, <a href="/compliance/create">cadastrar relatórios</a></p>
        @endif
      </div>
      <div class="tab-pane {{ Auth::user()->role_id == 3 ? 'active' : '' }}" id="all" role="tabpanel"
        aria-labelledby="all-tab">
        @if (count($compliance) > 0)
          <table class="table table-responsive">
            <thead>
              <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Registrado por</th>
                <th class="text-center">Data de registro</th>
                <th class="text-center">Classificação</th>
                <th class="text-center">Cliente</th>
                <th class="text-center">Não conformidade</th>
                <th class="text-center">Ação imediata</th>
                <th class="text-center">Departamento responsável</th>
                <th class="text-center">...</th>
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
                  <td class="cell-size">{{ $compliance->non_compliance }}</td>
                  <td class="cell-size">{{ $compliance->instant_action }}</td>
                  <td class="text-center">{{ $departaments[$compliance->responsable_departament] }}</td>
                  <td class="text-center">
                    <a href="/compliance/show/{{ $compliance->id }}" class="btn btn-primary mt-2">Visualizar</a>
                    <a href="/compliance/edit/{{ $compliance->id }}" class="btn btn-primary mt-2">Editar</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        @else
          <p class="mt-3"> Não há relatórios cadastrados, <a href="/compliance/create">cadastrar relatórios</a></p>
        @endif
      </div>
      <div class="tab-pane" id="departament" role="tabpanel" aria-labelledby="departament-tab">
        @if (count($byDepartaments) > 0)
          <table class="table table-responsive">
            <thead>
              <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Registrado por</th>
                <th class="text-center">Data de registro</th>
                <th class="text-center">Classificação</th>
                <th class="text-center">Cliente</th>
                <th class="text-center">Não conformidade</th>
                <th class="text-center">Ação imediata</th>
                <th class="text-center">Departamento responsável</th>
                <th class="text-center">...</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($byDepartaments as $byDepartament)
                <tr>
                  <td class="text-center">{{ $byDepartament->id }}</td>
                  <td class="text-center">{{ $byDepartament->user->name }}</td>
                  <td class="text-center">{{ \Carbon\Carbon::parse($byDepartament->compliance_date)->format('d/m/Y') }}
                  </td>
                  <td class="text-center">{{ $byDepartament->classification->name }}</td>
                  <td class="text-center">{{ $byDepartament->client->name }}</td>
                  <td class="cell-size">{{ $byDepartament->non_compliance }}</td>
                  <td class="cell-size">{{ $byDepartament->instant_action }}</td>
                  <td class="text-center">{{ $departaments[$byDepartament->responsable_departament] }}</td>
                  <td class="text-center">
                    <a href="/compliance/show/{{ $byDepartament->id }}" class="btn btn-primary mt-2">Visualizar</a>
                    <a href="/compliance/edit/{{ $byDepartament->id }}" class="btn btn-primary mt-2">Editar</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        @else
          <p class="mt-3"> Não há relatórios cadastrados, <a href="/compliance/create">cadastrar relatórios</a></p>
        @endif
      </div>
    </div>

  </div>
@endsection
