@extends('layouts.main')
@section('title', 'Editando a RNC: ' . $compliance->id)
@section('content')

  <div class="formbold-main-wrapper">
    <div class="formbold-form-wrapper">
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
            {{ $authenticated->role_id != 3 ? 'disabled' : '' }}>
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
            value="{{ $compliance->compliance_date }}" {{ $authenticated->role_id != 3 ? 'disabled' : '' }} />
        </div>
        <div class="formbold-input-group">
          <label class="formbold-form-label">
            Classificação
          </label>
          <select class="formbold-form-select" name="classification_id" id="classification_id"
            {{ $authenticated->role_id != 3 ? 'disabled' : '' }}>
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
            {{ $authenticated->role_id != 3 ? 'disabled' : '' }}>
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
            class="formbold-form-input" {{ $authenticated->role_id != 3 ? 'disabled' : '' }}> {{ $compliance->non_compliance }} </textarea>
        </div>
        <div>
          <label for="instant_action" class="formbold-form-label">
            Ação Imediata
          </label>
          <textarea rows="6" name="instant_action" id="instant_action" placeholder="Descreva aqui a ação imediata"
            class="formbold-form-input" {{ $authenticated->role_id != 3 ? 'disabled' : '' }}>{{ $compliance->instant_action }}</textarea>
        </div>
        <div class="formbold-input-group">
          <label class="formbold-form-label">
            Departamento responsável pela ação tratativa
          </label>
          <select class="formbold-form-select" name="departament_id" id="departament_id"
            {{ $authenticated->role_id != 3 ? 'disabled' : '' }}>
            @foreach ($departaments as $departament)
              <option value="{{ $departament->id }}"
                {{ $departament->id == $compliance->departament_id ? 'selected' : '' }}
                {{ $departament->disponibility == 0 ? 'disabled' : '' }}>
                {{ $departament->name }}</option>
            @endforeach
          </select>
        </div>
    </div>
    {{-- Resposta --}}
    <div class="formbold-form-wrapper">
      <div class="formbold-input-group">
        <label for="right_action" class="formbold-form-label">
          Ação corretiva/preventiva/melhoria
        </label>
        <textarea rows="6" name="right_action" id="right_action" placeholder="Descreva aqui a ação tomada"
          class="formbold-form-input"
          {{ ($authenticated->role_id != 3 && $authenticated->departament != $compliance->departament_id) || ($compliance->status == 2 && $authenticated->role_id != 3) ? 'disabled' : '' }}>{{ $compliance->right_action }}</textarea>

      </div>
      <div class="formbold-input-group">
        <label class="formbold-form-label">
          Responsável pela tratativa
        </label>
        <select class="formbold-form-select" name="dealings_owner" id="dealings_owner"
          {{ ($authenticated->role_id != 3 && $authenticated->departament != $compliance->departament_id) || ($compliance->status == 2 && $authenticated->role_id != 3) ? 'disabled' : '' }}>
          <option value="" selected disabled> Selecione um coordenador</option>
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
        <select class="formbold-form-select" name="action_time" id="action_time" {{-- onchange="handleActionTimeChange()" --}}
          {{ ($authenticated->role_id != 3 && $authenticated->departament != $compliance->departament_id) || ($compliance->status == 2 && $authenticated->role_id != 3) ? 'disabled' : '' }}>
          <option value="" selected disabled>Selecione um prazo</option>
          <option value="1" {{ $compliance->action_time == 1 ? 'selected' : '' }}>Imediato</option>
          <option value="2" {{ $compliance->action_time == 2 ? 'selected' : '' }}>Curto prazo</option>
          <option value="3" {{ $compliance->action_time == 3 ? 'selected' : '' }}>Médio prazo</option>
          <option value="4" {{ $compliance->action_time == 4 ? 'selected' : '' }}>Longo prazo</option>
        </select>
      </div>
    </div>
    <div class="formbold-form-wrapper">
      <div class="formbold-input-group">
        <label for="efficiency_check" class="formbold-form-label"> Verificação de eficácia </label>
        <input type="date" name="efficiency_check" id="efficiency_check" class="formbold-form-input"
          value="{{ $compliance->efficiency_check }}" {{ $authenticated->role_id != 3 ? 'disabled' : '' }} />
      </div>
      <div class="formbold-input-group">
        <label class="formbold-form-label">
          Status
        </label>
        <select class="formbold-form-select" name="status" id="status"
          {{ $authenticated->role_id != 3 ? 'disabled' : '' }}>
          <option value="" selected disabled>Selecione um status</option>
          <option value="1" {{ $compliance->status == 1 ? 'selected' : '' }}>Sem tratativa</option>
          <option value="2" {{ $compliance->status == 2 ? 'selected' : '' }}>Em andamento</option>
          <option value="3" {{ $compliance->status == 3 ? 'selected' : '' }}>Finalizado</option>
        </select>
      </div>
      <div class="formbold-input-group" style="display:{{ $compliance->status == 1 ? 'none' : '' }}">
        <label class="formbold-form-label">
          Solução:
        </label>
        <select class="formbold-form-select" name="efficiency_status" id="efficiency_status"
          onchange="handleEfficiencyStatusChange()"
          {{ $authenticated->role_id != 3 && $authenticated->id != $compliance->user_id ? 'disabled' : '' }}>
          <option value=""> Selecione uma
            opção</option>
          <option value="1"{{ $compliance->efficiency_status == 1 ? 'selected' : '' }}>Aprovada</option>
          <option value="2"{{ $compliance->efficiency_status == 2 ? 'selected' : '' }}>Reprovada</option>
        </select>
      </div>
      <button class="formbold-btn">Salvar</button>
      </form>
    </div>
    <div class="formbold-form-wrapper" id="rejection-reason" style="display:none;">
      <div class="formbold-input-group">
        <label class="formbold-form-label">
          Motivo da reprovação:
        </label>
        <div class="chat-box">
          @foreach ($messages as $message)
            @if ($message->user_id == $authenticated->id)
              <div class="chat-r">
                <div class="sp"></div>
                <div class="mess mess-r">
                  <p>{{ $message->message }}</p>
                  <div class="check">
                    <span>{{ $message->user->name }}</span>
                    <span>{{ date('d/m/Y', strtotime($message->created_at)) }}</span>
                  </div>
                </div>
              </div>
            @else
              <div class="chat-l">
                <div class="mess">
                  <p>{{ $message->message }}</p>
                  <div class="check">
                    <span>{{ $message->user->name }}</span>
                    <span>{{ date('d/m/Y', strtotime($message->created_at)) }}</span>
                  </div>
                </div>
                <div class="sp"></div>
              </div>
            @endif
          @endforeach
        </div>
        <div class="chat-footer text-center">
          <form id="meuformulario" action="/message" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" id="compliance_id" name="compliance_id" value="{{ $compliance->id }}">
            <textarea rows="3" name="message" id="efficiency_text" placeholder="Descreva aqui o motivo da reprovação"
              class="formbold-form-input" id="rejection_reason"></textarea>
            <input type="submit" class="formbold-btn" value="Enviar">
          </form>
        </div>
      </div>
    </div>
  </div>
  <script>
    document.addEventListener("DOMContentLoaded", function(event) {
      handleEfficiencyStatusChange();
    });
  </script>
  <script>
    $(document).on('submit', '#meuformulario', function(e) {
      e.preventDefault();

      var form = $(this);
      var url = form.attr('action');
      var data = form.serialize();

      $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: data,
        success: function(response) {
          console.log(response)
          $(".chat-box").append(response.mensagem);
        },
        error: function(response) {
          alert('Ocorreu um erro ao cadastrar o cliente');
        }
      });
    });
  </script>
  <script>
    function handleEfficiencyStatusChange() {
      var messages = {!! json_encode($messages) !!};
      var efficiencyStatus = document.getElementById("efficiency_status");
      var rejectionReason = document.getElementById("rejection-reason");
      var status = document.getElementById("status");

      if (efficiencyStatus.value === "") {
        rejectionReason.style.display = "none";
      } else if (messages.length > 0 || efficiencyStatus.value === "2") {
        rejectionReason.style.display = "block";
        status.value = "2";
      } else {
        rejectionReason.style.display = "none";
        status.value = "3";
      }
    }
  </script>

  <script>
    window.onload = function() {
      var master = "{{ $authenticated->role_id }}"
      var status = "{{ $compliance->status }}";
      if (status === "3" && master != "3") {
        var elements = document.getElementsByTagName("input");
        for (var i = 0; i < elements.length; i++) {
          elements[i].disabled = true;
        }
        elements = document.getElementsByTagName("select");
        for (var i = 0; i < elements.length; i++) {
          elements[i].disabled = true;
        }
        elements = document.getElementsByTagName("textarea");
        for (var i = 0; i < elements.length; i++) {
          elements[i].disabled = true;
        }
      }
    }
  </script>



@endsection
