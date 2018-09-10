@extends('back.layouts.printable')



@section( 'content' )
  @component('back.components.printbutton')
      <li class=""><a href="{{ route( ArrayHolder::roles_routing( $worker->role ).'.profile', $worker->id ) }}" class="btn btn-primary"><i class="fa fa-user"></i> Continuer vers son profile</a></li>
  @endcomponent
<section class="container">
<div class="row">
  <div class="text-center col-xs-12">
    @component('back.components.entity')

    @endcomponent

    <h1 class="text-center">Fiche D’inscription {{--N PP--}} {{ Session::get('yearName') }}</h1>
    <h2 class="text-center">Partie éleve</h2>


  </div>
  <hr />
  <div class="col-xs-12">
    <h2 class="text-center">Classement</h2>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Année</th> <th>Role</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{{ Session::get('yearName') }}</td> <td>{{ ArrayHolder::roles( $worker->role ) }}</td>
        </tr>

      </tbody>
    </table>
  </div>


  <hr />
  <div class="col-xs-12">
    <h2 class="text-center">Nécessaire information</h2>


    <div class="col-xs-6">

        <table class="table table-striped">
          <tbody>
            <tr>
              <th>Image</th> <td><img src="{{ CommonPics::ifImg( ArrayHolder::roles_routing( $worker->role ),  $worker->img ) }}" alt="..." height="100px" width="auto"  class="block"></td>
            </tr>
            <tr>
              <th>Nom</th> <td>{{ $worker->cin }}</td>
            </tr>
            <tr>
              <th>Nom</th> <td>{{ $worker->last_name }}</td>
            </tr>
            <tr>
              <th>Prénom</th> <td>{{ $worker->name }}</td>
            </tr>
            <tr>
              <th>Nom arabic</th> <td>{{ $worker->arabic_last_name }}</td>
            </tr>
            <tr>
              <th>Prénom arabic</th> <td>{{ $worker->arabic_name }}</td>
            </tr>
            <tr>
              <th>Genre</th> <td>{{ ArrayHolder::gender( $worker->gender ) }}</td>
            </tr>
            <tr>
              <th>Date de naissance</th> <td>{{ $worker->birth_date }}</td>
            </tr>
            <tr>
              <th>Ville de naissance</th> <td>{{ $worker->birth_place }}</td>
            </tr>

          </tbody>

        </table>

    </div>

    <div class="col-xs-6">

        <table class="table table-striped">
          <tbody>
            <tr>
              <th>Ville</th> <td>{{ $worker->city }}</td>
            </tr>
            <tr>
              <th>Code postal</th> <td>{{ $worker->zip_code }}</td>
            </tr>
            <tr>
              <th>Address</th> <td>{{ $worker->adress }}</td>
            </tr>
            <tr>
              <th>Téléphone</th> <td>{{ $worker->phone }}</td>
            </tr>
            <tr>
              <th>Téléphone 2</th> <td>{{ $worker->phone2 }}</td>
            </tr>
            <tr>
              <th>Téléphone 3</th> <td>{{ $worker->phone3 }}</td>
            </tr>
            <tr>
              <th>Situation familiale</th> <td>{{ Application::family_situation( $worker->family_situation ) }}</td>
            </tr>

          </tbody>

        </table>

    </div>





  </div>





  <hr />
  <div class="col-xs-12">
    <h2 class="text-center">Payement</h2>





    <div class="col-xs-6">

        <table class="table table-striped">
          <tbody>
            <tr>
              <th>Paiement montielle</th> <td>{{ $worker_info->should_be_payed }}</td>
            </tr>
          </tbody>

        </table>

    </div>


    <div class="col-xs-6">
@if( (int) $worker_info->cnss_payment > 0  )
        <table class="table table-striped">
          <tbody>
            <tr>
              <th>Avec cnss</th> <td>Oui</td>
            </tr>
            <tr>
              <th>cnss payement montielle</th> <td>{{ $worker_info->cnss_payment }}</td>
            </tr>

          </tbody>

        </table>
@endif

    </div>





  </div>





<div class="footer-printable row">
  <h3 class="col-xs-6">Signature du directeur :</h3>
  <h3 class="col-xs-6">Signature :</h3>
</div>
</section>




@endsection
