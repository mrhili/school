

@section('title')
L'ajout dun etudiant
@endsection

@extends('back.layouts.app')



@section('styles')


@endsection

@section('page_header')
L'ajout dun etudiant
@endsection

@section('page_header_desc')
L'année selectionée est {{ Session::get('yearId') }}
@endsection

@section('breadcrumb')
  <li><a href="{{ route('index')  }}"><i class="fa fa-dashboard"></i> Index</a></li>
  <li><a href="{{ route('home')  }}"><i class="fa fa-dashboard"></i> dashboard</a></li>
  <li class="active"> L'ajout dun etudiant</li>
@endsection

@section('content')

{!! Form::open(['route' => 'students.store', 'files' => true, 'method' => 'post' ,'class' => 'form-horizontal']) !!}

@component('back.components.plain')

  @slot('titlePlain')

Nouveau etudient

  @endslot


  @slot('sectionPlain')

    {{ csrf_field() }}


    <div class="text-center">
      <h3 >Classement</h3>
      <p>
        ...
      </p>
    </div>

    @include('back.partials.formG', ['name' => 'class', 'type' => 'select','selected' => null, 'text' => 'Class', 'class'=>'', 'required' => true, 'array' => $classes,'additionalInfo' => []])

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

  	@include('back.partials.formG', ['name' => 'gender', 'type' => 'select', 'selected' => null , 'text' => 'Genre', 'class'=>'', 'required' => true, 'array' => ArrayHolder::gender() ,'additionalInfo' => []])


  	@include('back.partials.formG', ['name' => 'birth_date', 'type' => 'date', 'text' => 'Date de naissance', 'class'=>'', 'required' => true,'additionalInfo' => []])
  	@include('back.partials.formG', ['name' => 'birth_place', 'type' => 'text', 'text' => 'ville de naissance', 'class'=>'', 'required' => true,'additionalInfo' => []])

  	@include('back.partials.formG', ['name' => 'city', 'type' => 'text', 'text' => 'Ville', 'class'=>'', 'required' => true,'additionalInfo' => []])

  	@include('back.partials.formG', ['name' => 'zip_code', 'type' => 'text', 'text' => 'Code postal', 'class'=>'', 'required' => true,'additionalInfo' => []])
  	@include('back.partials.formG', ['name' => 'adress', 'type' => 'text', 'text' => 'Adress', 'class'=>'', 'required' => true,'additionalInfo' => []])
  	@include('back.partials.formG', ['name' => 'phone', 'type' => 'tel', 'text' => 'Téléphone', 'class'=>'', 'required' => true,'additionalInfo' => []])
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
      <h3 >Payements</h3>
      <p>
        ...
      </p>
    </div>


    @include('back.partials.formG', ['name' => 'should_pay', 'type' => 'number', 'text' => 'Payement montielle de lecole', 'class'=>'', 'required' => true,'additionalInfo' => [], 'value' => GetSchoolSetting::getConfig('price-month-primary')])

    @include('back.partials.formG', ['name' => 'saving_pay', 'type' => 'number', 'text' => 'Frais denregistrement', 'class'=>'', 'required' => true,'additionalInfo' => [], 'value' => GetSchoolSetting::getConfig('price-saving-primary') ])

    @include('back.partials.formG', ['name' => 'assurence_pay', 'type' => 'number', 'text' => 'Frais dassurence', 'class'=>'', 'required' => true,'additionalInfo' => [], 'value' => GetSchoolSetting::getConfig('price-assurence-primary')])

    @include('back.partials.formG', ['name' => 'transport', 'type' => 'checkbox', 'text' => 'Transport', 'class'=>'transport-check', 'required' => false, 'checked' => true,'additionalInfo' => []])

    @include('back.partials.formG', ['name' => 'transport_pay', 'type' => 'number', 'text' => 'Payement montielle du transport', 'class'=>'transport-field', 'required' => false,'additionalInfo' => [], 'value' => GetSchoolSetting::getConfig('min-price-monthly-trans') ])

    @include('back.partials.formG', ['name' => 'trans_assurence_pay', 'type' => 'number', 'text' => 'Assurence du transport', 'class'=>'transport-field', 'required' => false,'additionalInfo' => [], 'value' => GetSchoolSetting::getConfig('min-price-assurence-trans') ])

    @include('back.partials.formG', ['name' => 'add_classes', 'type' => 'checkbox', 'text' => 'Cours de soutien', 'class'=>'add-classes-check', 'required' => false, 'checked' => true,'additionalInfo' => []  ])

    @include('back.partials.formG', ['name' => 'add_classes_pay', 'type' => 'number', 'text' => 'Payement montielle des cours de soutien', 'class'=>'add-classes-field', 'required' => false,'additionalInfo' => [], 'value' => GetSchoolSetting::getConfig('price-add-courses') ])

    <hr />
    <div class="text-center">
      <h3 >Direction</h3>
      <p>
        ...
      </p>
    </div>

    @include('back.partials.formG', ['name' => 'num', 'type' => 'number', 'text' => 'Numero denregistrement', 'class'=>'', 'required' => true,'additionalInfo' => [], 'value' => $maxNumber])
    @include('back.partials.formG', ['name' => 'massarid', 'type' => 'text', 'text' => 'Numero ID Massar', 'class'=>'', 'required' => false,'additionalInfo' => []   ])

    @include('back.partials.formG', ['name' => 'comment', 'type' => 'textarea', 'text' => 'Comentaire', 'class'=>'', 'required' => true,'additionalInfo' => []])

    @include('back.partials.formG', ['name' => 'hidden_note', 'type' => 'textarea', 'text' => 'Une note pour toi', 'class'=>'', 'required' => true,'additionalInfo' => []])



    <hr />
    <div class="text-center">
      <h3 >Informations sur parent</h3>
      <p>
        ...
      </p>

    </div>
    @include('back.partials.formG', ['name' => 'existparent', 'type' => 'checkbox', 'text' => 'Le parent déja exist', 'class'=>'', 'required' => false, 'checked' => false,'additionalInfo' => [ 'id' => 'existparent' ]])
    @include('back.partials.formG', ['name' => 'parent_id', 'type' => 'select','selected' => null, 'text' => 'Parent', 'class'=>'parent_exist', 'required' => false, 'array' => $parents ,'additionalInfo' => []])

    <hr />
    <div class='parent_dont_exist'>
      @include('back.partials.formG', ['name' => 'imgparent', 'type' => 'file', 'text' => 'Image Parent 1', 'class'=>'', 'required' => false ,'additionalInfo' => []])
    </div>




    @include('back.partials.formG', ['name' => 'nameparent', 'type' => 'text', 'text' => 'Prénom Parent 1', 'class'=>'parent_dont_exist', 'required' => true,'additionalInfo' => []])
    @include('back.partials.formG', ['name' => 'last_nameparent', 'type' => 'text', 'text' => 'Nom Parent 1', 'class'=>'parent_dont_exist', 'required' => true,'additionalInfo' => []])
    @include('back.partials.formG', ['name' => 'arabic_nameparent', 'type' => 'text', 'text' => 'Arabic Prénom Parent 1', 'class'=>'parent_dont_exist', 'required' => true,'additionalInfo' => []])
    @include('back.partials.formG', ['name' => 'arabic_last_nameparent', 'type' => 'text', 'text' => 'Arabic Nom Parent 1', 'class'=>'parent_dont_exist', 'required' => true,'additionalInfo' => []])

    @include('back.partials.formG', ['name' => 'genderparent', 'type' => 'select', 'selected' => null , 'text' => 'Genre Parent 1', 'class'=>'parent_dont_exist', 'required' => true, 'array' => ArrayHolder::gender() ,'additionalInfo' => []])


    @include('back.partials.formG', ['name' => 'birth_dateparent', 'type' => 'date', 'text' => 'Date de naissance Parent 1', 'class'=>'parent_dont_exist', 'required' => true,'additionalInfo' => []])
    @include('back.partials.formG', ['name' => 'birth_placeparent', 'type' => 'text', 'text' => 'ville de naissance Parent 1', 'class'=>'parent_dont_exist', 'required' => true,'additionalInfo' => []])



    @include('back.partials.formG', ['name' => 'cinparent', 'type' => 'text', 'text' => 'CIN du Parent 1', 'class'=>'parent_dont_exist', 'required' => true,'additionalInfo' => []])
    @include('back.partials.formG', ['name' => 'professionparent', 'type' => 'text', 'text' => 'Profession du Parent 1', 'class'=>'parent_dont_exist', 'required' => true,'additionalInfo' => []])



    @include('back.partials.formG', ['name' => 'family_situationparent', 'type' => 'checkbox', 'text' => 'La situation familiale du Parent 1, Marié?', 'class'=>'parent_dont_exist', 'required' => false, 'checked' => false,'additionalInfo' => []])





    @include('back.partials.formG', ['name' => 'cityparent', 'type' => 'text', 'text' => 'Ville Parent 1', 'class'=>'parent_dont_exist', 'required' => true,'additionalInfo' => []])

    @include('back.partials.formG', ['name' => 'zip_codeparent', 'type' => 'text', 'text' => 'Code postal Parent 1', 'class'=>'parent_dont_exist', 'required' => true,'additionalInfo' => []])
    @include('back.partials.formG', ['name' => 'adressparent', 'type' => 'text', 'text' => 'Adress', 'class'=>'parent_dont_exist', 'required' => true,'additionalInfo' => []])
    @include('back.partials.formG', ['name' => 'phone1parent', 'type' => 'tel', 'text' => 'Téléphone Parent 1', 'class'=>'parent_dont_exist', 'required' => true,'additionalInfo' => []])
    @include('back.partials.formG', ['name' => 'phone2parent', 'type' => 'tel', 'text' => 'Téléphone Parent 2', 'class'=>'parent_dont_exist', 'required' => false,'additionalInfo' => []])
    @include('back.partials.formG', ['name' => 'phone3parent', 'type' => 'tel', 'text' => 'Téléphone Parent 3', 'class'=>'parent_dont_exist', 'required' => false,'additionalInfo' => []])
    @include('back.partials.formG', ['name' => 'fixparent', 'type' => 'tel', 'text' => 'Téléphone Parent 1', 'class'=>'parent_dont_exist', 'required' => false,'additionalInfo' => []])
    @include('back.partials.formG', ['name' => 'whatsappparent', 'type' => 'tel', 'text' => 'Whatsapp', 'class'=>'parent_dont_exist', 'required' => false,'additionalInfo' => []])
    @include('back.partials.formG', ['name' => 'facebookparent', 'type' => 'text', 'text' => 'Facebook Link', 'class'=>'parent_dont_exist', 'required' => false,'additionalInfo' => []])

    <hr />
    <div class="text-center">
      <h3 >Relation entre parent1 et éléve</h3>
      <p>
        ...
      </p>
    </div>

    @include('back.partials.formG', ['name' => 'categoryship', 'type' => 'select','selected' => null, 'text' => 'Relation entre parent et éléve', 'class'=>'', 'required' => true, 'array' => $categoryships ,'additionalInfo' => []])

    <hr />
    <div class="text-center">
      <h3 >Parent Login information</h3>
      <p>
        ...
      </p>
    </div>


    @include('back.partials.formG', ['name' => 'emailparent', 'type' => 'email', 'text' => 'E-mail Parent 1', 'class'=>'', 'required' => true,'additionalInfo' => [  ]])
    @include('back.partials.formG', ['name' => 'passwordparent', 'type' => 'text', 'text' => 'Password Parent 1', 'class'=>'', 'required' => true,'value' => str_random(6),'additionalInfo' => [  ]])


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
