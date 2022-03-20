var selected = [];
var isAllChecked = false;

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

var selectAllBtnEn = document.getElementById("select-all-en");
var selectAllBtnMm = document.getElementById("select-all-mm");
var selectAllBtnJp = document.getElementById("select-all-jp");


selectAllBtnEn.addEventListener("click", function (event) {
  var src = event.target.src;
  var root = src.slice(0, -5);
  var checkBox = src.slice(-5);
  if (checkBox == "1.png") {
    event.target.src = root + "2.png";
    $(".check-icon").attr("src",root + "2.png");
    isAllChecked = true;
  } else {
    event.target.src = root + "1.png";
    $(".check-icon").attr("src",root + "1.png");
    isAllChecked = false;
  }
});
selectAllBtnMm.addEventListener("click", function (event) {
  var src = event.target.src;
  var root = src.slice(0, -5);
  var checkBox = src.slice(-5);
  if (checkBox == "1.png") {
    event.target.src = root + "2.png";
    $(".check-icon").attr("src",root + "2.png");
    isAllChecked = true;
  } else {
    event.target.src = root + "1.png";
    $(".check-icon").attr("src",root + "1.png");
    isAllChecked = false;
  }
});
selectAllBtnJp.addEventListener("click", function (event) {
  var src = event.target.src;
  var root = src.slice(0, -5);
  var checkBox = src.slice(-5);
  if (checkBox == "1.png") {
    event.target.src = root + "2.png";
    $(".check-icon").attr("src",root + "2.png");
    isAllChecked = true;
  } else {
    event.target.src = root + "1.png";
    $(".check-icon").attr("src",root + "1.png");
    isAllChecked = false;
  }
});

