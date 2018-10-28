@extends('back.layouts.app')

@section('datatableCss')

  <link rel="stylesheet" href="{{ asset('dropzone/dropzone.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('application/css/dropzone.css') }}" />
@endsection

@section('styles')



@endsection

@section('content')


{!! Form::model($note, ['route' => ['notes.store-info', $note->id], 'method' => 'post' ,'class' => 'form-horizontal']) !!}



    @component('back.components.plain', ['class' => 'wait'])

      @slot('titlePlain')
        Titre
      @endslot


        {{ csrf_field() }}

        @include('back.partials.formG', ['name' => 'test_passed_fine', 'type' => 'checkbox', 'text' => 'Bien passé', 'class'=>'transport-check', 'required' => false, 'checked' => true,'additionalInfo' => [ 'id' => 'test_passed_fine' ]])

        @include('back.partials.formG', [
          'name' => 'note', 'type' => 'number', 'text' => 'Note', 'class'=>'', 'required' => true,'additionalInfo' => [ 'id' => 'note']
        ])

        @include('back.partials.formG', [
          'name' => 'done_minutes', 'type' => 'number', 'text' => 'Duré deleve', 'class'=>'', 'required' => true,'additionalInfo' => [ 'id' => 'done_minutes']
        ])



        @slot('footerPlain')

          @component('back.components.button')

            @slot('value')

            Confirmer

            @endslot

          @endcomponent

        @endslot


    @endcomponent

{!! Form::close() !!}





  @component('back.components.plain')

    @slot('titlePlain')
    Ajouter des images des reponses au test ici | Nombre d'images : <span id="counter-answers"></span>
    @endslot


    @component('back.components.dropzone', [ 'id_preview' => 'preview-answers', 'id_drop' => 'my-dropzone-answers' ])

    @endcomponent



  @endcomponent







  <div class="row">

    <div class="col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="fa fa-check"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Reponses</span>
          <span class="info-box-number">...</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>


  @foreach( $answers_images as $page_ans => $img_body_ans )

    @component('back.components.plain')

      @slot('titlePlain')
        Page: {{ $page_ans }} | Reponses
      @endslot

      <img class="img-responsive lazy" src="{!! CommonPics::getAdvImage(1, $img_body_ans ) !!}" />


    @endcomponent

  @endforeach




@endsection



@section('scripts')

  <script type="text/javascript" src="{{ asset('lazy/jquery-lazy.min.js') }}"></script>
  <script type="text/javascript">
  $(function() {
      $('.lazy').Lazy();
  });
  </script>


  <script src="{{ asset('dropzone/dropzone.min.js') }}"></script>
  <script>
    Dropzone.autoDiscover = false;
  </script>

  <script src="{{ asset('application/js/dropzone-conf.js') }}"></script>
  <script src="{{ asset('axios/axios.min.js') }}"></script>



  <script type="text/javascript">
    var schoolLink = "{{ route('index') }}";
    var note_id = "{{ $note->id }}";
    $drpzn_a = $('#my-dropzone-answers');



    $drpzn_a.attr('action', schoolLink + '/note-store-images/' + note_id);

    dropzoneConf(
      '#my-dropzone-answers',
      '#preview-answers',
      '/note-drop-image/' + note_id,
      '#counter-answers'
    );

    $(document).ready(function() {

    });


  </script>

@endsection
