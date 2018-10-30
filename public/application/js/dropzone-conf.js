
function dropzoneConf(
  option = '#my-dropzone',
  previewSelector = '#preview',
  deleteUrl = window.location.protocol + window.location.hostname + '/delete-image',
  counterSelector = "#counter" ){


    var total_photos_counter = 0;


    $(option).dropzone({
      uploadMultiple: true,
      parallelUploads: 2,
      maxFilesize: 16,
      previewTemplate: document.querySelector( previewSelector ).innerHTML,
      addRemoveLinks: true,
      dictRemoveFile: 'Suprimé',
      dictFileTooBig: 'Trop lourd cette image',
      timeout: 10000,

      init: function () {
          this.on("removedfile", function (file) {
              $.post({
                  url: deleteUrl,
                  data: { filename: file.name ,  _token: $('[name="_token"]').val() },
                  dataType: 'json',
                  success: function (data) {
                      total_photos_counter--;
                      $( counterSelector ).text("# " + total_photos_counter);
                  }
              });
          });

      },
      success: function (file, done) {
          total_photos_counter++;
          $( counterSelector ).text("# " + total_photos_counter);
      }





 });


}


var one_time = false;
function dropzoneConf2(

  option = '#my-dropzone',
  previewSelector = '#preview',
  deleteUrl = window.location.protocol + window.location.hostname + '/delete-image',
  counterSelector = "#counter",
  confirmUrl = window.location.protocol + window.location.hostname + '/confirm/1' ){


    var total_photos_counter = 0;


    $(option).dropzone({
      uploadMultiple: true,
      parallelUploads: 2,
      maxFilesize: 16,
      previewTemplate: document.querySelector( previewSelector ).innerHTML,
      addRemoveLinks: true,
      dictRemoveFile: 'Suprimé',
      dictFileTooBig: 'Trop lourd cette image',
      timeout: 10000,

      init: function () {
          this.on("removedfile", function (file) {
              $.post({
                  url: deleteUrl,
                  data: { filename: file.name ,  _token: $('[name="_token"]').val() },
                  dataType: 'json',
                  success: function (data) {
                      total_photos_counter--;
                      $( counterSelector ).text("# " + total_photos_counter);

                  }
              });
          });

      },
      success: function (file, done) {
          total_photos_counter++;
          $( counterSelector ).text("# " + total_photos_counter);


          if(!one_time){
            console.log(done);

            console.log('/////////');

            console.log(file);
            $(option).attr('action', confirmUrl );
            one_time = true;
          }



      }



 });


}