// Call the dataTables jQuery plugin
$(document).ready(function () {
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
      // columns: [0, 5, 1, 6, 3, 4, 10, 9, 11, 12, 14, 17],
      columns: [0, 5, 1, 7, 3, 4, 10, 9, 11, 12, 14, 17],
      // columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
      // customize: function (xlsx) {
      //   var sheet = xlsx.xl.worksheets['sheet1.xml'];
      //   $('row:first c', sheet).attr( 's', '42' );
      // },
      // customize: function (xlsx) {
      //   console.log("customizing");
      //   var sheet = xlsx.xl.worksheets["sheet1.xml"];
      //   $('c[r*="A"] t', sheet).text("user table");
      // },
      format: {
        header: function (data, columnIdx) {
          switch (columnIdx) {
            case 0:
              return "ID";
              break;
            case 1:
              return "Company";
              break;
            case 3:
              return "Wage";
              break;
            case 4:
              return "OT Wage";
              break;
            case 5:
              return "Title";
              break;
            case 7:
              return "Type";
              break;
            case 9:
              return "Working Hours";
              break;
            case 10:
              return "Holidays";
              break;
            case 11:
              return "Break-time";
              break;
            case 12:
              return "Location";
              break;
            case 14:
              return "Is Available";
              break;
            case 17:
              return "Updated At";
              break;
            default:
              return data;
          }
        },
        body: function (data, row, column, node) {
          // Strip $ from salary column to make it numeric
          switch (column) {
            case 10:
              // return data.replace(/[1,]/g, "&#9989;");
              // return "ava";
              return data === "1" ? "✅" : "❌";
              break;
            case 17:
              return data.replace(/[-,]/g, "/");
              break;
            default:
              return data;
          }
        },
      },
    },
  };
  let buttons_en = [
    {
      text: '<i class="fa fa-files-o"></i>',
      action: function (e, dt, node, config) {
        // alert("Button activated");
        // console.log(selected);
        if (selected.length <= 0) {
          alert("please select at least one row to copy");
        } else {
          $.ajax({
            url: "./backend/newJobCopy.php",
            type: "POST",
            data: {
              job_ids: selected,
            },
            success: function (data, textStatus, jqXHR) {
              //data - response from server
              console.log("success");
              selected = [];
              var data = jQuery.parseJSON(data);
              // eng version destroy
              $("#enDT").DataTable().destroy();
              // mm version destroy
              $("#mmDT").DataTable().destroy();
              // jp version destroy
              $("#jpDT").DataTable().destroy();
              // download update

              buttons_en.splice(1, 1, updatedDownloadBtn);
              buttons_mm.splice(1, 1, updatedDownloadBtn);
              buttons_jp.splice(1, 1, updatedDownloadBtn);

              // EN TABLE REINITIALIZE
              if (data) {
                console.log(data.en_data);
                table_en = $("#enDT").dataTable({
                  aaData: data.en_data,
                  dom:
                    "<'row' <'col-sm-12 col-md-2'l> <'col-md-8 col-sm-12 text-center'B> <'col-sm-12 col-md-2'f> >" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                  // dom : '<"mybg"fB><"bottom"lrtpi>',
                  buttons: buttons_en,
                  rowCallback: function (row, data) {
                    // if (data[4] == "A") {
                    $(row).on("click", function (event) {
                      // alert("hello");
                      jobDetail(
                        event,
                        this,
                        data["created_at"],
                        data["requirements"],
                        data["benefits"],
                        data["memo"],
                        data["photos"]
                      );
                    });

                    $(row).addClass("tb-row");
                    $("td:eq(0)", row).html(`<img class = "check-icon"
                                      src = "img/1.png"
                                      onclick = "addToSelected(event, '${data[0]}')" />`);

                    $("td:eq(1)", row).text(`${data["job_id"]}`);
                    $("td:eq(2)", row).text(`${data["job_title"]}`);
                    $("td:eq(3)", row).text(`${data["company_name"]}`);
                    $("td:eq(4)", row).text(
                      `${data["job_type"]}-${data["employment_type"]}`
                    );
                    $("td:eq(5)", row).text(`${data["wage"]}`);
                    $("td:eq(6)", row).text(`${data["overtime"]}`);
                    $("td:eq(7)", row).text(`${data["holidays"]}`);
                    $("td:eq(8)", row).text(`${data["working_hour"]}`);
                    $("td:eq(9)", row).text(`${data["breaktime"]}`);
                    $("td:eq(10)", row).text(`${data["location"]}`);
                    if (data["isavailable"] == 1) {
                      $("td:eq(11)", row).html(`&#9989;`);
                    } else {
                      $("td:eq(11)", row).html(`&#10060;`);
                    }
                    $("td:eq(12)", row).text(`${data["updated_at"]}`);

                    $("td:eq(13)", row).html(
                      `<a class="tb-btn tb-btn-edit" onclick="event.stopPropagation()" href="./jobedit.php?job_id=${data["job_id"]}"><i class="fa fa-pencil"></i></a>`
                    );

                    $("td:eq(14)", row).html(
                      `<button class="tb-btn tb-btn-delete" onclick="setCurrentJobDel(event,'${data["job_id"]}')" data-toggle="modal" data-target="#deletingModal"><i class="fa fa-trash"></button>`
                    );
                    // }
                  },
                  order: [[12, "desc"]],
                  columnDefs: [{ orderable: false, targets: [0, 13, 14] }],
                  // columnDefs: [{
                  //         target: 1,
                  //         data: `${data[0]}`,
                  // ]
                });

                // MM TABLE REINITIALIZE
                table_mm = $("#mmDT").dataTable({
                  aaData: data.mm_data,
                  dom:
                    "<'row' <'col-sm-12 col-md-2'l> <'col-md-8 col-sm-12 text-center'B> <'col-sm-12 col-md-2'f> >" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                  // dom : '<"mybg"fB><"bottom"lrtpi>',
                  buttons: buttons_mm,
                  rowCallback: function (row, data) {
                    // if (data[4] == "A") {
                    $(row).on("click", function (event) {
                      // alert("hello");
                      jobDetail(
                        event,
                        this,
                        data["created_at"],
                        data["requirements"],
                        data["benefits"],
                        data["memo"],
                        data["photos"]
                      );
                    });

                    $(row).addClass("tb-row");
                    $("td:eq(0)", row).html(`<img class = "check-icon"
                                      src = "img/1.png"
                                      onclick = "addToSelected(event, '${data[0]}')" />`);

                    $("td:eq(1)", row).text(`${data["job_id"]}`);
                    $("td:eq(2)", row).text(`${data["job_title"]}`);
                    $("td:eq(3)", row).text(`${data["company_name"]}`);
                    $("td:eq(4)", row).text(
                      `${data["job_type"]}-${data["employment_type"]}`
                    );
                    $("td:eq(5)", row).text(`${data["wage"]}`);
                    $("td:eq(6)", row).text(`${data["overtime"]}`);
                    $("td:eq(7)", row).text(`${data["holidays"]}`);
                    $("td:eq(8)", row).text(`${data["working_hour"]}`);
                    $("td:eq(9)", row).text(`${data["breaktime"]}`);
                    $("td:eq(10)", row).text(`${data["location"]}`);
                    if (data["isavailable"] == 1) {
                      $("td:eq(11)", row).html(`&#9989;`);
                    } else {
                      $("td:eq(11)", row).html(`&#10060;`);
                    }
                    $("td:eq(12)", row).text(`${data["updated_at"]}`);

                    $("td:eq(13)", row).html(
                      `<a class="tb-btn tb-btn-edit" onclick="event.stopPropagation()" href="./jobedit.php?job_id=${data["job_id"]}"><i class="fa fa-pencil"></i></a>`
                    );

                    $("td:eq(14)", row).html(
                      `<button class="tb-btn tb-btn-delete" onclick="setCurrentJobDel(event,'${data["job_id"]}')" data-toggle="modal" data-target="#deletingModal"><i class="fa fa-trash"></button>`
                    );
                    // }
                  },
                  order: [[12, "desc"]],
                  columnDefs: [{ orderable: false, targets: [0, 13, 14] }],
                  // columnDefs: [{
                  //         target: 1,
                  //         data: `${data[0]}`,
                  // ]
                });

                // JP TABLE REINITIALIZE
                table_jp = $("#jpDT").dataTable({
                  aaData: data.jp_data,
                  dom:
                    "<'row' <'col-sm-12 col-md-2'l> <'col-md-8 col-sm-12 text-center'B> <'col-sm-12 col-md-2'f> >" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                  // dom : '<"mybg"fB><"bottom"lrtpi>',
                  buttons: buttons_jp,
                  rowCallback: function (row, data) {
                    // if (data[4] == "A") {
                    $(row).on("click", function (event) {
                      // alert("hello");
                      jobDetail(
                        event,
                        this,
                        data["created_at"],
                        data["requirements"],
                        data["benefits"],
                        data["memo"],
                        data["photos"]
                      );
                    });

                    $(row).addClass("tb-row");
                    $("td:eq(0)", row).html(`<img class = "check-icon"
                                      src = "img/1.png"
                                      onclick = "addToSelected(event, '${data[0]}')" />`);

                    $("td:eq(1)", row).text(`${data["job_id"]}`);
                    $("td:eq(2)", row).text(`${data["job_title"]}`);
                    $("td:eq(3)", row).text(`${data["company_name"]}`);
                    $("td:eq(4)", row).text(
                      `${data["job_type"]}-${data["employment_type"]}`
                    );
                    $("td:eq(5)", row).text(`${data["wage"]}`);
                    $("td:eq(6)", row).text(`${data["overtime"]}`);
                    $("td:eq(7)", row).text(`${data["holidays"]}`);
                    $("td:eq(8)", row).text(`${data["working_hour"]}`);
                    $("td:eq(9)", row).text(`${data["breaktime"]}`);
                    $("td:eq(10)", row).text(`${data["location"]}`);
                    if (data["isavailable"] == 1) {
                      $("td:eq(11)", row).html(`&#9989;`);
                    } else {
                      $("td:eq(11)", row).html(`&#10060;`);
                    }
                    $("td:eq(12)", row).text(`${data["updated_at"]}`);

                    $("td:eq(13)", row).html(
                      `<a class="tb-btn tb-btn-edit" onclick="event.stopPropagation()" href="./jobedit.php?job_id=${data["job_id"]}"><i class="fa fa-pencil"></i></a>`
                    );

                    $("td:eq(14)", row).html(
                      `<button class="tb-btn tb-btn-delete" onclick="setCurrentJobDel(event,'${data["job_id"]}')" data-toggle="modal" data-target="#deletingModal"><i class="fa fa-trash"></button>`
                    );
                    // }
                  },
                  order: [[12, "desc"]],
                  columnDefs: [{ orderable: false, targets: [0, 13, 14] }],
                  // columnDefs: [{
                  //         target: 1,
                  //         data: `${data[0]}`,
                  // ]
                });
              }
            },
            error: function (jqXHR, textStatus, errorThrown) {},
          });
        }
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
      action: function (e, dt, node, config) {
        // alert("Button activated");
        if(isAllChecked){
          if (window.confirm("Are you sure to delete all?")) {
            // They clicked Yes
            $.ajax({
              url: "./backend/deleteSelectedJob.php",
              type: "POST",
              success: function (data, textStatus, jqXHR) {
                //data - response from server
                selected = [];
                var data = jQuery.parseJSON(data);
                console.log(data.en_data);
                // eng version destroy
                $("#enDT").DataTable().destroy();
                // mm version destroy
                $("#mmDT").DataTable().destroy();
                // jp version destroy
                $("#jpDT").DataTable().destroy();
                // download update
                buttons_en.splice(1, 1, updatedDownloadBtn);
                buttons_mm.splice(1, 1, updatedDownloadBtn);
                buttons_jp.splice(1, 1, updatedDownloadBtn);

                if (data) {
                  // en table reinitialize
                  table_en = $("#enDT").dataTable({
                    aaData: data.en_data,
                    dom:
                      "<'row' <'col-sm-12 col-md-2'l> <'col-md-8 col-sm-12 text-center'B> <'col-sm-12 col-md-2'f> >" +
                      "<'row'<'col-sm-12'tr>>" +
                      "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    // dom : '<"mybg"fB><"bottom"lrtpi>',
                    buttons: buttons_en,
                    rowCallback: function (row, data) {
                      // if (data[4] == "A") {
                      $(row).on("click", function (event) {
                        // alert("hello");
                        jobDetail(
                          event,
                          this,
                          data["created_at"],
                          data["requirements"],
                          data["benefits"],
                          data["memo"],
                          data["photos"]
                        );
                      });

                      $(row).addClass("tb-row");
                      $("td:eq(0)", row).html(`<img class = "check-icon"
                        src = "img/1.png"
                        onclick = "addToSelected(event, '${data[0]}')" />`);

                      $("td:eq(1)", row).text(`${data["job_id"]}`);
                      $("td:eq(2)", row).text(`${data["job_title"]}`);
                      $("td:eq(3)", row).text(`${data["company_name"]}`);
                      $("td:eq(4)", row).text(
                        `${data["job_type"]}-${data["employment_type"]}`
                      );
                      $("td:eq(5)", row).text(`${data["wage"]}`);
                      $("td:eq(6)", row).text(`${data["overtime"]}`);
                      $("td:eq(7)", row).text(`${data["holidays"]}`);
                      $("td:eq(8)", row).text(`${data["working_hour"]}`);
                      $("td:eq(9)", row).text(`${data["breaktime"]}`);
                      $("td:eq(10)", row).text(`${data["location"]}`);
                      if (data["isavailable"] == 1) {
                        $("td:eq(11)", row).html(`&#9989;`);
                      } else {
                        $("td:eq(11)", row).html(`&#10060;`);
                      }
                      $("td:eq(12)", row).text(`${data["updated_at"]}`);

                      $("td:eq(13)", row).html(
                        `<a class="tb-btn tb-btn-edit" onclick="event.stopPropagation()" href="./jobedit.php?job_id=${data["job_id"]}"><i class="fa fa-pencil"></i></a>`
                      );

                      $("td:eq(14)", row).html(
                        `<button class="tb-btn tb-btn-delete" onclick="setCurrentJobDel(event,'${data["job_id"]}')" data-toggle="modal" data-target="#deletingModal"><i class="fa fa-trash"></button>`
                      );
                      // }
                    },
                    order: [[12, "desc"]],
                    columnDefs: [{ orderable: false, targets: [0, 13, 14] }],
                    // columnDefs: [{
                    //         target: 1,
                    //         data: `${data[0]}`,
                    // ]
                  });
                  // en table reinitialize
                  table_mm = $("#mmDT").dataTable({
                    aaData: data.mm_data,
                    dom:
                      "<'row' <'col-sm-12 col-md-2'l> <'col-md-8 col-sm-12 text-center'B> <'col-sm-12 col-md-2'f> >" +
                      "<'row'<'col-sm-12'tr>>" +
                      "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    // dom : '<"mybg"fB><"bottom"lrtpi>',
                    buttons: buttons_mm,
                    rowCallback: function (row, data) {
                      // if (data[4] == "A") {
                      $(row).on("click", function (event) {
                        // alert("hello");
                        jobDetail(
                          event,
                          this,
                          data["created_at"],
                          data["requirements"],
                          data["benefits"],
                          data["memo"],
                          data["photos"]
                        );
                      });

                      $(row).addClass("tb-row");
                      $("td:eq(0)", row).html(`<img class = "check-icon"
                        src = "img/1.png"
                        onclick = "addToSelected(event, '${data[0]}')" />`);

                      $("td:eq(1)", row).text(`${data["job_id"]}`);
                      $("td:eq(2)", row).text(`${data["job_title"]}`);
                      $("td:eq(3)", row).text(`${data["company_name"]}`);
                      $("td:eq(4)", row).text(
                        `${data["job_type"]}-${data["employment_type"]}`
                      );
                      $("td:eq(5)", row).text(`${data["wage"]}`);
                      $("td:eq(6)", row).text(`${data["overtime"]}`);
                      $("td:eq(7)", row).text(`${data["holidays"]}`);
                      $("td:eq(8)", row).text(`${data["working_hour"]}`);
                      $("td:eq(9)", row).text(`${data["breaktime"]}`);
                      $("td:eq(10)", row).text(`${data["location"]}`);
                      if (data["isavailable"] == 1) {
                        $("td:eq(11)", row).html(`&#9989;`);
                      } else {
                        $("td:eq(11)", row).html(`&#10060;`);
                      }
                      $("td:eq(12)", row).text(`${data["updated_at"]}`);

                      $("td:eq(13)", row).html(
                        `<a class="tb-btn tb-btn-edit" onclick="event.stopPropagation()" href="./jobedit.php?job_id=${data["job_id"]}"><i class="fa fa-pencil"></i></a>`
                      );

                      $("td:eq(14)", row).html(
                        `<button class="tb-btn tb-btn-delete" onclick="setCurrentJobDel(event,'${data["job_id"]}')" data-toggle="modal" data-target="#deletingModal"><i class="fa fa-trash"></button>`
                      );
                      // }
                    },
                    order: [[12, "desc"]],
                    columnDefs: [{ orderable: false, targets: [0, 13, 14] }],
                    // columnDefs: [{
                    //         target: 1,
                    //         data: `${data[0]}`,
                    // ]
                  });
                  // jp table reinitialize
                  table_jp = $("#jpDT").dataTable({
                    aaData: data.jp_data,
                    dom:
                      "<'row' <'col-sm-12 col-md-2'l> <'col-md-8 col-sm-12 text-center'B> <'col-sm-12 col-md-2'f> >" +
                      "<'row'<'col-sm-12'tr>>" +
                      "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    // dom : '<"mybg"fB><"bottom"lrtpi>',
                    buttons: buttons_jp,
                    rowCallback: function (row, data) {
                      // if (data[4] == "A") {
                      $(row).on("click", function (event) {
                        // alert("hello");
                        jobDetail(
                          event,
                          this,
                          data["created_at"],
                          data["requirements"],
                          data["benefits"],
                          data["memo"],
                          data["photos"]
                        );
                      });

                      $(row).addClass("tb-row");
                      $("td:eq(0)", row).html(`<img class = "check-icon"
                        src = "img/1.png"
                        onclick = "addToSelected(event, '${data[0]}')" />`);

                      $("td:eq(1)", row).text(`${data["job_id"]}`);
                      $("td:eq(2)", row).text(`${data["job_title"]}`);
                      $("td:eq(3)", row).text(`${data["company_name"]}`);
                      $("td:eq(4)", row).text(
                        `${data["job_type"]}-${data["employment_type"]}`
                      );
                      $("td:eq(5)", row).text(`${data["wage"]}`);
                      $("td:eq(6)", row).text(`${data["overtime"]}`);
                      $("td:eq(7)", row).text(`${data["holidays"]}`);
                      $("td:eq(8)", row).text(`${data["working_hour"]}`);
                      $("td:eq(9)", row).text(`${data["breaktime"]}`);
                      $("td:eq(10)", row).text(`${data["location"]}`);
                      if (data["isavailable"] == 1) {
                        $("td:eq(11)", row).html(`&#9989;`);
                      } else {
                        $("td:eq(11)", row).html(`&#10060;`);
                      }
                      $("td:eq(12)", row).text(`${data["updated_at"]}`);

                      $("td:eq(13)", row).html(
                        `<a class="tb-btn tb-btn-edit" onclick="event.stopPropagation()" href="./jobedit.php?job_id=${data["job_id"]}"><i class="fa fa-pencil"></i></a>`
                      );

                      $("td:eq(14)", row).html(
                        `<button class="tb-btn tb-btn-delete" onclick="setCurrentJobDel(event,'${data["job_id"]}')" data-toggle="modal" data-target="#deletingModal"><i class="fa fa-trash"></button>`
                      );
                      // }
                    },
                    order: [[12, "desc"]],
                    columnDefs: [{ orderable: false, targets: [0, 13, 14] }],
                    // columnDefs: [{
                    //         target: 1,
                    //         data: `${data[0]}`,
                    // ]
                  });
                }
              },
              error: function (jqXHR, textStatus, errorThrown) {},
            });
          } else {
            // They clicked no
          }
        }else{
          if (selected.length <= 0) {
            alert("please select at least one row to delete");
          } else {
            if (window.confirm("Are you sure to delete?")) {
              // They clicked Yes
              $.ajax({
                url: "./backend/deleteSelectedJob.php",
                type: "POST",
                data: {
                  job_ids: selected,
                },
                success: function (data, textStatus, jqXHR) {
                  //data - response from server
                  selected = [];
                  var data = jQuery.parseJSON(data);
                  console.log(data.en_data);
                  // eng version destroy
                  $("#enDT").DataTable().destroy();
                  // mm version destroy
                  $("#mmDT").DataTable().destroy();
                  // jp version destroy
                  $("#jpDT").DataTable().destroy();
                  // download update
                  buttons_en.splice(1, 1, updatedDownloadBtn);
                  buttons_mm.splice(1, 1, updatedDownloadBtn);
                  buttons_jp.splice(1, 1, updatedDownloadBtn);
  
                  if (data) {
                    // en table reinitialize
                    table_en = $("#enDT").dataTable({
                      aaData: data.en_data,
                      dom:
                        "<'row' <'col-sm-12 col-md-2'l> <'col-md-8 col-sm-12 text-center'B> <'col-sm-12 col-md-2'f> >" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                      // dom : '<"mybg"fB><"bottom"lrtpi>',
                      buttons: buttons_en,
                      rowCallback: function (row, data) {
                        // if (data[4] == "A") {
                        $(row).on("click", function (event) {
                          // alert("hello");
                          jobDetail(
                            event,
                            this,
                            data["created_at"],
                            data["requirements"],
                            data["benefits"],
                            data["memo"],
                            data["photos"]
                          );
                        });
  
                        $(row).addClass("tb-row");
                        $("td:eq(0)", row).html(`<img class = "check-icon"
                          src = "img/1.png"
                          onclick = "addToSelected(event, '${data[0]}')" />`);
  
                        $("td:eq(1)", row).text(`${data["job_id"]}`);
                        $("td:eq(2)", row).text(`${data["job_title"]}`);
                        $("td:eq(3)", row).text(`${data["company_name"]}`);
                        $("td:eq(4)", row).text(
                          `${data["job_type"]}-${data["employment_type"]}`
                        );
                        $("td:eq(5)", row).text(`${data["wage"]}`);
                        $("td:eq(6)", row).text(`${data["overtime"]}`);
                        $("td:eq(7)", row).text(`${data["holidays"]}`);
                        $("td:eq(8)", row).text(`${data["working_hour"]}`);
                        $("td:eq(9)", row).text(`${data["breaktime"]}`);
                        $("td:eq(10)", row).text(`${data["location"]}`);
                        if (data["isavailable"] == 1) {
                          $("td:eq(11)", row).html(`&#9989;`);
                        } else {
                          $("td:eq(11)", row).html(`&#10060;`);
                        }
                        $("td:eq(12)", row).text(`${data["updated_at"]}`);
  
                        $("td:eq(13)", row).html(
                          `<a class="tb-btn tb-btn-edit" onclick="event.stopPropagation()" href="./jobedit.php?job_id=${data["job_id"]}"><i class="fa fa-pencil"></i></a>`
                        );
  
                        $("td:eq(14)", row).html(
                          `<button class="tb-btn tb-btn-delete" onclick="setCurrentJobDel(event,'${data["job_id"]}')" data-toggle="modal" data-target="#deletingModal"><i class="fa fa-trash"></button>`
                        );
                        // }
                      },
                      order: [[12, "desc"]],
                      columnDefs: [{ orderable: false, targets: [0, 13, 14] }],
                      // columnDefs: [{
                      //         target: 1,
                      //         data: `${data[0]}`,
                      // ]
                    });
                    // en table reinitialize
                    table_mm = $("#mmDT").dataTable({
                      aaData: data.mm_data,
                      dom:
                        "<'row' <'col-sm-12 col-md-2'l> <'col-md-8 col-sm-12 text-center'B> <'col-sm-12 col-md-2'f> >" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                      // dom : '<"mybg"fB><"bottom"lrtpi>',
                      buttons: buttons_mm,
                      rowCallback: function (row, data) {
                        // if (data[4] == "A") {
                        $(row).on("click", function (event) {
                          // alert("hello");
                          jobDetail(
                            event,
                            this,
                            data["created_at"],
                            data["requirements"],
                            data["benefits"],
                            data["memo"],
                            data["photos"]
                          );
                        });
  
                        $(row).addClass("tb-row");
                        $("td:eq(0)", row).html(`<img class = "check-icon"
                          src = "img/1.png"
                          onclick = "addToSelected(event, '${data[0]}')" />`);
  
                        $("td:eq(1)", row).text(`${data["job_id"]}`);
                        $("td:eq(2)", row).text(`${data["job_title"]}`);
                        $("td:eq(3)", row).text(`${data["company_name"]}`);
                        $("td:eq(4)", row).text(
                          `${data["job_type"]}-${data["employment_type"]}`
                        );
                        $("td:eq(5)", row).text(`${data["wage"]}`);
                        $("td:eq(6)", row).text(`${data["overtime"]}`);
                        $("td:eq(7)", row).text(`${data["holidays"]}`);
                        $("td:eq(8)", row).text(`${data["working_hour"]}`);
                        $("td:eq(9)", row).text(`${data["breaktime"]}`);
                        $("td:eq(10)", row).text(`${data["location"]}`);
                        if (data["isavailable"] == 1) {
                          $("td:eq(11)", row).html(`&#9989;`);
                        } else {
                          $("td:eq(11)", row).html(`&#10060;`);
                        }
                        $("td:eq(12)", row).text(`${data["updated_at"]}`);
  
                        $("td:eq(13)", row).html(
                          `<a class="tb-btn tb-btn-edit" onclick="event.stopPropagation()" href="./jobedit.php?job_id=${data["job_id"]}"><i class="fa fa-pencil"></i></a>`
                        );
  
                        $("td:eq(14)", row).html(
                          `<button class="tb-btn tb-btn-delete" onclick="setCurrentJobDel(event,'${data["job_id"]}')" data-toggle="modal" data-target="#deletingModal"><i class="fa fa-trash"></button>`
                        );
                        // }
                      },
                      order: [[12, "desc"]],
                      columnDefs: [{ orderable: false, targets: [0, 13, 14] }],
                      // columnDefs: [{
                      //         target: 1,
                      //         data: `${data[0]}`,
                      // ]
                    });
                    // jp table reinitialize
                    table_jp = $("#jpDT").dataTable({
                      aaData: data.jp_data,
                      dom:
                        "<'row' <'col-sm-12 col-md-2'l> <'col-md-8 col-sm-12 text-center'B> <'col-sm-12 col-md-2'f> >" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                      // dom : '<"mybg"fB><"bottom"lrtpi>',
                      buttons: buttons_jp,
                      rowCallback: function (row, data) {
                        // if (data[4] == "A") {
                        $(row).on("click", function (event) {
                          // alert("hello");
                          jobDetail(
                            event,
                            this,
                            data["created_at"],
                            data["requirements"],
                            data["benefits"],
                            data["memo"],
                            data["photos"]
                          );
                        });
  
                        $(row).addClass("tb-row");
                        $("td:eq(0)", row).html(`<img class = "check-icon"
                          src = "img/1.png"
                          onclick = "addToSelected(event, '${data[0]}')" />`);
  
                        $("td:eq(1)", row).text(`${data["job_id"]}`);
                        $("td:eq(2)", row).text(`${data["job_title"]}`);
                        $("td:eq(3)", row).text(`${data["company_name"]}`);
                        $("td:eq(4)", row).text(
                          `${data["job_type"]}-${data["employment_type"]}`
                        );
                        $("td:eq(5)", row).text(`${data["wage"]}`);
                        $("td:eq(6)", row).text(`${data["overtime"]}`);
                        $("td:eq(7)", row).text(`${data["holidays"]}`);
                        $("td:eq(8)", row).text(`${data["working_hour"]}`);
                        $("td:eq(9)", row).text(`${data["breaktime"]}`);
                        $("td:eq(10)", row).text(`${data["location"]}`);
                        if (data["isavailable"] == 1) {
                          $("td:eq(11)", row).html(`&#9989;`);
                        } else {
                          $("td:eq(11)", row).html(`&#10060;`);
                        }
                        $("td:eq(12)", row).text(`${data["updated_at"]}`);
  
                        $("td:eq(13)", row).html(
                          `<a class="tb-btn tb-btn-edit" onclick="event.stopPropagation()" href="./jobedit.php?job_id=${data["job_id"]}"><i class="fa fa-pencil"></i></a>`
                        );
  
                        $("td:eq(14)", row).html(
                          `<button class="tb-btn tb-btn-delete" onclick="setCurrentJobDel(event,'${data["job_id"]}')" data-toggle="modal" data-target="#deletingModal"><i class="fa fa-trash"></button>`
                        );
                        // }
                      },
                      order: [[12, "desc"]],
                      columnDefs: [{ orderable: false, targets: [0, 13, 14] }],
                      // columnDefs: [{
                      //         target: 1,
                      //         data: `${data[0]}`,
                      // ]
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
    // {
    //   extend: "excelHtml5",
    //   text: '<i class="fa fa-download"></i>',
    //   titleAttr: "Excel",
    //   exportOptions: {
    //     modifier: {
    //       // DataTables core
    //       order: "index", // 'current', 'applied',
    //       //'index', 'original'
    //       page: "all", // 'all', 'current'
    //       search: "none", // 'none', 'applied', 'removed'
    //     },
    //     columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
    //   },
    // },
  ];
  let buttons_mm = [
    {
      text: '<i class="fa fa-files-o"></i>',
      action: function (e, dt, node, config) {
        // alert("Button activated");
        // console.log(selected);
        if (selected.length <= 0) {
          alert("please select at least one row to copy");
        } else {
          $.ajax({
            url: "./backend/newJobCopy.php",
            type: "POST",
            data: {
              job_ids: selected,
            },
            success: function (data, textStatus, jqXHR) {
              //data - response from server
              // console.log("success");
              selected = [];
              var data = jQuery.parseJSON(data);
              // eng version destroy
              $("#enDT").DataTable().destroy();
              // mm version destroy
              $("#mmDT").DataTable().destroy();
              // jp version destroy
              $("#jpDT").DataTable().destroy();

              // download update
              buttons_en.splice(1, 1, updatedDownloadBtn);
              buttons_mm.splice(1, 1, updatedDownloadBtn);
              buttons_jp.splice(1, 1, updatedDownloadBtn);

              if (data) {
                // en table reinitialize
                table_en = $("#enDT").dataTable({
                  aaData: data.en_data,
                  dom:
                    "<'row' <'col-sm-12 col-md-2'l> <'col-md-8 col-sm-12 text-center'B> <'col-sm-12 col-md-2'f> >" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                  // dom : '<"mybg"fB><"bottom"lrtpi>',
                  buttons: buttons_en,
                  rowCallback: function (row, data) {
                    // if (data[4] == "A") {
                    $(row).on("click", function (event) {
                      // alert("hello");
                      jobDetail(
                        event,
                        this,
                        data["created_at"],
                        data["requirements"],
                        data["benefits"],
                        data["memo"],
                        data["photos"]
                      );
                    });

                    $(row).addClass("tb-row");
                    $("td:eq(0)", row).html(`<img class = "check-icon"
                                      src = "img/1.png"
                                      onclick = "addToSelected(event, '${data[0]}')" />`);

                    $("td:eq(1)", row).text(`${data["job_id"]}`);
                    $("td:eq(2)", row).text(`${data["job_title"]}`);
                    $("td:eq(3)", row).text(`${data["company_name"]}`);
                    $("td:eq(4)", row).text(
                      `${data["job_type"]}-${data["employment_type"]}`
                    );
                    $("td:eq(5)", row).text(`${data["wage"]}`);
                    $("td:eq(6)", row).text(`${data["overtime"]}`);
                    $("td:eq(7)", row).text(`${data["holidays"]}`);
                    $("td:eq(8)", row).text(`${data["working_hour"]}`);
                    $("td:eq(9)", row).text(`${data["breaktime"]}`);
                    $("td:eq(10)", row).text(`${data["location"]}`);
                    if (data["isavailable"] == 1) {
                      $("td:eq(11)", row).html(`&#9989;`);
                    } else {
                      $("td:eq(11)", row).html(`&#10060;`);
                    }
                    $("td:eq(12)", row).text(`${data["updated_at"]}`);

                    $("td:eq(13)", row).html(
                      `<a class="tb-btn tb-btn-edit" onclick="event.stopPropagation()" href="./jobedit.php?job_id=${data["job_id"]}"><i class="fa fa-pencil"></i></a>`
                    );

                    $("td:eq(14)", row).html(
                      `<button class="tb-btn tb-btn-delete" onclick="setCurrentJobDel(event,'${data["job_id"]}')" data-toggle="modal" data-target="#deletingModal"><i class="fa fa-trash"></button>`
                    );
                    // }
                  },
                  order: [[12, "desc"]],
                  columnDefs: [{ orderable: false, targets: [0, 13, 14] }],
                  // columnDefs: [{
                  //         target: 1,
                  //         data: `${data[0]}`,
                  // ]
                });
                // en table reinitialize
                table_mm = $("#mmDT").dataTable({
                  aaData: data.mm_data,
                  dom:
                    "<'row' <'col-sm-12 col-md-2'l> <'col-md-8 col-sm-12 text-center'B> <'col-sm-12 col-md-2'f> >" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                  // dom : '<"mybg"fB><"bottom"lrtpi>',
                  buttons: buttons_mm,
                  rowCallback: function (row, data) {
                    // if (data[4] == "A") {
                    $(row).on("click", function (event) {
                      // alert("hello");
                      jobDetail(
                        event,
                        this,
                        data["created_at"],
                        data["requirements"],
                        data["benefits"],
                        data["memo"],
                        data["photos"]
                      );
                    });

                    $(row).addClass("tb-row");
                    $("td:eq(0)", row).html(`<img class = "check-icon"
                                      src = "img/1.png"
                                      onclick = "addToSelected(event, '${data[0]}')" />`);

                    $("td:eq(1)", row).text(`${data["job_id"]}`);
                    $("td:eq(2)", row).text(`${data["job_title"]}`);
                    $("td:eq(3)", row).text(`${data["company_name"]}`);
                    $("td:eq(4)", row).text(
                      `${data["job_type"]}-${data["employment_type"]}`
                    );
                    $("td:eq(5)", row).text(`${data["wage"]}`);
                    $("td:eq(6)", row).text(`${data["overtime"]}`);
                    $("td:eq(7)", row).text(`${data["holidays"]}`);
                    $("td:eq(8)", row).text(`${data["working_hour"]}`);
                    $("td:eq(9)", row).text(`${data["breaktime"]}`);
                    $("td:eq(10)", row).text(`${data["location"]}`);
                    if (data["isavailable"] == 1) {
                      $("td:eq(11)", row).html(`&#9989;`);
                    } else {
                      $("td:eq(11)", row).html(`&#10060;`);
                    }
                    $("td:eq(12)", row).text(`${data["updated_at"]}`);

                    $("td:eq(13)", row).html(
                      `<a class="tb-btn tb-btn-edit" onclick="event.stopPropagation()" href="./jobedit.php?job_id=${data["job_id"]}"><i class="fa fa-pencil"></i></a>`
                    );

                    $("td:eq(14)", row).html(
                      `<button class="tb-btn tb-btn-delete" onclick="setCurrentJobDel(event,'${data["job_id"]}')" data-toggle="modal" data-target="#deletingModal"><i class="fa fa-trash"></button>`
                    );
                    // }
                  },
                  order: [[12, "desc"]],
                  columnDefs: [{ orderable: false, targets: [0, 13, 14] }],
                  // columnDefs: [{
                  //         target: 1,
                  //         data: `${data[0]}`,
                  // ]
                });
                // jp table reinitialize
                table_jp = $("#jpDT").dataTable({
                  aaData: data.jp_data,
                  dom:
                    "<'row' <'col-sm-12 col-md-2'l> <'col-md-8 col-sm-12 text-center'B> <'col-sm-12 col-md-2'f> >" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                  // dom : '<"mybg"fB><"bottom"lrtpi>',
                  buttons: buttons_jp,
                  rowCallback: function (row, data) {
                    // if (data[4] == "A") {
                    $(row).on("click", function (event) {
                      // alert("hello");
                      jobDetail(
                        event,
                        this,
                        data["created_at"],
                        data["requirements"],
                        data["benefits"],
                        data["memo"],
                        data["photos"]
                      );
                    });

                    $(row).addClass("tb-row");
                    $("td:eq(0)", row).html(`<img class = "check-icon"
                                      src = "img/1.png"
                                      onclick = "addToSelected(event, '${data[0]}')" />`);

                    $("td:eq(1)", row).text(`${data["job_id"]}`);
                    $("td:eq(2)", row).text(`${data["job_title"]}`);
                    $("td:eq(3)", row).text(`${data["company_name"]}`);
                    $("td:eq(4)", row).text(
                      `${data["job_type"]}-${data["employment_type"]}`
                    );
                    $("td:eq(5)", row).text(`${data["wage"]}`);
                    $("td:eq(6)", row).text(`${data["overtime"]}`);
                    $("td:eq(7)", row).text(`${data["holidays"]}`);
                    $("td:eq(8)", row).text(`${data["working_hour"]}`);
                    $("td:eq(9)", row).text(`${data["breaktime"]}`);
                    $("td:eq(10)", row).text(`${data["location"]}`);
                    if (data["isavailable"] == 1) {
                      $("td:eq(11)", row).html(`&#9989;`);
                    } else {
                      $("td:eq(11)", row).html(`&#10060;`);
                    }
                    $("td:eq(12)", row).text(`${data["updated_at"]}`);

                    $("td:eq(13)", row).html(
                      `<a class="tb-btn tb-btn-edit" onclick="event.stopPropagation()" href="./jobedit.php?job_id=${data["job_id"]}"><i class="fa fa-pencil"></i></a>`
                    );

                    $("td:eq(14)", row).html(
                      `<button class="tb-btn tb-btn-delete" onclick="setCurrentJobDel(event,'${data["job_id"]}')" data-toggle="modal" data-target="#deletingModal"><i class="fa fa-trash"></button>`
                    );
                    // }
                  },
                  order: [[12, "desc"]],
                  columnDefs: [{ orderable: false, targets: [0, 13, 14] }],
                  // columnDefs: [{
                  //         target: 1,
                  //         data: `${data[0]}`,
                  // ]
                });
              }
            },
            error: function (jqXHR, textStatus, errorThrown) {},
          });
        }
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
      action: function (e, dt, node, config) {
        // alert("Button activated");

        if(isAllChecked){
          if (window.confirm("Are you sure to delete all?")) {
            // They clicked Yes
            $.ajax({
              url: "./backend/deleteSelectedJob.php",
              type: "POST",
              success: function (data, textStatus, jqXHR) {
                //data - response from server
                selected = [];
                var data = jQuery.parseJSON(data);
                // eng version destroy
                $("#enDT").DataTable().destroy();
                // mm version destroy
                $("#mmDT").DataTable().destroy();
                // jp version destroy
                $("#mmDT").DataTable().destroy();

                // download update
                buttons_en.splice(1, 1, updatedDownloadBtn);
                buttons_mm.splice(1, 1, updatedDownloadBtn);
                buttons_jp.splice(1, 1, updatedDownloadBtn);

                if (data) {
                  // en table reinitialize
                  table_en = $("#enDT").dataTable({
                    aaData: data.en_data,
                    dom:
                      "<'row' <'col-sm-12 col-md-2'l> <'col-md-8 col-sm-12 text-center'B> <'col-sm-12 col-md-2'f> >" +
                      "<'row'<'col-sm-12'tr>>" +
                      "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    // dom : '<"mybg"fB><"bottom"lrtpi>',
                    buttons: buttons_en,
                    rowCallback: function (row, data) {
                      // if (data[4] == "A") {
                      $(row).on("click", function (event) {
                        // alert("hello");
                        jobDetail(
                          event,
                          this,
                          data["created_at"],
                          data["requirements"],
                          data["benefits"],
                          data["memo"],
                          data["photos"]
                        );
                      });

                      $(row).addClass("tb-row");
                      $("td:eq(0)", row).html(`<img class = "check-icon"
                                        src = "img/1.png"
                                        onclick = "addToSelected(event, '${data[0]}')" />`);

                      $("td:eq(1)", row).text(`${data["job_id"]}`);
                      $("td:eq(2)", row).text(`${data["job_title"]}`);
                      $("td:eq(3)", row).text(`${data["company_name"]}`);
                      $("td:eq(4)", row).text(
                        `${data["job_type"]}-${data["employment_type"]}`
                      );
                      $("td:eq(5)", row).text(`${data["wage"]}`);
                      $("td:eq(6)", row).text(`${data["overtime"]}`);
                      $("td:eq(7)", row).text(`${data["holidays"]}`);
                      $("td:eq(8)", row).text(`${data["working_hour"]}`);
                      $("td:eq(9)", row).text(`${data["breaktime"]}`);
                      $("td:eq(10)", row).text(`${data["location"]}`);
                      if (data["isavailable"] == 1) {
                        $("td:eq(11)", row).html(`&#9989;`);
                      } else {
                        $("td:eq(11)", row).html(`&#10060;`);
                      }
                      $("td:eq(12)", row).text(`${data["updated_at"]}`);

                      $("td:eq(13)", row).html(
                        `<a class="tb-btn tb-btn-edit" onclick="event.stopPropagation()" href="./jobedit.php?job_id=${data["job_id"]}"><i class="fa fa-pencil"></i></a>`
                      );

                      $("td:eq(14)", row).html(
                        `<button class="tb-btn tb-btn-delete" onclick="setCurrentJobDel(event,'${data["job_id"]}')" data-toggle="modal" data-target="#deletingModal"><i class="fa fa-trash"></button>`
                      );
                      // }
                    },
                    order: [[12, "desc"]],
                    columnDefs: [{ orderable: false, targets: [0, 13, 14] }],
                    // columnDefs: [{
                    //         target: 1,
                    //         data: `${data[0]}`,
                    // ]
                  });
                  // en table reinitialize
                  table_mm = $("#mmDT").dataTable({
                    aaData: data.mm_data,
                    dom:
                      "<'row' <'col-sm-12 col-md-2'l> <'col-md-8 col-sm-12 text-center'B> <'col-sm-12 col-md-2'f> >" +
                      "<'row'<'col-sm-12'tr>>" +
                      "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    // dom : '<"mybg"fB><"bottom"lrtpi>',
                    buttons: buttons_mm,
                    rowCallback: function (row, data) {
                      // if (data[4] == "A") {
                      $(row).on("click", function (event) {
                        // alert("hello");
                        jobDetail(
                          event,
                          this,
                          data["created_at"],
                          data["requirements"],
                          data["benefits"],
                          data["memo"],
                          data["photos"]
                        );
                      });

                      $(row).addClass("tb-row");
                      $("td:eq(0)", row).html(`<img class = "check-icon"
                                        src = "img/1.png"
                                        onclick = "addToSelected(event, '${data[0]}')" />`);

                      $("td:eq(1)", row).text(`${data["job_id"]}`);
                      $("td:eq(2)", row).text(`${data["job_title"]}`);
                      $("td:eq(3)", row).text(`${data["company_name"]}`);
                      $("td:eq(4)", row).text(
                        `${data["job_type"]}-${data["employment_type"]}`
                      );
                      $("td:eq(5)", row).text(`${data["wage"]}`);
                      $("td:eq(6)", row).text(`${data["overtime"]}`);
                      $("td:eq(7)", row).text(`${data["holidays"]}`);
                      $("td:eq(8)", row).text(`${data["working_hour"]}`);
                      $("td:eq(9)", row).text(`${data["breaktime"]}`);
                      $("td:eq(10)", row).text(`${data["location"]}`);
                      if (data["isavailable"] == 1) {
                        $("td:eq(11)", row).html(`&#9989;`);
                      } else {
                        $("td:eq(11)", row).html(`&#10060;`);
                      }
                      $("td:eq(12)", row).text(`${data["updated_at"]}`);

                      $("td:eq(13)", row).html(
                        `<a class="tb-btn tb-btn-edit" onclick="event.stopPropagation()" href="./jobedit.php?job_id=${data["job_id"]}"><i class="fa fa-pencil"></i></a>`
                      );

                      $("td:eq(14)", row).html(
                        `<button class="tb-btn tb-btn-delete" onclick="setCurrentJobDel(event,'${data["job_id"]}')" data-toggle="modal" data-target="#deletingModal"><i class="fa fa-trash"></button>`
                      );
                      // }
                    },
                    order: [[12, "desc"]],
                    columnDefs: [{ orderable: false, targets: [0, 13, 14] }],
                    // columnDefs: [{
                    //         target: 1,
                    //         data: `${data[0]}`,
                    // ]
                  });
                  // jp table reinitialize
                  table_jp = $("#jpDT").dataTable({
                    aaData: data.jp_data,
                    dom:
                      "<'row' <'col-sm-12 col-md-2'l> <'col-md-8 col-sm-12 text-center'B> <'col-sm-12 col-md-2'f> >" +
                      "<'row'<'col-sm-12'tr>>" +
                      "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    // dom : '<"mybg"fB><"bottom"lrtpi>',
                    buttons: buttons_jp,
                    rowCallback: function (row, data) {
                      // if (data[4] == "A") {
                      $(row).on("click", function (event) {
                        // alert("hello");
                        jobDetail(
                          event,
                          this,
                          data["created_at"],
                          data["requirements"],
                          data["benefits"],
                          data["memo"],
                          data["photos"]
                        );
                      });

                      $(row).addClass("tb-row");
                      $("td:eq(0)", row).html(`<img class = "check-icon"
                                        src = "img/1.png"
                                        onclick = "addToSelected(event, '${data[0]}')" />`);

                      $("td:eq(1)", row).text(`${data["job_id"]}`);
                      $("td:eq(2)", row).text(`${data["job_title"]}`);
                      $("td:eq(3)", row).text(`${data["company_name"]}`);
                      $("td:eq(4)", row).text(
                        `${data["job_type"]}-${data["employment_type"]}`
                      );
                      $("td:eq(5)", row).text(`${data["wage"]}`);
                      $("td:eq(6)", row).text(`${data["overtime"]}`);
                      $("td:eq(7)", row).text(`${data["holidays"]}`);
                      $("td:eq(8)", row).text(`${data["working_hour"]}`);
                      $("td:eq(9)", row).text(`${data["breaktime"]}`);
                      $("td:eq(10)", row).text(`${data["location"]}`);
                      if (data["isavailable"] == 1) {
                        $("td:eq(11)", row).html(`&#9989;`);
                      } else {
                        $("td:eq(11)", row).html(`&#10060;`);
                      }
                      $("td:eq(12)", row).text(`${data["updated_at"]}`);

                      $("td:eq(13)", row).html(
                        `<a class="tb-btn tb-btn-edit" onclick="event.stopPropagation()" href="./jobedit.php?job_id=${data["job_id"]}"><i class="fa fa-pencil"></i></a>`
                      );

                      $("td:eq(14)", row).html(
                        `<button class="tb-btn tb-btn-delete" onclick="setCurrentJobDel(event,'${data["job_id"]}')" data-toggle="modal" data-target="#deletingModal"><i class="fa fa-trash"></button>`
                      );
                      // }
                    },
                    order: [[12, "desc"]],
                    columnDefs: [{ orderable: false, targets: [0, 13, 14] }],
                    // columnDefs: [{
                    //         target: 1,
                    //         data: `${data[0]}`,
                    // ]
                  });
                }
              },
              error: function (jqXHR, textStatus, errorThrown) {},
            });
          } else {
            // They clicked no
          }
        }else{
          if (selected.length <= 0) {
            alert("Please select at least one row to delete");
          } else {
            if (window.confirm("Are you sure to delete?")) {
              // They clicked Yes
              $.ajax({
                url: "./backend/deleteSelectedJob.php",
                type: "POST",
                data: {
                  job_ids: selected,
                },
                success: function (data, textStatus, jqXHR) {
                  //data - response from server
                  selected = [];
                  var data = jQuery.parseJSON(data);
                  // eng version destroy
                  $("#enDT").DataTable().destroy();
                  // mm version destroy
                  $("#mmDT").DataTable().destroy();
                  // jp version destroy
                  $("#mmDT").DataTable().destroy();
  
                  // download update
                  buttons_en.splice(1, 1, updatedDownloadBtn);
                  buttons_mm.splice(1, 1, updatedDownloadBtn);
                  buttons_jp.splice(1, 1, updatedDownloadBtn);
  
                  if (data) {
                    // en table reinitialize
                    table_en = $("#enDT").dataTable({
                      aaData: data.en_data,
                      dom:
                        "<'row' <'col-sm-12 col-md-2'l> <'col-md-8 col-sm-12 text-center'B> <'col-sm-12 col-md-2'f> >" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                      // dom : '<"mybg"fB><"bottom"lrtpi>',
                      buttons: buttons_en,
                      rowCallback: function (row, data) {
                        // if (data[4] == "A") {
                        $(row).on("click", function (event) {
                          // alert("hello");
                          jobDetail(
                            event,
                            this,
                            data["created_at"],
                            data["requirements"],
                            data["benefits"],
                            data["memo"],
                            data["photos"]
                          );
                        });
  
                        $(row).addClass("tb-row");
                        $("td:eq(0)", row).html(`<img class = "check-icon"
                                          src = "img/1.png"
                                          onclick = "addToSelected(event, '${data[0]}')" />`);
  
                        $("td:eq(1)", row).text(`${data["job_id"]}`);
                        $("td:eq(2)", row).text(`${data["job_title"]}`);
                        $("td:eq(3)", row).text(`${data["company_name"]}`);
                        $("td:eq(4)", row).text(
                          `${data["job_type"]}-${data["employment_type"]}`
                        );
                        $("td:eq(5)", row).text(`${data["wage"]}`);
                        $("td:eq(6)", row).text(`${data["overtime"]}`);
                        $("td:eq(7)", row).text(`${data["holidays"]}`);
                        $("td:eq(8)", row).text(`${data["working_hour"]}`);
                        $("td:eq(9)", row).text(`${data["breaktime"]}`);
                        $("td:eq(10)", row).text(`${data["location"]}`);
                        if (data["isavailable"] == 1) {
                          $("td:eq(11)", row).html(`&#9989;`);
                        } else {
                          $("td:eq(11)", row).html(`&#10060;`);
                        }
                        $("td:eq(12)", row).text(`${data["updated_at"]}`);
  
                        $("td:eq(13)", row).html(
                          `<a class="tb-btn tb-btn-edit" onclick="event.stopPropagation()" href="./jobedit.php?job_id=${data["job_id"]}"><i class="fa fa-pencil"></i></a>`
                        );
  
                        $("td:eq(14)", row).html(
                          `<button class="tb-btn tb-btn-delete" onclick="setCurrentJobDel(event,'${data["job_id"]}')" data-toggle="modal" data-target="#deletingModal"><i class="fa fa-trash"></button>`
                        );
                        // }
                      },
                      order: [[12, "desc"]],
                      columnDefs: [{ orderable: false, targets: [0, 13, 14] }],
                      // columnDefs: [{
                      //         target: 1,
                      //         data: `${data[0]}`,
                      // ]
                    });
                    // en table reinitialize
                    table_mm = $("#mmDT").dataTable({
                      aaData: data.mm_data,
                      dom:
                        "<'row' <'col-sm-12 col-md-2'l> <'col-md-8 col-sm-12 text-center'B> <'col-sm-12 col-md-2'f> >" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                      // dom : '<"mybg"fB><"bottom"lrtpi>',
                      buttons: buttons_mm,
                      rowCallback: function (row, data) {
                        // if (data[4] == "A") {
                        $(row).on("click", function (event) {
                          // alert("hello");
                          jobDetail(
                            event,
                            this,
                            data["created_at"],
                            data["requirements"],
                            data["benefits"],
                            data["memo"],
                            data["photos"]
                          );
                        });
  
                        $(row).addClass("tb-row");
                        $("td:eq(0)", row).html(`<img class = "check-icon"
                                          src = "img/1.png"
                                          onclick = "addToSelected(event, '${data[0]}')" />`);
  
                        $("td:eq(1)", row).text(`${data["job_id"]}`);
                        $("td:eq(2)", row).text(`${data["job_title"]}`);
                        $("td:eq(3)", row).text(`${data["company_name"]}`);
                        $("td:eq(4)", row).text(
                          `${data["job_type"]}-${data["employment_type"]}`
                        );
                        $("td:eq(5)", row).text(`${data["wage"]}`);
                        $("td:eq(6)", row).text(`${data["overtime"]}`);
                        $("td:eq(7)", row).text(`${data["holidays"]}`);
                        $("td:eq(8)", row).text(`${data["working_hour"]}`);
                        $("td:eq(9)", row).text(`${data["breaktime"]}`);
                        $("td:eq(10)", row).text(`${data["location"]}`);
                        if (data["isavailable"] == 1) {
                          $("td:eq(11)", row).html(`&#9989;`);
                        } else {
                          $("td:eq(11)", row).html(`&#10060;`);
                        }
                        $("td:eq(12)", row).text(`${data["updated_at"]}`);
  
                        $("td:eq(13)", row).html(
                          `<a class="tb-btn tb-btn-edit" onclick="event.stopPropagation()" href="./jobedit.php?job_id=${data["job_id"]}"><i class="fa fa-pencil"></i></a>`
                        );
  
                        $("td:eq(14)", row).html(
                          `<button class="tb-btn tb-btn-delete" onclick="setCurrentJobDel(event,'${data["job_id"]}')" data-toggle="modal" data-target="#deletingModal"><i class="fa fa-trash"></button>`
                        );
                        // }
                      },
                      order: [[12, "desc"]],
                      columnDefs: [{ orderable: false, targets: [0, 13, 14] }],
                      // columnDefs: [{
                      //         target: 1,
                      //         data: `${data[0]}`,
                      // ]
                    });
                    // jp table reinitialize
                    table_jp = $("#jpDT").dataTable({
                      aaData: data.jp_data,
                      dom:
                        "<'row' <'col-sm-12 col-md-2'l> <'col-md-8 col-sm-12 text-center'B> <'col-sm-12 col-md-2'f> >" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                      // dom : '<"mybg"fB><"bottom"lrtpi>',
                      buttons: buttons_jp,
                      rowCallback: function (row, data) {
                        // if (data[4] == "A") {
                        $(row).on("click", function (event) {
                          // alert("hello");
                          jobDetail(
                            event,
                            this,
                            data["created_at"],
                            data["requirements"],
                            data["benefits"],
                            data["memo"],
                            data["photos"]
                          );
                        });
  
                        $(row).addClass("tb-row");
                        $("td:eq(0)", row).html(`<img class = "check-icon"
                                          src = "img/1.png"
                                          onclick = "addToSelected(event, '${data[0]}')" />`);
  
                        $("td:eq(1)", row).text(`${data["job_id"]}`);
                        $("td:eq(2)", row).text(`${data["job_title"]}`);
                        $("td:eq(3)", row).text(`${data["company_name"]}`);
                        $("td:eq(4)", row).text(
                          `${data["job_type"]}-${data["employment_type"]}`
                        );
                        $("td:eq(5)", row).text(`${data["wage"]}`);
                        $("td:eq(6)", row).text(`${data["overtime"]}`);
                        $("td:eq(7)", row).text(`${data["holidays"]}`);
                        $("td:eq(8)", row).text(`${data["working_hour"]}`);
                        $("td:eq(9)", row).text(`${data["breaktime"]}`);
                        $("td:eq(10)", row).text(`${data["location"]}`);
                        if (data["isavailable"] == 1) {
                          $("td:eq(11)", row).html(`&#9989;`);
                        } else {
                          $("td:eq(11)", row).html(`&#10060;`);
                        }
                        $("td:eq(12)", row).text(`${data["updated_at"]}`);
  
                        $("td:eq(13)", row).html(
                          `<a class="tb-btn tb-btn-edit" onclick="event.stopPropagation()" href="./jobedit.php?job_id=${data["job_id"]}"><i class="fa fa-pencil"></i></a>`
                        );
  
                        $("td:eq(14)", row).html(
                          `<button class="tb-btn tb-btn-delete" onclick="setCurrentJobDel(event,'${data["job_id"]}')" data-toggle="modal" data-target="#deletingModal"><i class="fa fa-trash"></button>`
                        );
                        // }
                      },
                      order: [[12, "desc"]],
                      columnDefs: [{ orderable: false, targets: [0, 13, 14] }],
                      // columnDefs: [{
                      //         target: 1,
                      //         data: `${data[0]}`,
                      // ]
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

  let buttons_jp = [
    {
      text: '<i class="fa fa-files-o"></i>',
      action: function (e, dt, node, config) {
        // alert("Button activated");
        // console.log(selected);
        if (selected.length <= 0) {
          alert("please select at least one row to copy");
        } else {
          $.ajax({
            url: "./backend/newJobCopy.php",
            type: "POST",
            data: {
              job_ids: selected,
            },
            success: function (data, textStatus, jqXHR) {
              //data - response from server
              // console.log("success");
              selected = [];
              var data = jQuery.parseJSON(data);
              // eng version destroy
              $("#enDT").DataTable().destroy();
              // mm version destroy
              $("#mmDT").DataTable().destroy();
              // jp version destroy
              $("#mmDT").DataTable().destroy();

              // download update
              buttons_en.splice(1, 1, updatedDownloadBtn);
              buttons_mm.splice(1, 1, updatedDownloadBtn);
              buttons_jp.splice(1, 1, updatedDownloadBtn);

              if (data) {
                // en table reinitialize
                table_en = $("#enDT").dataTable({
                  aaData: data.en_data,
                  dom:
                    "<'row' <'col-sm-12 col-md-2'l> <'col-md-8 col-sm-12 text-center'B> <'col-sm-12 col-md-2'f> >" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                  // dom : '<"mybg"fB><"bottom"lrtpi>',
                  buttons: buttons_en,
                  rowCallback: function (row, data) {
                    // if (data[4] == "A") {
                    $(row).on("click", function (event) {
                      // alert("hello");
                      jobDetail(
                        event,
                        this,
                        data["created_at"],
                        data["requirements"],
                        data["benefits"],
                        data["memo"],
                        data["photos"]
                      );
                    });

                    $(row).addClass("tb-row");
                    $("td:eq(0)", row).html(`<img class = "check-icon"
                                      src = "img/1.png"
                                      onclick = "addToSelected(event, '${data[0]}')" />`);

                    $("td:eq(1)", row).text(`${data["job_id"]}`);
                    $("td:eq(2)", row).text(`${data["job_title"]}`);
                    $("td:eq(3)", row).text(`${data["company_name"]}`);
                    $("td:eq(4)", row).text(
                      `${data["job_type"]}-${data["employment_type"]}`
                    );
                    $("td:eq(5)", row).text(`${data["wage"]}`);
                    $("td:eq(6)", row).text(`${data["overtime"]}`);
                    $("td:eq(7)", row).text(`${data["holidays"]}`);
                    $("td:eq(8)", row).text(`${data["working_hour"]}`);
                    $("td:eq(9)", row).text(`${data["breaktime"]}`);
                    $("td:eq(10)", row).text(`${data["location"]}`);
                    if (data["isavailable"] == 1) {
                      $("td:eq(11)", row).html(`&#9989;`);
                    } else {
                      $("td:eq(11)", row).html(`&#10060;`);
                    }
                    $("td:eq(12)", row).text(`${data["updated_at"]}`);

                    $("td:eq(13)", row).html(
                      `<a class="tb-btn tb-btn-edit" onclick="event.stopPropagation()" href="./jobedit.php?job_id=${data["job_id"]}"><i class="fa fa-pencil"></i></a>`
                    );

                    $("td:eq(14)", row).html(
                      `<button class="tb-btn tb-btn-delete" onclick="setCurrentJobDel(event,'${data["job_id"]}')" data-toggle="modal" data-target="#deletingModal"><i class="fa fa-trash"></button>`
                    );
                    // }
                  },
                  order: [[12, "desc"]],
                  columnDefs: [{ orderable: false, targets: [0, 13, 14] }],
                  // columnDefs: [{
                  //         target: 1,
                  //         data: `${data[0]}`,
                  // ]
                });
                // en table reinitialize
                table_mm = $("#mmDT").dataTable({
                  aaData: data.mm_data,
                  dom:
                    "<'row' <'col-sm-12 col-md-2'l> <'col-md-8 col-sm-12 text-center'B> <'col-sm-12 col-md-2'f> >" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                  // dom : '<"mybg"fB><"bottom"lrtpi>',
                  buttons: buttons_mm,
                  rowCallback: function (row, data) {
                    // if (data[4] == "A") {
                    $(row).on("click", function (event) {
                      // alert("hello");
                      jobDetail(
                        event,
                        this,
                        data["created_at"],
                        data["requirements"],
                        data["benefits"],
                        data["memo"],
                        data["photos"]
                      );
                    });

                    $(row).addClass("tb-row");
                    $("td:eq(0)", row).html(`<img class = "check-icon"
                                      src = "img/1.png"
                                      onclick = "addToSelected(event, '${data[0]}')" />`);

                    $("td:eq(1)", row).text(`${data["job_id"]}`);
                    $("td:eq(2)", row).text(`${data["job_title"]}`);
                    $("td:eq(3)", row).text(`${data["company_name"]}`);
                    $("td:eq(4)", row).text(
                      `${data["job_type"]}-${data["employment_type"]}`
                    );
                    $("td:eq(5)", row).text(`${data["wage"]}`);
                    $("td:eq(6)", row).text(`${data["overtime"]}`);
                    $("td:eq(7)", row).text(`${data["holidays"]}`);
                    $("td:eq(8)", row).text(`${data["working_hour"]}`);
                    $("td:eq(9)", row).text(`${data["breaktime"]}`);
                    $("td:eq(10)", row).text(`${data["location"]}`);
                    if (data["isavailable"] == 1) {
                      $("td:eq(11)", row).html(`&#9989;`);
                    } else {
                      $("td:eq(11)", row).html(`&#10060;`);
                    }
                    $("td:eq(12)", row).text(`${data["updated_at"]}`);

                    $("td:eq(13)", row).html(
                      `<a class="tb-btn tb-btn-edit" onclick="event.stopPropagation()" href="./jobedit.php?job_id=${data["job_id"]}"><i class="fa fa-pencil"></i></a>`
                    );

                    $("td:eq(14)", row).html(
                      `<button class="tb-btn tb-btn-delete" onclick="setCurrentJobDel(event,'${data["job_id"]}')" data-toggle="modal" data-target="#deletingModal"><i class="fa fa-trash"></button>`
                    );
                    // }
                  },
                  order: [[12, "desc"]],
                  columnDefs: [{ orderable: false, targets: [0, 13, 14] }],
                  // columnDefs: [{
                  //         target: 1,
                  //         data: `${data[0]}`,
                  // ]
                });
                // jp table reinitialize
                table_jp = $("#jpDT").dataTable({
                  aaData: data.jp_data,
                  dom:
                    "<'row' <'col-sm-12 col-md-2'l> <'col-md-8 col-sm-12 text-center'B> <'col-sm-12 col-md-2'f> >" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                  // dom : '<"mybg"fB><"bottom"lrtpi>',
                  buttons: buttons_jp,
                  rowCallback: function (row, data) {
                    // if (data[4] == "A") {
                    $(row).on("click", function (event) {
                      // alert("hello");
                      jobDetail(
                        event,
                        this,
                        data["created_at"],
                        data["requirements"],
                        data["benefits"],
                        data["memo"],
                        data["photos"]
                      );
                    });

                    $(row).addClass("tb-row");
                    $("td:eq(0)", row).html(`<img class = "check-icon"
                                      src = "img/1.png"
                                      onclick = "addToSelected(event, '${data[0]}')" />`);

                    $("td:eq(1)", row).text(`${data["job_id"]}`);
                    $("td:eq(2)", row).text(`${data["job_title"]}`);
                    $("td:eq(3)", row).text(`${data["company_name"]}`);
                    $("td:eq(4)", row).text(
                      `${data["job_type"]}-${data["employment_type"]}`
                    );
                    $("td:eq(5)", row).text(`${data["wage"]}`);
                    $("td:eq(6)", row).text(`${data["overtime"]}`);
                    $("td:eq(7)", row).text(`${data["holidays"]}`);
                    $("td:eq(8)", row).text(`${data["working_hour"]}`);
                    $("td:eq(9)", row).text(`${data["breaktime"]}`);
                    $("td:eq(10)", row).text(`${data["location"]}`);
                    if (data["isavailable"] == 1) {
                      $("td:eq(11)", row).html(`&#9989;`);
                    } else {
                      $("td:eq(11)", row).html(`&#10060;`);
                    }
                    $("td:eq(12)", row).text(`${data["updated_at"]}`);

                    $("td:eq(13)", row).html(
                      `<a class="tb-btn tb-btn-edit" onclick="event.stopPropagation()" href="./jobedit.php?job_id=${data["job_id"]}"><i class="fa fa-pencil"></i></a>`
                    );

                    $("td:eq(14)", row).html(
                      `<button class="tb-btn tb-btn-delete" onclick="setCurrentJobDel(event,'${data["job_id"]}')" data-toggle="modal" data-target="#deletingModal"><i class="fa fa-trash"></button>`
                    );
                    // }
                  },
                  order: [[12, "desc"]],
                  columnDefs: [{ orderable: false, targets: [0, 13, 14] }],
                  // columnDefs: [{
                  //         target: 1,
                  //         data: `${data[0]}`,
                  // ]
                });
              }
            },
            error: function (jqXHR, textStatus, errorThrown) {},
          });
        }
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
      action: function (e, dt, node, config) {
        // alert("Button activated");
        if(isAllChecked){
          if (window.confirm("Are you sure to delete all?")) {
            // They clicked Yes
            $.ajax({
              url: "./backend/deleteSelectedJob.php",
              type: "POST",
              success: function (data, textStatus, jqXHR) {
                //data - response from server
                selected = [];
                var data = jQuery.parseJSON(data);
                // eng version destroy
                $("#enDT").DataTable().destroy();
                // mm version destroy
                $("#mmDT").DataTable().destroy();
                // jp version destroy
                $("#mmDT").DataTable().destroy();

                // download update
                buttons_en.splice(1, 1, updatedDownloadBtn);
                buttons_mm.splice(1, 1, updatedDownloadBtn);
                buttons_jp.splice(1, 1, updatedDownloadBtn);

                if (data) {
                  // en table reinitialize
                  table_en = $("#enDT").dataTable({
                    aaData: data.en_data,
                    dom:
                      "<'row' <'col-sm-12 col-md-2'l> <'col-md-8 col-sm-12 text-center'B> <'col-sm-12 col-md-2'f> >" +
                      "<'row'<'col-sm-12'tr>>" +
                      "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    // dom : '<"mybg"fB><"bottom"lrtpi>',
                    buttons: buttons_en,
                    rowCallback: function (row, data) {
                      // if (data[4] == "A") {
                      $(row).on("click", function (event) {
                        // alert("hello");
                        jobDetail(
                          event,
                          this,
                          data["created_at"],
                          data["requirements"],
                          data["benefits"],
                          data["memo"],
                          data["photos"]
                        );
                      });

                      $(row).addClass("tb-row");
                      $("td:eq(0)", row).html(`<img class = "check-icon"
                                        src = "img/1.png"
                                        onclick = "addToSelected(event, '${data[0]}')" />`);

                      $("td:eq(1)", row).text(`${data["job_id"]}`);
                      $("td:eq(2)", row).text(`${data["job_title"]}`);
                      $("td:eq(3)", row).text(`${data["company_name"]}`);
                      $("td:eq(4)", row).text(
                        `${data["job_type"]}-${data["employment_type"]}`
                      );
                      $("td:eq(5)", row).text(`${data["wage"]}`);
                      $("td:eq(6)", row).text(`${data["overtime"]}`);
                      $("td:eq(7)", row).text(`${data["holidays"]}`);
                      $("td:eq(8)", row).text(`${data["working_hour"]}`);
                      $("td:eq(9)", row).text(`${data["breaktime"]}`);
                      $("td:eq(10)", row).text(`${data["location"]}`);
                      if (data["isavailable"] == 1) {
                        $("td:eq(11)", row).html(`&#9989;`);
                      } else {
                        $("td:eq(11)", row).html(`&#10060;`);
                      }
                      $("td:eq(12)", row).text(`${data["updated_at"]}`);

                      $("td:eq(13)", row).html(
                        `<a class="tb-btn tb-btn-edit" onclick="event.stopPropagation()" href="./jobedit.php?job_id=${data["job_id"]}"><i class="fa fa-pencil"></i></a>`
                      );

                      $("td:eq(14)", row).html(
                        `<button class="tb-btn tb-btn-delete" onclick="setCurrentJobDel(event,'${data["job_id"]}')" data-toggle="modal" data-target="#deletingModal"><i class="fa fa-trash"></button>`
                      );
                      // }
                    },
                    order: [[12, "desc"]],
                    columnDefs: [{ orderable: false, targets: [0, 13, 14] }],
                    // columnDefs: [{
                    //         target: 1,
                    //         data: `${data[0]}`,
                    // ]
                  });
                  // en table reinitialize
                  table_mm = $("#mmDT").dataTable({
                    aaData: data.mm_data,
                    dom:
                      "<'row' <'col-sm-12 col-md-2'l> <'col-md-8 col-sm-12 text-center'B> <'col-sm-12 col-md-2'f> >" +
                      "<'row'<'col-sm-12'tr>>" +
                      "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    // dom : '<"mybg"fB><"bottom"lrtpi>',
                    buttons: buttons_mm,
                    rowCallback: function (row, data) {
                      // if (data[4] == "A") {
                      $(row).on("click", function (event) {
                        // alert("hello");
                        jobDetail(
                          event,
                          this,
                          data["created_at"],
                          data["requirements"],
                          data["benefits"],
                          data["memo"],
                          data["photos"]
                        );
                      });

                      $(row).addClass("tb-row");
                      $("td:eq(0)", row).html(`<img class = "check-icon"
                                        src = "img/1.png"
                                        onclick = "addToSelected(event, '${data[0]}')" />`);

                      $("td:eq(1)", row).text(`${data["job_id"]}`);
                      $("td:eq(2)", row).text(`${data["job_title"]}`);
                      $("td:eq(3)", row).text(`${data["company_name"]}`);
                      $("td:eq(4)", row).text(
                        `${data["job_type"]}-${data["employment_type"]}`
                      );
                      $("td:eq(5)", row).text(`${data["wage"]}`);
                      $("td:eq(6)", row).text(`${data["overtime"]}`);
                      $("td:eq(7)", row).text(`${data["holidays"]}`);
                      $("td:eq(8)", row).text(`${data["working_hour"]}`);
                      $("td:eq(9)", row).text(`${data["breaktime"]}`);
                      $("td:eq(10)", row).text(`${data["location"]}`);
                      if (data["isavailable"] == 1) {
                        $("td:eq(11)", row).html(`&#9989;`);
                      } else {
                        $("td:eq(11)", row).html(`&#10060;`);
                      }
                      $("td:eq(12)", row).text(`${data["updated_at"]}`);

                      $("td:eq(13)", row).html(
                        `<a class="tb-btn tb-btn-edit" onclick="event.stopPropagation()" href="./jobedit.php?job_id=${data["job_id"]}"><i class="fa fa-pencil"></i></a>`
                      );

                      $("td:eq(14)", row).html(
                        `<button class="tb-btn tb-btn-delete" onclick="setCurrentJobDel(event,'${data["job_id"]}')" data-toggle="modal" data-target="#deletingModal"><i class="fa fa-trash"></button>`
                      );
                      // }
                    },
                    order: [[12, "desc"]],
                    columnDefs: [{ orderable: false, targets: [0, 13, 14] }],
                    // columnDefs: [{
                    //         target: 1,
                    //         data: `${data[0]}`,
                    // ]
                  });
                  // jp table reinitialize
                  table_jp = $("#jpDT").dataTable({
                    aaData: data.jp_data,
                    dom:
                      "<'row' <'col-sm-12 col-md-2'l> <'col-md-8 col-sm-12 text-center'B> <'col-sm-12 col-md-2'f> >" +
                      "<'row'<'col-sm-12'tr>>" +
                      "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    // dom : '<"mybg"fB><"bottom"lrtpi>',
                    buttons: buttons_jp,
                    rowCallback: function (row, data) {
                      // if (data[4] == "A") {
                      $(row).on("click", function (event) {
                        // alert("hello");
                        jobDetail(
                          event,
                          this,
                          data["created_at"],
                          data["requirements"],
                          data["benefits"],
                          data["memo"],
                          data["photos"]
                        );
                      });

                      $(row).addClass("tb-row");
                      $("td:eq(0)", row).html(`<img class = "check-icon"
                                        src = "img/1.png"
                                        onclick = "addToSelected(event, '${data[0]}')" />`);

                      $("td:eq(1)", row).text(`${data["job_id"]}`);
                      $("td:eq(2)", row).text(`${data["job_title"]}`);
                      $("td:eq(3)", row).text(`${data["company_name"]}`);
                      $("td:eq(4)", row).text(
                        `${data["job_type"]}-${data["employment_type"]}`
                      );
                      $("td:eq(5)", row).text(`${data["wage"]}`);
                      $("td:eq(6)", row).text(`${data["overtime"]}`);
                      $("td:eq(7)", row).text(`${data["holidays"]}`);
                      $("td:eq(8)", row).text(`${data["working_hour"]}`);
                      $("td:eq(9)", row).text(`${data["breaktime"]}`);
                      $("td:eq(10)", row).text(`${data["location"]}`);
                      if (data["isavailable"] == 1) {
                        $("td:eq(11)", row).html(`&#9989;`);
                      } else {
                        $("td:eq(11)", row).html(`&#10060;`);
                      }
                      $("td:eq(12)", row).text(`${data["updated_at"]}`);

                      $("td:eq(13)", row).html(
                        `<a class="tb-btn tb-btn-edit" onclick="event.stopPropagation()" href="./jobedit.php?job_id=${data["job_id"]}"><i class="fa fa-pencil"></i></a>`
                      );

                      $("td:eq(14)", row).html(
                        `<button class="tb-btn tb-btn-delete" onclick="setCurrentJobDel(event,'${data["job_id"]}')" data-toggle="modal" data-target="#deletingModal"><i class="fa fa-trash"></button>`
                      );
                      // }
                    },
                    order: [[12, "desc"]],
                    columnDefs: [{ orderable: false, targets: [0, 13, 14] }],
                    // columnDefs: [{
                    //         target: 1,
                    //         data: `${data[0]}`,
                    // ]
                  });
                }
              },
              error: function (jqXHR, textStatus, errorThrown) {},
            });
          } else {
            // They clicked no
          }
        }else{
          if (selected.length <= 0) {
            alert("Please select at least one row to delete");
          } else {
            if (window.confirm("Are you sure to delete?")) {
              // They clicked Yes
              $.ajax({
                url: "./backend/deleteSelectedJob.php",
                type: "POST",
                data: {
                  job_ids: selected,
                },
                success: function (data, textStatus, jqXHR) {
                  //data - response from server
                  selected = [];
                  var data = jQuery.parseJSON(data);
                  // eng version destroy
                  $("#enDT").DataTable().destroy();
                  // mm version destroy
                  $("#mmDT").DataTable().destroy();
                  // jp version destroy
                  $("#mmDT").DataTable().destroy();
  
                  // download update
                  buttons_en.splice(1, 1, updatedDownloadBtn);
                  buttons_mm.splice(1, 1, updatedDownloadBtn);
                  buttons_jp.splice(1, 1, updatedDownloadBtn);
  
                  if (data) {
                    // en table reinitialize
                    table_en = $("#enDT").dataTable({
                      aaData: data.en_data,
                      dom:
                        "<'row' <'col-sm-12 col-md-2'l> <'col-md-8 col-sm-12 text-center'B> <'col-sm-12 col-md-2'f> >" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                      // dom : '<"mybg"fB><"bottom"lrtpi>',
                      buttons: buttons_en,
                      rowCallback: function (row, data) {
                        // if (data[4] == "A") {
                        $(row).on("click", function (event) {
                          // alert("hello");
                          jobDetail(
                            event,
                            this,
                            data["created_at"],
                            data["requirements"],
                            data["benefits"],
                            data["memo"],
                            data["photos"]
                          );
                        });
  
                        $(row).addClass("tb-row");
                        $("td:eq(0)", row).html(`<img class = "check-icon"
                                          src = "img/1.png"
                                          onclick = "addToSelected(event, '${data[0]}')" />`);
  
                        $("td:eq(1)", row).text(`${data["job_id"]}`);
                        $("td:eq(2)", row).text(`${data["job_title"]}`);
                        $("td:eq(3)", row).text(`${data["company_name"]}`);
                        $("td:eq(4)", row).text(
                          `${data["job_type"]}-${data["employment_type"]}`
                        );
                        $("td:eq(5)", row).text(`${data["wage"]}`);
                        $("td:eq(6)", row).text(`${data["overtime"]}`);
                        $("td:eq(7)", row).text(`${data["holidays"]}`);
                        $("td:eq(8)", row).text(`${data["working_hour"]}`);
                        $("td:eq(9)", row).text(`${data["breaktime"]}`);
                        $("td:eq(10)", row).text(`${data["location"]}`);
                        if (data["isavailable"] == 1) {
                          $("td:eq(11)", row).html(`&#9989;`);
                        } else {
                          $("td:eq(11)", row).html(`&#10060;`);
                        }
                        $("td:eq(12)", row).text(`${data["updated_at"]}`);
  
                        $("td:eq(13)", row).html(
                          `<a class="tb-btn tb-btn-edit" onclick="event.stopPropagation()" href="./jobedit.php?job_id=${data["job_id"]}"><i class="fa fa-pencil"></i></a>`
                        );
  
                        $("td:eq(14)", row).html(
                          `<button class="tb-btn tb-btn-delete" onclick="setCurrentJobDel(event,'${data["job_id"]}')" data-toggle="modal" data-target="#deletingModal"><i class="fa fa-trash"></button>`
                        );
                        // }
                      },
                      order: [[12, "desc"]],
                      columnDefs: [{ orderable: false, targets: [0, 13, 14] }],
                      // columnDefs: [{
                      //         target: 1,
                      //         data: `${data[0]}`,
                      // ]
                    });
                    // en table reinitialize
                    table_mm = $("#mmDT").dataTable({
                      aaData: data.mm_data,
                      dom:
                        "<'row' <'col-sm-12 col-md-2'l> <'col-md-8 col-sm-12 text-center'B> <'col-sm-12 col-md-2'f> >" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                      // dom : '<"mybg"fB><"bottom"lrtpi>',
                      buttons: buttons_mm,
                      rowCallback: function (row, data) {
                        // if (data[4] == "A") {
                        $(row).on("click", function (event) {
                          // alert("hello");
                          jobDetail(
                            event,
                            this,
                            data["created_at"],
                            data["requirements"],
                            data["benefits"],
                            data["memo"],
                            data["photos"]
                          );
                        });
  
                        $(row).addClass("tb-row");
                        $("td:eq(0)", row).html(`<img class = "check-icon"
                                          src = "img/1.png"
                                          onclick = "addToSelected(event, '${data[0]}')" />`);
  
                        $("td:eq(1)", row).text(`${data["job_id"]}`);
                        $("td:eq(2)", row).text(`${data["job_title"]}`);
                        $("td:eq(3)", row).text(`${data["company_name"]}`);
                        $("td:eq(4)", row).text(
                          `${data["job_type"]}-${data["employment_type"]}`
                        );
                        $("td:eq(5)", row).text(`${data["wage"]}`);
                        $("td:eq(6)", row).text(`${data["overtime"]}`);
                        $("td:eq(7)", row).text(`${data["holidays"]}`);
                        $("td:eq(8)", row).text(`${data["working_hour"]}`);
                        $("td:eq(9)", row).text(`${data["breaktime"]}`);
                        $("td:eq(10)", row).text(`${data["location"]}`);
                        if (data["isavailable"] == 1) {
                          $("td:eq(11)", row).html(`&#9989;`);
                        } else {
                          $("td:eq(11)", row).html(`&#10060;`);
                        }
                        $("td:eq(12)", row).text(`${data["updated_at"]}`);
  
                        $("td:eq(13)", row).html(
                          `<a class="tb-btn tb-btn-edit" onclick="event.stopPropagation()" href="./jobedit.php?job_id=${data["job_id"]}"><i class="fa fa-pencil"></i></a>`
                        );
  
                        $("td:eq(14)", row).html(
                          `<button class="tb-btn tb-btn-delete" onclick="setCurrentJobDel(event,'${data["job_id"]}')" data-toggle="modal" data-target="#deletingModal"><i class="fa fa-trash"></button>`
                        );
                        // }
                      },
                      order: [[12, "desc"]],
                      columnDefs: [{ orderable: false, targets: [0, 13, 14] }],
                      // columnDefs: [{
                      //         target: 1,
                      //         data: `${data[0]}`,
                      // ]
                    });
                    // jp table reinitialize
                    table_jp = $("#jpDT").dataTable({
                      aaData: data.jp_data,
                      dom:
                        "<'row' <'col-sm-12 col-md-2'l> <'col-md-8 col-sm-12 text-center'B> <'col-sm-12 col-md-2'f> >" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                      // dom : '<"mybg"fB><"bottom"lrtpi>',
                      buttons: buttons_jp,
                      rowCallback: function (row, data) {
                        // if (data[4] == "A") {
                        $(row).on("click", function (event) {
                          // alert("hello");
                          jobDetail(
                            event,
                            this,
                            data["created_at"],
                            data["requirements"],
                            data["benefits"],
                            data["memo"],
                            data["photos"]
                          );
                        });
  
                        $(row).addClass("tb-row");
                        $("td:eq(0)", row).html(`<img class = "check-icon"
                                          src = "img/1.png"
                                          onclick = "addToSelected(event, '${data[0]}')" />`);
  
                        $("td:eq(1)", row).text(`${data["job_id"]}`);
                        $("td:eq(2)", row).text(`${data["job_title"]}`);
                        $("td:eq(3)", row).text(`${data["company_name"]}`);
                        $("td:eq(4)", row).text(
                          `${data["job_type"]}-${data["employment_type"]}`
                        );
                        $("td:eq(5)", row).text(`${data["wage"]}`);
                        $("td:eq(6)", row).text(`${data["overtime"]}`);
                        $("td:eq(7)", row).text(`${data["holidays"]}`);
                        $("td:eq(8)", row).text(`${data["working_hour"]}`);
                        $("td:eq(9)", row).text(`${data["breaktime"]}`);
                        $("td:eq(10)", row).text(`${data["location"]}`);
                        if (data["isavailable"] == 1) {
                          $("td:eq(11)", row).html(`&#9989;`);
                        } else {
                          $("td:eq(11)", row).html(`&#10060;`);
                        }
                        $("td:eq(12)", row).text(`${data["updated_at"]}`);
  
                        $("td:eq(13)", row).html(
                          `<a class="tb-btn tb-btn-edit" onclick="event.stopPropagation()" href="./jobedit.php?job_id=${data["job_id"]}"><i class="fa fa-pencil"></i></a>`
                        );
  
                        $("td:eq(14)", row).html(
                          `<button class="tb-btn tb-btn-delete" onclick="setCurrentJobDel(event,'${data["job_id"]}')" data-toggle="modal" data-target="#deletingModal"><i class="fa fa-trash"></button>`
                        );
                        // }
                      },
                      order: [[12, "desc"]],
                      columnDefs: [{ orderable: false, targets: [0, 13, 14] }],
                      // columnDefs: [{
                      //         target: 1,
                      //         data: `${data[0]}`,
                      // ]
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

  let table_en = $("#enDT").DataTable({
    order: [[12, "desc"]],
    columnDefs: [
      { orderable: false, targets: [0, 13, 14] },
      {
        targets: [15, 16, 17],
        visible: false,
        searchable: false,
      },
    ],
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
    buttons: buttons_en,
  });

  let table_mm = $("#mmDT").DataTable({
    order: [[12, "desc"]],
    columnDefs: [
      { orderable: false, targets: [0, 13, 14] },
      {
        targets: [15, 16, 17],
        visible: false,
        searchable: false,
      },
    ],
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
    buttons: buttons_mm,
  });
  let table_jp = $("#jpDT").DataTable({
    order: [[12, "desc"]],
    columnDefs: [
      { orderable: false, targets: [0, 13, 14] },
      {
        targets: [15, 16, 17],
        visible: false,
        searchable: false,
      },
    ],
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

    dom:
      "<'row' <'col-sm-12 col-md-2'l> <'col-md-8 col-sm-12 text-center'B> <'col-sm-12 col-md-2'f> >" +
      "<'row'<'col-sm-12'tr>>" +
      "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",

    // dom : '<"mybg"fB><"bottom"lrtpi>',
    buttons: buttons_jp,
  });
});
