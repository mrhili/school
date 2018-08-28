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

    <h1 class="text-center">Fiche D’inscription N PP yearname</h1>
    <h2 class="text-center">Partie éleve</h2>


  </div>
  <hr />
  <div class="col-xs-12">
    <h2 class="text-center">Classement</h2>
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


  <hr />
  <div class="col-xs-12">
    <h2 class="text-center">Nécessaire information</h2>


    <div class="col-xs-6">

        <table class="table table-striped">
          <tbody>
            <tr>
              <th>Image</th> <td><img src="{{ GetSetting::ifImg( 'logo' ) }}" alt="..." height="100px" width="auto"  class="block"></td>
            </tr>
            <tr>
              <th>Nom</th> <td>Nom Nom</td>
            </tr>
            <tr>
              <th>Prénom</th> <td>Prénom Prénom</td>
            </tr>
            <tr>
              <th>Nom arabic</th> <td>Nom arabic</td>
            </tr>
            <tr>
              <th>Prénom arabic</th> <td>Prénom arabic</td>
            </tr>
            <tr>
              <th>Genre</th> <td>Genre</td>
            </tr>
            <tr>
              <th>Date de naissance</th> <td>Date de naissance</td>
            </tr>
            <tr>
              <th>Ville de naissance</th> <td>Ville de naissance</td>
            </tr>

          </tbody>

        </table>

    </div>

    <div class="col-xs-6">

        <table class="table table-striped">
          <tbody>
            <tr>
              <th>Ville</th> <td>Ville</td>
            </tr>
            <tr>
              <th>Code postal</th> <td>Code postal</td>
            </tr>
            <tr>
              <th>Address</th> <td>Address</td>
            </tr>
            <tr>
              <th>Téléphone</th> <td>Téléphone</td>
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
              <th>Paiement montielle</th> <td>Paiement montielle</td>
            </tr>
            <tr>
              <th>Frais d'enregistrement</th> <td>Frais d'enregistrement</td>
            </tr>
            <tr>
              <th>Frais d’assuence</th> <td>Frais d’assuence</td>
            </tr>


          </tbody>

        </table>

    </div>


    <div class="col-xs-6">

        <table class="table table-striped">
          <tbody>
            <tr>
              <th>Avec transport</th> <td>Oui / non</td>
            </tr>
            <tr>
              <th>Frais transport</th> <td>Frais transport</td>
            </tr>

          </tbody>

        </table>

        <table class="table table-striped">
          <tbody>
            <tr>
              <th>Avec course de soutien</th> <td>Oui / non</td>
            </tr>
            <tr>
              <th>Frais des cours</th> <td>Frais transport</td>
            </tr>

          </tbody>

        </table>

    </div>





  </div>







</div>

</section>




@endsection
