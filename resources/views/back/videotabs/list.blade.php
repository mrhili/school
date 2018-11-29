




@extends('back.layouts.app')


@section('styles')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fontawesome-iconpicker/3.2.0/css/fontawesome-iconpicker.min.css" />

@endsection

@section('content')



    <div class="box box-default collapsed-box">
        <div class="box-header with-border">
            <h3 class="box-title">Ajouter un objet</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
            </div>
            <!-- /.box-tools -->

        </div>
        <!-- /.box-header -->
        <div class="box-body" id="sbject-form">

            <form id="form">

                <div class="form-group col-xs-12">
                    {{ csrf_field() }}
                </div>

                <div class="col-xs-12">

                    @include('back.partials.formG', ['name' => 'videopage_id', 'type' => 'select', 'selected' => null,'text' => 'Video page', 'class'=>'', 'required' => true, 'array' => $videopages  ,'additionalInfo' => [ 'id' =>  'videopage_id' ]])
                </div>

                <div class="col-xs-12">


                    @include('back.partials.formG', ['name' => 'icon', 'type' => 'text', 'text' => 'Titre', 'class'=>'icp', 'required' => true, 'additionalInfo' => ['id' =>  'icon'] ])


                </div>

                <div class="col-xs-12">

                    @include('back.partials.formG', ['name' => 'title', 'type' => 'text', 'text' => 'Titre', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'title'] ])
                </div>


                <div class="col-xs-12">

                    @include('back.partials.formG', ['name' => 'roles', 'type' => 'select', 'selected' => null,'text' => 'Roles selectioné', 'class'=>'', 'required' => true, 'array' => ArrayHolder::roles_routing()  ,'additionalInfo' => [ 'id' =>  'roles', 'multiple' => true ]])
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


        @foreach( $items as $item  )


            <div class="col-md-4">
                <!-- Widget: user widget style 1 -->
                <div class="box box-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-{{ ArrayHolder::backgroundColors()  }}">
                        <div class="widget-user-image">
                            {!! Html::image( 'images/config/'. GetSetting::getConfig('no-image') ,'No-Image', ['class' => 'img-circle'] ) !!}
                        </div>
                        <!-- /.widget-user-image -->
                        <h3 class="widget-user-username">{{ $item->title }}</h3>




                        <p class="widget-user-desc">Desciption:</p>
                    </div>
                    <div class="box-footer no-padding">
                        <ul class="nav nav-stacked">
                            <li><a target="_blank" href="{{  $item->url }}">Url <span class="pull-right badge bg-blue"></span></a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.widget-user -->
            </div>

        @endforeach

    </div>




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

    <script src="{!! asset('axios/axios.min.js') !!}"></script>
    <script src="{!! asset('validate/jquery.validate.min.js') !!}"></script>
    <script src="{!! asset('helpers/helpers.js') !!}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fontawesome-iconpicker/3.2.0/js/fontawesome-iconpicker.min.js"></script>
    <script type="text/javascript">

        var add = $('#add');
        var items = $('#items');
        var schoolLink = "{{ route('index') }}";
        var imgLink = "{{ 'images/config/'. GetSetting::getConfig('no-image') }}";


        $('.icp').iconpicker({
            fullClassFormatter: function(val) {
                return 'fa ' + val;
            }
        });

        add.on("click", function(e){

            add.attr('disabled', true);



            if( $('#form').valid() ){




                axios.post('/videopages-store/',{
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    comment: $('#commentfield').val(),
                    hidden_note: $('#hiddennotefield').val(),
                    title: $('#title').val(),
                    icon: $('#icon').val(),
                    roles: $('#roles').val()

                })
                    .then(function (response) {
                        console.log( response );
                        var returnedArray = response.data;

                        add.attr('disabled', false);
                        swal('ok', 'bien ajouter','succes');

                        items.append('<div class="col-md-4"><!--Widget:userwidgetstyle1--><div class="box box-widget widget-user-2"><!--Addthebgcolortotheheaderusinganyofthebg-*classes--><div class="widget-user-header bg-'+ randombgcolor() +'"><div class="widget-user-image"><img class="img-circle" src="'+schoolLink+'/'+imgLink+'" alt="UserAvatar"></div><!--/.widget-user-image--><h3 class="widget-user-username">'+ returnedArray['title']+'</h3><h5 class="widget-user-desc">'+ returnedArray['objctype']+'</h5><h5 class="widget-user-desc">'+ returnedArray['room']+'</h5><h5 class="widget-user-desc">'+ returnedArray['state']+'</h5><p class="widget-user-desc">'+ returnedArray['description']+'</p></div><div class="box-footer no-padding"><ul class="nav nav-stacked"><li><a href="#">Projects<span class="pull-right badge bg-blue">31</span></a></li></ul></div></div><!--/.widget-user--></div>');

                    })
                    .catch(function (error) {
                        add.attr('disabled', false);
                        alert(error);
                        console.log( error );
                    });



            }

        });


    </script>
@endsection