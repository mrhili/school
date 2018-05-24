




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

                  @foreach($students as $student)
                    <li>
                      <a class="users-list-name" href="#">
                        <img src="dist/img/user1-128x128.jpg" alt="{{ $student->name }} {{ $student->last_name }} Image">
                      </a>
                      
                      <a class="users-list-name" href="#">{{ $student->name }} {{ $student->last_name }}</a>


                      
                      @foreach( $student->relashionshipsParentsStudent as $item => $child )
                          <a href=""><span class="users-list-date">{{  ++$item.'- '.$child->name. ' ' .$child->last_name }}</span></a>
                      @endforeach
                    </li>
                  @endforeach
                  
  @endslot


  @slot('footerPlain')



  @endslot


@endcomponent


@endsection

@section('datatableScript')



@endsection

@section('scripts')



<script type="text/javascript">
  




</script>
@endsection