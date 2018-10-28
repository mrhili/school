function getPutInSelect(link, selector2full){
  axios.get(link,{
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }

  })
  .then(function (response) {

    var returnedArray = response.data;
    selector2full.children().remove();

    $.each(returnedArray, function(key, value) {
         selector2full.append($("<option></option>")
                        .attr("value",value.id )
                        .text(value.name ));
    });

  })
  .catch(function (error) {
    alert(error);
    console.log( error );
  });
}
