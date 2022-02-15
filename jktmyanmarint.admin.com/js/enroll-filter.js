// Call the dataTables jQuery plugin
$(document).ready(function () {
  $("#dataTable").DataTable({
    
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
  });
});