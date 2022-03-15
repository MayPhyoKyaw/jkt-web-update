$(document).ready(function() {
    var table = $("#dataTable").DataTable({
        order: [
            [12, "desc"]
        ],
        columnDefs: [{
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
    });
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
// var detailFbPfLink = document.getElementById("detailFbPfLink");
var detailPorfolioLink = document.getElementById("detailPorfolioLink");
var detailNote = document.getElementById("detailNote");
var detailCreatedAt = document.getElementById("detailCreatedAt");
var detailUpdatedAt = document.getElementById("detailUpdatedAt");

function applicantDetail(row, id, resume, fbpflink, porfolio, note) {
    var tds = row.children;
    console.log(tds);
    var rowArr = [];
    for (var i = 0; i < tds.length; i++) {
        rowArr.push(tds[i].textContent);
    }
    console.log(rowArr);
    var resumeArr = resume ? resume.split("/") : '-';
    console.log(resumeArr, resumeArr.length - 1)
    let resumeFile = resumeArr === '-' ? '-' : resumeArr[resumeArr.length - 1];
    console.log(resumeFile)
    detailName.innerText = rowArr[0];
    detailJobId.innerText = rowArr[1];
    detailEmail.innerText = rowArr[2];
    detailPhone.innerText = rowArr[3];
    detailDob.innerText = rowArr[4];
    detailGender.innerText = rowArr[5];
    detailJlptLevel.innerText = rowArr[6];
    // resume_result = resume ? resume : '-';
    $("#detailResume").html(`<a href="../jktmyanmarint.com/backend/${resume}">${resumeFile}</a>`);
    detailFbPfLink.innerText = fbpflink ? fbpflink : '-';
    detailPorfolioLink.innerText = porfolio ? porfolio : '-';
    detailNote.innerText = note ? note : '-';
    detailCreatedAt.innerText = rowArr[7];
    detailUpdatedAt.innerText = rowArr[8];
}

// applicant editing
var applicantName = document.getElementById("applicantName");
var jobId = document.getElementById("jobId");
var email = document.getElementById("email");
var phone = document.getElementById("phone");
var dob = document.getElementById("dob");
var jlptLevel = document.getElementById("jlptLevel");
// var gender = document.getElementById("gender");
// var resume = document.getElementById("resume");
var fbPfLink = document.getElementById("fbPfLink");
var porfolioLink = document.getElementById("porfolio");
var note = document.getElementById("note");

function applicant_edit(event, row, idx, edit_resume, edit_fbpflink, edit_porfolio, edit_note) {
    $("#editingModal").modal("show");
    event.stopPropagation();
    console.log(event);
    console.log(row)
    var tr = row.closest("tr");
    var tds = tr.children;
    var rowArr = [];
    for (var i = 0; i < tds.length; i++) {
        rowArr.push(tds[i].textContent);
    }
    console.log(rowArr);
    applicantEditName.value = rowArr[0];
    jobId.value = rowArr[1];
    email.value = rowArr[2];
    phone.value = rowArr[3];
    dob.value = rowArr[4];
    // gender = rowArr[5];
    var radios = document.getElementsByName("gender");
    for (var i = 0, length = radios.length; i < length; i++) {
        console.log(radios[i].value, rowArr[5])
        if (radios[i].value === rowArr[5]) {
            console.log(radios[i].value, rowArr[5])
                // $("#gender").prop("checked", true);
            $("input[name='gender'][value=" + rowArr[5] + "]").prop('checked', true);
        }
    }
    jlptLevel.value = rowArr[6];
    // resume.value = rowArr[7];
    $("#resume").val(edit_resume)
    fbPfLink.value = edit_fbpflink ? '-' : edit_fbpflink;
    porfolioLink.value = edit_porfolio ? '-' : edit_porfolio;
    note.value = edit_note ? '-' : edit_note;
}

// deleting
var applicantName = document.getElementById("applicantDelName");
var applicantId = document.getElementById("applicantDelId");

function applicant_delete(event, row, idx) {
    $("#deletingApplicantModal").modal("show");
    event.stopPropagation();
    var tr = row.closest("tr");
    var tds = tr.children;
    var rowArr = [];
    for (var i = 0; i < tds.length; i++) {
        rowArr.push(tds[i].textContent);
    }
    console.log(rowArr, idx)
    applicantName.innerHTML = rowArr[0];
    applicantId.value = idx;
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