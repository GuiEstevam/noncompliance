@extends('layouts.main')

@section('title', 'RNC - Relatório de Não Conformidade')

@section('content')
  <div class="formbold-main-wrapper">
    <div class="formbold-form-wrapper">
      <form action="/clients" method="POST">
        @csrf
        <div class="formbold-input-group">
          <label for="compliance_date" class="formbold-form-label"> Cliente </label>
          <input type="text" name="name" class="formbold-form-input" required />
        </div>
        <div class="formbold-input-group">
          <label class="formbold-form-label">
            Ativo
          </label>
          <select class="formbold-form-select" name="disponibility" id="disponibility" required>
            <option value="1">Sim</option>
            <option value="0">Não</option>
          </select>
        </div>
        <button class="formbold-btn">Salvar</button>
      </form>
    </div>
  </div>

@endsection
