@extends('back.layouts.app')



@section('styles')

{{-- output array min empty max id and more --}}
<link rel="stylesheet" href="{{ asset('dropzone/dropzone.min.css') }}" />
<link rel="stylesheet" href="{{ asset('application/css/dropzone.css') }}" />


<link rel="stylesheet" href="{{ asset('loader/spinner.css') }}" />

@endsection

@section('content')

@component('back.components.spinner')

@endcomponent




<form method="post" class="form-horizontal" id="confirmation">


  @component('back.components.plain', ['class' => 'wait'])

    @slot('titlePlain')
    Titre
    @endslot


      {{ csrf_field() }}

      @include('back.partials.formG', ['name' => 'title', 'type' => 'text', 'text' => 'Titre', 'class'=>'', 'required' => true,'additionalInfo' => [ 'id' => 'titlefield' ]])

      @include('back.partials.formG', ['name' => 'beforeTest', 'type' => 'select', 'selected' => null,'text' => 'Un cour a etudié avant de passé le test', 'class'=>'', 'required' => false, 'array' => $courseArray  ,'additionalInfo' => ['id' =>  'before_testfield']])

      @if( Auth::user()->role >= 4 )
        @include('back.partials.formG', ['name' => 'publish', 'type' => 'checkbox', 'text' => 'Publier le test maintenent pour les éléve', 'class'=>'', 'required' => false, 'checked' => true,'additionalInfo' => []])
      @else
        @include('back.partials.formG', ['name' => 'publish', 'type' => 'checkbox', 'text' => 'Publier le test maintenent pour les éléve', 'class'=>' hidden', 'required' => false, 'checked' => false,'additionalInfo' => []])
      @endif

      @include('back.partials.formG', ['name' => 'navigation', 'type' => 'checkbox', 'text' => 'Laisser letudiant chercher sur intenet ?', 'class'=>'', 'required' => false, 'checked' => true,'additionalInfo' => ['id' =>  'publishfield']])
      @include('back.partials.formG', ['name' => 'time_minutes', 'type' => 'number', 'text' => 'Duréé par minute', 'class'=>'', 'required' => true,'additionalInfo' => [ 'id' => 'timefield' ]])

      @include('back.partials.formG', ['name' => 'is_exercise', 'type' => 'checkbox', 'text' => 'Esque cest just Un Exercice  ?', 'class'=>'', 'required' => false, 'checked' => false,'additionalInfo' => ['id' =>  'is_exercicefield']])


      @include('back.partials.formG', ['name' => 'end', 'type' => 'date', 'text' => 'Date de fin', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'endfield']])


      @include('back.partials.formG', ['name' => 'comment', 'type' => 'textarea', 'text' => 'Comentaire', 'class'=>'', 'required' => true,'additionalInfo' => []])

      @include('back.partials.formG', ['name' => 'hidden_note', 'type' => 'textarea', 'text' => 'Une note pour toi', 'class'=>'', 'required' => true,'additionalInfo' => []])


      @slot('footerPlain')

        @component('back.components.button')

          @slot('value')

          Confirmer

          @endslot

        @endcomponent

      @endslot


  @endcomponent

</form>

  @component('back.components.plain', ['class' => 'wait'])

    @slot('titlePlain')
    Ajouter des images des questions au test ici | Nombre d'images : <span id="counter-questions"></span>
    @endslot

    @component('back.components.dropzone', [ 'id_preview' => 'preview-questions', 'id_drop' => 'my-dropzone-questions' ])

    @endcomponent


  @endcomponent

  @component('back.components.plain', ['class' => 'wait'])

    @slot('titlePlain')
    Ajouter des images des reponses au test ici | Nombre d'images : <span id="counter-answers"></span>
    @endslot


    @component('back.components.dropzone', [ 'id_preview' => 'preview-answers', 'id_drop' => 'my-dropzone-answers' ])

    @endcomponent



  @endcomponent



@endsection



@section('scripts')

<script src="{{ asset('dropzone/dropzone.min.js') }}"></script>
<script>
  Dropzone.autoDiscover = false;
</script>

<script src="{{ asset('application/js/dropzone-conf.js') }}"></script>
<script src="{{ asset('axios/axios.min.js') }}"></script>


<script type="text/javascript">
  var schoolLink = "{{ route('index') }}";
  $drpzn_q = $('#my-dropzone-questions');
  $drpzn_a = $('#my-dropzone-answers');
  $confirmation = $('#confirmation');

  $('.wait').hide();

  $(document).ready(function() {

    var endfield = $('#endfield');
    var isexercicefield = $('#is_exercicefield');

    /******/

    isexercicefield.change(function() {


      if(this.checked) {

          endfield.hide().prop('required', false);
          endfield.val(null);

      }else{

        endfield.show().prop('required', true);

      }
    /********/

    });

    axios.post('/init-test/1', {
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      })
      .then(function(response) {

        swal({
          position: 'top-end',
          type: 'success',
          title: 'Tu peut ajouté des images',
          showConfirmButton: false,
          timer: 1500
        });

        $('.lds-spinner').hide();
        $('.wait').show();

        var test = response.data;

        $confirmation.attr('action', schoolLink + '/confirm-test-linked/'+ test['id']+'/'+{{ $subclass->id }} );

        $drpzn_q.attr('action', schoolLink + '/test-store-images/' + test['id'] + '/questions');
        dropzoneConf(
          '#my-dropzone-questions',
          '#preview-questions',
          '/test-drop-image/' + test['id'] + '/questions',
          '#counter-questions'
        );


        $drpzn_a.attr('action', schoolLink + '/test-store-images/' + test['id'] + '/answers');
        dropzoneConf(
          '#my-dropzone-answers',
          '#preview-answers',
          '/test-drop-image/' + test['id'] + '/answers',
          '#counter-answers'
        );



      })
      .catch(function(error) {

        swal(
          'Error',
          error,
          'error'
        );

      });



  });
</script>
@endsection
