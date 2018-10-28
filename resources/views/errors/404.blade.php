


@extends('back.layouts.app')



@section('content')


  @component('back.components.message', [
    'message' => $exception->getMessage()
    ] )

  @endcomponent


@endsection
