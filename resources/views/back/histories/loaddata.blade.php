
@extends('back.layouts.app')

@section('styles')



@endsection

@section('content')
<!-- row -->


        <div class="modal fade" id="modal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Default Modal</h4>
              </div>
              <div class="modal-body">
                <p class="modal-text"></p>
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














    <ul class="timeline" id="load-data">

  	    <!-- timeline time label -->
  	    <li class="time-label">
  	        <span class="bg-gray">
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

  	        $admin = \App\Helpers\Common\Relation::byModel($history->category->model, $history->id_link );

  	        @endphp

  	        <i class="fa fa-{{ $history->category->icon }} {{ $bgColor }}"></i>
  	        <div class="timeline-item">
  	            <span class="time"><i class="fa fa-clock-o"></i> {{$history->created_at }}</span>

  	            <h3 class="timeline-header"><a href="#" class="text-{{ $history->class }}">{{ $admin->name . ' ' . $admin->last_name }}</a> a éffectué un {{ $history->category->name }}</h3>

  	            <div class="timeline-body">
  	                {!! $history->info !!}
  	                <hr />
  	                <p class="text-default">Commentaire enregistré: {{ $history->comment }}</p>
  	            </div>

  	            <div class="timeline-footer">
  	                <a class="btn btn-{{ $history->class }} btn-xs btn-modal">Voire la note privé</a>
  		            <div class="text-modal hidden">
  		                {{ $history->hidden_note }}
  		            </div>
  	            </div>


  	        </div>
  	    </li>
  	    <!-- END timeline item -->

  @endforeach
        <li id="remove-row">
            <button id="btn-more" data-id="{{ $history->id }}" class="btn btn-primary" > Load More </button>
        </li>

  	</ul>



















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
			var text = $(this).next().text();
			$('.modal-text').text( text );
			$('#modal').modal('show');
		});
	});

</script>



<script>
$(document).ready(function(){
   $(document).on('click','#btn-more',function(){
       var id = $(this).data('id');
       $("#btn-more").html("Loading....");
       $.ajax({
           url : '{{ url("demos/loaddata") }}',
           method : "POST",
           data : {id:id, _token:"{{csrf_token()}}"},
           dataType : "text",
           success : function (data)
           {
              if(data != '')
              {
                  $('#remove-row').remove();
                  $('#load-data').append(data);
              }
              else
              {
                  $('#btn-more').removeClass('btn-primary').addClass('btn-default').html("No Data");
              }
           }
       });
   });
});
</script>

@endsection
