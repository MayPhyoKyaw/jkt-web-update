if (document.getElementById("years-of-exp")) {
  var today = new Date();
  var foundingDate = new Date(2019, 3, 1);
  var expYears = today.getFullYear() - foundingDate.getFullYear();
  document.getElementById("years-of-exp").innerHTML = expYears;
}
// Top to button For all
var toTopBtn = document.getElementById("toTop");

toTopBtn.addEventListener("click", () => {
  window.scrollTo(0, 0);
});
$("#toTop").hide();
$(window).scroll(function () {
  if ($(this).scrollTop() > 1500) {
    $("#toTop").fadeIn(1000);
  } else {
    $("#toTop").fadeOut(500);
  }
});

// For Nav Dropdown
const dropdown = document.querySelector(".dropdown-menu");
const navSubItem = document.querySelectorAll(".nav-sub-item");
$(document).ready(function () {
  $("#serviceNavbarDropdown").on("click", function () {
    if ($(window).width() < 992) {
      if (dropdown.style.display === "block") {
        dropdown.style.display = "none";
        // navSubItem.style.display = ""
      } else {
        dropdown.style.display = "block";
        for (let item of navSubItem) {
          item.style.display = "none";
        }
      }
    }
  });
});

// For facebook embed
// let jp_sh = document.getElementById("jp_sh");
// let digital = document.getElementById("digital");
// console.log(digital)
if ($(window).width() < 992 && $(window).width() > 500) {
  document.getElementById("jp_sh").src =
    'https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FJKT-Japanese-Language-School-100339937999010%2F&tabs=timeline&width=500&height=790&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=300620088760320';
  document.getElementById("digital").src =
    'https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FJKT-Digital-Institute-101947668883371%2F&tabs=timeline&width=500&height=790&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=300620088760320';
} else if ($(window).width() <= 500 && $(window).width() > 398) {
  document.getElementById("jp_sh").src =
    'https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FJKT-Japanese-Language-School-100339937999010%2F&tabs=timeline&width=390&height=790&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=300620088760320';
  document.getElementById("digital").src =
    'https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FJKT-Digital-Institute-101947668883371%2F&tabs=timeline&width=390&height=790&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=300620088760320';
} else if ($(window).width() <= 398) {
  document.getElementById("jp_sh").src =
    'https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FJKT-Japanese-Language-School-100339937999010%2F&tabs=timeline&width=350&height=790&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=300620088760320';
  document.getElementById("digital").src =
    'https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FJKT-Digital-Institute-101947668883371%2F&tabs=timeline&width=350&height=790&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=300620088760320';
}