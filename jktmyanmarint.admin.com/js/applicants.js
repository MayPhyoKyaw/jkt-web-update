var table = $("#dataTable").DataTable({
  // order: [[8, "desc"]],
  columnDefs: [
    {
      targets: 7,
      visible: false,
    },
    {
      targets: 8,
      visible: false,
    },
    {
      targets: 9,
      visible: false,
    },
    {
      targets: 10,
      visible: false,
    },
  ],
  columns: [
    {
      targets: [7],
      visible: false,
    },
    {
      targets: [8],
      visible: false,
    },
    {
      targets: [9],
      visible: false,
    },
    {
      targets: [10],
      visible: false,
    },
  ],
});
// applicant detail
var detailName = document.getElementById("detailName");
var detailJobId = document.getElementById("detailJobId");
var detailEmail = document.getElementById("detailEmail");
var detailPhone = document.getElementById("detailPhone");
var detailDob = document.getElementById("detailDob");
var detailGender = document.getElementById("detailGender");
var detailJlptLevel = document.getElementById("detailJlptLevel");
var detailResume = document.getElementById("detailResume");
var detailFbPfLink = document.getElementById("detailFbPfLink");
var detailPorfolioLink = document.getElementById("detailPorfolioLink");
var detailNote = document.getElementById("detailNote");
var detailCreatedAt = document.getElementById("detailCreatedAt");
var detailUpdatedAt = document.getElementById("detailUpdatedAt");

function applicant_detail(row) {
  var tds = row.children;
  console.log(tds);
  var rowArr = [];
  for (var i = 0; i < tds.length; i++) {
    rowArr.push(tds[i].textContent);
  }
  console.log(rowArr);
  detailName.innerText = rowArr[0];
  detailJobId.innerText = rowArr[1];
  detailEmail.innerText = rowArr[2];
  detailPhone.innerText = rowArr[3];
  detailDob.innerText = rowArr[4];
  detailGender.innerText = rowArr[5];
  detailJlptLevel.innerText = rowArr[6];
  detailResume.innerText = rowArr[7];
  detailFbPfLink.innerText = rowArr[8];
  detailPorfolioLink.innerText = rowArr[9];
  detailNote.innerText = rowArr[10];
  detailCreatedAt.innerText = rowArr[11];
  detailUpdatedAt.innerText = rowArr[12];
}

// applicant editing
var applicantName = document.getElementById("applicantName");
var jobId = document.getElementById("jobId");
var email = document.getElementById("email");
var phone = document.getElementById("phone");
var dob = document.getElementById("dob");
var gender = document.getElementById("gender");
var jlptLevel = document.getElementById("jlptLevel");
var resume = document.getElementById("resume");
var fbPfLink = document.getElementById("fbPfLink");
var porfolioLink = document.getElementById("porfolio");
var note = document.getElementById("note");

function applicant_edit(event, row, idx) {
  $("#editingModal").modal("show");
  event.stopPropagation();
  console.log(event);
  var tr = row.closest("tr");
  var tds = tr.children;
  var rowArr = [];
  for (var i = 0; i < tds.length; i++) {
    rowArr.push(tds[i].textContent);
  }
  console.log(rowArr);
  applicantName.value = rowArr[0];
  jobId.value = rowArr[1];
  email.value = rowArr[2];
  phone.value = rowArr[3];
  dob.value = rowArr[4];
  gender.value = rowArr[5];
  jlptLevel.value = rowArr[6];
  resume.value = rowArr[7];
  fbPfLink.value = rowArr[8];
  porfolioLink.value = rowArr[9];
  note.value = rowArr[10];
}

// deleting
var stuName = document.getElementById("stuName");
var studentDeletingId = document.getElementById("studentDeletingId");
function applicant_delete(event, row, idx) {
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

// $(document).ready(function () {
//   const params = new URLSearchParams(window.location.search);
//   let getParam = params.get("id");
// var table = $("#dataTable").DataTable({
//   order: [[10, "desc"]],
// });
//   let decrypted = "";

//   $.post(
//     "decrypt.php",
//     {
//       encryptedId: getParam,
//     },
//     function (data) {
//       table.destroy();
//       table = $("#dataTable").DataTable({
//         order: [[10, "desc"]],
//       }).column(4).search(data.toString()).draw();
//     }
//   );
// });
