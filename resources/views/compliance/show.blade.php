@extends('layouts.main')

@section('title', 'RNC: ' . $compliance->id)

@section('content')

  <div class="col-md-10 offset-md-1">
    <div class="row">
      <div id="info-container" class="col-md-12 text-center mt-3 border">
        <h4> NÃO CONFORMIDADE N° {{ $compliance->id }}</h4>
      </div>
    </div>
    <div class="row">
      <div id="info-container" class="col-6 mt-3 border">
        <p>
        <h4>Criado por:</h4> {{ $compliance->user->name }}
        <h4>Cliente:</h4> {{ $compliance->client->name }}
        <h4>Data de registro:</h4>
        {{ \Carbon\Carbon::parse($compliance->compliance_date)->format('d/m/Y') }}
        <h4> Classificação: </h4> {{ $compliance->classification->name }}
        <h4> Não conformidade relatada:</h4> {{ $compliance->non_compliance }}
        <h4> Ação imediata: </h4>{{ $compliance->instant_action }}
        <h4> Departamento responsável:</h4> {{ $departaments[$compliance->responsable_departament] }}
        </p>
      </div>
      @if ($compliance->owner)
        <div id="info-container" class="col-6 mt-3 border-top border-right border-bottom">
          <p>
          <h4>Ação Corretiva/Preventiva/Melhoria: </h4> {{ $compliance->right_action }}
          <h4>Responsável pela tratativa: </h4> {{ $compliance->owner->name }}
          <h4>Prazo de ação: </h4> {{ $action_time[$compliance->action_time] }}
          <h4>Verificação de eficácia: </h4>{{ \Carbon\Carbon::parse($compliance->efficiency_check)->format('d/m/Y') }}
          <h4>Status: </h4> {{ $status[$compliance->status] }}
          </p>
        </div>
      @endif

    </div>
    <div class="row">
      <div class="col-md-12 mt-5 text-center">
        Criado em: {{ \Carbon\Carbon::parse($compliance->created_at)->format('d/m/Y H:i') }} |
        Última atualização em: {{ \Carbon\Carbon::parse($compliance->updated_at)->format('d/m/Y H:i') }}
      </div>
    </div>
  </div>

@endsection
