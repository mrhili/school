@extends('simplecms::admin.page');

@section('pagetitle')
    Edit page - {{ $page->title }}
@endsection

@section('valuepath'){{ $page->path }}@endsection
@section('valuetitle'){{ $page->title }}@endsection
@section('valuedescription'){{ $page->description }}@endsection
@section('valuekeywords'){{ $page->keywords }}@endsection
@section('valuebody'){{ base64_decode($page->body) }}@endsection
