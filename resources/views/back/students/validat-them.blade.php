@extends('back.layouts.app')

@section('datatableCss')

  <link rel="stylesheet" href="{!! asset('adminl/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}">
  <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.7/css/select.dataTables.min.css">
@endsection

@section('styles')



@endsection

@section('content')



  @component('back.components.plain')

    @slot('titlePlain')

  The Main Configuration Of the web application

    @endslot

        <button class="btn btn-danger btn-xs btn-send"  data-toggle='modal' data-target='#modal'> Confirmer les etudiants</button>
      <br />
      <br />


    @component('back.components.table', ['columns' => ['class' , 'nom complet']])

    @endcomponent

  @endcomponent




  @component('back.components.modal_form')

    <div class='col-xs-12'>
    @include('back.partials.formG', ['name' => 'class', 'type' => 'select','selected' => null, 'text' => 'Class', 'class'=>'', 'required' => true, 'array' => $classes, 'additionalInfo' => [ 'id' => 'class' ] ])
    </div>

    <div class='col-xs-12'>
      @include('back.partials.formG', ['name' => 'should_pay', 'type' => 'number', 'text' => 'Payement montielle de lecole', 'class'=>'', 'required' => true,'additionalInfo' => [ 'id' => 'should_pay' ], 'value' => GetSchoolSetting::getConfig('price-month-primary')])

    </div>
    <div class='col-xs-12'>
      @include('back.partials.formG', ['name' => 'saving_pay', 'type' => 'number', 'text' => 'Frais denregistrement', 'class'=>'', 'required' => true,'additionalInfo' => ['id' => 'saving_pay'], 'value' => GetSchoolSetting::getConfig('price-saving-primary') ])

    </div>
    <div class='col-xs-12'>
      @include('back.partials.formG', ['name' => 'assurence_pay', 'type' => 'number', 'text' => 'Frais dassurence', 'class'=>'', 'required' => true,'additionalInfo' => ['id' => 'assurence_pay'], 'value' => GetSchoolSetting::getConfig('price-assurence-primary')])

    </div>
    <div class='col-xs-12'>
      @include('back.partials.formG', ['name' => 'transport', 'type' => 'checkbox', 'text' => 'Transport', 'class'=>'transport-check', 'required' => false, 'checked' => true,'additionalInfo' => ['id' => 'transport']])

    </div>
    <div class='col-xs-12'>
      @include('back.partials.formG', ['name' => 'transport_pay', 'type' => 'number', 'text' => 'Payement montielle du transport', 'class'=>'transport-field', 'required' => false,'additionalInfo' => ['id' => 'transport_pay'], 'value' => GetSchoolSetting::getConfig('min-price-monthly-trans') ])

    </div>
    <div class='col-xs-12'>
      @include('back.partials.formG', ['name' => 'trans_assurence_pay', 'type' => 'number', 'text' => 'Assurence du transport', 'class'=>'transport-field', 'required' => false,'additionalInfo' => ['id' => 'trans_assurence_pay'], 'value' => GetSchoolSetting::getConfig('min-price-assurence-trans') ])

    </div>
    <div class='col-xs-12'>
      @include('back.partials.formG', ['name' => 'add_classes', 'type' => 'checkbox', 'text' => 'Cours de soutien', 'class'=>'add-classes-check', 'required' => false, 'checked' => true,'additionalInfo' => ['id' => 'add_classes']  ])

    </div>
    <div class='col-xs-12'>
      @include('back.partials.formG', ['name' => 'add_classes_pay', 'type' => 'number', 'text' => 'Payement montielle des cours de soutien', 'class'=>'add-classes-field', 'required' => false,'additionalInfo' => ['id' => 'add_classes_pay'], 'value' => GetSchoolSetting::getConfig('price-add-courses') ])

    </div>




  @endcomponent







@endsection

@section('datatableScript')


<!-- DataTables -->
<script src="{!! asset('adminl/bower_components/datatables.net/js/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js') !!}"></script>

<script src="{!! asset('adminl/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') !!}"></script>


<!-- SlimScroll -->
<script src="{!! asset('adminl/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') !!}"></script>


