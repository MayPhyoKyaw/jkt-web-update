// Recruitment Form
var today = new Date();
var maxMonth = today.getMonth() + 1; // getMonth() is zero-based
var maxDay = today.getDate();
var maxYear = today.getFullYear();
var minYear = today.getFullYear() - 70;
maxMonth = maxMonth < 10 ? "0" + maxMonth.toString() : maxMonth;
maxDay = maxDay < 10 ? "0" + maxDay.toString() : maxDay;

var maxDate = maxYear + "-" + maxMonth + "-" + maxDay;
$("#recruitmentDob").attr("max", maxDate);
var minDate = minYear + "-" + 1 + "-" + 1;
$("#recruitmentDob").attr("min", minDate);

$.validator.addMethod(
  "nameRegex",
  function (value, element) {
    return this.optional(element) || /^([a-zA-Z]{1,}[ ]{0,1})*$/i.test(value);
  },
  "Name must contain only letters (Please Spell in English)"
);

$(document).ready(function () {
  let recruitmentForm = $("#recruitmentForm");
  let recruitmentValidate = recruitmentForm.validate({
    errorElement: "p",
    errorClass: "help-block",
    highlight: function (element, errorClass, validClass) {
      $(element).closest(".appointment-label").addClass("has-error");
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).closest(".appointment-label").removeClass("has-error");
    },
    rules: {
      recruitmentName: {
        required: true,
        nameRegex: true,
        minlength: 4,
      },
      recruitmentEmail: {
        required: true,
      },
      recruitmentPhone: {
        required: true,
        minlength: 8,
        maxlength: 12,
      },
      recruitmentDob: {
        required: true,
      },
      gender: {
        required: true,
      },
      recruitmentJpSkill: {
        required: true,
      },
      recruitmentCv: {
        // required: true,
        // maxfilesize: 5,
        // extension: "pdf|doc|docx|xls|xlsx|csv",
      },
    },
    messages: {
      recruitmentName: {
        required: "Name required",
      },
      recruitmentEmail: {
        required: "Email required",
      },
      recruitmentPhone: {
        required: "Phone number required",
      },
      recruitmentDob: {
        required: "Date of Birth required",
      },
      gender: {
        required: "Gender required",
      },
      recruitmentJpSkill: {
        required: "Japanese Skill required",
      },
      // recruitmentCv: {
      //   maxfilesize: "File size must not be more than 5 MB.",
      //   extension:
      //     "Extension is not supported. Please enter a value Like (pdf, doc, docx, xlsx, csv) a valid extension.",
      // },
    },
    errorPlacement: function (error, element) {
      if (element.is(":radio[name='gender']")) {
        error.appendTo(element.parents(".appointment-type"));
        console.log(error);
      } else {
        // This is the default behavior
        error.insertAfter(element);
      }
    },
    onfocusout: function (element) {
      if (!this.checkable(element)) {
        this.element(element);
      }
    },
    // submitHandler: function (form) {
    //   $("#recruitmentConfirmationModal").modal("show");
    //   $("#recruitmentSubmit").click(function () {
    //     console.log(form);
    //     console.log($("#recruitmentForm"));
    //     // form.submit();
    //     $(this).submit(form)
    //   });
    // },
  });
  document
    .getElementById("recruitmentCv")
    .addEventListener("change", checkFile, false);
  console.log(document.getElementById("recruitmentCv").value);

  function checkFile(e) {
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
      if (!regex.test(sFileExtension) || iFileSize > 3145728) {
        $(".resume-help-block").html(
          "Allow only pdf, doc, docx, xlsx, csv and less than 3 MB."
        );
      } else {
        $(".resume-help-block").html(``);
      }
    }
  }
  $("#recruitmentSend").on("click", function () {
    if (recruitmentForm.valid() === true) {
      if (
        document.getElementById("resumeHelp").innerHTML ===
        "Allow only pdf, doc, docx, xlsx, csv and less than 3 MB."
      ) {
        document.getElementById("recruitmentCv").focus();
      } else {
        $("#recruitmentConfirmationModal").modal("show");
        $("#recruitmentSubmit").on("click", function () {
          recruitmentForm.submit();
        });
      }
    } else {
      recruitmentValidate.focusInvalid();
    }
  });
});

// Loading 
function preventScroll(e){
  e.preventDefault();
  e.stopPropagation();

  return false;
}

$("#recruitmentSubmit").click(function(e) {
  console.log("Loading");
  $('body').append(`
    <div class="loading">
      <div></div>
      <div></div>
      <div></div>
    </div>
  `);
  // window.scrollTo(0, 800);
  document.querySelector('.loading').addEventListener('wheel', preventScroll);
});