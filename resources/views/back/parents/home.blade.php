@extends('back.layouts.app')

@section('styles')



@endsection

@section('content')



@component('back.components.plain')

  @slot('titlePlain')

The Main Configuration Of the web application

  @endslot


  @slot('sectionPlain')

                  <ul class="users-list clearfix">

                  @foreach($childs as $child)
                    <li>
                      <a class="users-list-name" href="{{ route( 'students.profile',$child->id ) }}">
                        <img src="dist/img/user1-128x128.jpg" alt="{{ $child->name }} {{ $child->last_name }} Image">
                      </a>
                      
                      <a class="users-list-name" href="{{ route( 'students.profile',$child->id ) }}">{{ $child->name }} {{ $child->last_name }}</a>


                      
                      
                          <a href=""><span class="users-list-date">...</span></a>
                      
                    </li>
                  @endforeach
                  
  @endslot


  @slot('footerPlain')



  @endslot


@endcomponent




@component('back.components.plain')

  @slot('titlePlain')

Outils

  @endslot


  @slot('sectionPlain')

      <div class="overlay spin-months-bd">
              En attendent que le chart des benifits et deficites se charge
              <i class="fa fa-refresh fa-spin"></i>
      </div>

      <div class="chart" id="bar-chart" style="height: 300px;"></div>





      

  @endslot



  @slot('footerPlain')



  @endslot





@endcomponent








@endsection

@section('datatableScript')




@endsection

@section('scripts')

<!-- Morris.js charts -->

<script src="{!! asset('adminl/bower_components/raphael/raphael.min.js') !!}"></script>
<script src="{!! asset('adminl/bower_components/morris.js/morris.min.js') !!}"></script>
<script src="{!! asset('axios/axios.min.js') !!}"></script>
<script>
  $(function () {
    "use strict";


axios.get('/months-bd/')
                .then(function (response) {
                  //BAR CHART
                  var bar = new Morris.Bar({
                    element: 'bar-chart',
                    resize: true,
                    data: response.data ,
                    barColors: ['#00a65a', '#f56954'],
                    xkey: 'y',
                    ykeys: ['a', 'b'],
                    labels: ['Bennefits', 'Deficits'],
                    hideHover: 'auto'
                  });
                  $('.spin-months-bd').hide();
                })
                .catch(function (error) {
                  alert(error);
                  console.log( error );
                });



  });
</script>

@endsection
