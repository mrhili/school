
@extends('back.layouts.app')
@section('content')


    <section class="content">

        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">

                        <h3 class="profile-username text-center">Titre</h3>

                        <ul class="list-group list-group-unbordered">

                            @foreach( $pages as $i => $page )
                                <li class="list-group-item">

                                    <a href="{{ route('videos.display',$page->slug)  }}" class="{{ ( optional($selected_page)->id ==  $page->id  ) ? 'active': ''  }} btn btn-primary"><i class="fa fa-angle-double-right"></i> {{ $page->title }} </a>
                                </li>
                            @endforeach



                        </ul>


                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">

                <div class="nav-tabs-custom">


                                @if( $tabs != null )

                                    <ul class="nav nav-tabs">
                                        @foreach( $tabs as $t => $tab )

                                            <li class="{{ ( ($selected_tab != null && $tab->id == optional($selected_tab)->id || $loop->first ) )? 'active': ''  }}"><a href="#pan-{{  $tab->id }}" data-toggle="tab">{{  $tab->title }}</a></li>

                                        @endforeach

                                    </ul>




                                            <div class="tab-content">



                                                @foreach( $tabs as $t => $tab )



                                                    <div class="{{ ( ($selected_tab != null && $tab->id == optional($selected_tab)->id || $loop->first ) )? 'active': ''  }} tab-pane" id="pan-{{ $tab->id }}">

                                                        @foreach( $tab->videos()->where('roles', 'LIKE', '%'. Auth::user()->role .'%')->paginate($paginate) as $v => $video )

                                                            <div class="post">
                                                                <div class="user-block">
                                                                    <span>
                                                                      <h4>{{ $video->title }}</h4>
                                                                    </span>
                                                                </div>
                                                                <!-- /.user-block -->
                                                                <p>




{!!  Embed::make($video->url)->parseUrl()->setAttribute([
                                                                    'width' => '100%',
                                                                    'height' => 315,
                                                                    'frameborder' => 0,
                                                                    'allowfullscreen' => true
                                                                    ])->getHtml()  !!}

{{--
                                                                    <iframe width="100%" height="315" src='{{  preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","//www.youtube.com/embed/$1",$video->url )  }}'

                                                                            frameborder="0"

                                                                            allow="encrypted-media"

                                                                            allowfullscreen></iframe>

--}}
                                                                <hr />
                                                                {!! $video->text !!}
                                                                </p>

                                                            </div>

                                                        @endforeach



                                                        {!! optional( $tab->videos()->where('roles', 'LIKE', '%'. Auth::user()->role .'%')->paginate($paginate) )->links() !!}




                                                    </div>

                                            @endforeach


                                            <!-- /.tab-pane -->
                                            </div>













                    @else
                        <div class="alert alert-info"> Vide</div>
                    @endif


                </div>

                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>


@endsection
