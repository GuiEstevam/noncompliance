@extends('layouts.main')

@section('title', 'RNC - Relatório de Não Conformidade')

@section('content')
  <div class="formbold-main-wrapper">
    <div class="formbold-form-wrapper">
      <img class="logo" src="/img/Logo.png" alt="Consult" />
      <form action="/compliance/update/{{ $compliance->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="formbold-input-group">
          <label for="name" class="formbold-form-label"> RNC </label>
          <input type="text" name="name" id="name" class="formbold-form-input"
            value="{{ $compliance->id }}"disabled />
        </div>
        <div class="formbold-input-group">
          <label class="formbold-form-label">
            Registrado por
          </label>
          <select class="formbold-form-select" name="registeredby" id="registeredby" required>
            @foreach ($users as $users)
              <option value="{{ $users->id }} {{ $users->id == $compliance->user_id ? 'selected' : '' }}">
                {{ $users->name }}</option>
            @endforeach
          </select>
          </select>
        </div>

        <div class="formbold-input-group">
          <label for="compliance_date" class="formbold-form-label"> Data </label>
          <input type="date" name="compliance_date" class="formbold-form-input"
            value="{{ $compliance->compliance_date }}"required />
        </div>

        <div class="formbold-input-group">
          <label class="formbold-form-label">
            Classificação
          </label>
          <select class="formbold-form-select" name="classification" id="classification" required>
            @foreach ($classifications as $classifications)
              <option
                value="{{ $classifications->id }} {{ $classifications->id == $compliance->classification_id ? 'selected' : '' }}">
                {{ $classifications->name }}</option>
            @endforeach
          </select>
        </div>

        <div class="formbold-input-group">
          <label class="formbold-form-label">
            Cliente
          </label>
          <select class="formbold-form-select" name="client" id="client" required>
            @foreach ($clients as $clients)
              <option value="{{ $clients->id }} {{ $clients->id == $compliance->client_id ? 'selected' : '' }}">
                {{ $clients->name }}</option>
            @endforeach
          </select>
        </div>

        <div>
          <label for="non_compliance" class="formbold-form-label">
            Não conformidade
          </label>
          <textarea rows="6" name="non_compliance" id="non_compliance" placeholder="Descreva aqui a não conformidade"
            class="formbold-form-input" required> {{ $compliance->non_compliance }} </textarea>
        </div>

        <div>
          <label for="instant_action" class="formbold-form-label">
            Ação Imediata
          </label>
          <textarea rows="6" name="instant_action" id="instant_action" placeholder="Descreva aqui a ação imediata"
            class="formbold-form-input" required>{{ $compliance->instant_action }}</textarea>
        </div>

        <div class="formbold-input-group">
          <label class="formbold-form-label">
            Departamento responsável pela ação tratativa
          </label>
          <select class="formbold-form-select" name="responsable_departament" id="responsable_departament" required>
            <option value="" selected disabled>Selecione um departamento</option>
            <option value="1"{{ $compliance->responsable_departament == 1 ? 'selected' : '' }}>Fiscal</option>
            <option value="2"{{ $compliance->responsable_departament == 2 ? 'selected' : '' }}>Contábil</option>
            <option value="3"{{ $compliance->responsable_departament == 3 ? 'selected' : '' }}>Pessoal</option>
            <option value="4"{{ $compliance->responsable_departament == 4 ? 'selected' : '' }}>Qualidade</option>
            <option value="5"{{ $compliance->responsable_departament == 5 ? 'selected' : '' }}>Recursos Humanos
            </option>
            <option value="6"{{ $compliance->responsable_departament == 6 ? 'selected' : '' }}>T.I</option>
            <option value="7"{{ $compliance->responsable_departament == 7 ? 'selected' : '' }}>Financeiro</option>
          </select>
        </div>

        <button class="formbold-btn">Enviar</button>
      </form>
    </div>
  </div>

@endsection
