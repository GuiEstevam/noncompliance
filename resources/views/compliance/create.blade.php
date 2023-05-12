@extends('layouts.main')

@section('title', 'RNC - Relatório de Não Conformidade')

@section('content')
  <div class="formbold-main-wrapper">
    <div class="formbold-form-wrapper">
      <form action="/compliance" method="POST">
        @csrf
        {{-- <div class="formbold-input-group">
          <label for="name" class="formbold-form-label"> RNC </label>
          <input type="text" name="name" id="name" class="formbold-form-input" value="{{ $last_register + 1 }}"
            disabled />
        </div> --}}

        <div class="formbold-input-group">
          <label class="formbold-form-label">
            Registrado por
          </label>
          <select class="formbold-form-select" name="fake_user_id" id="fake_user_id" disabled>
            @foreach ($users as $users)
              <option value="{{ $users->id }}" {{ $authenticated->id == $users->id ? 'selected' : '' }}
                {{ $users->status == 0 ? 'disabled' : '' }}>
                {{ $users->name }}</option>
            @endforeach
          </select>
          <input type="hidden" name="user_id" value="{{ $authenticated->id }}">
        </div>
        <div class="formbold-input-group">
          <label for="compliance_date" class="formbold-form-label"> Data </label>
          <input type="date" name="compliance_date" class="formbold-form-input" value="{{ date('Y-m-d') }}" required />
        </div>
        <div class="formbold-input-group">
          <label class="formbold-form-label">
            Classificação
          </label>
          <select class="formbold-form-select" name="classification_id" id="classification_id" required>
            <option value="" selected disabled>Selecione uma classificação</option>
            @foreach ($classifications as $classifications)
              <option value="{{ $classifications->id }}">{{ $classifications->name }}</option>
            @endforeach
          </select>
        </div>

        <div class="formbold-input-group">
          <label class="formbold-form-label">
            Cliente
          </label>
          <select class="formbold-form-select" name="client_id" id="client_id" required>
            <option value="" selected disabled>Selecione uma empresa</option>
            @foreach ($clients as $clients)
              <option value="{{ $clients->id }}">{{ $clients->name }}</option>
            @endforeach
          </select>
        </div>

        <div>
          <label for="non_compliance" class="formbold-form-label">
            Não conformidade
          </label>
          <textarea rows="6" name="non_compliance" id="non_compliance" placeholder="Descreva aqui a não conformidade"
            class="formbold-form-input" required></textarea>
        </div>

        <div>
          <label for="instant_action" class="formbold-form-label">
            Ação Imediata
          </label>
          <textarea rows="6" name="instant_action" id="instant_action" placeholder="Descreva aqui a ação imediata"
            class="formbold-form-input" required></textarea>
        </div>

        <div class="formbold-input-group">
          <label class="formbold-form-label">
            Departamento responsável pela ação tratativa
          </label>
          <select class="formbold-form-select" name="departament_id" id="departament_id" required>
            <option value="" selected disabled>Selecione um departamento</option>
            <option value="1">Contábil</option>
            <option value="3">Fiscal</option>
            <option value="4">Pessoal</option>
            <option value="7">Societário</option>
          </select>
        </div>

        <button class="formbold-btn">Salvar</button>
      </form>
    </div>
  </div>

@endsection
