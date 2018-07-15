@extends('simplecms::layouts.admin')

@section('content')
    <h3>@yield('pagetitle')</h3>
    <br><br>
    @if (count($errors) > 0)
        <!-- Form Error List -->
        <div class="alert alert-danger">
        <strong>Whoops! Something went wrong!</strong>
        <br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form class="form-horizontal" method="post">
    {{ csrf_field() }}
        <div class="form-group">
    <label class="col-sm-2 control-label" for="pagePath">Path</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="path" id="pagePath" placeholder="Path" value="@yield('valuepath')">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label" for="pageTitle">Title</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="title" id="pageTitle" placeholder="Title" value="@yield('valuetitle')">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label" for="pageDescription">Description</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="description" id="pageDescription" placeholder="Description" value="@yield('valuedescription')">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label" for="pageKeywords">Keywords</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="keywords" id="pageKeywords" placeholder="Keywords" value="@yield('valuekeywords')">
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label" for="pageBody">Body</label>
    <div class="col-sm-10">
        <textarea class="form-control" name="body" id="pageBody">@yield('valuebody')</textarea>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>
@endsection

@section('addjs')
    <script src="/simplecms/ckeditor/ckeditor.js"></script>
    <script>
    CKEDITOR.replace( 'pageBody',  {
        language: '{{ config('simplecms.ckeditor_lang') }}',
        uiColor: '#9AB8F3',
        height: 500,
        extraPlugins: 'filebrowser,popup',
        allowedContent: true,
        contentsCss: '/css/edstyle.css',
    });
</script>
@endsection
