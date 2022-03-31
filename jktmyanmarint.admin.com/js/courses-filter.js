var selected = [];
var isAllChecked = false;

function addToSelected(event, id) {
  // console.log();
  var src = event.target.src;
  var root = src.slice(0, -5);
  var checkBox = src.slice(-5);
  if (checkBox == "1.png") {
    event.target.src = root + "2.png";
  } else {
    event.target.src = root + "1.png";
  }
  event.stopPropagation();
  if (!selected.includes(id)) {
    selected.push(id);
  } else {
    if (selected.indexOf(id) !== -1) {
      selected.splice(selected.indexOf(id), 1);
    }
  }
}

function formatDate(date) {
  var d = new Date(date),
    month = "" + (d.getMonth() + 1),
    day = "" + d.getDate(),
    year = d.getFullYear();

  if (month.length < 2) month = "0" + month;
  if (day.length < 2) day = "0" + day;
  // var returnDate = new Date();
  return [year, month, day].join("-");
  // return moment([year, month, day].join('-')).format('L');;
}

var selectAllBtn = document.getElementById("select-all");

selectAllBtn.addEventListener("click", function (event) {
  var myTable = $("#dataTable").DataTable();
  var form_data = myTable.column(0).data();
  var i = 0;
  selected = [];
  
  var src = event.target.src;
  var root = src.slice(0, -5);
  
  var checkBox = src.slice(-5);
  if (checkBox == "1.png") {
    event.target.src = root + "2.png";
    $(".check-icon").attr("src", root + "2.png");
    // isAllChecked = true;
    while(i<form_data.length){
      selected.push(form_data[i].substring(70,form_data[i].length-4));
      i++;
  }
  } else {
    event.target.src = root + "1.png";
    $(".check-icon").attr("src", root + "1.png");
    // isAllChecked = false;
    selected=[];
  }
});

var buttons = [
  {
    extend: "excelHtml5",
    text: '<i class="fa fa-download"></i>',
    titleAttr: "Excel",
    exportOptions: {
      modifier: {
        // DataTables core
        order: "index", // 'current', 'applied',
        //'index', 'original'
        page: "all", // 'all', 'current'
        search: "none", // 'none', 'applied', 'removed'
      },
      columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14],
    },
  },
  {
    text: '<i class="fa fa-trash"></i>',
    action: function (e, dt, node, config) {
      // alert("Button activated");
      if ($("#dataTable").DataTable().column(0).data().length == selected.length) {
        if (window.confirm("Are you sure to delete all?")) {
          // They clicked Yes
          $.ajax({
            url: "./backend/deleteAllCourses.php",
            type: "POST",
            success: function (data, textStatus, jqXHR) {
              //checkbox unchecked
              isAllChecked = false;
              var root = $("#select-all").attr("src").slice(0, -5);
              var checkBox = $("#select-all").attr("src").slice(-5);
              if (checkBox == "1.png") {
                $("#select-all").attr("src", root + "2.png");
                isAllChecked = true;
              } else {
                $("#select-all").attr("src", root + "1.png");
              }
              // var data = jQuery.parseJSON(data);
              // console.log(data.en_data);
              // table destroy
              $("#dataTable").DataTable().clear().draw();
            },
            error: function (jqXHR, textStatus, errorThrown) {},
          });
        } else {
          // They clicked no
        }
      } else {
        if (selected.length <= 0) {
          alert("please select at least one row to delete");
        } else {
          if (window.confirm("Are you sure to delete?")) {
            // console.log(selected);
            $("#courses_ids").val(selected);
            // document.getElementById('courses_ids').value = selected;
            console.log($("#courses_ids").val());
            $("#deleteSelectedId").submit();
          } else {
            // They clicked no
          }
        }
      }
    },
  },
];

