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
    <h2 class="text-center">Partie parent</h2>


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
            <tr>
              <th>CIN</th> <td>CIN</td>
            </tr>
            
          </tbody>

        </table>

    </div>

    <div class="col-xs-6">
      
        <table class="table table-striped">
          <tbody>
            <tr>
              <th>Profession</th> <td>Profession</td>
            </tr>
            <tr>
              <th>Situation familiale</th> <td>Situation familiale</td>
            </tr>
            <tr>
              <th>Téléphone 1</th> <td>Téléphone 1</td>
            </tr>
            <tr>
              <th>Téléphone 2</th> <td>Téléphone 2</td>
            </tr>
            <tr>
              <th>Téléphone 3</th> <td>Téléphone 3</td>
            </tr>
            <tr>
              <th>Téléphone 4</th> <td>Téléphone 4</td>
            </tr>
            <tr>
              <th>Relation avec éléve</th> <td>Relation avec éléve</td>
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






</div>

</section>




@endsection
