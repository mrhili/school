@extends('simplecms::layouts.admin')

@section('content')
<table class="table table-striped">
    <tr>
        <th>Path</th>
        <th>Title</th>
        <th>Actions</th>
    </tr>
    @foreach ($pages as $page)
    <tr>
        <td>{{ $page->path }}</td>
        <td>{{ $page->title }}</td>
        <td>
            <a href="/{{ $page->path }}"><i class="glyphicon glyphicon-eye-open"></i></a>&nbsp;&nbsp;
            <a href="{{ route('cms') }}/edit/{{ $page->id }}"><i class="glyphicon glyphicon-pencil"></i></a>&nbsp;&nbsp;
            <form style="display: inline" method="post" action="{{ route('cms') }}/delete/{{ $page->id }}" id="delete-form">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="delete">
                <i class="glyphicon glyphicon-trash" style="cursor: pointer" onclick="if(confirm('Delete this page?')){ return $('#delete-form').submit() } return false;"></i>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
