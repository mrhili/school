
@extends('back.layouts.app')


@section('styles')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@1.6.11/src/css/lightgallery.css">

@endsection

@section('content')



  @component('back.components.plain')

    @slot('titlePlain')
      Ajouter un post
    @endslot

    @if(Auth::check())

      @if(Auth::user()->role > 0)
        <a class="btn btn-primary" href="{{ route('posts.types')}}"><i class="fa fa-plus"></i> Ajouter un post</a>
      @endif

    @endif



  @endcomponent



  @component('back.components.posts', compact('posts'))

  @endcomponent



@endsection

@section('datatableScript')



@endsection

@section('scripts')

<script src="{!! asset('axios/axios.min.js') !!}"></script>
<script src="{!! asset('validate/jquery.validate.min.js') !!}"></script>

<script src="https://cdn.jsdelivr.net/npm/lightgallery@1.6.11/dist/js/lightgallery.min.js" type="text/javascript">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js" type="text/javascript">
</script>
<script src="https://cdn.jsdelivr.net/npm/lightgallery@1.6.11/modules/lg-thumbnail.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lightgallery@1.6.11/modules/lg-fullscreen.min.js"></script>


<script src="{!! asset('helpers/helpers.js') !!}"></script>
<script src="{!! asset('helpers/youtube.js') !!}"></script>


<script type="text/javascript">


var schoolLink = "{{ route('index') }}";
var imgLink = "{{ 'images/config/'. GetSetting::getConfig('no-image') }}";


$('.lightgallery').lightGallery();


$('.video').each(function( index, elem ) {
  var element = $(elem);
  videoUrl = element.attr('data-video');
  if(getAfterUrl(videoUrl) !== null ){
    element.html('<iframe width="100%" height="315" allow="encrypted-media" src="//www.youtube.com/embed/' + getAfterUrl(videoUrl) + '" frameborder="0" allowfullscreen></iframe>');
  }else{
    element.html('<div class="alert alert-info"><h4>Error video Url</h4></div>');
  }
});

</script>


@component('back.components.comment_system4posts')

@endcomponent


@endsection
