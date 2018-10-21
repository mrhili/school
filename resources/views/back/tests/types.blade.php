
@extends('back.layouts.app')


@section('styles')



@endsection



@section('content')

  @foreach( config('app.locales') as $slugL => $language )



    <h2>{{$language}}</h2>

    <div class="row">

      @foreach( ArrayHolder::testTypes() as $key => $type )

            <a href="{{ route('tests.type', [$key , $slugL ,$class , $subject ] ) }}">
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-aqua"><i class="fa fa-{{$type[0]}}"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">{{ $type[1]}}</span>
                    <span class="info-box-number">{{ $language }}</span>
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
    <br />
    <hr />





  @endforeach




@endsection



@section('scripts')

@endsection
