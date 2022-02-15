function readURL(input) {
  if (input.files && input.files[0]) {
    console.log(input.files[0])
    let reader = new FileReader();
    let extension = input.files[0]["type"].substring(input.files[0]["type"].indexOf("/")+1, input.files[0]["type"].length);
    let acceptExtension = /png|jpe?g|gif/i;
    let fileSize = input.files[0]["size"];
    fileSize = fileSize / 1024; //file size in Kb
    fileSize = fileSize / 1024; //file size in Mb

    if(!acceptExtension.test(extension)) {
        $("#userImgErr").text("Please enter a value Like (jpg, jpeg, png) a valid extension.");
        if(fileSize > 5) {
            $("#userImgErr").text("File size must not be more than 5 MB.");
        } 
    } else {
        if(fileSize > 5) {
            $("#userImgErr").text("File size must not be more than 5 MB.");
        } else {
            $("#userImgErr").text("");
        }
    }
    
    // else {
    //     $("#userImgErr").text("");
    // }
    
    reader.onload = function (e) {
    //   console.log(e.target.result);
      $("#image-preview").attr("src", e.target.result);
      $("#src").val(e.target.result);
      $("#image-preview").hide();
      $("#image-preview").fadeIn(650);
    };
    reader.readAsDataURL(input.files[0]);
  }
}

$("#userImg").change(function () {
  readURL(this);
});

var today = new Date();
var maxMonth = today.getMonth() + 1;     // getMonth() is zero-based
var maxDay = today.getDate();
var maxYear = today.getFullYear();
var minYear = today.getFullYear() - 70;
maxMonth = maxMonth < 10 ? '0' + maxMonth.toString() : maxMonth;
maxDay = maxDay < 10 ? '0' + maxDay.toString() : maxDay;

var maxDate = maxYear + '-' + maxMonth + '-' + maxDay;
$('#dob').attr('max', maxDate);
var minDate = minYear + '-' + 1 + '-' + 1;
$('#dob').attr('min', minDate);

// $(document).ready(function() {
//     $("#enroll").click(() => {
//         $.validator.addMethod(
//             "usernameRegex",
//             function (value, element) {
//               return this.optional(element) || /^([a-zA-Z]{1,}[ ]{0,1})*$/i.test(value);
//             },
//             "Username must contain only letters (Please Spell in English)"
//           );

//         $.validator.addMethod(
//             "phoneRegex",
//             function (value, element) {
//               return (
//                 this.optional(element) || /^\d+$/i.test(value)
//               );
//             },
//             "Your phone number's format is invalid"
//         );

//         $.validator.addMethod(
//             "nrcNumber",
//             function (value, element) {
//               return this.optional(element) || /^\d{6}$/i.test(value);
//             },
//             "NRC number must contain only numbers"
//         );

//         $.validator.addMethod(
//             "extension",
//             function(value, element, param) {
//               param = typeof param === "string" ? param.replace(/,/g, '|') : "png|jpe?g|gif";
//               return this.optional(element) || value.match(new RegExp(".(" + param + ")$", "i"));
//             },
//             "Please enter a value Like (jpg, jpeg, png) a valid extension."
//         );

//         $.validator.addMethod(
//             'maxfilesize',
//             function(value, element, param) {
//               var fileSize = 0;
//               fileSize = element.files[0].size; // get file size
//               fileSize = fileSize / 1024; //file size in Kb
//               fileSize = fileSize / 1024; //file size in Mb
//               return this.optional( element ) || fileSize <= param;
//             },
//             "File size must not be more than 5 MB."
//         );

//         var enrollForm = $("#studentEnrollment");

//         var enrollValidate = enrollForm.vallidate({
//             errorElement: "p",
//             errorClass: "help-block",
//             highlight: function (element, errorClass, validClass) {
//                 $(element).closest(".form-group").addClass("has-error");
//             },
//             unhighlight: function (element, errorClass, validClass) {
//                 $(element).closest(".form-group").removeClass("has-error");
//             },
//             rules: {
//                 photo: {
//                     required: true,
//                     maxfilesize : 5,
//                     extension: "jpg|jpeg|png",
//                 },
//                 classId: {
//                     required: true,
//                 },
//                 uname: {
//                     required: true,
//                     usernameRegex: true,
//                     minlength: 4,
//                 },
//                 bod: {
//                     required: true,
//                     // CheckDOB: true,
//                 },
//                 fname: {
//                     required: true,
//                     usernameRegex: true,
//                     minlength: 3,
//                 },
//                 nrcCode: {
//                     required: true,
//                 },
//                 township: {
//                     required: true,
//                 },
//                 type: {
//                     required: true,
//                 },
//                 nrcNumber: {
//                     required: true,
//                     minlength: 6,
//                     maxlength: 6,
//                     nrcNumber: true,
//                 },
//                 email: {
//                     required: false,
//                 },
//                 phone: {
//                     required: true,
//                     phoneRegex: true,
//                     minlength: 8,
//                     maxlength: 12
//                 },
//                 education: {
//                     required: true,
//                     minlength: 8,
//                 },
//                 address: {
//                     required: true,
//                     minlength: 8,
//                 },
//                 paymentMethod: {
//                     required: true,
//                 },
//                 paidPercent: {
//                     required: true,
//                     maxlength: 3,
//                 }
//             },
//             messages: {
//                 photo: {
//                     required: "Photo required",
//                 },
//                 classId: {
//                     required: "Please select one of the course"
//                 },
//                 uname: {
//                     required: "Full name required",
//                 },
//                 bod: {
//                     required: "Date of birth required",
//                 },
//                 fname: {
//                     required: "Father name required",
//                 },
//                 nrcCode: {
//                     required: "State required",
//                 },
//                 township: {
//                     required: "Township required",
//                 },
//                 type: {
//                     required: "Type required",
//                 },
//                 nrcNumber: {
//                     required: "NRC number required",
//                 },
//                 phone: {
//                     required: "Phone number required",
//                 },
//                 education: {
//                     required: "Education required",
//                 },
//                 address: {
//                     required: "Address required",
//                 },
//                 paymentMethod: {
//                     required: "Select the banking system",
//                 },
//                 paidPercent: {
//                     required: "Paid percent required"
//                 }
//             }
//         });

//         if (enrollForm.valid()) {
//             enrollForm.submit();
//         } else {
//             enrollValidate.focusInvalid();
//         }
//     })
// })
