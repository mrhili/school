

{{--

<script src="{!! asset('axios/axios.min.js') !!}"></script>
<script src="{!! asset('validate/jquery.validate.min.js') !!}"></script>


--}}


<script>

    var $btn_love = $('.btn-love');
    $(document).ready(function() {

        $btn_love.on('click', function( e ){
            e.preventDefault();
            var $element = $(this);

            var id = $(this).data('id');

            $element.attr('disabled', true);

                axios.post('/like-post/'+ id,{
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                .then(function (response) {
                    $element.attr('disabled', false);
                    returned = response.data;
                    console.log( returned );
                    swal('Le like a etait bien envoyer', ':)', 'success');


                    $element.removeClass('love black');
                    if( returned['state']){
                        $element.addClass('love');
                    }else{
                        $element.addClass('black');
                    }


                })
                .catch(function (error) {
                    $element.attr('disabled', false);
                    console.log( error );
                });


        });
    });

</script>
