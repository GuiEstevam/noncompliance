@extends('layouts.main')
@section('title', 'Relatórios cadastrados')
@section('content')

  <div class="col-md-10 offset-md-1 dashboard-title-container">
    <div class="col-md mt-3 text-right">
      <div class="btn-group " role="group">
        <a href="/compliance/create">
          <button class="btn btn-primary">
            Criar
          </button>
        </a>
      </div>
    </div>
    <a href="/">
      <h2>RELATÓRIOS</h2>
    </a>
  </div>
  <div class="col-md-10 offset-md-1">
    <!-- Abas nav -->
    <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link {{ $user->role_id == 1 || $user->role_id == 2 ? 'active' : '' }}" id="personal-tab"
          data-toggle="tab" href="#personal" role="tab" aria-controls="personal" aria-selected="true">Minhas não
          conformidades</a>
      </li>
      @if ($user->role_id == 3)
        <li class="nav-item">
          <a class="nav-link {{ $user->role_id == 3 ? 'active' : '' }}" id="all-tab" data-toggle="tab" href="#all"
            role="tab" aria-controls="all" aria-selected="false">Todas as RNC</a>
        </li>
      @endif
      @if ($user->role_id == 1 || $user->role_id == 2 || $user->role_id == 3)
        <li class="nav-item">
          <a class="nav-link" id="departament-tab" data-toggle="tab" href="#departament" role="tab"
            aria-controls="departament" aria-selected="false">Não conformidades do departamento</a>
        </li>
      @endif
    </ul>
    <!-- Painel de abas -->
    <div class="tab-content">
      <div class="tab-pane {{ $user->role_id == 1 || $user->role_id == 2 ? 'active' : '' }}" id="personal"
        role="tabpanel" aria-labelledby="personal-tab">
        @if (count($compliancesOwner) > 0)
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th class="text-center">ID</th>
                  <th class="text-center">Registrado por</th>
                  <th class="text-center">Data de registro</th>
                  <th class="text-center">Classificação</th>
                  <th class="text-center">Cliente</th>
                  <th class="text-center">Não conformidade</th>
                  <th class="text-center">Ação imediata</th>
                  <th class="text-center">Departamento responsável</th>
                  <th class="text-center">Prazo</th>
                  <th class="text-center">Status</th>
                  <th class="text-center">...</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($compliancesOwner as $complianceOwner)
                  <tr>
                    <td class="text-center">{{ $complianceOwner->id }}</td>
                    <td class="text-center">{{ $complianceOwner->user->name }}</td>
                    <td class="text-center">
                      {{ \Carbon\Carbon::parse($complianceOwner->compliance_date)->format('d/m/Y') }}
                    </td>
                    <td class="text-center">{{ $complianceOwner->classification->name }}</td>
                    <td class="text-center">{{ $complianceOwner->client->name }}</td>
                    <td class="text-center">{{ $complianceOwner->non_compliance }}</td>
                    <td class="text-center">{{ $complianceOwner->instant_action }}</td>
                    <td class="text-center">{{ $complianceOwner->departament->name }}</td>
                    </a>
                    <td class="text-center">
                      <a class="{{ $complianceOwner->check_late ? 'btn bg-late' : '' }}">
                        {{ $complianceOwner->check_late ? 'Em atraso' : 'No prazo' }}</a>
                    </td>
                    <td class="text-center">
                      <a
                        class="{{ $complianceOwner->status == 2 ? 'btn bg-inprogress' : ($complianceOwner->status == 3 ? 'btn bg-completed' : ($complianceOwner->status == 4 ? 'btn bg-late' : '')) }}">
                        {{ $status[$complianceOwner->status] }}
                      </a>
                    </td>
                    <td class="text-center">
                      <a href="/compliance/show/{{ $complianceOwner->id }}" class="btn btn-primary mt-2">
                        <ion-icon name="eye"></ion-icon>
                      </a>
                      <a href="/compliance/edit/{{ $complianceOwner->id }}" class="btn btn-primary mt-2">
                        <ion-icon name="create"></ion-icon>
                      </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        @else
          <p class="mt-3"> Não há relatórios cadastrados, <a href="/compliance/create">cadastrar relatórios</a></p>
        @endif
      </div>
      <div class="tab-pane {{ $user->role_id == 3 ? 'active' : '' }}" id="all" role="tabpanel"
        aria-labelledby="all-tab">
        <div class="search-toggle m-2 text-right">
          <h4>PESQUISAR
            <ion-icon name="search"></ion-icon>
          </h4> <!-- Ícone ou seta para exibir/ocultar o formulário -->
        </div>
        <form id="searchForm" class="hidden">
          <div class="formbold-input-group mt-2">
            <label class="formbold-form-label">Buscar por:</label>
            <select name="searchType" id="searchType" class="form-control">
              <option disabled selected> Selecione uma opção</option>
              <option value="id">ID</option>
              <option value="user_id">Registrado por</option>
              <option value="registrationDate">Data de registro</option>
              <option value="classification">Classificação</option>
              <option value="client">Cliente</option>
              <option value="departament">Departamento responsável</option>
            </select>
          </div>
          <div class="formbold-input-group" id="searchDataContainer">
            <select name="searchData" id="searchData" class="form-control mt-1">
              <option disabled selected> Selecione uma opção</option>
            </select>
          </div>
          <div class="formbold-input-group">
            <label class="formbold-form-label">Status:</label>
            <select name="searchStatus" id="searchStatus" class="form-control">
              <option disabled selected> Selecione uma opção</option>
              <option value='1'> Sem trativa</option>
              <option value='2'> Em andamento</option>
              <option value='3'> Concluído</option>
              <option value='4'> Todas</option>
            </select>
          </div>
          <div class="formbold-input-group">
            <select name="searchLate" id="searchLate" class="form-control">
              <option value='' disabled selected> Selecione uma opção</option>
              <option value='0'> No prazo</option>
              <option value='1'> Em atraso</option>
            </select>
          </div>
          <div class="text-right">
            <button class="btn btn-primary mb-2" id="searchButton"> Buscar </button>
          </div>
        </form>
        @if (count($compliances) > 0)
          <div class="table-responsive">
            <table class="table table-sm" id="myTable">
              <thead>
                <tr>
                  <th class="text-center sort" data-sort="id">ID</th>
                  <th class="text-center sort" data-sort="registeredBy">Registrado por</th>
                  <th class="text-center sort" data-sort="registrationDate">Data de registro</th>
                  <th class="text-center sort" data-sort="classification">Classificação</th>
                  <th class="text-center sort" data-sort="client">Cliente</th>
                  <th class="text-center sort" data-sort="nonconformity">Não conformidade</th>
                  <th class="text-center sort" data-sort="immediateAction">Ação imediata</th>
                  <th class="text-center sort" data-sort="responsibleDepartment">Departamento responsável</th>
                  <th class="text-center sort" data-sort="status">Status</th>
                  <th class="text-center sort" data-sort="check_late">Prazo</th>
                  <th class="text-center">...</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($compliances as $compliance)
                  <tr>
                    <td class="text-center">{{ $compliance->id }}</td>
                    <td class="text-center">{{ $compliance->user->name }}</td>
                    <td class="text-center">{{ \Carbon\Carbon::parse($compliance->compliance_date)->format('d/m/Y') }}
                    </td>
                    <td class="text-center">{{ $compliance->classification->name }}</td>
                    <td class="text-center">{{ $compliance->client->name }}</td>
                    <td class="text-center">{{ $compliance->non_compliance }}</td>
                    <td class="text-center">{{ $compliance->instant_action }}</td>
                    <td class="text-center">{{ $compliance->departament->name }}</td>
                    <td class="text-center"><a
                        class="{{ $compliance->status == 2 ? 'btn bg-inprogress' : ($compliance->status == 3 ? 'btn bg-completed' : ($compliance->status == 4 ? 'btn bg-late' : '')) }}">{{ $status[$compliance->status] }}</a>
                    </td>
                    <td class="text-center">
                      <a class="{{ $compliance->check_late ? 'btn bg-late' : '' }}">
                        {{ $compliance->check_late ? 'Em atraso' : 'No prazo' }}
                      </a>
                    </td>
                    <td class="text-center">
                      <a href="/compliance/show/{{ $compliance->id }}" class="btn btn-primary mt-2">
                        <ion-icon name="eye"></ion-icon>
                      </a>
                      <a href="/compliance/edit/{{ $compliance->id }}" class="btn btn-primary mt-2">
                        <ion-icon name="create"></ion-icon>
                      </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            {{ $compliances->links() }}
          </div>
          <!-- Campo de seleção para o número de itens por página -->
          <div class="formbold-input-group">
            <form id="pageForm">
              <label class="formbold-form-label">Itens por página:</label>
              <select name="perPage" id="perPage" class="form-control">
                <option value="5">5</option>
                <option {{ $perPage == 10 ? 'selected' : '' }} value="10">10</option>
                <option {{ $perPage == 25 ? 'selected' : '' }} value="25">25</option>
                <option {{ $perPage == 50 ? 'selected' : '' }} value="50">50</option>
                <option {{ $perPage == 100 ? 'selected' : '' }} value="100">100</option>
              </select>
            </form>
          </div>
        @else
          <p class="mt-3"> Não foram encontrados resultados</p>
        @endif
      </div>
      <div class="tab-pane" id="departament" role="tabpanel" aria-labelledby="departament-tab">
        @if (count($departaments) > 0)
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th class="text-center">ID</th>
                  <th class="text-center">Registrado por</th>
                  <th class="text-center">Data de registro</th>
                  <th class="text-center">Classificação</th>
                  <th class="text-center">Cliente</th>
                  <th class="text-center">Não conformidade</th>
                  <th class="text-center">Ação imediata</th>
                  <th class="text-center">Departamento responsável</th>
                  <th class="text-center">Prazo</th>
                  <th class="text-center">Status</th>
                  <th class="text-center">...</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($departaments as $departament)
                  @foreach ($departament->compliances as $compliances)
                    <tr>
                      <td class="text-center">{{ $compliances->id }}</td>
                      <td class="text-center">{{ $compliances->user->name }}</td>
                      <td class="text-center">
                        {{ \Carbon\Carbon::parse($compliances->compliance_date)->format('d/m/Y') }}
                      </td>
                      <td class="text-center">{{ $compliances->classification->name }}</td>
                      <td class="text-center">{{ $compliances->client->name }}</td>
                      <td class="text-center">{{ $compliances->non_compliance }}</td>
                      <td class="text-center">{{ $compliances->instant_action }}</td>
                      <td class="text-center">{{ $departament->name }}</td>
                      <td class="text-center">
                        <a class="{{ $compliances->check_late ? 'btn bg-late' : '' }}">
                          {{ $compliances->check_late ? 'Em atraso' : 'No prazo' }}
                        </a>
                      </td>
                      <td class="text-center"><a
                          class="{{ $compliances->status == 2 ? 'btn bg-inprogress' : ($compliances->status == 3 ? 'btn bg-completed' : '') }}">
                          {{ $status[$compliances->status] }}</a>
                      </td>
                      <td class="text-center">
                        <a href="/compliance/show/{{ $compliances->id }}" class="btn btn-primary mt-2">
                          <ion-icon name="eye"></ion-icon>
                        </a>
                        <a href="/compliance/edit/{{ $compliances->id }}" class="btn btn-primary mt-2">
                          <ion-icon name="create"></ion-icon>
                        </a>
                      </td>
                    </tr>
                  @endforeach
                @endforeach
              </tbody>
            </table>
          </div>
        @else
          <p class="mt-3"> Não há relatórios cadastrados, <a href="/compliance/create">cadastrar relatórios</a></p>
        @endif
      </div>
    </div>
  </div>
  <script>
    const table = document.getElementById('myTable');
    const tbody = table.querySelector('tbody');
    const rows = Array.from(tbody.querySelectorAll('tr'));

    // função de ordenação
    // função de ordenação
    const sortFunction = (colIndex, sortOrder) => {
      const dataType = rows[0].querySelectorAll('td')[colIndex].getAttribute('data-type');
      rows.sort((rowA, rowB) => {
        let valA = rowA.querySelectorAll('td')[colIndex].textContent.trim();
        let valB = rowB.querySelectorAll('td')[colIndex].textContent.trim();
        if (dataType === 'number') {
          valA = parseFloat(valA);
          valB = parseFloat(valB);
        }
        if (dataType === 'date') {
          valA = new Date(valA);
          valB = new Date(valB);
        }
        if (valA < valB) return sortOrder === 'asc' ? -1 : 1;
        if (valA > valB) return sortOrder === 'asc' ? 1 : -1;
        return 0;
      });
      tbody.innerHTML = '';
      rows.forEach(row => {
        tbody.appendChild(row);
      });

      // adiciona ícone de seta na coluna clicada
      const headers = table.querySelectorAll('th');
      headers.forEach(header => {
        const span = header.querySelector('span');
        if (span) {
          header.removeChild(span);
        }
      });
      const header = headers[colIndex];
      const span = document.createElement('span');
      span.classList.add('sort-arrow');
      if (sortOrder === 'asc') {
        span.innerHTML = '&uarr;';
        header.appendChild(span);
      } else {
        span.innerHTML = '&darr;';
        header.appendChild(span);
      }
    };

    // adiciona event listener para cada header de coluna
    table.querySelectorAll('th').forEach((header, index) => {
      header.addEventListener('click', () => {
        const isAscending = header.getAttribute('data-order') === 'asc';
        const newSortOrder = isAscending ? 'desc' : 'asc';
        table.querySelectorAll('th').forEach(header => {
          header.classList.remove('ascending', 'descending');
          header.removeAttribute('data-order');
        });
        header.setAttribute('data-order', newSortOrder);
        header.classList.add(newSortOrder === 'asc' ? 'ascending' : 'descending');
        sortFunction(index, newSortOrder);
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      // Verificar se há parâmetros de pesquisa na URL
      var urlParams = new URLSearchParams(window.location.search);
      var searchType = urlParams.get('searchType');
      var searchData = urlParams.get('searchData');
      var searchStatus = urlParams.get('searchStatus');
      var searchLate = urlParams.get('searchLate');

      // Preencher os selects com os valores dos parâmetros, se existirem
      if (searchType) {
        $('#searchType').val(searchType);
      }
      if (searchData) {
        carregarOpcoesData(searchType, searchData);
        $('#searchData').val(searchData);
      }
      if (searchStatus) {
        $('#searchStatus').val(searchStatus);
      }
      if (searchLate) {
        $('#searchLate').val(searchLate);
      }


      // Chamar a função quando o primeiro select for alterado
      $('#searchType').on('change', function() {
        searchType = $(this).val(); // Valor selecionado no primeiro select

        if (searchType === 'id') {
          $('#searchDataContainer').html(
            '<input type="text" name="searchData" id="searchData" class="form-control mt-1">');
        } else if (searchType === 'registrationDate') {
          $('#searchDataContainer').html(
            '<input type="date" name="searchData" id="searchData" class="form-control mt-1">');
        } else {
          $('#searchDataContainer')
            .html(
              '<select name="searchData" id="searchData" class="form-control mt-1 select2"><option disabled selected>Selecione uma opção</option></select>'
            );
        }
        // Limpar o segundo select
        $('#searchData').empty();

        // Verificar se uma opção foi selecionada
        if (searchType) {
          // Carregar as opções do segundo select
          carregarOpcoesData(searchType);
        }
      });

      // Função para carregar as opções do segundo select
      function carregarOpcoesData(searchType, searchData) {
        $.ajax({
          url: '/buscar-opcoes',
          type: 'GET',
          data: {
            filtro: searchType
          },
          success: function(response) {
            // Preencher o segundo select com as opções retornadas
            $('#searchData').empty(); // Limpar o select antes de preenchê-lo novamente

            $('#searchData').append($('<option>').text('Selecione uma opção').val('').prop('disabled', true)
              .prop('selected', true).attr('disabled', 'disabled'));

            $.each(response, function(key, value) {
              $('#searchData').append($('<option>').text(value).val(value));
            });

            // Selecionar a opção armazenada, se existir
            if (searchData) {
              $('#searchData').val(searchData);
            }
          },
          error: function(xhr) {
            console.log(xhr.responseText);
          }
        });
      }
    });
  </script>
  <script>
    // Função para atualizar a URL com o parâmetro de quantidade de itens selecionado e redirecionar para a página atual
    function updatePerPageQueryParam(perPage) {
      var url = new URL(window.location.href);
      url.searchParams.set('perPage', perPage);
      window.location.href = url.toString();
    }

    // Evento de alteração na seleção de quantidade de itens paginados
    $('#perPage').on('change', function() {
      var perPage = $(this).val();
      updatePerPageQueryParam(perPage);
    });

    // Preencher o valor selecionado na seleção de quantidade de itens paginados, se existir
    var perPage = new URLSearchParams(window.location.search).get('perPage');
    if (perPage) {
      $('#perPage').val(perPage);
    }
  </script>
  <script>
    $(document).ready(function() {
      // Ao clicar na seta, exibir/ocultar o formulário de pesquisa
      $('.search-toggle').click(function() {
        $('#searchForm').toggle();
      });

      // Verificar se há parâmetros de pesquisa na URL
      var urlParams = new URLSearchParams(window.location.search);
      var searchType = urlParams.get('searchType');
      var searchData = urlParams.get('searchData');
      var searchStatus = urlParams.get('searchStatus');
      var searchLate = urlParams.get('searchLate');

      // Exibir o formulário de pesquisa se houver campos selecionados
      if (searchType || searchData || searchStatus || searchLate) {
        $('#searchForm').show();
      }
    });
  </script>
@endsection
