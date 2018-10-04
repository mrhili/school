<table class="table table-striped">
    <tbody>
    <tr>
      <th style="width: 10px">#</th>
      <th>Loi</th>
    </tr>
    @foreach ($holders as $key => $rule)

      <tr>
        <td>{{ $key+1}}</td>
        <td>{{ $rule->rule->rule }}</td>

      </tr>

    @endforeach


  </tbody>
</table>
