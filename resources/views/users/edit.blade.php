@extends('layouts.main')

@section('title', 'RNC - Relatório de Não Conformidade')

@section('content')
  <div class="formbold-main-wrapper">
    <div class="formbold-form-wrapper">
      <img class="logo" src="/img/Logo.png" alt="Consult" />
      <form action="/users/update/{{ $user->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="formbold-input-group">
          <label for="compliance_date" class="formbold-form-label"> Nome completo </label>
          <input type="text" name="name" class="formbold-form-input" value="{{ $user->name }}"required />
        </div>
        <div class="formbold-input-group">
          <label for="compliance_date" class="formbold-form-label"> Nome de usuário </label>
          <input type="text" name="username" class="formbold-form-input" value="{{ $user->username }}" required />
        </div>
        <div class="formbold-input-group">
          <label for="compliance_date" class="formbold-form-label"> Senha </label>
          <input type="password" name="password" class="formbold-form-input" value="{{ $user->password }}"required />
        </div>
        <div class="formbold-input-group">
          <label class="formbold-form-label">
            Departamento:
          </label>
          <select class="formbold-form-select" name="departament" id="departament" required>
            <option value="1" {{ $user->departament == 1 ? 'selected' : '' }}>Contábil</option>
            <option value="2" {{ $user->departament == 2 ? 'selected' : '' }}>Financeiro</option>
            <option value="3" {{ $user->departament == 3 ? 'selected' : '' }}>Fiscal</option>
            <option value="4" {{ $user->departament == 4 ? 'selected' : '' }}>Pessoal</option>
            <option value="5" {{ $user->departament == 5 ? 'selected' : '' }}>Qualidade</option>
            <option value="6" {{ $user->departament == 6 ? 'selected' : '' }}>Recursos Humanos</option>
            <option value="7" {{ $user->departament == 7 ? 'selected' : '' }}>Societário</option>
            <option value="8" {{ $user->departament == 8 ? 'selected' : '' }}>T.I</option>
          </select>
        </div>
        <div class="formbold-input-group">
          <label class="formbold-form-label">
            Cadastrar como:
          </label>
          <select class="formbold-form-select" name="role_id" id="role_id" required>
            <option value="1" {{ $user->role_id == 1 ? 'selected' : '' }}>Colaborador</option>
            <option value="2" {{ $user->role_id == 2 ? 'selected' : '' }}>Coordenador</option>
            <option value="3" {{ $user->role_id == 3 ? 'selected' : '' }}>Gerente</option>
          </select>
        </div>
        <button class="formbold-btn">Salvar</button>
      </form>
    </div>
  </div>

@endsection
