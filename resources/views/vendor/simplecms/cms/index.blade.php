@extends(config('simplecms.cms_layout'))

@section('cmspagebody')
    {!! base64_decode($page->body) !!}
@endsection