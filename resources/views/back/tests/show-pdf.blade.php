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

    <div class="embed-responsive embed-responsive-16by9">
      <object class="lazy" class="embed-responsive-item" data="{!! App\Helpers\Common\Pdfs::getPdf(0, $img_body, 'questions' ) !!}" type="application/pdf">
          <iframe class="lazy" src="https://docs.google.com/viewer?url={!! App\Helpers\Common\Pdfs::getPdf(0, $img_body, 'questions' ) !!}&embedded=true"></iframe>
      </object>
    </div>




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


  @foreach( $answers_pdfs as $page_ans => $pdf_body_ans )

    @component('back.components.plain')

      @slot('titlePlain')
        Page: {{ $page_ans }} | Reponses
      @endslot

      <div class="embed-responsive embed-responsive-16by9">
        <object class="lazy" data="{!! App\Helpers\Common\Pdfs::getPdf(0, $img_body, 'questions' ) !!}" type="application/pdf">
            <iframe class="lazy" src="https://docs.google.com/viewer?url={!! App\Helpers\Common\Pdfs::getPdf(0, $img_body, 'questions' ) !!}&embedded=true"></iframe>
        </object>
      </div>


    @endcomponent

  @endforeach

@endif



@endsection



@section('scripts')
  <script type="text/javascript" src="{{ asset('lazy/jquery-lazy.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('lazy/plugins.min.js') }}"></script>
  <script type="text/javascript">
  $(function() {
      $('.lazy').Lazy();
  });
  </script>
@endsection
