@extends('layouts.main')

@section('title', 'RNC - Relatório de Não Conformidade')

@section('content')
  <div class="formbold-main-wrapper">
    <div class="formbold-form-wrapper">
      <img class="logo" src="/img/Logo.png" alt="Consult" />
      <form action="/classifications/update/{{ $classification->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="formbold-input-group">
          <label for="name" class="formbold-form-label"> Classificação </label>
          <input type="text" name="name" class="formbold-form-input" value="{{ $classification->name }}"required />
        </div>
        <div class="formbold-input-group">
          <label class="formbold-form-label">
            Ativo
          </label>
          <select class="formbold-form-select" name="disponibility" id="disponibility" required>
            <option value="1"{{ $classification->disponibility == 1 ? 'selected' : '' }}>Sim</option>
            <option value="0"{{ $classification->disponibility == 0 ? 'selected' : '' }}>Não</option>
          </select>
        </div>
        <button class="formbold-btn">Salvar</button>
      </form>
    </div>
  </div>

@endsection
