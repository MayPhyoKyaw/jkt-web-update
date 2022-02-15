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
    if (i == 0) {
      rowArr.push(tds[i].children[0].alt);
    } else {
      rowArr.push(tds[i].textContent);
    }
  }
  console.log(rowArr);

  detailImage.src = "https://jktmyanmarint.com/backend/" + rowArr[0];
  detailName.innerText = rowArr[1];
  detailDob.innerText = rowArr[2];
  detailFname.innerText = rowArr[3];

  detailNrc.innerText = rowArr[4];
  detailEmail.innerText = rowArr[5];
  detailEducation.innerText = rowArr[6];
  detailAddress.innerText = rowArr[7];
  detailPhone.innerText = rowArr[8];
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
  console.log(event);
  // id_field.value = id;
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

  console.log(rowArr);
  studentId.value = idx;
  imagePreview.src = "https://jktmyanmarint.com/backend/" + rowArr[0];
  notChangeImg.value = rowArr[0];
  uname.value = rowArr[1];
  dob.value = rowArr[2];
  fname.value = rowArr[3];

  nrcArr = rowArr[4].split("/");
  nrcCode.value = nrcArr[0];
  getTownship(nrcArr[0]);
  township.value = nrcArr[1].slice(0, -9);
  type.value = nrcArr[1].slice(-9, -6);
  nrcNumber.value = nrcArr[1].slice(-6);
  email.value = rowArr[5];
  education.value = rowArr[6];
  address.value = rowArr[7].trim();
  phone.value = rowArr[8];
  createdAt.value = rowArr[9];
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

$(document).ready(function () {
  const params = new URLSearchParams(window.location.search);
  let getParam = params.get("id");
  $("#dataTable").DataTable({
    order: [[10, "desc"]],
  });
  let decrypted = "";

  $.post(
    "decrypt.php",
    {
      encryptedId: getParam,
    },
    function (data) {
      $("#dataTable").DataTable({
        order: [[10, "desc"]],
      }).column(4).search(data.toString()).draw();
    }
  );
});
