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

    <h1 class="text-center">Fiche D’inscription {{--N PP--}} {{ Session::get('yearName') }}</h1>
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
          <td>{{ Session::get('yearName') }}</td> <td>{{ $student->the_class->name }}</td>
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
              <th>Image</th> <td><img src="{{ CommonPics::ifImg( 'students',  $student->img ) }}" alt="..." height="100px" width="auto"  class="block"></td>
            </tr>
            <tr>
              <th>Nom</th> <td>{{ $student->last_name }}</td>
            </tr>
            <tr>
              <th>Prénom</th> <td>{{ $student->name }}</td>
            </tr>
            <tr>
              <th>Nom arabic</th> <td>{{ $student->arabic_last_name }}</td>
            </tr>
            <tr>
              <th>Prénom arabic</th> <td>{{ $student->arabic_name }}</td>
            </tr>
            <tr>
              <th>Genre</th> <td>{{ ArrayHolder::gender( $student->gender ) }}</td>
            </tr>
            <tr>
              <th>Date de naissance</th> <td>{{ $student->birth_date }}</td>
            </tr>
            <tr>
              <th>Ville de naissance</th> <td>{{ $student->birth_place }}</td>
            </tr>

          </tbody>

        </table>

    </div>

    <div class="col-xs-6">

        <table class="table table-striped">
          <tbody>
            <tr>
              <th>Ville</th> <td>{{ $student->city }}</td>
            </tr>
            <tr>
              <th>Code postal</th> <td>{{ $student->zip_code }}</td>
            </tr>
            <tr>
              <th>Address</th> <td>{{ $student->adress }}</td>
            </tr>
            <tr>
              <th>Téléphone</th> <td>{{ $student->phone }}</td>
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
              <th>Paiement montielle</th> <td>{{ $student_info->should_pay }}</td>
            </tr>



            <tr>
              <th>Frais d'enregistrement</th> <td>{{ $student_info_once_payment_array['saving_model']->should_pay }}</td>
            </tr>
            <tr>
              <th>Frais d’assuence</th> <td>{{ $student_info_once_payment_array['assurence_model']->should_pay }}</td>
            </tr>


          </tbody>

        </table>

    </div>


    <div class="col-xs-6">
@if( (int) $student_info->transport_pay > 0 &&  (int)$student_info_once_payment_array['trans_assurence_model']->should_pay > 0 )
        <table class="table table-striped">
          <tbody>
            <tr>
              <th>Avec transport</th> <td>Oui</td>
            </tr>
            <tr>
              <th>Frais montielle transport</th> <td>{{ $student_info->transport_pay }}</td>
            </tr>
            <tr>
              <th>Frais assurence transport</th> <td>{{ $student_info_once_payment_array['trans_assurence_model']->should_pay }}</td>
            </tr>

          </tbody>

        </table>
@endif

@if( (int) $student_info->add_classes_pay > 0 )
        <table class="table table-striped">
          <tbody>
            <tr>
              <th>Avec course de soutien</th> <td>Oui</td>
            </tr>
            <tr>
              <th>Frais des cours</th> <td>{{ $student_info->add_classes_pay }}</td>
            </tr>

          </tbody>

        </table>
@endif
    </div>





  </div>










    <h2 class="text-center">Partie du parent</h2>

    <hr />
    <div class="col-xs-12">
      <h2 class="text-center">Relation entre parent - enfant:{{ $relation->category->name }}</h2>
    </div>


      <hr />
      <div class="col-xs-12">
        <h2 class="text-center">Nécessaire information</h2>


        <div class="col-xs-6">

            <table class="table table-striped">
              <tbody>
                <tr>
                  <th>Image</th> <td><img src="{{ CommonPics::ifImg( 'parents',  $parent->img ) }}" alt="..." height="100px" width="auto"  class="block"></td>
                </tr>
                <tr>
                  <th>Ville de naissance</th> <td>{{ $parent->cin }}</td>
                </tr>
                <tr>
                  <th>Nom</th> <td>{{ $parent->last_name }}</td>
                </tr>
                <tr>
                  <th>Prénom</th> <td>{{ $parent->name }}</td>
                </tr>
                <tr>
                  <th>Nom arabic</th> <td>{{ $parent->arabic_last_name }}</td>
                </tr>
                <tr>
                  <th>Prénom arabic</th> <td>{{ $parent->arabic_name }}</td>
                </tr>
                <tr>
                  <th>Genre</th> <td>{{ ArrayHolder::gender( $parent->gender ) }}</td>
                </tr>
                <tr>
                  <th>Date de naissance</th> <td>{{ $parent->birth_date }}</td>
                </tr>
                <tr>
                  <th>Ville de naissance</th> <td>{{ $parent->birth_place }}</td>
                </tr>

              </tbody>

            </table>

        </div>

        <div class="col-xs-6">

            <table class="table table-striped">
              <tbody>
                <tr>
                  <th>Ville</th> <td>{{ $parent->city }}</td>
                </tr>
                <tr>
                  <th>Code postal</th> <td>{{ $parent->zip_code }}</td>
                </tr>
                <tr>
                  <th>Address</th> <td>{{ $parent->adress }}</td>
                </tr>
                <tr>
                  <th>Téléphone</th> <td>{{ $parent->phone }}</td>
                </tr>
                <tr>
                  <th>Téléphone 2</th> <td>{{ $parent->phone2 }}</td>
                </tr>
                <tr>
                  <th>Téléphone 3</th> <td>{{ $parent->phone3 }}</td>
                </tr>
                <tr>
                  <th>Profession</th> <td>{{ $parent->profession }}</td>
                </tr>
                <tr>
                  <th>Situation familiale</th> <td>{{ Application::family_situation( $parent->family_situation ) }}</td>
                </tr>


              </tbody>

            </table>

        </div>















</div>




<div class="footer-printable row">
  <h3 class="col-xs-6">Signature du directeur :</h3>
  <h3 class="col-xs-6">Signature du parent :</h3>
</div>
</section>




@endsection
