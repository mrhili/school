{{--

<script src="{!! asset('axios/axios.min.js') !!}"></script>
<script src="{!! asset('validate/jquery.validate.min.js') !!}"></script>


--}}


<script>

var $btn_comment = $('.btn-comment');
var $comments = $('.comments');
$(document).ready(function() {

  $btn_comment.on('click', function( e ){
    e.preventDefault();
    var $element = $(this);

    var id = $(this).data('id');
    var $input = $('#comment-'+id);
    var $inputValue = $input.val();

    $element.attr('disabled', true);



    if($inputValue.length > 0 && $('#form-'+id).valid()){
      axios.post('/add-comment/post/'+ id,{
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        title : $inputValue,
        body: $inputValue
      })
      .then(function (response) {
        $element.attr('disabled', false);
        console.log(response.data);
        returned = response.data;
        swal('Le commentaire a etait bien enregistrer', ':)', 'success');

        $input.val('');

        $comments4 = $('#comments-for-'+ id );

        $comments4.append('<blockquote class="" id=comment-text-"'+ returned['id'] +'-post-'+id+'">'+returned['body']+'</blockquote>');
        $comments4.append('<hr />');

      })
      .catch(function (error) {
        $element.attr('disabled', false);
        console.log( error );
      })
    }else{
      $btn_comment.attr('disabled', false);
      swal('empty', 'empty', 'error');
    }

  });
});

</script>
