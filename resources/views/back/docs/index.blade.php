
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
                @foreach( $array['links'] as $x => $item )
                  <li class="list-group-item">
                    <b>{{ $item['title'] }}</b> <a href="{{ route('docs', $x ) }}" class="pull-right btn btn-xs btn-primary"><i class="fa fa-angle-double-right"></i></a>
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
          @if( $selected != null )
              <ul class="nav nav-tabs">
                @foreach( $array['links'][$selected]["panels"] as $x => $item )

                  <li class="active"><a href="#pan-{{ $x }}" data-toggle="tab">{{ $item['title'] }}</a></li>

                @endforeach


              </ul>
              <div class="tab-content">



                @foreach( $array['links'][$selected]["panels"] as $x => $item )

                <div class="active tab-pane" id="pan-{{ $x }}">

                  @foreach( $item["videos"] as $y => $video )

                    <div class="post">
                      <div class="user-block">
                            <span>
                              <h4>{{ $video["title"] }}</h4>
                            </span>
                      </div>
                      <!-- /.user-block -->
                      <p>

                        <iframe width="100%" height="315" src="{{ $video["href"] }}"

                         frameborder="0"

                         allow="encrypted-media"

                         allowfullscreen></iframe>
                        <hr />
                        {!! $video["p"] !!}
                      </p>

                    </div>

                  @endforeach








                </div>

                @endforeach


                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
          @endif
            </div>




          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

</section>


@endsection
