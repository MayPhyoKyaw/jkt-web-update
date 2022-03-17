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
}

// Call the dataTables jQuery plugin
$(document).ready(function() {
    let table = $("#enDT").DataTable({
        order: [
            [12, "desc"]
        ],
        columnDefs: [{ orderable: false, targets: [0, 13, 14] }],
        initComplete: function() {
            this.api()
                .columns(".en-company-filter")
                .every(function() {
                    var column = this;
                    // console.log(column)
                    var select = $(
                            '<select class="form-control"><option value="">Filter by Company</option></select>'
                        )
                        .appendTo($(".en-filter1").empty())
                        .on("change", function() {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());
                            column.search(val ? "^" + val + "$" : "", true, false).draw();
                        });

                    column
                        .data()
                        .unique()
                        .sort()
                        .each(function(d, j) {
                            select.append('<option value="' + d + '">' + d + "</option>");
                        });
                });
            this.api()
                .columns(".en-type-filter")
                .every(function() {
                    var column = this;
                    // console.log(column)
                    var select = $(
                            '<select class="form-control"><option value="">Filter by Type</option></select>'
                        )
                        .appendTo($(".en-filter2").empty())
                        .on("change", function() {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());
                            column.search(val ? "^" + val + "$" : "", true, false).draw();
                        });

                    column
                        .data()
                        .unique()
                        .sort()
                        .each(function(d, j) {
                            select.append('<option value="' + d + '">' + d + "</option>");
                        });
                });

            this.api()
                .columns(".en-available-filter")
                .every(function() {
                    var column = this;
                    // console.log(column)
                    var select = $(
                            '<select class="form-control"><option value="">Filter by Availability</option></select>'
                        )
                        .appendTo($(".en-filter3").empty())
                        .on("change", function() {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());
                            column.search(val ? "^" + val + "$" : "", true, false).draw();
                        });

                    column
                        .data()
                        .unique()
                        .sort()
                        .each(function(d, j) {
                            select.append('<option value="' + d + '">' + d + "</option>");
                        });
                });
        },

        // dom: 'fBlrtpi',
        dom: "<'row' <'col-sm-12 col-md-2'l> <'col-md-8 col-sm-12 text-center'B> <'col-sm-12 col-md-2'f> >" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        // dom : '<"mybg"fB><"bottom"lrtpi>',
        buttons: [{
                text: '<i class="fa fa-files-o"></i>',
                action: function(e, dt, node, config) {
                    // alert("Button activated");
                    $.ajax({
                        url: "./backend/newJobCopy.php",
                        type: "POST",
                        data: {
                            job_ids: selected,
                        },
                        success: function(data, textStatus, jqXHR) {
                            //data - response from server
                            var data = jQuery.parseJSON(data);
                            console.log(data.en_data);
                            // table.clear();
                            table.destroy();
                            table = $('#enDT').dataTable({
                                "aaData": data.en_data,
                                "rowCallback": function(row, data) {
                                    // if (data[4] == "A") {
                                    $('td:eq(0)', row).html(`<img class = "check-icon"
                                    src = "img/1.png"
                                    onclick = "addToSelected(event, '${data[0]}')" />`);

                                    $('td:eq(13)', row).html(`<a class="tb-btn tb-btn-edit" onclick="event.stopPropagation()" href="./jobedit.php?job_id=${data['job_id']}"><i class="fa fa-pencil"></i></a>`);

                                    $('td:eq(14)', row).html(`<button class="tb-btn tb-btn-delete" onclick="setCurrentJobDel(event,'${data['job_id']}')" data-toggle="modal" data-target="#deletingModal"><i class="fa fa-trash"></button>`);
                                    // }
                                },
                                columnDefs: [{
                                        target: 1,
                                        data: `${data[0]}`,
                                    }, {
                                        target: 2,
                                        data: `${data[1]}`
                                    }, {
                                        target: 3,
                                        data: `${data[2]}`
                                    }, {
                                        target: 4,
                                        data: `${data[3]}`
                                    }, {
                                        target: 5,
                                        data: `${data[4]}`
                                    }, {
                                        target: 6,
                                        data: `${data[5]}`
                                    }, {
                                        target: 7,
                                        data: `${data[6]}`
                                    }, {
                                        target: 8,
                                        data: `${data[7]}`
                                    }, {
                                        target: 9,
                                        data: `${data[8]}`
                                    }, {
                                        target: 10,
                                        data: `${data[9]}`
                                    }, {
                                        target: 11,
                                        data: `${data[10]}`
                                    },
                                    {
                                        target: 12,
                                        data: `${data[11]}`
                                    }
                                ]
                            });
                        },
                        error: function(jqXHR, textStatus, errorThrown) {},
                    });
                },
            },
            // {
            //   extend: "copyHtml5",
            //   text: '<i class="fa fa-files-o"></i>',
            //   titleAttr: "Copy",
            //   exportOptions: {
            //     modifier: {
            //       // DataTables core
            //       order: "index", // 'current', 'applied',
            //       //'index', 'original'
            //       page: "all", // 'all', 'current'
            //       search: "none", // 'none', 'applied', 'removed'
            //     },
            //     columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
            //   },
            // },
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
                    columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
                },
            },
            {
                text: '<i class="fa fa-trash"></i>',
                action: function(e, dt, node, config) {
                    // alert("Button activated");
                    $.ajax({
                        url: "./backend/deleteSelectedJob.php",
                        type: "POST",
                        data: {
                            job_ids: selected,
                        },
                        success: function(data, textStatus, jqXHR) {
                            //data - response from server
                            console.log(data);
                        },
                        error: function(jqXHR, textStatus, errorThrown) {},
                    });
                },
            },
            // {
            //     extend: "pdfHtml5",
            //     text: '<i class="fa fa-file-pdf-o"></i>',
            //     titleAttr: "PDF",
            //     exportOptions: {
            //         modifier: {
            //             // DataTables core
            //             order: "index", // 'current', 'applied',
            //             //'index', 'original'
            //             page: "all", // 'all', 'current'
            //             search: "none", // 'none', 'applied', 'removed'
            //         },
            //         columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
            //     },
            // },
            // {
            //     extend: "print",
            //     text: '<i class="fa fa-print"></i>',
            //     titleAttr: "Print",
            //     exportOptions: {
            //         modifier: {
            //             // DataTables core
            //             order: "index", // 'current', 'applied',
            //             //'index', 'original'
            //             page: "all", // 'all', 'current'
            //             search: "none", // 'none', 'applied', 'removed'
            //         },
            //         columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
            //     },
            // },
        ],
    });
    $("#mmDT").DataTable({
        order: [
            [12, "desc"]
        ],
        columnDefs: [{ orderable: false, targets: [0, 13, 14] }],
        initComplete: function() {
            this.api()
                .columns(".mm-company-filter")
                .every(function() {
                    var column = this;
                    // console.log(column)
                    var select = $(
                            '<select class="form-control"><option value="">Filter by Company</option></select>'
                        )
                        .appendTo($(".mm-filter1").empty())
                        .on("change", function() {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());
                            column.search(val ? "^" + val + "$" : "", true, false).draw();
                        });

                    column
                        .data()
                        .unique()
                        .sort()
                        .each(function(d, j) {
                            select.append('<option value="' + d + '">' + d + "</option>");
                        });
                });
            this.api()
                .columns(".mm-type-filter")
                .every(function() {
                    var column = this;
                    // console.log(column)
                    var select = $(
                            '<select class="form-control"><option value="">Filter by Type</option></select>'
                        )
                        .appendTo($(".mm-filter2").empty())
                        .on("change", function() {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());
                            column.search(val ? "^" + val + "$" : "", true, false).draw();
                        });

                    column
                        .data()
                        .unique()
                        .sort()
                        .each(function(d, j) {
                            select.append('<option value="' + d + '">' + d + "</option>");
                        });
                });

            this.api()
                .columns(".mm-available-filter")
                .every(function() {
                    var column = this;
                    // console.log(column)
                    var select = $(
                            '<select class="form-control"><option value="">Filter by Availability</option></select>'
                        )
                        .appendTo($(".mm-filter3").empty())
                        .on("change", function() {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());
                            column.search(val ? "^" + val + "$" : "", true, false).draw();
                        });

                    column
                        .data()
                        .unique()
                        .sort()
                        .each(function(d, j) {
                            select.append('<option value="' + d + '">' + d + "</option>");
                        });
                });
        },

        // dom: 'fBlrtpi',
        dom: "<'row' <'col-sm-12 col-md-2'l> <'col-md-8 col-sm-12 text-center'B> <'col-sm-12 col-md-2'f> >" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        // dom : '<"mybg"fB><"bottom"lrtpi>',
        buttons: [{
                text: '<i class="fa fa-files-o"></i>',
                action: function(e, dt, node, config) {
                    // alert("Button activated");
                    $.ajax({
                        url: "./backend/newJobCopy.php",
                        type: "POST",
                        data: {
                            job_ids: selected,
                        },
                        success: function(data, textStatus, jqXHR) {
                            //data - response from server
                            console.log(data);
                        },
                        error: function(jqXHR, textStatus, errorThrown) {},
                    });
                },
            },
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
                    columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
                },
            },
            {
                text: '<i class="fa fa-trash"></i>',
                action: function(e, dt, node, config) {
                    // alert("Button activated");
                    $.ajax({
                        url: "./backend/deleteSelectedJob.php",
                        type: "POST",
                        data: {
                            job_ids: selected,
                        },
                        success: function(data, textStatus, jqXHR) {
                            //data - response from server
                            console.log(data);
                        },
                        error: function(jqXHR, textStatus, errorThrown) {},
                    });
                },
            },
        ],
    });
    $("#jpDT").DataTable({
        order: [
            [12, "desc"]
        ],
        columnDefs: [{ orderable: false, targets: [0, 13, 14] }],
        initComplete: function() {
            this.api()
                .columns(".jp-company-filter")
                .every(function() {
                    var column = this;
                    // console.log(column)
                    var select = $(
                            '<select class="form-control"><option value="">Filter by Company</option></select>'
                        )
                        .appendTo($(".jp-filter1").empty())
                        .on("change", function() {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());
                            column.search(val ? "^" + val + "$" : "", true, false).draw();
                        });

                    column
                        .data()
                        .unique()
                        .sort()
                        .each(function(d, j) {
                            select.append('<option value="' + d + '">' + d + "</option>");
                        });
                });
            this.api()
                .columns(".jp-type-filter")
                .every(function() {
                    var column = this;
                    // console.log(column)
                    var select = $(
                            '<select class="form-control"><option value="">Filter by Type</option></select>'
                        )
                        .appendTo($(".jp-filter2").empty())
                        .on("change", function() {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());
                            column.search(val ? "^" + val + "$" : "", true, false).draw();
                        });

                    column
                        .data()
                        .unique()
                        .sort()
                        .each(function(d, j) {
                            select.append('<option value="' + d + '">' + d + "</option>");
                        });
                });

            this.api()
                .columns(".jp-available-filter")
                .every(function() {
                    var column = this;
                    // console.log(column)
                    var select = $(
                            '<select class="form-control"><option value="">Filter by Availability</option></select>'
                        )
                        .appendTo($(".jp-filter3").empty())
                        .on("change", function() {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());
                            column.search(val ? "^" + val + "$" : "", true, false).draw();
                        });

                    column
                        .data()
                        .unique()
                        .sort()
                        .each(function(d, j) {
                            select.append('<option value="' + d + '">' + d + "</option>");
                        });
                });
        },

        dom: "<'row' <'col-sm-12 col-md-2'l> <'col-md-8 col-sm-12 text-center'B> <'col-sm-12 col-md-2'f> >" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",

        // dom : '<"mybg"fB><"bottom"lrtpi>',
        buttons: [{
                text: '<i class="fa fa-files-o"></i>',
                action: function(e, dt, node, config) {
                    // alert("Button activated");
                    $.ajax({
                        url: "./backend/newJobCopy.php",
                        type: "POST",
                        data: {
                            job_ids: selected,
                        },
                        success: function(data, textStatus, jqXHR) {
                            //data - response from server
                            console.log(data);
                        },
                        error: function(jqXHR, textStatus, errorThrown) {},
                    });
                },
            },
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
                    columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
                },
            },
            {
                text: '<i class="fa fa-trash"></i>',
                action: function(e, dt, node, config) {
                    // alert("Button activated");
                    $.ajax({
                        url: "./backend/deleteSelectedJob.php",
                        type: "POST",
                        data: {
                            job_ids: selected,
                        },
                        success: function(data, textStatus, jqXHR) {
                            //data - response from server
                            console.log(data);
                        },
                        error: function(jqXHR, textStatus, errorThrown) {},
                    });
                },
            },
        ],
    });
});