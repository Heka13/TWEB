var slideIndex = 1;
showDivs(slideIndex);

function scrollRev(n) {
    showDivs(slideIndex += n);
}

function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("slideShow");
    if(x.length > 0){
      if (n > x.length) {slideIndex = 1}
      if (n < 1) {slideIndex = x.length}
      for (i = 0; i < x.length; i++) {
          x[i].style.display = "none";
      }
      console.log("x.lenght: "+x.length + "\n n: "+n + "\nslideindex-1: "+(slideIndex-1));
      x[slideIndex-1].style.display = "block";
    }
 }
