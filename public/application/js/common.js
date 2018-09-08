$(document).ready(function(){
/*************************Clean string and keep just digits*********/

/*******************************************/

function justNum(string){

		cleanId = string.replace(/[^0-9]/gi, '');
		cleanId = parseInt(cleanId, 10);

		return cleanId;

}

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

/***********************CHANGE DEBUG************************************/


if($( ".change-debug" ).length ){

  var changeDebug = $( ".change-debug" );

  var role;

  changeDebug.on('click', function(e){

    e.preventDefault();
    role = $(this).attr('data-role');

  axios.get('/change-debug/'+role)
    .then(function (response) {
      //remove class bg-green and add it for the selection year
      changeDebug.each(function( index ) {


      if( changeDebug.eq(index).attr('data-role') == role ){

				console.log( response.data );
				if( response.data.enable ){
					changeDebug.eq(index).find('.menu-icon').addClass('bg-green');
				}else{
					changeDebug.eq(index).find('.menu-icon').addClass('bg-red');
				}

      }
    });

		swal(
		  'debugage iption a etait changer avec succes',
		  '... ',
		  'success'
		)

    })
  .catch(function (error) {
      console.log(error);
   });


  });

}

/*************************************************************/
/*****************************************************************/
/***********************************************************************/


});
