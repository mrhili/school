

@extends('back.layouts.app')


@section('styles')



@endsection

@section('content')



            <div class="box box-default collapsed-box">
              <div class="box-header with-border">
                <h3 class="box-title">Ajouté une unité</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                  </button>
                </div>
                <!-- /.box-tools -->

              </div>
              <!-- /.box-header -->
            <div class="box-body">

                  <form id="form">

                      <div class="form-group col-xs-12">
                      {{ csrf_field() }}
                      </div>

                      <div class="col-xs-12">

                        @include('back.partials.formG', ['name' => 'unity_id', 'type' => 'select','selected' => null, 'text' => 'Sub unity', 'class'=>'', 'required' => true, 'array' => $unities,'additionalInfo' => [ 'id' => 'unity_id' ]])
                      </div>

                      <div class="col-xs-12">

                        @include('back.partials.formG', ['name' => 'subunity_id', 'type' => 'select','selected' => null, 'text' => 'Sub unity', 'class'=>'', 'required' => true, 'array' => [],'additionalInfo' => [ 'id' => 'subunity_id' ]])
                      </div>

                      <div class="col-xs-12">

                        @include('back.partials.formG', ['name' => 'name', 'type' => 'text', 'text' => 'Nom dunité', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'namefield'] ])
                      </div>





                      <div class="col-xs-12">

                      @include('back.partials.formG', ['name' => 'comment', 'type' => 'textarea', 'text' => 'Comment', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'commentfield'] ])
                      </div>

                      <div class="col-xs-12">

                      @include('back.partials.formG', ['name' => 'hidden_note', 'type' => 'textarea', 'text' => 'Une Note Secret pour toi', 'class'=>'', 'required' => false, 'additionalInfo' => ['id' =>  'hiddennotefield'] ])
                      </div>

                      <div class="col-xs-12">

                          <button  type="button" class="btn btn-primary" id="add" >Enregistrer</button>
                      </div>

                  </form>



            </div>
            <!-- /.box-body -->
          </div>




<div class="row" id="rooms">


    @foreach( $subjects as $subject  )


        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-{{ ArrayHolder::backgroundColors()  }}">
              <div class="widget-user-image">
                {!! Html::image( 'images/config/'. GetSetting::getConfig('no-image') ,'No-Image', ['class' => 'img-circle'] ) !!}
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">{{ $subject->name }}</h3>
              <p class="widget-user-desc">...</p>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#"><span class="pull-right badge bg-blue">...</span></a></li>
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>

    @endforeach

</div>



@endsection



@section('scripts')

<script src="{!! asset('axios/axios.min.js') !!}"></script>
<script src="{!! asset('validate/jquery.validate.min.js') !!}"></script>
<script src="{!! asset('helpers/helpers.js') !!}"></script>
<script src="{!! asset('helpers/select.js') !!}"></script>

<script type="text/javascript">

var add = $('#add');
var $unities = $('#unity_id');
var $subunities = $('#subunity_id');
var subjects = $('#subjects');
var schoolLink = "{{ route('index') }}";
var imgLink = "{{ 'images/config/'. GetSetting::getConfig('no-image') }}";
var comment, hidden_note, name;








          add.on("click", function(e){

            add.attr('disabled', true);



            if( $('#form').valid() ){



              comment = $('#commentfield').val();
              hidden_note = $('#hiddennotefield').val();

                    //dont forget to put buunity her
                    axios.post('/store-subject/'+$subunities.val(),{
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        comment: comment,
                        hidden_note: hidden_note,
                        namefield: $('#namefield').val()

                    })
                        .then(function (response) {
                        console.log( response );
                        var returnedArray = response.data;

                        add.attr('disabled', false);
                        subjects.append('<div class="col-md-4"><div class="box box-widget widget-user-2"><div class="widget-user-header bg-'+ randombgcolor() +'"><div class="widget-user-image"><img class="img-circle" src="'+schoolLink+'/'+imgLink+'" alt="UserAvatar"></div><!--/.widget-user-image--><h3 class="widget-user-username">'+ returnedArray['name']+'</h3><h5 class="widget-user-desc">'+ returnedArray['space']+'</h5><p class="widget-user-desc">'+ returnedArray['description']+'</p></div><div class="box-footer no-padding"><ul class="nav nav-stacked"><li><a href="#">Projects<span class="pull-right badge bg-blue">31</span></a></li></ul></div></div><!--/.widget-user--></div>');

                        })
                        .catch(function (error) {
                        add.attr('disabled', false);
                        alert(error);
                        console.log( error );
                        });



              }

            });

$(document).ready(function() {

  getPutInSelect('/get-subunities-from/'+ $unities.val(), $subunities);

  $unities.on('change', function(){
    getPutInSelect('/get-subunities-from/'+ this.value, $subunities);
  });

});
</script>
@endsection
