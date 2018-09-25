@extends('back.layouts.app')

@section('styles')
  <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
     rel = "stylesheet">

  <style>
     #sortable-1 {  cursor:pointer;}
     #sortable-1 li { margin: 0 3px 3px 3px; padding: 0.4em;
        padding-left: 1.5em; font-size: 17px; }
     .default {
        background: #cedc98;
        border: 1px solid #DDDDDD;
        color: #333333;
     }
  </style>

@endsection

@section('content')

  <div class="row">
    <div class="col-xs-12">
      <ol id = "sortable-1">

        @foreach( $students as $student)

          <li id="li-{{ $student->id }}" data-id="{{ $student->id }}" class = "default li">
            {{ $student->name }} {{ $student->last_name }}
            <span class="pull-right">
              <input class="input" id="inputing-{{ $student->id }}" type="number" value="{{ $student->sort }}" />
              <button class="inputing-button" data-id="{{ $student->id }}">
                Send
              </button>
            </span>
          </li>

        @endforeach

      </ol>

    </div>
  </div>

@endsection



@section('scripts')

  <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
  <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script src="{!! asset('axios/axios.min.js') !!}"></script>
  <script>
     $(function() {
        $( "#sortable-1" ).sortable({
          stop: function( event, ui ) {

            var $student = $(ui.item).attr('data-id');

            var dropedIndex = ui.item.index() + 1;

            axios.post('/write-order/' + $student ,{
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              sort: dropedIndex
            })
            .then(function(response){

              var sorting = response.data.sort +1;
              var located = false;

              $('.li' ).each(function() {

                if(located){
                  $(this).find('.input').attr('value', sorting++ );

                }

                if( $(this).attr('id') == 'li-' + response.data.id ){
                  located = true;

                  $(this).find('.input').attr('value', response.data.sort );

                }




              });

              swal({
                position: 'top-end',
                type: 'success',
                title: 'OK The sort is '+ response.data.sort,
                showConfirmButton: false,
                timer: 1500
              })



            })
            .catch(function(error){
              swal({
                type: 'error',
                title: 'Oops...',
                text: 'Something went wrong!'
              })

            });
          }
        });
     });
  </script>

  <script>
    $(document).ready(function(){
      $('#sortable-1').on('click','.inputing-button', function (){


        axios.post('/write-order-manualy/' + $(this).attr('data-id') ,{
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          sort: $('#inputing-'+ $(this).attr('data-id') ).val()
        })
        .then(function(response){

          location.reload();


        })
        .catch(function(error){
          swal({
            type: 'error',
            title: 'Oops...',
            text: 'Something went wrong!'
          })

        });


      });
    });
  </script>

@endsection
