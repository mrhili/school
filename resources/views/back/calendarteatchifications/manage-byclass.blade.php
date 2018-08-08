@extends('back.layouts.app')

@section('datatableCss')
  <link rel="stylesheet" href="{!! asset('adminl/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}">

@endsection

@section('styles')


    <link rel="stylesheet" href="{!! asset('adminl/bower_components/fullcalendar/dist/fullcalendar.min.css') !!}">
      <link rel="stylesheet" href="{!! asset('adminl/bower_components/fullcalendar/dist/fullcalendar.print.min.css') !!}" media="print">

      <style media="screen">
      .small-block {
          float: left;
          width: 20px;
          height: 20px;
          margin: 5px;
          border: 1px solid rgba(0, 0, 0, .2);
          }
      </style>
@endsection

@section('title')
  Emplois du temp du Class: {{ $class->name }}
@endsection




@section('page_header')
  Emplois du temp du Class: {{ $class->name }}
@endsection

@section('page_header_desc')
  année selectioné: {{ Session::get('yearName') }}  / class: {{ $class->name }}
@endsection

@section('breadcrumb')
  <ol class="breadcrumb">
    <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> Acceuill</a></li>
    <li class=""><a href="{{ route('home') }}">Dashboard</a></li>
    <li class=""><a href="{{ route('classes.list') }}">List des classes</a></li>
    <li class="active"><a href="#">Emplois du temp du Class: {{ $class->name }}</a></li>
  </ol>
@endsection



@section('content')

  @component('back.components.plain')
    @slot('titlePlain')
      Gestion d'emploi du temps
    @endslot

    <div class="text-center">
      <a href="add-form" class="btn btn-primary">
        <i class="fa fa-plus"> Ajouter une matiere a l'emplois du temps</i>
      </a>
    </div>

    <div class="calendarparent">
      {!! $calendar->calendar() !!}
    </div>

    <hr />
    <div class="row">

      <div class="col-xs-12">

        <form id="add-form" class="form-horizontal">

          @include('back.partials.formG', ['name' => 'teatchification', 'type' => 'select','selected' => null, 'text' => 'Maitre -> Matiére', 'class'=>'repeated_type', 'required' => false, 'array' => $teatchers_subjects,'additionalInfo' => [ 'id' => 'teatchification' ]])

          <hr />

          @include('back.partials.formG', ['name' => 'start_date', 'type' => 'datetime-local', 'text' => 'Debut devenement', 'class'=>'', 'required' => true,'additionalInfo' => [ 'id' => 'start_date' ], 'value' => $today])
          @include('back.partials.formG', ['name' => 'end_date', 'type' => 'number', 'text' => 'Combien dure par minutes', 'class'=>'', 'required' => true,'additionalInfo' => [ 'id' => 'end_date' ]])
          @include('back.partials.formG', ['name' => 'background_color', 'type' => 'color', 'text' => 'Couleur devenement', 'class'=>'', 'required' => true,'additionalInfo' => [ 'id' => 'background_color' ]])
          @include('back.partials.formG', ['name' => 'is_all_day', 'type' => 'checkbox', 'text' => 'joure complet', 'class'=>'is_all_day', 'required' => false, 'checked' => false,'additionalInfo' => ['id' => 'is_all_day']])
            <hr />
          @include('back.partials.formG', ['name' => 'repeated', 'type' => 'checkbox', 'text' => 'Repeté', 'class'=>'repeated', 'required' => false, 'checked' => false,'additionalInfo' => [ 'id' => 'repeated']])
          @include('back.partials.formG', ['name' => 'repeated_type', 'type' => 'select','selected' => null, 'text' => 'Type répétition', 'class'=>'repeated_type', 'required' => false, 'array' => ArrayHolder::repeatedTypes(),'additionalInfo' => [ 'id' => 'repeated_type' ]])
          @include('back.partials.formG', ['name' => 'end_repeated_date', 'type' => 'datetime-local', 'text' => 'Fin de devenement repeté', 'class'=>'end_repeated_date', 'required' => false,'additionalInfo' => [ 'id' => 'end_repeated_date']])
          <hr />

          @include('back.partials.formG', ['name' => 'comment', 'type' => 'textarea', 'text' => 'Comment', 'class'=>' to-validate', 'required' => true, 'additionalInfo' => ['id' =>  'comment' ] ])

          @include('back.partials.formG', ['name' => 'hidden_note', 'type' => 'textarea', 'text' => 'Une Note Secret pour toi', 'class'=>' to-validate', 'required' => false, 'additionalInfo' => ['id' =>  'hiddennote' ] ])



          @component('back.components.button')

          @endcomponent


        </form>

      </div>

      <div class="col-xs-12">
        @component('back.components.table', ['columns' => [
          'Couleur', 'Matiére', 'Maitre', 'Début','répété','répété par', 'Tout le jour','Fin', 'Fin de répététion', 'action'
          ]
        ])

        @endcomponent
      </div>


    </div>


  @endcomponent



