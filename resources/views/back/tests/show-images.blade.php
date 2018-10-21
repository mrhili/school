@extends('back.layouts.app')

  @section('styles')

  {{-- output array min empty max id and more --}}

  @endsection

@section('content')


        <div class="row">

          <div class="col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-yellow"><i class="fa fa-question"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Questions</span>
                <span class="info-box-number">...</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>

@foreach( $body as $page => $img_body )

  @component('back.components.plain')

    @slot('titlePlain')
      Page: {{ $page }} | Questions
    @endslot

    <img class="img-responsive lazy" src="{!! CommonPics::getAdvImage(0, $img_body, 'questions' ) !!}" />


  @endcomponent

@endforeach



@if( $answers )

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

      <img class="img-responsive lazy" src="{!! CommonPics::getAdvImage(0, $img_body_ans, 'answers' ) !!}" />


    @endcomponent

  @endforeach

@endif



@endsection



@section('scripts')
  <script type="text/javascript" src="{{ asset('lazy/jquery-lazy.min.js') }}"></script>
  <script type="text/javascript">
  $(function() {
      $('.lazy').Lazy();
  });
  </script>
@endsection
