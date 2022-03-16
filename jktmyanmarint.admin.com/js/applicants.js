$(document).ready(function () {
  var table = $("#dataTable").DataTable({
    order: [[12, "desc"]],
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
  });

  var today = new Date();
  var maxMonth = today.getMonth() + 1; // getMonth() is zero-based
  var maxDay = today.getDate();
  var maxYear = today.getFullYear();
  var minYear = today.getFullYear() - 70;
  maxMonth = maxMonth < 10 ? "0" + maxMonth.toString() : maxMonth;
  maxDay = maxDay < 10 ? "0" + maxDay.toString() : maxDay;
  var maxDate = maxYear + "-" + maxMonth + "-" + maxDay;
  $("#dob").attr("max", maxDate);
  var minDate = minYear + "-" + 1 + "-" + 1;
  $("#dob").attr("min", minDate);

  $.validator.addMethod(
    "nameRegex",
    function (value, element) {
      return this.optional(element) || /^([a-zA-Z]{1,}[ ]{0,1})*$/i.test(value);
    },
    "Name must contain only letters (Please Spell in English)"
  );
  let applicantForm = $("#editingApplicant");
  let applicantFormValidate = applicantForm.validate({
    errorElement: "p",
    errorClass: "help-block",
    highlight: function (element, errorClass, validClass) {
      $(element).closest(".form-control").addClass("has-error");
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).closest(".form-control").removeClass("has-error");
    },
    rules: {
      applicantEditName: {
        required: true,
        nameRegex: true,
        minlength: 4,
      },
      jobId: {
        required: true,
      },
      email: {
        required: true,
      },
      phone: {
        required: true,
        minlength: 8,
        maxlength: 12,
      },
      dob: {
        required: true,
      },
      gender: {
        required: true,
      },
      jlptLevel: {
        required: true,
      },
    },
    messages: {
      applicantEditName: {
        required: "Name required",
      },
      jobId: {
        required: "Job ID required",
      },
      email: {
        required: "Email required",
      },
      phone: {
        required: "Phone number required",
      },
      dob: {
        required: "Date of Birth required",
      },
      gender: {
        required: "Gender required",
      },
      jlptLevel: {
        required: "Japanese Skill required",
      },
    },
    errorPlacement: function (error, element) {
      if (element.is(":radio[name='gender']")) {
        error.appendTo(element.parents(".gender-form-control"));
        console.log(error);
      } else {
        error.insertAfter(element);
      }
    },
    onfocusout: function (element) {
      if (!this.checkable(element)) {
        this.element(element);
      }
    },
  });

  document.getElementById("new_edit_resume").addEventListener(
    "change",
    (e) => {
      $("#resumeName").text("Select File Here");
      $(".resume-help-block").html(``);
      var file_list = e.target.files;
      console.log(file_list);

      for (var i = 0, file; (file = file_list[i]); i++) {
        var sFileName = file.name;
        let sFile = sFileName.split(".");
        console.log(sFile.length);

        var sFileExtension = sFile[sFile.length - 1];
        var iFileSize = file.size;
        var iConvert = (file.size / 3145728).toFixed(2);
        console.log(iFileSize, sFileExtension);
        let regex = /pdf|docx?|xlsx?|csv/i;
        console.log(regex.test(sFileExtension));
        $("#resumeName").text(file_list[0].name);
        console.log(file_list[0].name);
        if (!regex.test(sFileExtension) || iFileSize > 3145728) {
          $(".resume-help-block").html(
            "Allow only pdf, doc, docx, xlsx, csv and less than 3 MB."
          );
        } else {
          $(".resume-help-block").html(``);
        }
      }
    },
    false
  );
  // resume Validation
  $("#editSubmit").click(function (e) {
    e.preventDefault();
    if (applicantForm.valid() === true) {
      if (
        document.getElementById("resumeHelp").innerHTML ===
        "Allow only pdf, doc, docx, xlsx, csv and less than 3 MB."
      ) {
        document.getElementById("new_edit_resume").focus();
      } else {
        applicantForm.submit();
      }
    } else {
      applicantFormValidate.focusInvalid();
    }
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
  var resumeArr = resume ? resume.split("/") : "-";
  console.log(resumeArr, resumeArr.length - 1);
  let resumeFile = resumeArr === "-" ? "-" : resumeArr[resumeArr.length - 1];
  console.log(resumeFile);
  detailName.innerText = rowArr[0];
  detailJobId.innerText = rowArr[1];
  detailEmail.innerText = rowArr[2];
  detailPhone.innerText = rowArr[3];
  detailDob.innerText = rowArr[4];
  detailGender.innerText = rowArr[5];
  detailJlptLevel.innerText = rowArr[6];
  // resume_result = resume ? resume : '-';
  if (resumeFile === "-") {
    $("#detailResume").html("-");
  } else {
    $("#detailResume").html(
      `<a href="../jktmyanmarint.com/backend/${resume}">${resumeFile} <i class='fas fa-download'></i></a>`
    );
  }
  detailFbPfLink.innerText = fbpflink ? fbpflink : "-";
  detailPorfolioLink.innerText = porfolio ? porfolio : "-";
  detailNote.innerText = note ? note : "-";
  detailCreatedAt.innerText = rowArr[7];
  detailUpdatedAt.innerText = rowArr[8];
}

// applicant editing
var applicantEditId = document.getElementById("applicantEditId");
var applicantName = document.getElementById("applicantName");
var jobId = document.getElementById("jobId");
var email = document.getElementById("email");
var phone = document.getElementById("phone");
var dob = document.getElementById("dob");
var jlptLevel = document.getElementById("jlptLevel");
// var gender = document.getElementById("gender");
var resume = document.getElementById("resumeName");
var fbPfLink = document.getElementById("fbPfLink");
var porfolioLink = document.getElementById("porfolio");
var note = document.getElementById("note");
var createdAt = document.getElementById("createdAt");

function applicant_edit(
  event,
  row,
  idx,
  edit_resume,
  edit_fbpflink,
  edit_porfolio,
  edit_note
) {
  $("#editingModal").modal("show");
  event.stopPropagation();
  console.log(event);
  console.log(row);
  var tr = row.closest("tr");
  var tds = tr.children;
  var rowArr = [];
  for (var i = 0; i < tds.length; i++) {
    rowArr.push(tds[i].textContent);
  }
  console.log(rowArr);
  console.log(idx, rowArr[7])
  applicantEditId.value = idx;
  applicantEditName.value = rowArr[0];
  jobId.value = rowArr[1];
  email.value = rowArr[2];
  phone.value = rowArr[3];
  dob.value = rowArr[4];
  // gender = rowArr[5];
  var radios = document.getElementsByName("gender");
  for (var i = 0, length = radios.length; i < length; i++) {
    if (radios[i].value === rowArr[5]) {
      // $("#gender").prop("checked", true);
      $("input[name='gender'][value=" + rowArr[5] + "]").prop("checked", true);
    }
  }
  let resumePathArr = edit_resume.split("/");
  let resume_file_name = resumePathArr[resumePathArr.length - 1];
  jlptLevel.value = rowArr[6];
  createdAt.value = rowArr[7];
  resume.innerHTML = resume_file_name ? resume_file_name : "Select File Here";
  fbPfLink.value = edit_fbpflink;
  porfolioLink.value = edit_porfolio;
  note.value = edit_note;
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
  console.log(rowArr, idx);
  applicantName.innerHTML = rowArr[0];
  applicantId.value = idx;
}
