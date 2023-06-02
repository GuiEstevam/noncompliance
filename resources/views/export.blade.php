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
            class="{{ $compliance->status == 2 ? 'btn bg-inprogress' : ($compliance->status == 3 ? 'btn bg-completed' : ($compliance->status == 4 ? 'btn bg-late' : '')) }}">{{ $compliance->status }}</a>
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
