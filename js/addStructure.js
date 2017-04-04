window.onload = function() {

  var imgName = "";

  var dropz = new Dropzone("#mydropzone", {
    url: '../php/addStructure.php',
    paramName: 'file',
    uploadMultiple: false,
    addRemoveLinks: true,
    autoProcessQueue: false,
    autoDiscover: false,
    previewsContainer: '#dropzonePreview',
    clickable: false,

  init: function() {
    var drpz = this;
    this.on("addedfile", function () {
       $("#add").on('click',function(e) {
         e.preventDefault();
         e.stopPropagation();
         drpz.processQueue();
       })
    })

    this.on('success', function(file, response) {
      imgName = file.name;

      if(response == "true"){
        window.location.replace("../user/structPage.php");
      }
    })
  }
  })
}
