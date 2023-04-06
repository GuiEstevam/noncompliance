@extends('layouts.main')

@section('title', 'RNC - Relatório de Não Conformidade')

@section('content')
  <div class="formbold-main-wrapper">
    <div class="formbold-form-wrapper">
      <img class="logo" src="/img/Logo.png" alt="Consult" />
      <form action="/users" method="POST">
        @csrf
        <div class="formbold-input-group">
          <label for="compliance_date" class="formbold-form-label"> Nome completo </label>
          <input type="text" name="name" class="formbold-form-input" required />
        </div>
        <div class="formbold-input-group">
          <label for="compliance_date" class="formbold-form-label"> Nome de usuário </label>
          <input type="text" name="username" class="formbold-form-input" required />
        </div>
        <div class="formbold-input-group">
          <label for="compliance_date" class="formbold-form-label"> Senha </label>
          <input type="password" name="password" class="formbold-form-input" required />
        </div>
        <div class="formbold-input-group">
          <label class="formbold-form-label">
            Departamento:
          </label>
          <select class="formbold-form-select" name="departament" id="departament" required>
            <option value="" selected disabled>Selecione um departamento</option>
            <option value="1">Contábil</option>
            <option value="2">Financeiro</option>
            <option value="3">Fiscal</option>
            <option value="4">Pessoal</option>
            <option value="5">Qualidade</option>
            <option value="6">Recursos Humanos</option>
            <option value="7">Societário</option>
            <option value="8">T.I</option>
          </select>
        </div>
        <div class="formbold-input-group">
          <label class="formbold-form-label">
            Cadastrar como:
          </label>
          <select class="formbold-form-select" name="role_id" id="role_id" required>
            <option value="1" selected>Colaborador</option>
            <option value="2">Coordenador</option>
            <option value="3">Gerente</option>
          </select>
        </div>
        <button class="formbold-btn">Enviar</button>
      </form>
    </div>
  </div>

@endsection
