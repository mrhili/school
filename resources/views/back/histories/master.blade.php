
@extends('back.layouts.app')

@section('styles')



@endsection

@section('content')
<!-- row -->
<div class="row">



	<ul class="timeline">

	    <!-- timeline time label -->
	    <li class="time-label">
	        <span class="bg-red">
	            {{ now()}}
	        </span>
	    </li>
	    <!-- /.timeline-label -->
@foreach($histories as $history)
	    <!-- timeline item -->
	    <li>
	        <!-- timeline icon -->
	        @php

	        $bgColor;

	        if( $history->class == 'success' ){

	        	$bgColor = 'bg-green';

	        }elseif( $history->class == 'info' ){

	        	$bgColor = 'bg-blue';

	        }elseif( $history->class == 'danger' ){

	        	$bgColor = 'bg-red';

	        }

	        @endphp

	        <i class="fa fa-envelope {{ $bgColor }}"></i>
	        <div class="timeline-item">
	            <span class="time"><i class="fa fa-clock-o"></i> {{$history->created_at }}</span>

	            <h3 class="timeline-header"><a href="#" class="text-{{ $history->class }}">admin</a> {{  'name of categori history'  }}</h3>

	            <div class="timeline-body">
	                {!! $history->info !!}
	                <hr />
	                <p class="text-default">Commentaire enregistré: {{ $history->comment }}</p>
	            </div>

	            <div class="timeline-footer">
	                <a class="btn btn-{{ $history->class }} btn-xs btn-modal">Voire + d'information</a>
		            <div class="text-modal hidden">
		                {{ $history->hidden_note }}
		            </div>
	            </div>


	        </div>
	    </li>
	    <!-- END timeline item -->

@endforeach

	</ul>

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
                <p>One fine body&hellip;</p>
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



@component('back.components.plain')

  @slot('titlePlain')

The Main Configuration Of the web application

  @endslot


  @slot('sectionPlain')



  @endslot


  @slot('footerPlain')



  @endslot


@endcomponent


@endsection

@section('datatableScript')




@endsection

@section('scripts')
<script type="text/javascript">
	$(document).ready(function(){
		$('.btn-modal').click(function(){
			$('#modal').modal('show');
		});
	});
	
</script>

@endsection