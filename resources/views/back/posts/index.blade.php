
@extends('back.layouts.app')


@section('styles')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@1.6.11/src/css/lightgallery.css">

@endsection

@section('content')

  @foreach($posts as $post)

      @component('back.components.plain', ['class' => ''])

        @slot('titlePlain')
          {{$post->title}}
        @endslot

        @if($post->type == 1)
          <div class="row margin-bottom">
            <div class="lightgallery" id="lightgallery-{{ $post->id }}">
              @foreach( json_decode( $post->images ) as $img )
                @php
                  $src = CommonPics::getAdvImage( 2 , $img, 'questions' );
                @endphp

                <a class="col-md-6" href="{{ $src }}">
                    <img class="img-responsive lazy" src="{{ $src }}" />
                </a>
              @endforeach

            </div>
          </div>




        @elseif($post->type == 2)
          <div class="video" data-video="{{ $post->link }}">

          </div>


        @elseif($post->type == 3)
          <a class="btn btn-info" href="{{ $post->link }}">Voire lien</a>
        @endif

        <div>
          {{$post->body}}
        </div>

        <hr />
          @foreach( $post->comments as $kc => $comment )
            <blockquote>
              {{ $comment->body }}
            </blockquote>

            <hr />
          @endforeach

        @slot('footerPlain')
          <div class="user-block">
            <img class="img-circle img-bordered-sm" src="{{ CommonPics::ifImg( ArrayHolder::roles_routing( $post->created_by->role ) ,  $post->created_by->img ) }}" alt="User Image">
            <span class="username">
              <a href="#">{{ $post->created_by->full_name   }}</a>

            </span>
            <span class="description">{{ $post->created_at   }}</span>
          </div>

          <ul class="list-inline">
            <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
            </li>
            <li class="pull-right">
              <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                (5)</a></li>
          </ul>
          <form class="form-horizontal" data-id="{{ $post->id }}" id="form-{{ $post->id }}">
            <div class="form-group margin-bottom-none">
              <div class="col-sm-9">
                <input class="form-control input-sm comment" placeholder="Reponse" data-id="{{ $post->id }}" id="comment-{{ $post->id }}">
              </div>
              <div class="col-sm-3">
                <button type="submit" class="btn btn-primary pull-right btn-block btn-sm btn-comment"  data-id="{{ $post->id }}" id="btn-comment-{{ $post->id }}">Send</button>
              </div>
            </div>
          </form>
        @endslot


      @endcomponent

  @endforeach

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


$(document).ready(function() {
  $('.btn-comment').on('click', function( e ){
    e.preventDefault();
    var $element = $(this);
    var $input = $('#comment-'+$(this).data('id'));
    var $inputValue = $input.val();

    if($inputValue.length > 0){
      axios.post('/add-comment/post/'+ $(this).data('id'),{
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        title : $inputValue,
        body: $inputValue
      })
      .then(function (response) {
        console.log(response.data);
      })
      .catch(function (error) {
        console.log( error );
      })
    }else{
      swal('empty', 'empty', 'error')
    }

  });
});

</script>
@endsection
