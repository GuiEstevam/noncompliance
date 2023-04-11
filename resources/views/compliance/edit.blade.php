@extends('layouts.main')

@section('title', 'Editando a RNC: ' . $compliance->id)

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
          <select class="formbold-form-select" name="user_id" id="user_id"
            {{ $authenticated->role_id != 3 ? 'disabled' : '' }} required>
            @foreach ($users as $user)
              <option value="{{ $user->id }}" {{ $user->id == $compliance->user_id ? 'selected' : '' }}
                {{ $user->status == 0 ? 'disabled' : '' }}>
                {{ $user->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="formbold-input-group">
          <label for="compliance_date" class="formbold-form-label"> Data </label>
          <input type="date" name="compliance_date" class="formbold-form-input"
            value="{{ $compliance->compliance_date }}" {{ $authenticated->role_id != 3 ? 'disabled' : '' }} required />
        </div>
        <div class="formbold-input-group">
          <label class="formbold-form-label">
            Classificação
          </label>
          <select class="formbold-form-select" name="classification_id" id="classification_id"
            {{ $authenticated->role_id != 3 ? 'disabled' : '' }} required>
            @foreach ($classifications as $classification)
              <option value="{{ $classification->id }}"
                {{ $classification->id == $compliance->classification_id ? 'selected' : '' }}
                {{ $classification->disponibility == 0 ? 'disabled' : '' }}>
                {{ $classification->name }}</option>
            @endforeach
          </select>
        </div>

        <div class="formbold-input-group">
          <label class="formbold-form-label">
            Cliente
          </label>
          <select class="formbold-form-select" name="client_id" id="client_id"
            {{ $authenticated->role_id != 3 ? 'disabled' : '' }} required>
            @foreach ($clients as $client)
              <option value="{{ $client->id }}" {{ $client->id == $compliance->client_id ? 'selected' : '' }}>
                {{ $client->name }}</option>
            @endforeach
          </select>
        </div>

        <div>
          <label for="non_compliance" class="formbold-form-label">
            Não conformidade
          </label>
          <textarea rows="6" name="non_compliance" id="non_compliance" placeholder="Descreva aqui a não conformidade"
            class="formbold-form-input" {{ $authenticated->role_id != 3 ? 'disabled' : '' }} required> {{ $compliance->non_compliance }} </textarea>
        </div>

        <div>
          <label for="instant_action" class="formbold-form-label">
            Ação Imediata
          </label>
          <textarea rows="6" name="instant_action" id="instant_action" placeholder="Descreva aqui a ação imediata"
            class="formbold-form-input" {{ $authenticated->role_id != 3 ? 'disabled' : '' }} required>{{ $compliance->instant_action }}</textarea>
        </div>

        <div class="formbold-input-group">
          <label class="formbold-form-label">
            Departamento responsável pela ação tratativa
          </label>
          <select class="formbold-form-select" name="responsable_departament" id="responsable_departament"
            {{ $authenticated->role_id != 3 ? 'disabled' : '' }} required>
            <option value="" selected disabled>Selecione um departamento</option>
            <option value="1" {{ $compliance->responsable_departament == 1 ? 'selected' : '' }}>Contábil</option>
            <option value="2" {{ $compliance->responsable_departament == 2 ? 'selected' : '' }}>Financeiro</option>
            <option value="3" {{ $compliance->responsable_departament == 3 ? 'selected' : '' }}>Fiscal</option>
            <option value="4" {{ $compliance->responsable_departament == 4 ? 'selected' : '' }}>Pessoal</option>
            <option value="5" {{ $compliance->responsable_departament == 5 ? 'selected' : '' }}>Qualidade</option>
            <option value="6" {{ $compliance->responsable_departament == 6 ? 'selected' : '' }}>Recursos Humanos
            </option>
            <option value="7" {{ $compliance->responsable_departament == 7 ? 'selected' : '' }}>Societário</option>
            <option value="8" {{ $compliance->responsable_departament == 8 ? 'selected' : '' }}>T.I</option>
          </select>
        </div>
        <hr color="black">
        <div>
          <label for="right_action" class="formbold-form-label">
            Ação corretiva/ preventiva / melhoria
          </label>
          <textarea rows="6" name="right_action" id="right_action" placeholder="Descreva aqui a ação tomada"
            class="formbold-form-input" required>{{ $compliance->right_action }}</textarea>
        </div>
        <div class="formbold-input-group">
          <label class="formbold-form-label">
            Responsável pela tratativa
          </label>
          <select class="formbold-form-select" name="dealings_owner" id="dealings_owner" required>
            @foreach ($dealings_owners as $dealing_owner)
              <option value="{{ $dealing_owner->id }}"
                {{ $dealing_owner->id == $compliance->dealings_owner ? 'selected' : '' }}>
                {{ $dealing_owner->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="formbold-input-group">
          <label class="formbold-form-label">
            Prazo da ação:
          </label>
          <select class="formbold-form-select" name="action_time" id="action_time" required>
            <option value="1" {{ $compliance->action_time == 1 ? 'selected' : '' }}>Imediato</option>
            <option value="2" {{ $compliance->action_time == 2 ? 'selected' : '' }}>Curto prazo</option>
            <option value="3" {{ $compliance->action_time == 3 ? 'selected' : '' }}>Médio prazo</option>
            <option value="3" {{ $compliance->action_time == 3 ? 'selected' : '' }}>Longo prazo</option>
          </select>
        </div>
        <div class="formbold-input-group">
          <label for="effiency_check" class="formbold-form-label"> Verificação de eficacia </label>
          <input type="date" name="effiency_check" class="formbold-form-input"
            value="{{ $compliance->effiency_check }}"required />
        </div>
        <select class="formbold-form-select" name="status" id="status" required>
          <option value="1" {{ $compliance->status == 1 ? 'selected' : '' }}>Sem trativa</option>
          <option value="2" {{ $compliance->status == 2 ? 'selected' : '' }}>Em andamento</option>
          <option value="3" {{ $compliance->status == 3 ? 'selected' : '' }}>Finalizado</option>
        </select>
        <button class="formbold-btn">Salvar</button>
      </form>
    </div>
  </div>

@endsection
