


@extends('back.layouts.app')

@section('title')
Transports list
@endsection

@section('page_header')
Transports list
@endsection

@section('page_header_desc')
L'année selectionée est {{ Session::get('yearId') }}
@endsection

@section('breadcrumb')
  <li><a href="{{ route('index')  }}"><i class="fa fa-dashboard"></i> Index</a></li>
  <li><a href="{{ route('home')  }}"><i class="fa fa-dashboard"></i> dashboard</a></li>
  <li class="active"> Transports list</li>
@endsection

@section('content')

            @component('back.components.collapsed')
              @slot('heading')
                Ajouter transport
              @endslot
              @slot('id')
                sbject-form
              @endslot

              <form id="form" class="form-horizontal">

                  @include('back.partials.formG', ['name' => 'num_immatriculation', 'type' => 'text', 'text' => 'Num dimmatriculation', 'class'=>'', 'required' => true,'additionalInfo' => [ 'id' => 'num_immatriculation' ]])

                  @include('back.partials.formG', ['name' => 'imm_anterieure', 'type' => 'text', 'text' => 'Immatriculation anterieur', 'class'=>'', 'required' => true,'additionalInfo' => [ 'id' => 'imm_anterieure' ]])

                  @include('back.partials.formG', ['name' => 'er_mc', 'type' => 'date', 'text' => '1 er Marche C', 'class'=>'', 'required' => true,'additionalInfo' => [ 'id' => 'er_mc' ]])

                  @include('back.partials.formG', ['name' => 'er_mc_country', 'type' => 'date', 'text' => '1 er Marche Dans le payé', 'class'=>'', 'required' => true,'additionalInfo' => [ 'id' => 'er_mc_country' ]])

                  @include('back.partials.formG', ['name' => 'mutation', 'type' => 'date', 'text' => 'Mutation', 'class'=>'', 'required' => false,'additionalInfo' => [ 'id' => 'mutation' ]])

                  @include('back.partials.formG', ['name' => 'usage', 'type' => 'text', 'text' => 'Usage', 'class'=>'', 'required' => true,'additionalInfo' => [ 'id' => 'usage' ]])

                  @include('back.partials.formG', ['name' => 'proprietaire', 'type' => 'text', 'text' => 'Usage', 'class'=>'', 'required' => true,'additionalInfo' => [ 'id' => 'proprietaire' ]])

                  @include('back.partials.formG', ['name' => 'adresse', 'type' => 'text', 'text' => 'Usage', 'class'=>'', 'required' => true,'additionalInfo' => [ 'id' => 'adresse' ]])

                  @include('back.partials.formG', ['name' => 'fin_validite', 'type' => 'date', 'text' => 'Fin validté', 'class'=>'', 'required' => true,'additionalInfo' => [ 'id' => 'fin_validite' ]])

                  @include('back.partials.formG', ['name' => 'marque', 'type' => 'text', 'text' => 'Marque', 'class'=>'', 'required' => true,'additionalInfo' => [ 'id' => 'marque' ]])

                  @include('back.partials.formG', ['name' => 'type', 'type' => 'text', 'text' => 'Type', 'class'=>'', 'required' => true,'additionalInfo' => [ 'id' => 'type' ]])

                  @include('back.partials.formG', ['name' => 'genre', 'type' => 'text', 'text' => 'Genre', 'class'=>'', 'required' => true,'additionalInfo' => [ 'id' => 'genre' ]])

                  @include('back.partials.formG', ['name' => 'modele', 'type' => 'text', 'text' => 'Model', 'class'=>'', 'required' => true,'additionalInfo' => [ 'id' => 'modele' ]])

                  @include('back.partials.formG', ['name' => 'num_chassis', 'type' => 'text', 'text' => 'Numero chassis', 'class'=>'', 'required' => true,'additionalInfo' => [ 'id' => 'num_chassis' ]])

                  @include('back.partials.formG', ['name' => 'n_cylindres', 'type' => 'number', 'text' => 'Numero cylindre', 'class'=>'', 'required' => true,'additionalInfo' => [ 'id' => 'n_cylindres' ]])

                  @include('back.partials.formG', ['name' => 'puissance_fiscal', 'type' => 'number', 'text' => 'Puissance fiscal', 'class'=>'', 'required' => true,'additionalInfo' => [ 'id' => 'puissance_fiscal' ]])

                  @include('back.partials.formG', ['name' => 'nombre_place', 'type' => 'number', 'text' => 'Nombre de place', 'class'=>'', 'required' => true,'additionalInfo' => [ 'id' => 'nombre_place' ]])

                  @include('back.partials.formG', ['name' => 'poids_total_ac', 'type' => 'number', 'text' => 'Poids total AC', 'class'=>'', 'required' => true,'additionalInfo' => [ 'id' => 'poids_total_ac' ]])

                  @include('back.partials.formG', ['name' => 'poids_a_vide', 'type' => 'number', 'text' => 'Poids a vide', 'class'=>'', 'required' => true,'additionalInfo' => [ 'id' => 'poids_a_vide' ]])

                  @include('back.partials.formG', ['name' => 'poids_tmc', 'type' => 'number', 'text' => 'Puissance TMC', 'class'=>'', 'required' => true,'additionalInfo' => [ 'id' => 'poids_tmc' ]])


                  <div class="col-xs-12">
                  @include('back.partials.formG', ['name' => 'comment', 'type' => 'textarea', 'text' => 'Comment', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'commentfield'] ])
                  </div>

                  <div class="col-xs-12">

                  @include('back.partials.formG', ['name' => 'hidden_note', 'type' => 'textarea', 'text' => 'Une Note Secret pour toi', 'class'=>'', 'required' => false, 'additionalInfo' => ['id' =>  'hiddennotefield'] ])
                  </div>

                  <hr />
                  <div class="col-xs-12">
                  <div class="form-group">


                        <button  type="button" class="btn btn-primary pull-right" id="add" >Enregistrer</button>

                    </div>
                    </div>

              </form>

            @endcomponent