<!-- FastClick -->
<script src="{!! asset('adminl/bower_components/fastclick/lib/fastclick.js') !!}"></script>

@endsection

@section('scripts')




  <script src="{!! asset('axios/axios.min.js') !!}"></script>
  <script src="{!! asset('validate/jquery.validate.min.js') !!}"></script>
  <script type="text/javascript">
  window.ids = [];
  var year = {{ Session::get('yearId') }};


  $(function() {
      var table = $('#table').DataTable({

          select: {
              style: 'multi'
          },

          processing: true,
          serverSide: true,
          ajax: "{!! route('students.data-validat-them' ) !!}",
          columns: [

            { data: 'class', name: '' },

            { data: 'completename', name: '' }

          ]

      });


      table
          .on( 'select', function ( e, dt, type, indexes ) {

            var rowData = table.rows( indexes ).data().toArray();
            //console.log( rowData );

            window.ids.push ( rowData[0].id );

            /*

            alert('e -> ' + JSON.stringify( e ) );
            alert('dt -> ' + JSON.stringify( dt ) );
            alert('type -> ' + type );
            alert('indexes -> ' + indexes );
            alert('stringify rowData -> ' + JSON.stringify( rowData ) );

            */

            //events.prepend( '<div><b>'+type+' selection</b> - '+JSON.stringify( rowData )+'</div>' );
          } )
          .on( 'deselect', function ( e, dt, type, indexes ) {



            var rowData = table.rows( indexes ).data().toArray();

            if( $.inArray( rowData[0].id , window.ids ) != -1 ){

              window.ids = window.ids.filter(function(item) {
                  return item !== rowData[0].id ;
              });

            }else{

              alert('problemme');

            }

          } );



  });


  $(document).ready(function(){

    var addFieldValue = {{ GetSchoolSetting::getConfig('price-add-courses') }};

    var transportPayementValue = {{ GetSchoolSetting::getConfig('min-price-monthly-trans') }};

    var transportAssurenceValue = {{ GetSchoolSetting::getConfig('min-price-assurence-trans') }};

    $send = $("#send-form");

    $modal = $("#modal");

    $( "body" ).delegate( ".pagination a", "click", function() {
      if( ! $(this).parent().hasClass( "active" ) ){
        window.ids = [];
      }

    });

    $send.click(function(){

      $send.attr('disabled', true);

      if ( window.ids.length > 0 ) {

        if( $('#form').valid()){

          axios.put( "/valider-les-etidants-put" ,{
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            ids: JSON.stringify( window.ids ),
            class: $('#class').val(),
            should_pay: $('#should_pay').val(),
            saving_pay: $('#saving_pay').val(),
            assurence_pay: $('#assurence_pay').val(),
            transport: $('#transport').val(),
            transport_pay: $('#transport_pay').val(),
            trans_assurence_pay: $('#trans_assurence_pay').val(),
            add_classes: $('#add_classes').val(),
            add_classes_pay: $('#add_classes_pay').val(),

            comment: $('#commentfield').val(),
            hidden_note: $('#hidden_notefield').val()



          }).then(function(response) {

            $modal.modal('hide');

            $send.attr('disabled', false);

              $("#table tr.selected").remove();
              window.ids = [];

            }).catch(function(error) {

              $send.attr('disabled', false);

              alert(error);
              console.log(error);

            });


        }else{
          alert("form not valid");
        }



      }else{
        alert("empty");
      }
    });



    /***************************************/


      $('.add-classes-check').change(function() {

        var addClassesField = $('.add-classes-field');
        if(!this.checked) {
            addClassesField.hide();
            addClassesField.hide().val(null);
        }else{

            addClassesField.show();
            addClassesField.val( addFieldValue );

        }
      });


      $('.transport-check').change(function() {

        var transportField = $('.transport-field');
        if(!this.checked) {
            transportField.hide();

            transportField.hide().val(null);

        }else{

            transportField.show();

            transportField.attr('name', 'transport_pay').val( transportPayementValue );

            transportField.attr('name', 'trans_assurence_pay').val( transportAssurenceValue );


        }
      });



    /***************************************/



  });

  </script>




@endsection
