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

      @include('back.partials.formG', ['name' => 'title', 'type' => 'text', 'text' => 'Titre', 'class'=>'', 'required' => true,'additionalInfo' => [ 'id' => 'conf-title']])

      @include('back.partials.formG', ['name' => 'time_minutes', 'type' => 'number', 'text' => 'Durée', 'class'=>'', 'required' => true,'additionalInfo' => [ 'id' => 'conf-time_minutes']])


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

        $confirmation.attr('action', schoolLink + '/confirm-test/'+ test['id']);

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