@endsection

@section('datatableScript')


    <!-- DataTables -->
    <script src="{!! asset('adminl/bower_components/datatables.net/js/jquery.dataTables.min.js') !!}"></script>
    <script src="{!! asset('adminl/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') !!}"></script>


@endsection

@section('scripts')



  <script src="{!! asset('adminl/bower_components/jquery-ui/jquery-ui.min.js') !!}"></script>
  <script src="{!! asset('adminl/bower_components/moment/moment.js') !!}"></script>
  <script src="{!! asset('adminl/bower_components/fullcalendar/dist/fullcalendar.min.js"') !!}"></script>


  <script src="{!! asset('adminl/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') !!}"></script>
  <script src="{!! asset('adminl/bower_components/fastclick/lib/fastclick.js') !!}"></script>

  <script src="{!! asset('axios/axios.min.js') !!}"></script>
  <script src="{!! asset('validate/jquery.validate.min.js') !!}"></script>

  {!! $calendar->script() !!}

  <script type="text/javascript">


  var schoolLink = "{{ route('index') }}";
  var imgLink = "{{ 'images/config/'. GetSetting::getConfig('no-image') }}";
$(document).ready(function(){
  var repeated = $('#repeated');
  var repeatedtype = $('#repeated_type');
  var endrepeateddate = $('#end_repeated_date');
  var selectedOpRepType =$(".repeatedtype option:selected");
 var addform = $("#add-form");
 var submit = $("#submit");
  /*************/

  var teatchification = $('#teatchification');

  var start_date =$("#start_date");
  var end_date =$("#end_date");
  var background_color =$("#background_color");
  var is_all_day =$("#is_all_day");
  var comment =$("#comment");
  var hidden_note =$("#hidden_note");


  repeatedtype.hide();
  endrepeateddate.hide();




repeated.change(function() {

  if(this.checked) {
    repeatedtype.show();
    endrepeateddate.show();

  }else{

      repeatedtype.hide();
      endrepeateddate.hide();

  }
});





var table = $('#table').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{!! route('calendarteatchifications.data-manage-byclass', $class->id ) !!}",
    columns: [
        { data: 'background_color', name: '' },
        { data: 'subject', name: '' },
        { data: 'teatcher', name: '' },
        { data: 'start_date', name: '' },
        { data: 'repeated', name: '' },
        { data: 'repeated_type', name: '' },
        { data: 'is_all_day', name: '' },
        { data: 'end_date', name: '' },
        { data: 'end_repeated_date', name: '' },
        { data: 'action', name: '' }
    ]
});

addform.submit(function(e){
        e.preventDefault();
        if( addform.valid() ){

          submit.attr('disabled', true);

          axios.post('/store-management-calendar-teatchifcation/' + teatchification.val(),{
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            comment : comment.val(),
            hidden_note : hidden_note.val(),
            start_date : start_date.val(),
            end_date : end_date.val(),
            background_color : background_color.val(),
            is_all_day : is_all_day.prop('checked'),
            repeated_type : repeatedtype.val(),
            end_repeated_date : endrepeateddate.val(),
            repeated : repeated.prop('checked'),
            title: $('#teatchification>option[value="'+teatchification.val()+'"]').text()

          }).then(function( response ){

            console.log(response);
            submit.attr('disabled', false);

            swal(
              'Bien sauvegarder',
              'Refresh la page pour voire dands le calendrier',
              'success'
            );

            var returnedArray = response.data;

            var node = table.row.add( {

                      "background_color":       "Tiger Nixon",
                      "subject":   "System Architect",
                      "teatcher":     "$3,120",
                      "start_date": "2011/04/25",
                      "repeated": "2011/04/25",
                      "repeated_type":     "Edinburgh",
                      "is_all_day":       "Tiger Nixon",
                      "end_date":   "System Architect",
                      "end_repeated_date":     "$3,120",
                      "action": "2011/04/25"
                  } ).draw( ).node();
            $( node )
            .css( 'color', 'red' )
            .animate( { color: 'black' } );

          }).catch(function( error ){

            submit.attr('disabled', false);

            console.log(error);

            swal(
              'Erreur',
              'Nest pas corrrectement enregistrer',
              'error'
            );

          });



        }else{
          swal(
            'Erreur form',
            'La form nest pas bien ecris',
            'error'
          );
        }

    });

});





  </script>

@endsection
