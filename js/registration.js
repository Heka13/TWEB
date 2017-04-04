window.onload = function() {

  var imgName = "";

  var dropz = new Dropzone("#mydropzone", {
    url: '../php/registration.php',
    paramName: 'file',
    uploadMultiple: false,
    addRemoveLinks: true,
    autoProcessQueue: false,
    autoDiscover: false,
    previewsContainer: '#dropzonePreview',
    clickable: false,

  init: function() {
    console.log("iniziato init.......");
    var drpz = this;
    this.on("addedfile", function () {

       $("#submit").on('click',function(e) {
         e.preventDefault();
         e.stopPropagation();
         drpz.processQueue();
       })
    })

    this.on('success', function(file, response) {
      console.log(response);
      imgName = file.name;
      if(response == "true"){
        window.location.replace("../user/myPage.php");
      }
    })
  }
  })
}
