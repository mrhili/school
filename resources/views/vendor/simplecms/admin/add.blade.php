@extends('simplecms::admin.page');

@section('pagetitle')
    Add new page to CMS
@endsection

@section('valuepath'){{ old('path') }}@endsection
@section('valuetitle'){{ old('title') }}@endsection
@section('valuedescription'){{ old('description') }}@endsection
@section('valuekeywords'){{ old('keywords') }}@endsection
@section('valuebody'){{ old('body') }}@endsection
