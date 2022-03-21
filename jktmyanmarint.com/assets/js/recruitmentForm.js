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


$(document).ready(function() {
    // Eng Recruitment Form start 
    let enRecruitmentForm = $("#enRecruitmentForm");
    if (enRecruitmentForm) {
        console.log("en true")
        let enRecruitmentValidate = enRecruitmentForm.validate({
            errorElement: "p",
            errorClass: "help-block",
            highlight: function(element, errorClass, validClass) {
                $(element).closest(".appointment-label").addClass("has-error");
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).closest(".appointment-label").removeClass("has-error");
            },
            rules: {
                recruitmentName: {
                    required: true,
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
            errorPlacement: function(error, element) {
                if (element.is(":radio[name='gender']")) {
                    error.appendTo(element.parents(".appointment-type"));
                    console.log(error);
                } else {
                    // This is the default behavior
                    error.insertAfter(element);
                }
            },
            onfocusout: function(element) {
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
            .addEventListener("change", e => {
                $(".resume-help-block").html(``);
                var file_list = e.target.files;
                console.log(file_list);

                for (var i = 0, file;
                    (file = file_list[i]); i++) {
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
            }, false);
        $("#enRecruitmentSend").on("click", function() {
            if (enRecruitmentForm.valid() === true) {
                if (
                    document.getElementById("resumeHelp").innerHTML ===
                    "Allow only pdf, doc, docx, xlsx, csv and less than 3 MB."
                ) {
                    document.getElementById("recruitmentCv").focus();
                } else {
                    $("#recruitmentConfirmationModal").modal("show");
                    $("#recruitmentSubmit").on("click", function() {
                        enRecruitmentForm.submit();
                    });
                }
            } else {
                enRecruitmentValidate.focusInvalid();
            }
        });
    }
    // Eng Recruitment Form end

    // MM Recruitment Form start
    let mmRecruitmentForm = $("#mmRecruitmentForm");
    if (mmRecruitmentForm) {
        console.log("mm true")
        let mmRecruitmentValidate = mmRecruitmentForm.validate({
            errorElement: "p",
            errorClass: "help-block",
            highlight: function(element, errorClass, validClass) {
                $(element).closest(".appointment-label").addClass("has-error");
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).closest(".appointment-label").removeClass("has-error");
            },
            rules: {
                recruitmentName: {
                    required: true,
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
            },
            messages: {
                recruitmentName: {
                    required: "အမည်ရေးသွင်းပေးပါ",
                },
                recruitmentEmail: {
                    required: "အီးမေးလ််််််််််််််််််််််းရေးသွင်းပေးပါ",
                },
                recruitmentPhone: {
                    required: "ဖုန်းနံပါတ်‌ရေးသွင်းပေးပါ",
                },
                recruitmentDob: {
                    required: "မွေးသက္ကရာဇ်ဖြည့်ပေးပါ",
                },
                gender: {
                    required: "ကျား/မ ရွေးပေးပါ",
                },
                recruitmentJpSkill: {
                    required: "ဂျပန်စာအရည်အချင်း ရွေးပေးပါ",
                },
            },
            errorPlacement: function(error, element) {
                if (element.is(":radio[name='gender']")) {
                    error.appendTo(element.parents(".appointment-type"));
                    console.log(error);
                } else {
                    // This is the default behavior
                    error.insertAfter(element);
                }
            },
            onfocusout: function(element) {
                if (!this.checkable(element)) {
                    this.element(element);
                }
            },
        });
        document
            .getElementById("recruitmentCv")
            .addEventListener("change", e => {
                $(".resume-help-block").html(``);
                var file_list = e.target.files;
                console.log(file_list);

                for (var i = 0, file;
                    (file = file_list[i]); i++) {
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
                            "pdf, doc, docx, xlsx, csv ဖိုင်တို့နှင့် ဖိုင်ဆိုဒ် 3 MB အောက်သာထည့်ပေးပါ"
                        );
                    } else {
                        $(".resume-help-block").html(``);
                    }
                }
            }, false);
        $("#mmRecruitmentSend").on("click", function() {
            if (mmRecruitmentForm.valid() === true) {
                if (
                    document.getElementById("resumeHelp").innerHTML ===
                    "pdf, doc, docx, xlsx, csv ဖိုင်တို့နှင့် ဖိုင်ဆိုဒ် 3 MB အောက်သာထည့်ပေးပါ"
                ) {
                    document.getElementById("recruitmentCv").focus();
                } else {
                    $("#recruitmentConfirmationModal").modal("show");
                    $("#recruitmentSubmit").on("click", function() {
                        mmRecruitmentForm.submit();
                    });
                }
            } else {
                mmRecruitmentValidate.focusInvalid();
            }
        });
    }
    // MM Recruitment Form end

    // Japan Recruitment Form start
    let jpRecruitmentForm = $("#jpRecruitmentForm");
    if (jpRecruitmentForm) {
        console.log("jp true")
        let jpRecruitmentValidate = jpRecruitmentForm.validate({
            errorElement: "p",
            errorClass: "help-block",
            highlight: function(element, errorClass, validClass) {
                $(element).closest(".appointment-label").addClass("has-error");
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).closest(".appointment-label").removeClass("has-error");
            },
            rules: {
                recruitmentName: {
                    required: true,
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
            },
            messages: {
                recruitmentName: {
                    required: "名前を入力してください",
                },
                recruitmentEmail: {
                    required: "メールを入力してください",
                },
                recruitmentPhone: {
                    required: "電話番号を入力してください",
                },
                recruitmentDob: {
                    required: "生年月日を入力してください",
                },
                gender: {
                    required: "性別を選んでください",
                },
                recruitmentJpSkill: {
                    required: "日本語能力レベルを選んでください",
                },
            },
            errorPlacement: function(error, element) {
                if (element.is(":radio[name='gender']")) {
                    error.appendTo(element.parents(".appointment-type"));
                    console.log(error);
                } else {
                    // This is the default behavior
                    error.insertAfter(element);
                }
            },
            onfocusout: function(element) {
                if (!this.checkable(element)) {
                    this.element(element);
                }
            },
        });
        document
            .getElementById("recruitmentCv")
            .addEventListener("change", e => {
                $(".resume-help-block").html(``);
                var file_list = e.target.files;
                console.log(file_list);

                for (var i = 0, file;
                    (file = file_list[i]); i++) {
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
                            "pdf、doc、docx、xlsx、csv、および 3MB 未満のみを 許可してください。"
                        );
                    } else {
                        $(".resume-help-block").html(``);
                    }
                }
            }, false);
        $("#jpRecruitmentSend").on("click", function() {
            if (jpRecruitmentForm.valid() === true) {
                if (
                    document.getElementById("resumeHelp").innerHTML ===
                    "pdf、doc、docx、xlsx、csv、および 3MB 未満のみを 許可してください。"
                ) {
                    document.getElementById("recruitmentCv").focus();
                } else {
                    $("#recruitmentConfirmationModal").modal("show");
                    $("#recruitmentSubmit").on("click", function() {
                        jpRecruitmentForm.submit();
                    });
                }
            } else {
                jpRecruitmentValidate.focusInvalid();
            }
        });
    }
    // Japan Recruitment Form end
});

// Loading 
function preventScroll(e) {
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