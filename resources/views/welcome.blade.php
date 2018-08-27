
@extends('back.layouts.topnav')

@section('content')



  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>

    </ol>
    <div class="carousel-inner">
      <div class="item active">
        <img src="{{ asset('images/config/slide1.png') }}" alt="First slide">

        <div class="carousel-caption">

          <a href="{{ route('register')}}" class="btn btn-lg btn-default">S'enregistrer</a> <a href="{{ route('login')}}" class="btn btn-lg btn-success">Entrer</a>
          <br />
        </div>
      </div>
    </div>
    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
      <span class="fa fa-angle-left"></span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
      <span class="fa fa-angle-right"></span>
    </a>
  </div>
</div>
<!-- /.box-body -->

      <!-- /.error-page -->


@endsection
