@extends('back.layouts.app')

@section('datatableCss')


@endsection

@section('styles')



@endsection

@section('content')


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


  <script src="{{ asset('axios/axios.min.js') }}"></script>

  <script type="text/javascript">
    var schoolLink = "{{ route('index') }}";
    var note_id = "{{ $note->id }}";


    $(document).ready(function() {

    });


  </script>

@endsection
