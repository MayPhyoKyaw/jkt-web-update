var selected = [];

function addToSelected(event, id) {
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
  // console.log(selected);
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
  var src = event.target.src;
  var root = src.slice(0, -5);

  var checkBox = src.slice(-5);
  if (checkBox == "1.png") {
    event.target.src = root + "2.png";
    $(".check-icon").attr("src", root + "2.png");
    // isAllChecked = true;
    selected = [];
    while (i < form_data.length) {
      selected.push(form_data[i].substring(70, form_data[i].length - 4));
      i++;
    }
  } else {
    event.target.src = root + "1.png";
    $(".check-icon").attr("src", root + "1.png");
    // isAllChecked = false;
    selected = [];
  }
});

let updatedDownloadBtn = {
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
    columns: [2, 5, 7, 8, 9, 10, 11],
    format: {
      header: function (data, columnIdx) {
        switch (columnIdx) {
          case 2:
            return "Course";
            break;
          case 5:
            return "Student Name";
            break;
          case 7:
            return "Payment";
            break;
          case 8:
            return "Paid Amount";
            break;
          case 9:
            return "Approved";
            break;
          case 10:
            return "Created At";
            break;
          case 11:
            return "Updated At";
            break;
          default:
            return data;
        }
      },
      body: function (data, row, column, node) {
        // Strip $ from salary column to make it numeric
        switch (column) {
          case 4:
            // return data.replace(/[1,]/g, "&#9989;");
            // return "ava";
            return data === "0" ? "❌" : "✅";
            break;
          default:
            return data;
        }
      },
    },
  },
};

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
      columns: [2, 3, 4, 5, 6, 7, 8],
    },
  },
  {
    text: '<i class="fa fa-trash"></i>',
    action: function (e, dt, node, config) {
      // alert("Button activated");
      if (
        $("#dataTable").DataTable().column(0).data().length == selected.length
      ) {
        if (window.confirm("Are you sure to delete all?")) {
          // They clicked Yes
          $.ajax({
            url: "./backend/deleteAllEnrollments.php",
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
            // They clicked Yes
            // console.log(selected);
            $.ajax({
              url: "./backend/deleteSelectedEnrollment.php",
              type: "POST",
              dataType: "json",
              data: { enroll_ids: JSON.stringify(selected) },
              success: function (data, textStatus, jqXHR) {
                //data - response from server
                selected = [];
                $(".check-icon").attr(
                  "src",
                  "http://admin.jktmyanmarint.com/img/" + "1.png"
                );
                // var data = jQuery.parseJSON(data);
                // console.log(data.students);
                // table destroy
                $("#dataTable").DataTable().destroy();

                if (data) {
                  // en table reinitialize
                  // for (const stu of data.students) {
                  //   // console.log(stu);
                  //   stu["12"] = "data";
                  //   stu["13"] = "data";
                  //   stu["14"] = "data";
                  // }
                  //   console.log(data.enrollments);
                  buttons.splice(0, 1, updatedDownloadBtn);
                  table_en = $("#dataTable").dataTable({
                    aaData: data.enrollments,
                    dom:
                      "<'row' <'col-sm-12 col-md-2'l> <'col-md-8 col-sm-12 text-center'B> <'col-sm-12 col-md-2'f> >" +
                      "<'row'<'col-sm-12'tr>>" +
                      "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    // dom : '<"mybg"fB><"bottom"lrtpi>',
                    buttons: buttons,
                    rowCallback: function (row, data) {
                      var createdDate = new Date(data["created_at"]);
                      var updatedDate = new Date(data["updated_at"]);
                      // $(row).addClass("tb-row");
                      $(row).find("td:eq(2)").addClass("maxw-100");
                      $(row).find("td:eq(3)").addClass("maxw-100 uname-link");
                      $("td:eq(0)", row).html(`<img class = "check-icon"
                                          src = "img/1.png"
                                          onclick = "addToSelected(event, '${data[0]}')" />`);

                      $("td:eq(1)", row).html(
                        `<img class="stu-img-table" src="https://jktmyanmarint.com/backend/${data["photo"]}" alt="${data["photo"]}">`
                      );
                      $("td:eq(2)", row).text(`${data["title"]}`);
                      $("td:eq(3)", row).html(
                        `<a href="students.php?id=${data["nrcNo"]}">${data["student_name"]}</a>`
                      );
                      $("td:eq(4)", row).text(`${data["payment_method"]}`);
                      $("td:eq(5)", row).text(`${data["paid_amount"]}%`);
                      if (data["is_pending"] == 0) {
                        $("td:eq(6)", row).html(`&#9989;`);
                      } else {
                        $("td:eq(6)", row).html(`&#10060;`);
                      }
                      $("td:eq(7)", row).text(`${formatDate(createdDate)}`);
                      $("td:eq(8)", row).text(`${formatDate(updatedDate)}`);

                      $("td:eq(9)", row).html(
                        `<button class="tb-btn tb-btn-edit" onclick="setCurrentEditing(event,this,${data["enrollment_id"]},${data["course_id"]},${data["fee"]})" data-toggle="modal" data-target="#editingModal"><i class="fa fa-pencil"></i></button>`
                      );
                      $("td:eq(10)", row).html(
                        `<button class="tb-btn tb-btn-delete" onclick="setCurrentDeleting(event,this,${data["enrollment_id"]})" data-toggle="modal" data-target="#deletingModal"><i class="fa fa-trash"></i></button>`
                      );
                      // }
                      // console.log(data);
                    },
                    order: [[8, "asc"]],
                    columnDefs: [
                      { orderable: false, targets: [0, 1, 9, 10] },
                      {
                        targets: [11],
                        visible: false,
                        searchable: false,
                      },
                    ],
                  });
                }
              },
              error: function (jqXHR, textStatus, errorThrown) {},
            });
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
    order: [[8, "desc"]],
    columnDefs: [
      { orderable: false, targets: [0, 1, 9, 10] },
      {
        targets: [11],
        visible: false,
        searchable: false,
      },
    ],
    initComplete: function () {
      this.api()
        .columns(".select-course-filter")
        .every(function () {
          var column = this;
          // console.log(column)
          var select = $(
            '<select class="form-control"><option value="">Filter by Course</option></select>'
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
        .columns(".select-payment-filter")
        .every(function () {
          var column = this;
          // console.log(column)
          var select = $(
            '<select class="form-control"><option value="">Filter by Payment Method</option></select>'
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
        .columns(".select-paidAmount-filter")
        .every(function () {
          var column = this;
          // console.log(column)
          var select = $(
            '<select class="form-control"><option value="">Filter by Paid Amount</option></select>'
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
        .columns(".select-isPending-filter")
        .every(function () {
          var column = this;
          // console.log(column)
          var select = $(
            '<select class="form-control"><option value="">Filter by Approved</option></select>'
          )
            .appendTo($(".filter4").empty())
            .on("change", function () {
              var val = $(this).val();
              console.log(val);
              column.search(val ? "^" + val + "$" : "", true, false).draw();
            });

          column
            .data()
            .unique()
            .sort()
            .each(function (d, j) {
              // console.log(d, j);
              select.append(`
                <option value='${d}'>${d}</option>
              `);
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
    },
    // dom: 'fBlrtpi',
    dom:
      "<'row' <'col-sm-12 col-md-2'l> <'col-md-8 col-sm-12 text-center'B> <'col-sm-12 col-md-2'f> >" +
      "<'row'<'col-sm-12'tr>>" +
      "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
    // dom : '<"mybg"fB><"bottom"lrtpi>',
    buttons,
  });
});
