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
      <iframe class="responsive-item"
      src='https://view.officeapps.live.com/op/embed.aspx?src={!! App\Helpers\Common\Documents::getDoc(0, $img_body, 'questions' ) !!}'
      width='100%' height='100%' frameborder='0'>This is an embedded <a target='_blank' href='http://office.com'>Microsoft Office</a> document, powered by <a target='_blank' href='http://office.com/webapps'>Office Online</a>.</iframe>
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
        <iframe class="responsive-item"
        src='https://view.officeapps.live.com/op/embed.aspx?src={!! App\Helpers\Common\Documents::getDoc(0, $img_body, 'answers' ) !!}'
        width='100%' height='100%' frameborder='0'>This is an embedded <a target='_blank' href='http://office.com'>Microsoft Office</a> document, powered by <a target='_blank' href='http://office.com/webapps'>Office Online</a>.</iframe>
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
