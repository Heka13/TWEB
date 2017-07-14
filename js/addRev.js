window.onload = function() {

  $('#addRev').on("click","input[name=public][type=button]",function(){
    var tb = $(this);
    var addRev = tb.closest("#addRev");
    var rev = addRev.find("input[name=rev][type=text]");
    console.log("- "+rev.val());
    $.post("../php/addRev.php",{rev: rev.val()},function(data){
      if(data == "true"){
        refreshReviews();
      }
      else console.log(data);
    });
  });

function refreshReviews (){

  $.post("../php/getRev.php",{},function(data){
    var obj = jQuery.parseJSON(data);
    var text = '';
    $.each(obj, function(i, value) {
      text+=' <div class="revBox nRev'+i+'">';
      text+=' <div class="infoRev"><div class="reviewerName">'+value.nameVisitor+
            ' </div><div class="reviewerDate">'+value.insertDate+'</div></div>';
      text+=' <div class="revComment">'+value.review+'</div>';
      text+=' </div>';
    });
    $('#pastRev').empty();
    $('#pastRev').append(text);
    window.location.reload(true);
  });

}






}
