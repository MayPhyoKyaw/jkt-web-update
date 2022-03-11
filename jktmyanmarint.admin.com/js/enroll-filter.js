// Call the dataTables jQuery plugin
$(document).ready(function () {
  $("#dataTable").DataTable({
    order: [[7, "desc"]],
    
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
        .columns(".select-paidPercent-filter")
        .every(function () {
          var column = this;
          // console.log(column)
          var select = $(
            '<select class="form-control"><option value="">Filter by Paid Percent</option></select>'
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
              console.log(val)
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
    buttons: [
      {
        extend: "copyHtml5",
        text: '<i class="fa fa-files-o"></i>',
        titleAttr: "Copy",
        exportOptions: {
          modifier: {
            // DataTables core
            order: "index", // 'current', 'applied',
            //'index', 'original'
            page: "all", // 'all', 'current'
            search: "none", // 'none', 'applied', 'removed'
          },
          columns: [0, 1, 2, 3, 4, 5, 6, 7],
        },
      },
      {
        extend: "excelHtml5",
        text: '<i class="fa fa-file-excel-o"></i>',
        titleAttr: "Excel",
        exportOptions: {
          modifier: {
            // DataTables core
            order: "index", // 'current', 'applied',
            //'index', 'original'
            page: "all", // 'all', 'current'
            search: "none", // 'none', 'applied', 'removed'
          },
          columns: [0, 1, 2, 3, 4, 5, 6, 7],
        },
      },
      {
        extend: "pdfHtml5",
        text: '<i class="fa fa-file-pdf-o"></i>',
        titleAttr: "PDF",
        exportOptions: {
          modifier: {
            // DataTables core
            order: "index", // 'current', 'applied',
            //'index', 'original'
            page: "all", // 'all', 'current'
            search: "none", // 'none', 'applied', 'removed'
          },
          columns: [0, 1, 2, 3, 4, 5, 6, 7],
        },
      },
      {
        extend: "print",
        text: '<i class="fa fa-print"></i>',
        titleAttr: "Print",
        exportOptions: {
          modifier: {
            // DataTables core
            order: "index", // 'current', 'applied',
            //'index', 'original'
            page: "all", // 'all', 'current'
            search: "none", // 'none', 'applied', 'removed'
          },
          columns: [0, 1, 2, 3, 4, 5, 6, 7],
        },
      },
    ],
  });
});