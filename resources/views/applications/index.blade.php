
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


  </div>



@endsection
