$(document).ready(function () {

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });

    // accordion

    var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    var plus = document.getElementById('plus') ;
    var moins = document.getElementById('moins') ;
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
            panel.style.display = "none";
         plus.style.display = "block" ;
            moins.style.display = "none" ;

     } else {
       panel.style.display = "block";
       moins.style.display = "block" ;
       plus.style.display = "none" ;
     }
  });
}

});

