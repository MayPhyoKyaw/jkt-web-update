var selected = [];
var isAllChecked = false;

function addToSelected(event, id) {
  console.log();
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
  var src = event.target.src;
  var root = src.slice(0, -5);
  var checkBox = src.slice(-5);
  if (checkBox == "1.png") {
    event.target.src = root + "2.png";
    $(".check-icon").attr("src", root + "2.png");
    isAllChecked = true;
  } else {
    event.target.src = root + "1.png";
    $(".check-icon").attr("src", root + "1.png");
    isAllChecked = false;
  }
});

// students detail
// var detailTitle = document.getElementById("detailTitle");
var userImg = document.getElementById("userImg");
var detailName = document.getElementById("detailName");
var detailDob = document.getElementById("detailDob");
var detailFname = document.getElementById("detailFname");
var detailNrc = document.getElementById("detailNrc");
var detailEmail = document.getElementById("detailEmail");
var detailPhone = document.getElementById("detailPhone");
var detailEducation = document.getElementById("detailEducation");
var detailAddress = document.getElementById("detailAddress");

function student_detail(row) {
  var tds = row.children;
  var rowArr = [];
  for (var i = 0; i < tds.length; i++) {
    if (i == 1) {
      rowArr.push(tds[i].children[0].alt);
    } else {
      rowArr.push(tds[i].textContent);
    }
  }
  console.log(rowArr);

  detailImage.src = "https://jktmyanmarint.com/backend/" + rowArr[1];
  detailName.innerText = rowArr[2];
  detailDob.innerText = rowArr[3];
  detailFname.innerText = rowArr[4];

  detailNrc.innerText = rowArr[5];
  detailEmail.innerText = rowArr[6];
  detailEducation.innerText = rowArr[7];
  detailAddress.innerText = rowArr[8];
  detailPhone.innerText = rowArr[9];
}

// student detail
var studentId = document.getElementById("studentId");
var imagePreview = document.getElementById("imagePreview");
var notChangeImg = document.getElementById("notChangeImg");
var uname = document.getElementById("uname");
var dob = document.getElementById("dob");
var fname = document.getElementById("fname");
var nrcCode = document.getElementById("nrcCode");
var township = document.getElementById("township");
var type = document.getElementById("type");
var nrcNumber = document.getElementById("nrcNumber");
var email = document.getElementById("email");
var phone = document.getElementById("phone");
var education = document.getElementById("education");
var address = document.getElementById("address");
var createdAt = document.getElementById("createdAt");

// deleting
var stuName = document.getElementById("stuName");
var studentDeletingId = document.getElementById("studentDeletingId");

function student_edit(event, row, idx) {
  $("#editingModal").modal("show");
  event.stopPropagation();
  // console.log(event);
  // id_field.value = id;
  var tr = row.closest("tr");
  var tds = tr.children;
  var rowArr = [];
  for (var i = 0; i < tds.length; i++) {
    if (i == 1) {
      rowArr.push(tds[i].children[0].alt);
    } else {
      rowArr.push(tds[i].textContent);
    }
  }

  console.log(rowArr);
  studentId.value = idx;
  imagePreview.src = "https://jktmyanmarint.com/backend/" + rowArr[1];
  notChangeImg.value = rowArr[1];
  uname.value = rowArr[2];
  dob.value = rowArr[3];
  fname.value = rowArr[4];

  nrcArr = rowArr[5].split("/");
  nrcCode.value = nrcArr[0];
  getTownship(nrcArr[0]);
  if (nrcArr[1].includes("AC") || nrcArr[1].includes("NC")) {
    township.value = nrcArr[1].slice(0, -8);
    type.value = nrcArr[1].slice(-10, -6);
  } else {
    township.value = nrcArr[1].slice(0, -9);
    type.value = nrcArr[1].slice(-9, -6);
  }

  nrcNumber.value = nrcArr[1].slice(-6);
  email.value = rowArr[6];
  education.value = rowArr[7];
  address.value = rowArr[8].trim();
  phone.value = rowArr[9];
  createdAt.value = rowArr[10];
}

function getTownship(state) {
  let selected_township = nrcArr[1].slice(0, -9);
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "./nrc.php", true);
  xhr.onload = function () {
    var nrcJson = JSON.parse(xhr.responseText);
    nrcJson.sort((a, b) => (a.name_en > b.name_en ? 1 : -1));
    $("#township").html(`<option value="" selected disabled>Township</option>`);
    nrcJson.forEach((value) => {
      var option = document.createElement("option");
      if (state == value.nrc_code) {
        let township = value.name_en + " - " + value.name_mm;
        option.innerText = township;
        option.setAttribute("value", township);
        document.getElementById("township").appendChild(option);
        if (selected_township === township) {
          $(`#township option[value='${township}'`).prop("selected", true);
        }
      }
    });
  };
  xhr.send();
}

nrcCode &&
  nrcCode.addEventListener("change", function (e) {
    getTownship(e.target.value);
  });
userImg &&
  userImg.addEventListener("change", function (e) {
    const [file] = userImg.files;
    if (file) {
      imagePreview.src = URL.createObjectURL(file);
    }
  });

