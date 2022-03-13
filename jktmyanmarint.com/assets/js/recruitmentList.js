// Recruitment List
// Top to button for Job recruitments
var toTopBtn1 = document.getElementById("toTopJobsRecruitment");

toTopBtn1.addEventListener("click", () => {
  window.scrollTo(0, 400);
});
$("#toTopJobsRecruitment").hide();
$(window).scroll(function () {
  if ($(this).scrollTop() > 700) {
    $("#toTopJobsRecruitment").fadeIn(1500);
  } else {
    $("#toTopJobsRecruitment").fadeOut(500);
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

// Tab Container
var tab = $(".tab-header li");
var tabData = $(".tab-body .tab-data");

tab.on("click", function () {
  tab.removeClass("active");
  $(this).addClass("active");

  let thisId = $(this).attr("id");
  console.log(thisId);
  let thisTabData = $(".tab-body").find(`#${thisId}-jobs`);

  tabData.removeClass("active");
  thisTabData.addClass("active");
});

// IT Jobs List Pagination
var it_items = $(".it-job");
console.log(it_items);
var numItJobsItems = it_items.length;
var itJobsPerPage = 4;

it_items.slice(itJobsPerPage).hide();

$("#it-pagination-container").pagination({
  items: numItJobsItems,
  itemsOnPage: itJobsPerPage,
  prevText: "&laquo;",
  nextText: "&raquo;",
  edges: 1,
  displayedPages: 3,
  onPageClick: function (pageNumber) {
    var itJobsShowFrom = itJobsPerPage * (pageNumber - 1);
    var itJobsShowTo = itJobsShowFrom + itJobsPerPage;
    it_items.hide().slice(itJobsShowFrom, itJobsShowTo).show();
  },
});

// Tokutei Jobs List Pagination
var tokutei_items = $(".tokutei-job");
console.log(tokutei_items);
var numTokuteiJobsItems = tokutei_items.length;
var tokuteiJobsPerPage = 4;

tokutei_items.slice(tokuteiJobsPerPage).hide();

$("#tokutei-pagination-container").pagination({
  items: numTokuteiJobsItems,
  itemsOnPage: tokuteiJobsPerPage,
  prevText: "&laquo;",
  nextText: "&raquo;",
  edges: 1,
  displayedPages: 3,
  onPageClick: function (pageNumber) {
    var tokuteiJobsShowFrom = tokuteiJobsPerPage * (pageNumber - 1);
    var tokuteiJobsShowTo = tokuteiJobsShowFrom + tokuteiJobsPerPage;
    tokutei_items.hide().slice(tokuteiJobsShowFrom, tokuteiJobsShowTo).show();
  },
});

// General Jobs List Pagination
var general_items = $(".general-job");
console.log(general_items);
var numGeneralJobsItems = general_items.length;
var generalJobsPerPage = 4;

general_items.slice(generalJobsPerPage).hide();

$("#general-pagination-container").pagination({
  items: numGeneralJobsItems,
  itemsOnPage: generalJobsPerPage,
  prevText: "&laquo;",
  nextText: "&raquo;",
  edges: 1,
  displayedPages: 3,
  onPageClick: function (pageNumber) {
    var generalJobsShowFrom = generalJobsPerPage * (pageNumber - 1);
    var generalJobsShowTo = generalJobsShowFrom + generalJobsPerPage;
    general_items.hide().slice(generalJobsShowFrom, generalJobsShowTo).show();
  },
});