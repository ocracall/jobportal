// Start sidenav
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
// End sidenav

// Start Accordion
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function () {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  });
}
// End Accordion
$(window).scroll(function () {
  var threshold = 50;
  $("#test").html($(window).scrollTop());
  if ($(window).scrollTop() >= threshold)
      $('#sidebar').addClass('fixed');
  else
      $('#sidebar').removeClass('fixed');
  var check = $("#content").height() - $("#sidebar").height()-21;
  if ($(window).scrollTop() >= check)
      $('#sidebar').addClass('bottom');
  else
      $('#sidebar').removeClass('bottom');
});


function copyText(id) {
  Toast();
   // Copy the text inside the text field
   var copyText = "http://localhost:3000/jobDetails.php?source="+id;
  navigator.clipboard.writeText(copyText);
  // Alert the copied text
  // alert("Copied the text: " + copyText);
  document.getElementById("copyTextAlert").textContent="Copied Link!!";
}

function Toast() {
  var x = document.getElementById("snackbar");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}