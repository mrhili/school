

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

                        @include('back.partials.formG', ['name' => 'discipline_id', 'type' => 'select','selected' => null, 'text' => 'Discipline', 'class'=>'', 'required' => true, 'array' => $disciplines,'additionalInfo' => [ 'id' => 'discipline_id' ]])
                      </div>

                      <div class="col-xs-12">

                        @include('back.partials.formG', ['name' => 'type', 'type' => 'select','selected' => null, 'text' => 'Type', 'class'=>'', 'required' => true, 'array' => ArrayHolder::competition_types() ,'additionalInfo' => [ 'id' => 'type' ]])
                      </div>


                      <div class="col-xs-12">

                        @include('back.partials.formG', ['name' => 'name', 'type' => 'text', 'text' => 'Nom competition', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'namefield'] ])
                      </div>


                      <div class="col-xs-12">

                      @include('back.partials.formG', ['name' => 'desc', 'type' => 'textarea', 'text' => 'Description', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'desc'] ])
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




<div class="row" id="items">


    @foreach( $competitions as $competion  )


        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-{{ ArrayHolder::backgroundColors()  }}">
              <div class="widget-user-image">
                {!! Html::image( 'images/config/'. GetSetting::getConfig('no-image') ,'No-Image', ['class' => 'img-circle'] ) !!}
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">{{ $competion->name }}</h3>
              <p class="widget-user-desc">{{ $competion->discipline->name }}</p>
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
var items = $('#items');
var $disciplines = $('#discipline_id');
var schoolLink = "{{ route('index') }}";
var imgLink = "{{ 'images/config/'. GetSetting::getConfig('no-image') }}";
var comment, hidden_note, name;


          add.on("click", function(e){

            add.attr('disabled', true);



            if( $('#form').valid() ){



              comment = $('#commentfield').val();
              hidden_note = $('#hiddennotefield').val();

                    //dont forget to put buunity her
                    axios.post('/store-competition/'+$disciplines.val(),{
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        comment: comment,
                        hidden_note: hidden_note,
                        namefield: $('#namefield').val(),
                        type: $('#type').val(),
                        desc: $('#desc').val()

                    })
                        .then(function (response) {
                        console.log( response );
                        var returnedArray = response.data;

                        add.attr('disabled', false);
                        items.append('<div class="col-md-4"><div class="box box-widget widget-user-2"><div class="widget-user-header bg-'+ randombgcolor() +'"><div class="widget-user-image"><img class="img-circle" src="'+schoolLink+'/'+imgLink+'" alt="UserAvatar"></div><!--/.widget-user-image--><h3 class="widget-user-username">'+ returnedArray['name']+'</h3></div><div class="box-footer no-padding"><ul class="nav nav-stacked"><li><a href="#">Projects<span class="pull-right badge bg-blue">31</span></a></li></ul></div></div></div>');

                        })
                        .catch(function (error) {
                        add.attr('disabled', false);
                        alert(error);
                        console.log( error );
                        });



              }

            });

$(document).ready(function() {


});
</script>
@endsection
