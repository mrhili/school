



@extends('back.layouts.app')

@section('styles')
<style>
.list-group-unbordered>.list-group-item {
  padding-left: 6px;
}
.active.list-group-item>a {
  color : white !important;
}
</style>

@endsection

@section('content')



<div class="row">
        <div class="pans col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">

              <ul class="list-group list-group-unbordered">

                @foreach( $history_cats as $history_cat  )

                  <li class="list-group-item" ><a href="{{ route('histories.master', $history_cat->id ) }}"><fa class="fa fa-{{ $history_cat->icon }}"></fa> {{ $history_cat->name }} <span class="badge badge-success btn-xs pull-right">{{ $history_cat->histories->count() }}</span></a></li>

                @endforeach

              </ul>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="canv col-md-9">
          <div class="nav-tabs-custom">
            <div class="tab-content">
              <!-- /.tab-pane -->
              <ul class="timeline">

                @forelse( $histories as $history  )

                  <!-- timeline item -->
            	    <li>
            	        <!-- timeline icon -->
            	        @php

            	        $bgColor;

            	        if( $history->class == 'success' ){

            	        	$bgColor = 'bg-green';

            	        }elseif( $history->class == 'info' ){

            	        	$bgColor = 'bg-blue';

            	        }else{

            	        	$bgColor = 'bg-red';

            	        }

            	        $model = \App\Helpers\Common\Relation::byModel($history->category->model, $history->id_link );

                      $admin  = \App\User::find( $history->by_admin );

            	        @endphp

            	        <i class="fa fa-{{ $history->category->icon }} {{ $bgColor }}"></i>
            	        <div class="timeline-item">
            	            <span class="time"><i class="fa fa-clock-o"></i> {{$history->created_at }}</span>

            	            <h3 class="timeline-header"><a href="#" class="text-{{ $history->class }}">{{ $admin->name . ' ' . $admin->last_name }}</a> a éffectué un {{ $history->category->name }}</h3>

            	            <div class="timeline-body">
                              <h4>Information généré:</h4>
            	                {!! $history->info !!}

                              <hr />
                              <br />

                              <div class="panel panel-default">

                                <div class="panel-body">
                                  {!! $history->comment !!}

                                </div>

                                <div class="panel-footer">
                                  @if( $history->by_user )

                                    @php

                                    $by  = \App\User::find( $history->by_user );

                          	        @endphp

                                    Par : {{ $by->name }} {{ $by->last_name }} .
                                  @elseif(  $history->by_exterior_name )
                                    Par : {{ $history->by_exterior_name }} .<br />
                                    Info: {{ $history->by_exterior_info }} .
                                  @endif
                                </div>



            	            </div>

                          <hr />
                          <br />
                          <div class="well">
                            {{ $model }}
                          </div>

            	            <div class="timeline-footer">


                              @if( $history->by_admin == Auth::id() )
                                <a class="btn btn-{{ $history->class }} btn-xs btn-modal">Voire la note privé</a>
                              @endif
            		            <div class="text-modal hidden">
            		                {!! $history->hidden_note !!}
            		            </div>
            	            </div>


            	        </div>
            	    </li>
            	    <!-- END timeline item -->

                  @if( $loop->last )

                      <li>
                        <i class="fa fa-link bg-blue"></i>

                        <div class="timeline-item">

                          <h3 class="timeline-header">Links</h3>

                          <div class="timeline-body">
                            {!! $histories->links() !!}
                          </div>

                        </div>
                      </li>


                  @endif

                @empty


                  <li>
                    <i class="fa fa-warning bg-red"></i>

                    <div class="timeline-item">

                      <h3 class="timeline-header">...</h3>

                      <div class="timeline-body">

                        @component('back.components.alert')

                          Resultat vide

                        @endcomponent

                      </div>

                    </div>
                  </li>



                @endforelse
	</ul>

              <!-- /.tab-pane -->

              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>










      <div class="modal fade" id="modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Default Modal</h4>
            </div>
            <div class="modal-body">
              <div class="modal-text"></div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->












@endsection


@section( 'scripts' )

  <script type="text/javascript">

  $(document).ready(function(){


    var tabpane = $('.tab-pane');
    var navtabs = $('.nav-tabs-custom');
    //list-group-item
    var item = $('.list-group-item');

    var $pans = $('.pans');

    var $canv = $('.canv');

    $pans.hover(  function() {


    $( this ).removeClass('col-md-3');
    $( this ).addClass('col-md-6');
    $canv.removeClass('col-md-9');
    $canv.addClass('col-md-6');
  }, function() {
    $( this ).addClass('col-md-3');
    $( this ).removeClass('col-md-6');
    $canv.addClass('col-md-9');
    $canv.removeClass('col-md-6');
  });


  if( $('.btn-modal').length ){

    $('.btn-modal').click(function(){

      var html = $(this).next().html();

      $('.modal-text').html( html );
      $('#modal').modal('show');

    });
  }




  });



  </script>
@endsection
