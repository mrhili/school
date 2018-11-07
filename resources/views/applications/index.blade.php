
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

    <div class="col-md-6">
      @component('back.components.plain')

        @slot('titlePlain')

          Periodic table

        @endslot
        <a href ="{{ route('applications.periodic_table') }}">
          <img src="{{ asset('applications/periodic_table/periodic_table.jpg') }}" class="img-responsive" alt="Cinque Terre">
        </a>
        @slot('footerPlain')

          <a class="btn btn-primary pull-right" href="{{ route('applications.periodic_table') }}">Lire</a>

        @endslot


      @endcomponent
    </div>


    <div class="col-md-6">
      @component('back.components.plain')

        @slot('titlePlain')

          Atmospher

        @endslot
        <a href ="{{ route('applications.atmospher') }}">
          <img src="{{ asset('applications/atmospher/atmospher.jpg') }}" class="img-responsive" alt="Cinque Terre">
        </a>
        @slot('footerPlain')

          <a class="btn btn-primary pull-right" href="{{ route('applications.atmospher') }}">Lire</a>

        @endslot


      @endcomponent
    </div>


    <div class="col-md-6">
      @component('back.components.plain')

        @slot('titlePlain')

          Atmospher

        @endslot
        <a href ="{{ route('applications.colors') }}">
          <img src="{{ asset('applications/colors/colors.jpg') }}" class="img-responsive" alt="Cinque Terre">
        </a>
        @slot('footerPlain')

          <a class="btn btn-primary pull-right" href="{{ route('applications.colors') }}">Lire</a>

        @endslot


      @endcomponent
    </div>



    <div class="col-md-6">
      @component('back.components.plain')

        @slot('titlePlain')

          Multiplication table

        @endslot
        <a href ="{{ route('applications.multi') }}">
          <img src="{{ asset('applications/multi/multi.jpg') }}" class="img-responsive" alt="Cinque Terre">
        </a>
        @slot('footerPlain')

          <a class="btn btn-primary pull-right" href="{{ route('applications.multi') }}">Lire</a>

        @endslot


      @endcomponent
    </div>



    <div class="col-md-6">
      @component('back.components.plain')

        @slot('titlePlain')

          Universe

        @endslot
        <a href ="{{ route('applications.universe') }}">
          <img src="{{ asset('applications/universe/universe.jpg') }}" class="img-responsive" alt="Cinque Terre">
        </a>
        @slot('footerPlain')

          <a class="btn btn-primary pull-right" href="{{ route('applications.universe') }}">Lire</a>

        @endslot


      @endcomponent
    </div>




  </div>

@endsection
