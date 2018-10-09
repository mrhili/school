
@extends('back.layouts.topnav')

@section('content')

  <div class="row">
    <div class="col-md-6">
      @component('back.components.plain')

        @slot('titlePlain')

          Quran

        @endslot
        <a href ="{{ route('applications.quran') }}">
          <img src="{{ asset('applications/quran/quran.jpg') }}" class="img-responsive" alt="Cinque Terre">
        </a>
        @slot('footerPlain')

          <a class="btn btn-primary pull-right" href="{{ route('applications.quran') }}">Lire</a>

        @endslot


      @endcomponent
    </div>



    <div class="col-md-6">
      @component('back.components.plain')

        @slot('titlePlain')

          Code Morse

        @endslot
        <a href ="{{ route('applications.morse') }}">
          <img src="{{ asset('applications/morse/morse.jpg') }}" class="img-responsive" alt="Cinque Terre">
        </a>
        @slot('footerPlain')

          <a class="btn btn-primary pull-right" href="{{ route('applications.morse') }}">Lire</a>

        @endslot


      @endcomponent
    </div>

    <div class="col-md-6">
      @component('back.components.plain')

        @slot('titlePlain')

          Triangle

        @endslot
        <a href ="{{ route('applications.triangle') }}">
          <img src="{{ asset('applications/triangle/triangle.png') }}" class="img-responsive" alt="Cinque Terre">
        </a>
        @slot('footerPlain')

          <a class="btn btn-primary pull-right" href="{{ route('applications.triangle') }}">Lire</a>

        @endslot


      @endcomponent
    </div>


    <div class="col-md-6">
      @component('back.components.plain')

        @slot('titlePlain')

          Quiz

        @endslot
        <a href ="{{ route('applications.quiz') }}">
          <img src="{{ asset('applications/quiz/quiz.jpg') }}" class="img-responsive" alt="Cinque Terre">
        </a>
        @slot('footerPlain')

          <a class="btn btn-primary pull-right" href="{{ route('applications.quiz') }}">Lire</a>

        @endslot


      @endcomponent
    </div>


    <div class="col-md-6">
      @component('back.components.plain')

        @slot('titlePlain')

          Math Quiz

        @endslot
        <a href ="{{ route('applications.math_quiz') }}">
          <img src="{{ asset('applications/math_quiz/math_quiz.jpg') }}" class="img-responsive" alt="Cinque Terre">
        </a>
        @slot('footerPlain')

          <a class="btn btn-primary pull-right" href="{{ route('applications.math_quiz') }}">Lire</a>

        @endslot


      @endcomponent
    </div>



  </div>

@endsection
