

@extends('back.layouts.app')


@section('styles')



@endsection

@section('content')


@component('back.components.plain')

  @slot('titlePlain')

    Questions

  @endslot

  <div class="row">
    <div class="col-xs-12">
      {!! json_decode($test->body ,true) !!}
    </div>
  </div>



@endcomponent

@if($answers)

  @component('back.components.plain')

    @slot('titlePlain')

      Reponses

    @endslot

    <div class="row">
      <div class="col-xs-12">
        {!! json_decode($test->answers ,true) !!}
      </div>
    </div>

  @endcomponent

@endif



@endsection

@section('datatableScript')



@endsection

@section('scripts')


@endsection
