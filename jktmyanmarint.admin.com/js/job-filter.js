// Call the dataTables jQuery plugin
$(document).ready(function () {
  $("#enDT").DataTable({
    order: [[11, "desc"]],
    initComplete: function () {
      this.api()
        .columns(".en-company-filter")
        .every(function () {
          var column = this;
          // console.log(column)
          var select = $(
            '<select class="form-control"><option value="">Filter by Company</option></select>'
          )
            .appendTo($(".en-filter1").empty())
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
        .columns(".en-type-filter")
        .every(function () {
          var column = this;
          // console.log(column)
          var select = $(
            '<select class="form-control"><option value="">Filter by Type</option></select>'
          )
            .appendTo($(".en-filter2").empty())
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
        .columns(".en-available-filter")
        .every(function () {
          var column = this;
          // console.log(column)
          var select = $(
            '<select class="form-control"><option value="">Filter by Availability</option></select>'
          )
            .appendTo($(".en-filter3").empty())
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
          columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
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
          columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
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
          columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
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
          columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
        },
      },
    ],
  });
  $("#mmDT").DataTable({
    order: [[11, "desc"]],
    initComplete: function () {
      this.api()
        .columns(".mm-company-filter")
        .every(function () {
          var column = this;
          // console.log(column)
          var select = $(
            '<select class="form-control"><option value="">Filter by Company</option></select>'
          )
            .appendTo($(".mm-filter1").empty())
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
        .columns(".mm-type-filter")
        .every(function () {
          var column = this;
          // console.log(column)
          var select = $(
            '<select class="form-control"><option value="">Filter by Type</option></select>'
          )
            .appendTo($(".mm-filter2").empty())
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
        .columns(".mm-available-filter")
        .every(function () {
          var column = this;
          // console.log(column)
          var select = $(
            '<select class="form-control"><option value="">Filter by Availability</option></select>'
          )
            .appendTo($(".mm-filter3").empty())
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
          columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
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
          columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
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
          columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
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
          columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
        },
      },
    ],
  });
  $("#jpDT").DataTable({
    order: [[11, "desc"]],
    initComplete: function () {
      this.api()
        .columns(".jp-company-filter")
        .every(function () {
          var column = this;
          // console.log(column)
          var select = $(
            '<select class="form-control"><option value="">Filter by Company</option></select>'
          )
            .appendTo($(".jp-filter1").empty())
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
        .columns(".jp-type-filter")
        .every(function () {
          var column = this;
          // console.log(column)
          var select = $(
            '<select class="form-control"><option value="">Filter by Type</option></select>'
          )
            .appendTo($(".jp-filter2").empty())
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
        .columns(".jp-available-filter")
        .every(function () {
          var column = this;
          // console.log(column)
          var select = $(
            '<select class="form-control"><option value="">Filter by Availability</option></select>'
          )
            .appendTo($(".jp-filter3").empty())
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
          columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
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
          columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
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
          columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
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
          columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
        },
      },
    ],
  });
});
