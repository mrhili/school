@extends('back.layouts.app')

@section('styles')




@endsection

@section('content')


  {!! Form::open(['route' => 'calendars.store', 'method' => 'post' ,'class' => 'form-horizontal']) !!}

  @component('back.components.plain')

    @slot('titlePlain')

  Nouveau etudient

    @endslot

    {{ csrf_field() }}

    @include('back.partials.formG', ['name' => 'role', 'type' => 'select', 'selected' => $role , 'text' => 'Genre', 'class'=>'', 'required' => true, 'array' => array_except(ArrayHolder::roles(), [0,1, 2]) ,'additionalInfo' => [], 'placeholder' => 'selectionne un role' ])

    <hr />

    @include('back.partials.formG', ['name' => 'title', 'type' => 'text', 'text' => 'Titre devenement', 'class'=>'', 'required' => true,'additionalInfo' => []])
    @include('back.partials.formG', ['name' => 'start_date', 'type' => 'datetime-local', 'text' => 'Debut devenement', 'class'=>'', 'required' => true,'additionalInfo' => []])
    @include('back.partials.formG', ['name' => 'end_date', 'type' => 'datetime-local', 'text' => 'Fin devenement', 'class'=>'', 'required' => true,'additionalInfo' => []])
    @include('back.partials.formG', ['name' => 'background_color', 'type' => 'color', 'text' => 'Couleur devenement', 'class'=>'', 'required' => true,'additionalInfo' => []])
    @include('back.partials.formG', ['name' => 'is_all_day', 'type' => 'checkbox', 'text' => 'joure complet', 'class'=>'is_all_day', 'required' => false, 'checked' => false,'additionalInfo' => ['id' => 'is_all_day']])

    <hr />
    @include('back.partials.formG', ['name' => 'holiday', 'type' => 'checkbox', 'text' => 'Vacance', 'class'=>'holiday', 'required' => false, 'checked' => false,'additionalInfo' => [ 'id' => 'holiday' ]])


    @include('back.partials.formG', ['name' => 'repeated', 'type' => 'checkbox', 'text' => 'Repeté', 'class'=>'repeated', 'required' => false, 'checked' => false,'additionalInfo' => [ 'id' => 'repeated']])
    @include('back.partials.formG', ['name' => 'repeated_type', 'type' => 'select','selected' => null, 'text' => 'Type répétition', 'class'=>'repeated_type', 'required' => false, 'array' => ArrayHolder::repeatedTypes(),'additionalInfo' => [ 'id' => 'repeated_type' ]])
    @include('back.partials.formG', ['name' => 'end_repeated_date', 'type' => 'datetime-local', 'text' => 'Fin de devenement repeté', 'class'=>'end_repeated_date', 'required' => false,'additionalInfo' => [ 'id' => 'end_repeated_date']])

    @include('back.partials.formG', ['name' => 'comment', 'type' => 'textarea', 'text' => 'Comment', 'class'=>'', 'required' => true,'additionalInfo' => [] ])
    @include('back.partials.formG', ['name' => 'hidden_note', 'type' => 'textarea', 'text' => 'Hidden NOte', 'class'=>'', 'required' => false,'additionalInfo' => [] ])


    @slot('footerPlain')

    @component('back.components.button')

      @slot('value')

        Enregistrer

      @endslot

    @endcomponent

    @endslot


  @endcomponent


@endsection


@section('scripts')

  <script src="{!! asset('adminl/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') !!}"></script>
  <script src="{!! asset('adminl/bower_components/fastclick/lib/fastclick.js') !!}"></script>

<script type="text/javascript">

$(document).ready(function(){



  var repeated = $('#repeated');
  var holiday = $('#holiday');
  var repeatedtype = $('#repeated_type');
  var isallday = $('#is_all_day');
  var endrepeateddate = $('#end_repeated_date');
  var selectedOpRepType =$(".repeatedtype option:selected");
  repeatedtype.hide();
endrepeateddate.hide();



    holiday.change(function() {


      if(this.checked) {

          repeated.hide().prop('checked', false);
          isallday.prop('checked', true);
          repeatedtype.hide();

          selectedOpRepType.removeAttr("selected");
          endrepeateddate.hide().val('');

      }else{

          repeated.show();

      }
    });


    repeated.change(function() {

      if(this.checked) {
        repeatedtype.show();
        endrepeateddate.show();

      }else{

          repeatedtype.hide();
          endrepeateddate.hide();

      }
    });



});




</script>
@endsection
