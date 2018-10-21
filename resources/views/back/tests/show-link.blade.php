

@extends('back.layouts.app')


@section('styles')



@endsection

@section('content')


@component('back.components.plain')

  @slot('titlePlain')

    Questions

  @endslot

  <iframe src="{{ json_decode($test->body ,true) }}" width="100%" height="1000px"></iframe>

@endcomponent

@if($answers)

  @component('back.components.plain')

    @slot('titlePlain')

      Reponses

    @endslot

    <iframe src="{{ json_decode($test->answers ,true) }}" width="100%" height="1000px"></iframe>

  @endcomponent

@endif



@endsection

@section('datatableScript')



@endsection

@section('scripts')


@endsection
