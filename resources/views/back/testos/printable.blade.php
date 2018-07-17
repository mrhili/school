@extends('back.layouts.printable')



@section( 'content' )

<section class="container">
<div class="row">
  <div class="text-center col-xs-12">
    <img src="{{ GetSetting::ifImg( 'logo' ) }}" alt="..." height="100px" width="auto"  class="block">
    <p class="">
      <b>{{ GetSetting::getConfig( 'name' ) }}</b><br />
  {{ GetSetting::getConfig( 'adress' ) }}<br />
  Numéro et date de la licence {{ GetSetting::getConfig( 'licence' ) }}<br />
  {{ GetSetting::getConfig( 'city' ) }}<br />
  {{ GetSetting::getConfig( 'fix-number' ) }}<br />
    </p>

    <h1>Fiche D’inscription yearname</h1>


  </div>
  <hr />
  <div class="col-xs-12">
    <h2>Classement</h2>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Année</th> <th>Class</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Mark</td> <td>Otto</td>
        </tr>

      </tbody>
    </table>
  </div>

</div>

</section>




@endsection
