@extends('layouts.main')

@section('title', 'Relatórios cadastrados')

@section('content')
  <div class="col-md-10 offset-md-1 dashboard-title-container">
    <div class="col-md mt-3 text-right">
      <div class="btn-group " role="group">
        <a href="/compliance/create">
          <button class="btn btn-primary">
            Criar
          </button>
        </a>
      </div>
    </div>
    <h2>RELATÓRIOS</h2>
  </div>
  <div class="col-md-10 offset-md-1">
    <!-- Abas nav -->
    <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link {{ Auth::user()->role_id == 1 || Auth::user()->role_id == 2 ? 'active' : '' }}"
          id="personal-tab" data-toggle="tab" href="#personal" role="tab" aria-controls="personal"
          aria-selected="true">Minhas não
          conformidades</a>
      </li>
      @if (Auth::user()->role_id == 3)
        <li class="nav-item">
          <a class="nav-link {{ Auth::user()->role_id == 3 ? 'active' : '' }}" id="all-tab" data-toggle="tab"
            href="#all" role="tab" aria-controls="all" aria-selected="false">Todas as RNC</a>
        </li>
      @endif
      @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2 || Auth::user()->role_id == 3)
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
          <div class="table-responsive">
            <table class="table">
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
                  <th class="text-center">Status</th>
                  <th class="text-center">...</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($compliancesOwner as $complianceOwner)
                  <tr {{-- class="{{ $complianceOwner->status == 2 ? 'bg-inprogress' : ($complianceOwner->status == 3 ? 'bg-completed' : ($complianceOwner->status == 4 ? 'bg-late' : '')) }}"> --}}>
                    <td class="text-center">{{ $complianceOwner->id }}</td>
                    <td class="text-center">{{ $complianceOwner->user->name }}</td>
                    <td class="text-center">
                      {{ \Carbon\Carbon::parse($complianceOwner->compliance_date)->format('d/m/Y') }}
                    </td>
                    <td class="text-center">{{ $complianceOwner->classification->name }}</td>
                    <td class="text-center">{{ $complianceOwner->client->name }}</td>
                    <td class="text-center">{{ $complianceOwner->non_compliance }}</td>
                    <td class="text-center">{{ $complianceOwner->instant_action }}</td>
                    <td class="text-center">{{ $complianceOwner->departament->name }}</td>
                    <td class="text-center">
                      <a
                        class="{{ $complianceOwner->status == 2 ? 'btn bg-inprogress' : ($complianceOwner->status == 3 ? 'btn bg-completed' : ($complianceOwner->status == 4 ? 'btn bg-late' : '')) }}">
                        {{ $status[$complianceOwner->status] }}
                    </td>
                    </a>

                    <td class="text-center">
                      <a href="/compliance/show/{{ $complianceOwner->id }}" class="btn btn-primary mt-2">
                        <ion-icon name="eye"></ion-icon>
                      </a>
                      <a href="/compliance/edit/{{ $complianceOwner->id }}" class="btn btn-primary mt-2">
                        <ion-icon name="create"></ion-icon>
                      </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        @else
          <p class="mt-3"> Não há relatórios cadastrados, <a href="/compliance/create">cadastrar relatórios</a></p>
        @endif
      </div>
      <div class="tab-pane {{ Auth::user()->role_id == 3 ? 'active' : '' }}" id="all" role="tabpanel"
        aria-labelledby="all-tab">
        @if (count($compliance) > 0)
          <div class="table-responsive">
            <table class="table table-sm">
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
                  <th class="text-center">Status</th>
                  <th class="text-center">...</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($compliance as $compliance)
                  <tr>
                    <td class="text-center">{{ $compliance->id }}</td>
                    <td class="text-center">{{ $compliance->user->name }}</td>
                    <td class="text-center">{{ \Carbon\Carbon::parse($compliance->compliance_date)->format('d/m/Y') }}
                    </td>
                    <td class="text-center">{{ $compliance->classification->name }}</td>
                    <td class="text-center">{{ $compliance->client->name }}</td>
                    <td class="text-center">{{ $compliance->non_compliance }}</td>
                    <td class="text-center">{{ $compliance->instant_action }}</td>
                    <td class="text-center">{{ $compliance->departament->name }}</td>
                    <td class="text-center"><a
                        class="{{ $compliance->status == 2 ? 'btn bg-inprogress' : ($compliance->status == 3 ? 'btn bg-completed' : ($compliance->status == 4 ? 'btn bg-late' : '')) }}">{{ $status[$compliance->status] }}</a>
                    </td>
                    <td class="text-center">
                      <a href="/compliance/show/{{ $compliance->id }}" class="btn btn-primary mt-2">
                        <ion-icon name="eye"></ion-icon>
                      </a>
                      <a href="/compliance/edit/{{ $compliance->id }}" class="btn btn-primary mt-2">
                        <ion-icon name="create"></ion-icon>
                      </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        @else
          <p class="mt-3"> Não há relatórios cadastrados, <a href="/compliance/create">cadastrar relatórios</a></p>
        @endif
      </div>
      <div class="tab-pane" id="departament" role="tabpanel" aria-labelledby="departament-tab">
        @if (count($departaments) > 0)
          <div class="table-responsive">
            <table class="table">
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
                  <th class="text-center">Status</th>
                  <th class="text-center">...</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($departaments as $departament)
                  @foreach ($departament->compliances as $compliances)
                    <tr
                      class="{{ $compliances->status == 2 ? 'bg-inprogress' : ($compliances->status == 3 ? 'bg-completed' : ($compliances->status == 4 ? 'bg-late' : '')) }}">
                      <td class="text-center">{{ $compliances->id }}</td>
                      <td class="text-center">{{ $compliances->user->name }}</td>
                      <td class="text-center">
                        {{ \Carbon\Carbon::parse($compliances->compliance_date)->format('d/m/Y') }}
                      </td>
                      <td class="text-center">{{ $compliances->classification->name }}</td>
                      <td class="text-center">{{ $compliances->client->name }}</td>
                      <td class="text-center">{{ $compliances->non_compliance }}</td>
                      <td class="text-center">{{ $compliances->instant_action }}</td>
                      <td class="text-center">{{ $departament->name }}</td>
                      <td class="text-center">{{ $status[$compliances->status] }}</td>
                      <td class="text-center">
                        <a href="/compliance/show/{{ $compliances->id }}" class="btn btn-primary mt-2">Visualizar</a>
                        <a href="/compliance/edit/{{ $compliances->id }}" class="btn btn-primary mt-2">Editar</a>
                      </td>
                    </tr>
                  @endforeach
                @endforeach
              </tbody>
            </table>
          </div>
        @else
          <p class="mt-3"> Não há relatórios cadastrados, <a href="/compliance/create">cadastrar relatórios</a></p>
        @endif
      </div>
    </div>

  </div>
@endsection
