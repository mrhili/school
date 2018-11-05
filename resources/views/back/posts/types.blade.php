@extends('back.layouts.app')



@section('styles')

@endsection

@section('content')


  @component('back.components.plain', ['class' => ''])

    @slot('titlePlain')
      Types
    @endslot
      <div class="row">
    @foreach( ArrayHolder::post_types()    as $key => $post_type )



        <a href="{{ route('posts.create', $key ) }}">
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="fa fa-{{ $post_type[0] }}"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"> {{ $post_type[1] }}</span>
                <span class="info-box-number">{{ $post_type[1] }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        </a>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>




    @endforeach

      </div>

  @endcomponent


@endsection



@section('scripts')



@endsection
