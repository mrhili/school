




@extends('back.layouts.app')


@section('styles')



@endsection

@section('content')



@component('back.components.plain')

  @slot('titlePlain')

The Main Configuration Of the web application

  @endslot


  @slot('sectionPlain')

        

<div class="row" id="meetings">


    @foreach( $createdbyme as $meeting  )


        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-{{ ArrayHolder::backgroundColors()  }}">
              <div class="widget-user-image">
                {!! Html::image( 'images/config/'. GetSetting::getConfig('no-image') ,'No-Image', ['class' => 'img-circle'] ) !!}
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">{{ $meeting->meeting->name }}</h3>
              <h5 class="widget-user-desc">espace: {{ $meeting->meeting->object }}</h5>
              <h5 class="widget-user-desc">espace: {{ $meeting->meeting->meetingtype_id }}</h5>
              <p class="widget-user-desc">Desciption: {{ $meeting->meeting->body }}</p>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="{{ route('meetingpopulatings.manage', $meeting->id) }}">Manage <span class="pull-right badge bg-blue">0</span></a></li>
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>

    @endforeach

</div>






  @endslot


  @slot('footerPlain')



  @endslot


@endcomponent


@endsection

@section('datatableScript')



@endsection

@section('scripts')

<script src="{!! asset('axios/axios.min.js') !!}"></script>
<script src="{!! asset('validate/jquery.validate.min.js') !!}"></script>
<script src="{!! asset('helpers/helpers.js') !!}"></script>

<script type="text/javascript">



</script>
@endsection