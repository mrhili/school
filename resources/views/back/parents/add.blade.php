

@section('title')
L'ajout dun parent
@endsection

@extends('back.layouts.app')



@section('styles')


@endsection

@section('page_header')
L'ajout dun parent
@endsection

@section('page_header_desc')
L'année selectionée est {{ Session::get('yearId') }}
@endsection

@section('breadcrumb')
  <li><a href="{{ route('index')  }}"><i class="fa fa-dashboard"></i> Index</a></li>
  <li><a href="{{ route('home')  }}"><i class="fa fa-dashboard"></i> dashboard</a></li>
  <li class="active"> L'ajout dun parent</li>
@endsection

@section('content')

{!! Form::open(['route' => 'parents.store', 'files' => true, 'method' => 'post' ,'class' => 'form-horizontal']) !!}

@component('back.components.plain')

  @slot('titlePlain')

Nouveau parent

  @endslot


  @slot('sectionPlain')

    {{ csrf_field() }}


    <div class="text-center">
      <h3 >Etudiant</h3>
      <p>
        ...
      </p>
    </div>

    @include('back.partials.formG', ['name' => 'student', 'type' => 'select','selected' => $student, 'text' => 'Etudiant', 'class'=>'', 'required' => true, 'array' => $students,'additionalInfo' => []])

    <hr />
    <div class="text-center">
      <h3 >Naicessaire information</h3>
      <p>
        ...
      </p>
    </div>

    @include('back.partials.formG', ['name' => 'img', 'type' => 'file', 'text' => 'Image', 'class'=>'', 'required' => false ,'additionalInfo' => []])

  	@include('back.partials.formG', ['name' => 'name', 'type' => 'text', 'text' => 'Prénom', 'class'=>'', 'required' => true,'additionalInfo' => []])
  	@include('back.partials.formG', ['name' => 'last_name', 'type' => 'text', 'text' => 'Nom', 'class'=>'', 'required' => true,'additionalInfo' => []])

    @include('back.partials.formG', ['name' => 'arabic_name', 'type' => 'text', 'text' => 'Arabic Prénom', 'class'=>'', 'required' => true,'additionalInfo' => [ 'dir' => 'rtl']])
  	@include('back.partials.formG', ['name' => 'arabic_last_name', 'type' => 'text', 'text' => 'Arabic Nom', 'class'=>'', 'required' => true,'additionalInfo' => [ 'dir' => 'rtl' ]])

    @include('back.partials.formG', ['name' => 'cin', 'type' => 'text', 'text' => 'CIN', 'class'=>'', 'required' => true,'additionalInfo' => []])
    @include('back.partials.formG', ['name' => 'profession', 'type' => 'text', 'text' => 'Profession', 'class'=>'', 'required' => true,'additionalInfo' => []])
    @include('back.partials.formG', ['name' => 'family_situation', 'type' => 'checkbox', 'text' => 'La situation familiale, Marié?', 'class'=>'', 'required' => false, 'checked' => false,'additionalInfo' => []])


  	@include('back.partials.formG', ['name' => 'gender', 'type' => 'select', 'selected' => null , 'text' => 'Genre', 'class'=>'', 'required' => true, 'array' => ArrayHolder::gender() ,'additionalInfo' => []])


  	@include('back.partials.formG', ['name' => 'birth_date', 'type' => 'date', 'text' => 'Date de naissance', 'class'=>'', 'required' => true,'additionalInfo' => []])
  	@include('back.partials.formG', ['name' => 'birth_place', 'type' => 'text', 'text' => 'ville de naissance', 'class'=>'', 'required' => true,'additionalInfo' => []])

  	@include('back.partials.formG', ['name' => 'city', 'type' => 'text', 'text' => 'Ville', 'class'=>'', 'required' => true,'additionalInfo' => []])

  	@include('back.partials.formG', ['name' => 'zip_code', 'type' => 'text', 'text' => 'Code postal', 'class'=>'', 'required' => true,'additionalInfo' => []])
  	@include('back.partials.formG', ['name' => 'adress', 'type' => 'text', 'text' => 'Adress', 'class'=>'', 'required' => true,'additionalInfo' => []])
  	@include('back.partials.formG', ['name' => 'phone', 'type' => 'tel', 'text' => 'Téléphone', 'class'=>'', 'required' => true,'additionalInfo' => []])
    @include('back.partials.formG', ['name' => 'phone2', 'type' => 'tel', 'text' => 'Téléphone 2', 'class'=>'', 'required' => false,'additionalInfo' => []])
    @include('back.partials.formG', ['name' => 'phone3', 'type' => 'tel', 'text' => 'Téléphone 3', 'class'=>'', 'required' => false,'additionalInfo' => []])
    @include('back.partials.formG', ['name' => 'fix', 'type' => 'tel', 'text' => 'Téléphone Fix', 'class'=>'', 'required' => false,'additionalInfo' => []])

    @include('back.partials.formG', ['name' => 'whatsapp', 'type' => 'tel', 'text' => 'Whatsapp', 'class'=>'', 'required' => false,'additionalInfo' => []])
    @include('back.partials.formG', ['name' => 'facebook', 'type' => 'text', 'text' => 'Facebook Link', 'class'=>'', 'required' => false,'additionalInfo' => []])


    <hr />
    <div class="text-center">
      <h3 >Login information</h3>
      <p>
        ...
      </p>
    </div>


  	@include('back.partials.formG', ['name' => 'email', 'type' => 'email', 'text' => 'E-mail', 'class'=>'', 'required' => true,'additionalInfo' => []])
  	@include('back.partials.formG', ['name' => 'password', 'type' => 'text', 'text' => 'Password', 'class'=>'', 'required' => true,'value' => str_random(6) ,'additionalInfo' => [  ]])

    <hr />
    <div class="text-center">
      <h3 >Direction</h3>
      <p>
        ...
      </p>
    </div>

    @include('back.partials.formG', ['name' => 'comment', 'type' => 'textarea', 'text' => 'Comentaire', 'class'=>'', 'required' => true,'additionalInfo' => []])

    @include('back.partials.formG', ['name' => 'hidden_note', 'type' => 'textarea', 'text' => 'Une note pour toi', 'class'=>'', 'required' => true,'additionalInfo' => []])


    <hr />
    <div class="text-center">
      <h3 >Relation entre parent1 et éléve</h3>
      <p>
        ...
      </p>
    </div>

    @include('back.partials.formG', ['name' => 'categoryship', 'type' => 'select','selected' => null, 'text' => 'Relation entre parent et éléve', 'class'=>'', 'required' => true, 'array' => $categoryships ,'additionalInfo' => []])



  @endslot


  @slot('footerPlain')

	@component('back.components.button')

	  @slot('value')

	  	Enregistrer

	  @endslot

	@endcomponent

  @endslot


@endcomponent


@endsection
{!! Form::close() !!}


@section('scripts')

<script type="text/javascript">

  var addFieldValue = {{ GetSchoolSetting::getConfig('price-add-courses') }};

  var transportPayementValue = {{ GetSchoolSetting::getConfig('min-price-monthly-trans') }};

  var transportAssurenceValue = {{ GetSchoolSetting::getConfig('min-price-assurence-trans') }};
  var parentDontExist = $('.parent_dont_exist');
  var parentExist = $('.parent_exist');

  parentExist.hide();
  parentExist.attr('required', false );


  $('#existparent').change(function() {

    if(this.checked) {
      parentDontExist.hide().val(null);
      parentDontExist.attr('required', false );
      parentExist.show();


    }else{
      parentDontExist.show();
      parentExist.hide().val(null);

      parentDontExist.each(function(  ) {

        if( $.inArray( $( this ).attr('name'), [
          'family_situationparent',
        'phone2parent',
        'phone3parent',
        'fixparent',
        'whatsappparent',
        'facebookparent'
      ]) != -1  ){
        $( this ).attr('required', false );
      }else{

        $( this ).attr('required', true );

      }


       });



    }
  });

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



</script>
@endsection
