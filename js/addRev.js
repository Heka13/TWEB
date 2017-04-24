window.onload = function() {

  $('#addRev input[name=public][type=button]').on("click",function(){
    var tb = $(this);
    var addRev = tb.closest(".addRev");
    var rev = addRev.find("input[name=rev][type=text]");
    $.post("../php/addRev.php",{rev: rev.val()},function(data){
      if(data == "true"){
        refreshReviews();
      }
    });
  });

function refreshReviews (){

  $.post("../php/getRev.php",{},function(data){
    var obj = jQuery.parseJSON(data);
    var text = '';
    $.each(obj, function(i, value) {
      text+='<div class="revBox nRev'+i+'">';
      text+=' <div class="infoRev"><div class="reviewerName">'+value.nameVisitor+'</div><div class="reviewerDate">'+value.insertDate+'</div></div>';
      text+=' <div class="revComment">'+value.review+'</div>';
      text+=' </div>';
    });
    $('#pastRev').empty();
    $('#pastRev').append(text);
    window.location.reload(true);
  });

}






}
