window.onload = function() {

  var imgName = "";
Dropzone.autoDiscover = false; //nuovo
  var dropz = new Dropzone("#mydropzone", {
    url: '../php/registration.php',
    paramName: 'file',
    uploadMultiple: false,
    addRemoveLinks: true,
    autoProcessQueue: false,
    autoDiscover: false,
    thumbnailWidth:50,
    thumbnailHeight:50,
    previewsContainer: '#dropzonePreview',
    clickable: false,

    init: function() {
      var drpz = this;
      this.on("addedfile", function () {

        $("#submit").on('click',function(e) {
          e.preventDefault();
          e.stopPropagation();
          drpz.processQueue();
        })
      })

      this.on('success', function(file, response) {
        imgName = file.name;
        if(response == "true"){
          window.location.replace("../user/myPage.php");
        }
        else {
          console.log("response: --- "+response);
        }
      })
    }
  })

}
