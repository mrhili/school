$(document).ready(function(){

	function justNum(string){

			cleanId = string.replace(/[^0-9]/gi, '');
			cleanId = parseInt(cleanId, 10);

			return cleanId;

	}


	if($( ".change-year" ).length ){

		var changeYear = $( ".change-year" );

		var id, cleanId;



		changeYear.on('click', function(e){

			e.preventDefault();
			id = this.id;

			cleanId = justNum(id);

		axios.get('/change-year/'+cleanId)
		  .then(function (response) {
		    //remove class bg-green and add it for the selection year
		    changeYear.each(function( index ) {

			  changeYear.eq(index).find('.menu-icon').removeClass('bg-green');

			  if( changeYear.eq(index).attr('id') == id ){
			  	changeYear.eq(index).find('.menu-icon').addClass('bg-green');
			  }
			});

			window.yearId = response.data['yearId'];
			window.yearName = response.data['yearName'];

		  })
		.catch(function (error) {
		    console.log(error);
		 });


		});

	}
});