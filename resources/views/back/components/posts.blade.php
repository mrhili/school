<style>
  .love{
    color: #ff7772;
  }
  .love:hover{
    color: #ff4800;
  }

  .black{
    color: #000000;
  }

</style>

  @forelse($posts as $post)

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
          <div class="row margin-bottom">
            <div class="col-xs-12 video" data-video="{{ $post->link }}">



            </div>

          </div>


        @elseif($post->type == 3)
          <div class="row margin-bottom" data-video="{{ $post->link }}">
            <a class="btn btn-info" href="{{ $post->link }}" target="_blank">Voire lien</a>
          </div>

        @endif

        <div>
          {!!$post->body!!}
        </div>

        <hr />

        <h4>Les gents tagé <span>( {{count($post->appears)}} )</span></h4>

        <div>
          @foreach( $post->appears->take(10) as $ka => $appear )
            <span class="badge badge-success">{{ $appear->full_name }}</span>
          @endforeach
        </div>

        <h4>Les commentaires <span>( {{count($post->comments)}} )</span></h4>
        <div class="comments" id="comments-for-{{$post->id}}">



          @foreach( $post->comments->take(10) as $kc => $comment )



            <blockquote class="" id="comment-text-{{ $comment->id }}-post-{{$post->id}}">
              {{ $comment->body }}
              <br />
              <div class="text-secondary pull-right">{{ $comment->creator->full_name }}</div>
            </blockquote>

            <hr />

          @endforeach

          @if(count($post->comments) > 10 )
            <a href="#" class="btn btn-info btn-xs">les commentaire est limter a 10 commentaire  tu peut voire tout ici</a>

          @endif

        </div>


        @slot('footerPlain')
          <div class="user-block">

            <img class="img-circle img-bordered-sm" src="{{ CommonPics::ifImg( ArrayHolder::roles_routing( $post->created_by->role ) ,  $post->created_by->img ) }}" alt="User Image">
            <span class="username">
              <a href="#">{{ $post->created_by->full_name   }}</a>

            </span>
            <span class="description">{{ $post->created_at   }}</span>
          </div>

          <ul class="list-inline">
            <li><a href="#" class="link-black text-sm btn-love {{  Auth::user()->hasLiked($post)? 'love': 'black'  }}" id="love-{{  $post->id }}" data-id="{{  $post->id }}"><i class="fa fa-heart margin-r-5"></i> Like
                @if( $post->likesCount > 0 )
                    ( {{ $post->likesCount  }} )
                @endif
              </a>
            </li>

          </ul>
          <form class="form-horizontal" data-id="{{ $post->id }}" id="form-{{ $post->id }}">
            <div class="form-group margin-bottom-none">
              <div class="col-sm-9">
                <input class="form-control input-sm comment" placeholder="Reponse" data-id="{{ $post->id }}" id="comment-{{ $post->id }}">
              </div>
              <div class="col-sm-3">
                <button type="submit" class="btn btn-primary pull-right btn-block btn-sm btn-comment"  data-id="{{ $post->id }}" id="btn-comment-{{ $post->id }}">Envoyer</button>
              </div>
            </div>
          </form>

        @endslot


      @endcomponent



      {{ $posts->links() }}

  @empty

    @component('back.components.alert')

      <h2>Vide</h2>

    @endcomponent

  @endforelse
