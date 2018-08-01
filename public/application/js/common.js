$(document).ready(function(){
/*************************Clean string and keep just digits*********/
	function justNum(string){

			cleanId = string.replace(/[^0-9]/gi, '');
			cleanId = parseInt(cleanId, 10);

			return cleanId;

	}
/*******************************************/



/**********************************CHANGE YEAR*********/

if($( ".change-year" ).length ){

  var changeYear = $( ".change-year" );

  var id;



  changeYear.on('click', function(e){

    e.preventDefault();
    id = $(this).attr('data-id');

  axios.get('/change-year/'+id)
    .then(function (response) {
      //remove class bg-green and add it for the selection year
      changeYear.each(function( index ) {

      changeYear.eq(index).find('.menu-icon').removeClass('bg-green bg-red');

      if( changeYear.eq(index).attr('data-id') == id ){
        changeYear.eq(index).find('.menu-icon').addClass('bg-green');
      }else{
				changeYear.eq(index).find('.menu-icon').addClass('bg-red');
			}
    });

    window.yearId = response.data['yearId'];
    window.yearName = response.data['yearName'];

		swal(
		  'lannée est changer avec succes',
		  'Le nom de lannée '+window.yearName,
		  'success'
		)

    })
  .catch(function (error) {
      console.log(error);
   });


  });

}

/***********************************************************/
/*************************************************************/
/*****************************************************************/
/***********************************************************************/


});