// Call the dataTables jQuery plugin
$(document).ready(function () {
  $("#dataTable").DataTable({
    order: [[15, "desc"]],
    columnDefs: [{ orderable: false, targets: [0, 15, 16] }],
    initComplete: function () {
      this.api()
        .columns(".select-category-filter")
        .every(function () {
          var column = this;
          // console.log(column)
          var select = $(
            '<select class="form-control"><option value="">Filter by Category</option></select>'
          )
            .appendTo($(".filter1").empty())
            .on("change", function () {
              var val = $.fn.dataTable.util.escapeRegex($(this).val());
              column.search(val ? "^" + val + "$" : "", true, false).draw();
            });

          column
            .data()
            .unique()
            .sort()
            .each(function (d, j) {
              select.append('<option value="' + d + '">' + d + "</option>");
            });
        });
      this.api()
        .columns(".select-type-filter")
        .every(function () {
          var column = this;
          // console.log(column)
          var select = $(
            '<select class="form-control"><option value="">Filter by Type</option></select>'
          )
            .appendTo($(".filter2").empty())
            .on("change", function () {
              var val = $.fn.dataTable.util.escapeRegex($(this).val());
              column.search(val ? "^" + val + "$" : "", true, false).draw();
            });

          column
            .data()
            .unique()
            .sort()
            .each(function (d, j) {
              select.append('<option value="' + d + '">' + d + "</option>");
            });
        });

      this.api()
        .columns(".select-level-filter")
        .every(function () {
          var column = this;
          // console.log(column)
          var select = $(
            '<select class="form-control"><option value="">Filter by Level</option></select>'
          )
            .appendTo($(".filter3").empty())
            .on("change", function () {
              var val = $.fn.dataTable.util.escapeRegex($(this).val());
              column.search(val ? "^" + val + "$" : "", true, false).draw();
            });

          column
            .data()
            .unique()
            .sort()
            .each(function (d, j) {
              select.append('<option value="' + d + '">' + d + "</option>");
            });
        });

      this.api()
        .columns(".select-instructor-filter")
        .every(function () {
          var column = this;
          // console.log(column)
          var select = $(
            '<select class="form-control"><option value="">Filter by Instructor</option></select>'
          )
            .appendTo($(".filter4").empty())
            .on("change", function () {
              var val = $.fn.dataTable.util.escapeRegex($(this).val());
              column.search(val ? "^" + val + "$" : "", true, false).draw();
            });

          column
            .data()
            .unique()
            .sort()
            .each(function (d, j) {
              select.append('<option value="' + d + '">' + d + "</option>");
            });
        });

      this.api()
        .columns(".select-discount-filter")
        .every(function () {
          var column = this;
          // console.log(column)
          var select = $(
            '<select class="form-control"><option value="">Filter by Discount</option></select>'
          )
            .appendTo($(".filter5").empty())
            .on("change", function () {
              var val = $.fn.dataTable.util.escapeRegex($(this).val());
              column.search(val ? "^" + val + "$" : "", true, false).draw();
            });

          column
            .data()
            .unique()
            .sort()
            .each(function (d, j) {
              select.append('<option value="' + d + '">' + d + "</option>");
            });
        });

      this.api()
        .columns(".select-createdAt-filter")
        .every(function () {
          var column = this;
          // console.log(column)
          var select = $(
            '<select class="form-control"><option value="">Filter by Created Date</option></select>'
          )
            .appendTo($(".filter6").empty())
            .on("change", function () {
              var val = $.fn.dataTable.util.escapeRegex($(this).val());
              column.search(val ? "^" + val + "$" : "", true, false).draw();
            });

          column
            .data()
            .unique()
            .sort()
            .each(function (d, j) {
              select.append('<option value="' + d + '">' + d + "</option>");
            });
        });
    },

    // dom: 'fBlrtpi',
    dom:
      "<'row' <'col-sm-12 col-md-2'l> <'col-md-8 col-sm-12 text-center'B> <'col-sm-12 col-md-2'f> >" +
      "<'row'<'col-sm-12'tr>>" +
      "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
    // dom : '<"mybg"fB><"bottom"lrtpi>',
    buttons: buttons,
  });
});
