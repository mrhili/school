@extends('back.layouts.app')



@section('title')
  Demande fourniture list
@endsection




@section('page_header')
  Demande fourniture list
@endsection

@section('page_header_desc')
  ...
@endsection

@section('breadcrumb')
  <ol class="breadcrumb">
    <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> Acceuill</a></li>
    <li class=""><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="active"><a href="">Demande fournitur list</a></li>
  </ol>
@endsection



@section('content')
  @component('back.components.alert')
    <h3><i class="fa fa-exclamation-triangle fa-3x" aria-hidden="true"></i> La demande doit etre payé avant d'etre' validé ! </h3>
  @endcomponent

  @component('back.components.plain')

    @slot( 'titlePlain' )
Demande fourniture list
    @endslot


    <div id="demandes">
        @forelse ($demandes as  $demande)
          <div id="{{ $demande->id }}">
            <div class="post">
              <div class="user-block">
                <a href="{{ route('parents.profile', $demande->parent->id ) }}"><img class="img-circle img-bordered-sm" src="{{ CommonPics::ifImg( 'parents',  $demande->parent->img ) }}" alt="user image"></a>

                    <span class="username">
                      <a href="{{ route('parents.profile', $demande->parent->id ) }}">{{ $demande->parent->name }} {{ $demande->parent->last_name }}</a>
                      <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                    </span>
                <span class="description">{{ $demande->created_at->format('l jS \\of F Y h:i:s A') }}</span>
              </div>


              <div class="user-block">
                <a class="pull-right" href="{{ route('students.profile', $demande->student->id ) }}"><img class="img-circle img-bordered-sm" src="{{ CommonPics::ifImg( 'students',  $demande->student->img ) }}" alt="user image"></a>
                <span class="user-block pull-right">
                  <a href="{{ route('students.profile', $demande->student->id ) }}">Pour: {{ $demande->student->name }} {{ $demande->parent->last_name }}</a>

                </span>

              </div>
              <!-- /.user-block -->
              <h3>Message :</h3>
              <div class="direct-chat-text">
                    {{ $demande->message }}
              </div>

              <hr />

                  @php

                    $alert = \App\Helpers\Common\Math::acceptingDemandeFourniture( $demande );
                  @endphp

                  <div class="jumbotron">
                    <h3>{{ $demande->fourniture->name }} <small>{{ $demande->fourniture->additional_info }}</small></h3>
                    <h3>Prix totlal: {{ $demande->totalmoney }} <small>Nombre de pieces: {{ $demande->howmany }}</small></h3>

                    @component('back.components.alert',['class' => $alert['class'] ])
                      <p>{{ $alert['text'] }}</p>
                    @endcomponent

                    <div class="text-center">
                      <a href="#" class="btn btn-warning btn-cancel"
                      data-id="{{ $demande->id }}"
                      data-totalmoney="{{ $demande->totalmoney }}"
                      data-howmany="{{ $demande->howmany }}"
                      data-got="{{ $demande->fourniture->got }}"
                      data-text="{{ $alert['text'] }}"><i class="fa fa-ban margin-r-5"></i> Annulé</a>
                      <a href="#" class="btn btn-info btn-accept" data-id="{{ $demande->id }}"><i class="fa fa-check margin-r-5"></i> validé</a>
                    </div>
                  </div>


              </ul>

            </div>

            <hr />

          </div>
        @empty

          @component('back.components.alert',['class' => 'danger'])
            <h3><i class="fa fa-fire fa-3x" aria-hidden="true"></i>  Il ya pas de demande aujourdhui ! </h3>
          @endcomponent


        @endforelse
    </div>
    @if(!$demandes->isEmpty())
        <button id="btn-more" data-id="{{ $demande->id }}" class="btn btn-primary" > Load More </button>
    @endif





  @endcomponent




  @component('back.components.modal_form')



  @endcomponent





@endsection

@section('scripts')

  <script src="{!! asset('axios/axios.min.js') !!}"></script>
  <script src="{!! asset('validate/jquery.validate.min.js') !!}"></script>
  <script src="{!! asset('helpers/helpers.js') !!}"></script>

<script type="text/javascript">


window.wichone = '';
var schoolLink = "{{ route('index') }}";
var imgLink = "{{ 'images/config/'. GetSetting::getConfig('no-image') }}";

var $demandes = $('#demandes');

var sendform = $('#send-form');

$demandes.on('click', '.btn-accept',function(){

  $this = $(this);

  window.wichone = $this.attr('data-id');

  swal({
    title: 'Tu est sure daccepter',
    text: $this.attr('data-text'),
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Confirm'
  }).then((result) => {
  if (result.value) {
    $('#modal').modal();
  }
  })


});









sendform.on("click", function(e){

  sendform.attr('disabled', true);


  if( $('#form').valid() ){


    comment = $('#commentfield').val();
    hidden_note = $('#hiddennotefield').val();
/*
return response()->json(['id' => $fourniture->id, 'name' => $fourniture->name, 'average_price' => $fourniture->average_price, 'howmany' => $howmany ,'totalmoney' => $totalmoney ]);
*/

    axios.put('/accepte-demande-fourniture/' + window.wichone,{
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      comment: comment,
      hidden_note: hidden_note

    })
      .then(function (response) {
        console.log( response );
        sendform.attr('disabled', false);

        $('#modal').modal('hide');

        var returnedArray = response.data;

        $('#'+ returnedArray['id'] ).remove();

        swal(
          'Accepté',
          returnedArray['howmany'] + ' ' +returnedArray['name'] +' est accepté avec success',
          'success'
        );


      })
      .catch(function (error) {

        sendform.attr('disabled', false);
        swal(
          'Pas accepté',
          'repete encore une fois',
          'error'
        );
        console.log( error );
      });

    }

  });


</script>
@endsection
