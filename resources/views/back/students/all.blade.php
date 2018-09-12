




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
                      <a class="users-list-name" href="route('students.profile', $student->id )">
                        <img src="{{ CommonPics::ifImg( 'students',  $student->img ) }}" alt="{{ $student->name }} {{ $student->last_name }} Image">
                      </a>

                      <a class="users-list-name" href="#">{{ $student->name }} {{ $student->last_name }}</a>



                      @foreach( $student->relashionshipsParentsStudent as $item => $child )
                          <a href="{{route('parents.profile', $child->id )}}"><span class="users-list-date">{{  ++$item.'- '.$child->name. ' ' .$child->last_name }}</span></a>
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
