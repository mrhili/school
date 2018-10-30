@extends('back.layouts.app')



@section('styles')

{{-- output array min empty max id and more --}}
<link rel="stylesheet" href="{{ asset('dropzone/dropzone.min.css') }}" />
<link rel="stylesheet" href="{{ asset('application/css/dropzone.css') }}" />


<link rel="stylesheet" href="{{ asset('loader/spinner.css') }}" />

@endsection

@section('content')




<form method="post" class="form-horizontal" id="confirmation">


  @component('back.components.plain', ['class' => ''])

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

  @component('back.components.plain', ['class' => ''])

    @slot('titlePlain')
    Ajouter des images des questions au test ici | Nombre d'images : <span id="counter"></span>
    @endslot

    @component('back.components.dropzone', [ 'id_preview' => 'preview', 'id_drop' => 'my-dropzone' ])

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
  $drpzn = $('#my-dropzone');
  $confirmation = $('#confirmation');


  $(document).ready(function() {


    //$confirmation.attr('action', schoolLink + '/confirm-test/'+ test['id']);

    $drpzn.attr('action', schoolLink + '/post-store-images');
    dropzoneConf2(
      '#my-dropzone',
      '#preview',
      '/test-drop-image/150/questions',
      '#counter',
      '/confirm-post/150'

    );

  });
</script>
@endsection
