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