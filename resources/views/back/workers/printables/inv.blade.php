@extends('back.layouts.printable')

@section( 'styles' )

@endsection

@section( 'content' )

  @component('back.components.printbutton')
  @endcomponent
@foreach($workers as $worker)
  <div class="jumbotron">
    <div class="container">

      <row>
        <div class="col-xs-4">
          <img src="{{ GetSetting::ifImg( 'logo' ) }}" alt="..." height="100px" width="auto"  class="block">

        </div>
        <div class="col-xs-8">


          <h1>{{ $worker->gender?'Monsieur': 'Ma demoiselle' }} {{ $worker->last_name }} {{ $worker->name }}</h1>
          <p>
            L'ecole {{ GetSetting::getConfig( 'company' ) }} vous invite a acceder a son site web <i><b>fatimaazzahrae.epizy.com</b><i> avec le login et le pass ci desous :
          </p>



        </div>

        <div class="col-xs-12">
          <table class="table table-striped">
            <thead> <tr> <th>Login</th> <th>Password</th></tr> </thead>
            <tbody> <tr> <th scope="row">{{ $worker->email }}</th> <td>987654321</td></tr> </tbody>
          </table>
          <hr />
          <p>> Ta premiére action sa cera d'ajouter ton parent</p>
        </div>
      </row>

    </div>
  </div>

  <hr class="style-three">
@endforeach





@endsection