@component('back.components.plain')
  @slot('titlePlain')
    Les items
  @endslot

  @slot('footerPlain')

    <div class="col-xs-12 text-center">
      {{ $transportings->links() }}
    </div>

  @endslot

  @forelse( $transportings as $transporting  )
    @include('back.partials.user_widget', [
       'img' =>  Html::image( 'images/config/'. GetSetting::getConfig('no-image') ,'No-Image', ['class' => 'img-circle'] ) ,
       'h3' =>   $transporting->num_immatriculation  ,
       'desc' =>   $transporting->marque .' '. $transporting->type .' '. $transporting->genre .' '. $transporting->model ,
       'array_of_links' => [
         {{-- ['text' => 'Deficites Management',
           'link' => route('transportings.deficites', $transporting->id ),
           'class' => '',
           'data-id' => $transporting->id ], --}}
         ['text' => 'suprimer','link' => '#','class' => 'delete','data-id' => $transporting->id ]
       ]
     ])

  @empty

    <div class="alert alert-warning" role="alert">Vide</div>

  @endforelse


@endcomponent

@component('back.components.plain')
  @slot('titlePlain')
    Les nouveau items
  @endslot

  <div id="new-items">

    <div id="alert-empty" class="alert alert-warning" role="alert">Vide</div>

  </div>


@endcomponent


@endsection



@section('scripts')

<script src="{!! asset('axios/axios.min.js') !!}"></script>
<script src="{!! asset('validate/jquery.validate.min.js') !!}"></script>
<script src="{!! asset('helpers/helpers.js') !!}"></script>

<script type="text/javascript">
$(document).ready(function(){
var add = $('#add');
var alertempty = $('#alert-empty');
var newitems = $('#new-items');

var schoolLink = "{{ route('index') }}";
var imgLink = "{{ 'images/config/'. GetSetting::getConfig('no-image') }}";
var comment, hidden_note, name;

          add.on("click", function(e){

            add.attr('disabled', true);

            if( $('#form').valid() ){

              comment = $('#commentfield').val();
              hidden_note = $('#hiddennotefield').val();

                    axios.post('/transportation-post',{
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        num_immatriculation: $('#num_immatriculation').val(),
                        imm_anterieure: $('#imm_anterieure').val(),
                        er_mc: $('#er_mc').val(),
                        er_mc_country: $('#er_mc_country').val(),
                        mutation: $('#mutation').val(),
                        usage: $('#usage').val(),
                        proprietaire: $('#proprietaire').val(),
                        adresse: $('#adresse').val(),
                        fin_validite: $('#fin_validite').val(),
                        marque: $('#marque').val(),
                        type: $('#type').val(),
                        genre: $('#genre').val(),
                        modele: $('#modele').val(),
                        num_chassis: $('#num_chassis').val(),
                        n_cylindres: $('#n_cylindres').val(),
                        puissance_fiscal: $('#puissance_fiscal').val(),
                        nombre_place: $('#nombre_place').val(),
                        poids_total_ac: $('#poids_total_ac').val(),
                        poids_a_vide: $('#poids_a_vide').val(),
                        poids_tmc: $('#poids_tmc').val(),
                        comment: comment,
                        hidden_note: hidden_note

                    })
                        .then(function (response) {

                          swal({
                            position: 'top-end',
                            type: 'success',
                            title: 'Le maitre à etait bien linké, Hamdoullah',
                            showConfirmButton: false,
                            timer: 1500
                          })

                        console.log( response );
                        var returnedArray = response.data;


                        add.attr('disabled', false);

                        alertempty.hide();

                        newitems.append('\
                        <div class="col-md-4">\
                          <div class="box box-widget widget-user-2">\
                            <div class="widget-user-header bg-'+ randombgcolor() +'">\
                              <div class="widget-user-image">\
                                <img class="img-circle" src="'+schoolLink+'/'+imgLink+'" alt="UserAvatar">\
                              </div>\
                                <h3 class="widget-user-username">'+ returnedArray['num_immatriculation']+'</h3>\
                                <h5 class="widget-user-desc">'+ returnedArray['imm_anterieure']+'</h5>\
                            </div>\
                            <div class="box-footer no-padding">\
                                <a href="'+ schoolLink +'/transportation-management-deficite/'+ returnedArray['id'] +'">Deficites Management</a>\
                            </div>\
                          </div>\
                        </div>');

                        })
                        .catch(function (error) {
                        add.attr('disabled', false);
                        alert(error);
                        swal(
                          'Error',
                          error,
                          'error'
                        )
                        });

              }else{
                add.attr('disabled', false);

                swal(
                  'Formulaire incoreecte!',
                  'Formulaire incoreecte!',
                  'error'
                )
              }

            });
});
</script>
@endsection