function student_delete(event, row, idx) {
  $("#deletingModal").modal("show");
  event.stopPropagation();
  var tr = row.closest("tr");
  var tds = tr.children;
  var rowArr = [];
  for (var i = 0; i < tds.length; i++) {
    if (i == 0) {
      rowArr.push(tds[i].children[0].alt);
    } else {
      rowArr.push(tds[i].textContent);
    }
  }
  stuName.innerText = rowArr[2];
  studentDeletingId.value = idx;
}

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
    columns: [1, 2, 3, 4, 5, 7, 8, 6, 10, 11],
    format: {
      header: function (data, columnIdx) {
        switch (columnIdx) {
          case 1:
            return "Name";
            break;
          case 2:
            return "DOB";
            break;
          case 3:
            return "FatherName";
            break;
          case 4:
            return "NRC";
            break;
          case 5:
            return "Email";
            break;
          case 6:
            return "Phone";
            break;
          case 7:
            return "Education";
            break;
          case 8:
            return "Address";
            break;
          case 9:
            return "Created At";
            break;
          case 10:
            return "Updated At";
            break;
          default:
            return data;
        }
      },
      // body: function(data, row, column, node) {
      //     // Strip $ from salary column to make it numeric
      //     switch (column) {
      //         case 10:
      //             // return data.replace(/[1,]/g, "&#9989;");
      //             // return "ava";
      //             return data === "1" ? "✅" : "❌";
      //             break;
      //         case 17:
      //             return data.replace(/[-,]/g, "/");
      //             break;
      //         default:
      //             return data;
      //     }
      // },
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
      columns: [2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
    },
  },
  {
    text: '<i class="fa fa-trash"></i>',
    action: function (e, dt, node, config) {
      // alert("Button activated");
      if (isAllChecked) {
        if (window.confirm("Are you sure to delete all?")) {
          // They clicked Yes
          $.ajax({
            url: "./backend/deleteAllStudents.php",
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
              url: "./backend/deleteSelectedStudent.php",
              type: "POST",
              dataType: "json",
              data: { stu_ids: JSON.stringify(selected) },
              success: function (data, textStatus, jqXHR) {
                //data - response from server
                selected = [];
                // var data = jQuery.parseJSON(data);
                // console.log(data.students);
                // table destroy
                $("#dataTable").DataTable().destroy();

                if (data) {
                  // en table reinitialize
                  for (const stu of data.students) {
                    // console.log(stu);
                    stu["12"] = "data";
                    stu["13"] = "data";
                    stu["14"] = "data";
                  }
                  console.log(data.students);
                  buttons.splice(0, 1, updatedDownloadBtn);
                  table_en = $("#dataTable").dataTable({
                    aaData: data.students,
                    dom:
                      "<'row' <'col-sm-12 col-md-2'l> <'col-md-8 col-sm-12 text-center'B> <'col-sm-12 col-md-2'f> >" +
                      "<'row'<'col-sm-12'tr>>" +
                      "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    // dom : '<"mybg"fB><"bottom"lrtpi>',
                    buttons: buttons,
                    rowCallback: function (row, data) {
                      var createdDate = new Date(data["created_at"]);
                      var updatedDate = new Date(data["updated_at"]);
                      $(row).addClass("tb-row");
                      $("td:eq(0)", row).html(`<img class = "check-icon"
                                              src = "img/1.png"
                                              onclick = "addToSelected(event, '${data[0]}')" />`);

                      $("td:eq(1)", row).html(
                        `<img class="stu-img-table" src="https://jktmyanmarint.com/backend/${data[9]}" alt="${data[9]}">`
                      );
                      $("td:eq(2)", row).text(`${data[1]}`);
                      $("td:eq(3)", row).text(`${data[2]}`);
                      $("td:eq(4)", row).text(`${data[3]}`);
                      $("td:eq(5)", row).text(`${data[4]}`);
                      $("td:eq(6)", row).text(`${data[5]}`);
                      $("td:eq(7)", row).text(`${data["education"]}`);
                      $("td:eq(8)", row).text(`${data["address"]}`);
                      $("td:eq(9)", row).text(`${data["phone"]}`);
                      $("td:eq(10)", row).text(`${formatDate(createdDate)}`);
                      $("td:eq(11)", row).text(`${formatDate(updatedDate)}`);

                      $("td:eq(12)", row).html(
                        `<button class="tb-btn tb-btn-edit" onclick="student_edit(event,this,${data[0]})" data-toggle="modal" data-target="#editingModal"><i class="fa fa-pencil"></i></button>`
                      );
                      $("td:eq(13)", row).html(
                        `<button class="tb-btn tb-btn-delete" onclick="setCurrentJobDel(event,'${data[0]}')" data-toggle="modal" data-target="#deletingModal"><i class="fa fa-trash"></button>`
                      );
                      // }
                      // console.log(data);
                    },
                    order: [[11, "desc"]],
                    columnDefs: [{ orderable: false, targets: [0, 1, 12, 13] }],
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

$(document).ready(function () {
  const params = new URLSearchParams(window.location.search);
  let getParam = params.get("id");
  var table = $("#dataTable").DataTable({
    order: [[11, "desc"]],
    columnDefs: [{ orderable: false, targets: [0] }],
    dom:
      "<'row' <'col-sm-12 col-md-2'l> <'col-md-8 col-sm-12 text-center'B> <'col-sm-12 col-md-2'f> >" +
      "<'row'<'col-sm-12'tr>>" +
      "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
    // dom : '<"mybg"fB><"bottom"lrtpi>',
    buttons: buttons,
  });
  let decrypted = "";

  $.post(
    "decrypt.php",
    {
      encryptedId: getParam,
    },
    function (data) {
      table.destroy();
      table = $("#dataTable")
        .DataTable({
          order: [[11, "desc"]],
        })
        .column(4)
        .search(data.toString())
        .draw();
    }
  );
});
