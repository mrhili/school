

@extends('back.layouts.app')



@section('styles')

{{-- output array min empty max id and more --}}

@endsection

@section('content')






<div class="col-md-6">
  {!! Form::open(['route' => ['tests.store-answers', $test->id], 'files' => true, 'method' => 'post' ,'class' => 'form-horizontal', 'id' => '']) !!}
@component('back.components.plain')



  @slot('titlePlain')

Question pour :{{ $test->title }}

  @endslot





    <div id="quetions"></div>


    @slot('footerPlain')

  	@component('back.components.button')

  	  @slot('value')

  	  	Changé les reponse

  	  @endslot

  	@endcomponent

    @endslot

@endcomponent
{!! Form::close() !!}
</div>
<div class="col-md-6">

  @component('back.components.plain')



    @slot('titlePlain')

  Reponse pour :{{ $test->title }}

    @endslot


    <ul id="answers" class="products-list product-list-in-box"></ul>



  @endcomponent


</div>








@endsection



@section('scripts')
<script src="{!! asset('form-builder/form-render.min.js') !!}"></script>
<script src="{!! asset('validate/jquery.validate.min.js') !!}"></script>

<script type="text/javascript">
/*INITIALIZE   formBuilder */



/************************************************************************************/


$(document).ready(function(){

var options = {
      formData: '{!! $test->body !!}',
      dataType: 'json'
    };
$quetions = $('#quetions');
$answers = $('#answers');
$quetions.formRender(options);
var answers = JSON.parse( '{!! $test->answers !!}' );
var notes = JSON.parse( '{!! $test->notes !!}' );
console.log(answers)
$.each(notes, function(key, value) {
  var answer;

  //|| isObject( answers[ value.name ] )

  if(Array.isArray( answers[ value.name ] ) ){

    answer = answers[ value.name ].join(" et ");

  }else{

    answer = answers[ value.name ] ;

  }
  $el = $('<li class="item"><div class="product-info"><a href="#" data-name="field-'+value.name+'" class="product-title btn-hover">'+value.name+'<span class="label label-warning pull-right">Note: '+ value.note +'</span>\
  </a>\
  <p class="product-description-wrap">Correct reponse: '+answers[ value.name ]+'</p></div></li>');
  $answers.append($el);
//  $answers.append('<li class="item"><div class="product-info"><a href="" class="product-title"'>+key+'<span class="label label-warning pull-right">$1800</span></a><span class="product-description">'+value+'</span></div></li>');
});


$answers.on({
    mouseenter: function () {
        //stuff to do on mouse enter

        $this = $(this);
                //alert(    $('.' + $this.attr('data-name')          )   );
        $('.'+ $this.attr('data-name') ).css({
          "background-color": "yellow"
        });



    },
    mouseleave: function () {
        //stuff to do on mouse leave

        $('.'+ $this.attr('data-name') ).css({
          "background-color": "inherit"
        });
    }
}, '.btn-hover');


});






</script>
@endsection
