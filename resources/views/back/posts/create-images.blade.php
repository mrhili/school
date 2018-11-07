@extends('back.layouts.app')



@section('styles')

{{-- output array min empty max id and more --}}
<link rel="stylesheet" href="{{ asset('dropzone/dropzone.min.css') }}" />
<link rel="stylesheet" href="{{ asset('application/css/dropzone.css') }}" />


<link rel="stylesheet" href="{{ asset('loader/spinner.css') }}" />


<link href="{{ asset('select2/select2.min.css') }}" rel="stylesheet" />




@endsection

@section('content')

@component('back.components.spinner')

@endcomponent




<form method="post" class="form-horizontal" id="confirmation">


  @component('back.components.plain', ['class' => 'wait'])

    @slot('titlePlain')
    Titre
    @endslot

    <div class="text-center">
      <h3 >Post</h3>
      <p>
        ...
      </p>
    </div>


      {{ csrf_field() }}

      @include('back.partials.formG', ['name' => 'title', 'type' => 'text', 'text' => 'Title', 'class'=>'', 'required' => true,'additionalInfo' => []])
      @include('back.partials.formG', ['name' => 'body', 'type' => 'textarea', 'text' => 'Text', 'class'=>'', 'required' => true,'additionalInfo' => [ 'id' => 'body']])
      @include('back.partials.formG', ['name' => 'role', 'type' => 'select','selected' => null, 'text' => 'Qui peut voire sa', 'class'=>'', 'required' => true, 'array' => ArrayHolder::post_roles() ,'additionalInfo' => []])

      <hr />
      <div class="text-center">
        <h3 >Tagger les autres dans le post</h3>
        <p>
          ...
        </p>
      </div>


      @include('back.partials.formG', ['name' => 'users', 'type' => 'select','selected' => null, 'text' => 'Users', 'class'=>'' , 'required' => true, 'array' => $users,'additionalInfo' => ['id' => 'users', 'multiple' => 'multiple']])



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
      Ajouter des images des questions au test ici | Nombre d'images : <span id="counter"></span>
    @endslot

    @component('back.components.dropzone', [ 'id_preview' => 'preview', 'id_drop' => 'my-dropzone' ])

    @endcomponent


  @endcomponent




@endsection



@section('scripts')

<script src="{{ asset('select2/select2.min.js') }}"></script>
<script src="{{ asset('dropzone/dropzone.min.js') }}"></script>
<script>
  Dropzone.autoDiscover = false;
</script>

<script src="{{ asset('application/js/dropzone-conf.js') }}"></script>
<script src="{{ asset('axios/axios.min.js') }}"></script>


<script type="text/javascript">
  <script src="{{ asset('select2/select2.min.js') }}"></script>

  <script src="{{asset('ckeditor/ckeditor.js')}}"></script>


  <script type="text/javascript">
    $('#users').select2({tags: true});

    var body = document.getElementById("body");
    CKEDITOR.replace(body,{
      language:'en-gb'
    });


    CKEDITOR.config.allowedContent = true;
  </script>
</script>

<script type="text/javascript">
  var schoolLink = "{{ route('index') }}";
  $drpzn = $('#my-dropzone');

  $confirmation = $('#confirmation');

  $('.wait').hide();

  $(document).ready(function() {

    axios.post('/init-post/1', {
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

        var post = response.data;

        $confirmation.attr('action', schoolLink + '/confirm-post/'+ post['id']);

        $drpzn.attr('action', schoolLink + '/post-store-images/' + post['id'] );
        dropzoneConf(
          '#my-dropzone',
          '#preview',
          '/post-drop-image/' + post['id'] ,
          '#counter'
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
