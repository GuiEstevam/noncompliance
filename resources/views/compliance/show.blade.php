@extends('layouts.main')

@section('title', 'Relatórios cadastrados')

@section('content')

  <div class="col-md-10 offset-md-1">
    <div class="row">
      <div id="info-container" class="col-md-6">
        <h1>{{ $compliance->id }}</h1>
        <p class="event-city">
          <ion-icon name="location-outline"></ion-icon>
        </p>
        <p class="events-participants">
          {{ $compliance->compliance_date }}
          {{ $compliance->non_compliance }}
          {{ $compliance->instant_action }}
          {{ $departaments[$compliance->responsable_departament] }}
        </p>
        <p class="event-owner">
        </p>
        <a href="#" class="btn btn-primary" id="event-submit">Confirmar Presença</a>
        <h3>O evento conta com:</h3>
        <ul id="items-list">
        </ul>
      </div>
      <div class="col-md-12" id="description-container">
        <h3>Sobre o evento:</h3>
        <p class="event-description"></p>
      </div>
    </div>
  </div>

@endsection
