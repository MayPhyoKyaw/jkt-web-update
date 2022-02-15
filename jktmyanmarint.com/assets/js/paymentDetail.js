function readFile(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      var htmlPreview =
        '<img width="200" src="' +
        e.target.result +
        '" />' +
        "<p>" +
        input.files[0].name +
        "</p>";
      var wrapperZone = $(input).parent();
      var previewZone = $(input).parent().parent().find(".preview-zone");
      var boxZone = $(input)
        .parent()
        .parent()
        .find(".preview-zone")
        .find(".box")
        .find(".box-body");

      wrapperZone.removeClass("dragover");
      previewZone.removeClass("hidden");
      boxZone.empty();
      boxZone.append(htmlPreview);
    };
    reader.readAsDataURL(input.files[0]);
  }
}

$(".dropzone").change(function () {
  readFile(this);
  if($(".preview-zone").hasClass("hidden")) {
    console.log("hello")
    $("#ssRequired").text('');
  }
});

$(".dropzone-wrapper").on("dragover", function (e) {
  e.preventDefault();
  e.stopPropagation();
  $(this).addClass("dragover");
});

$(".dropzone-wrapper").on("dragleave", function (e) {
  e.preventDefault();
  e.stopPropagation();
  $(this).removeClass("dragover");
});

$(document).ready(function () {
  var paymentForm = $("#paymentForm");
  var nrc = document.getElementById("nrc").innerHTML;
  var nrcNo = nrc.substring(nrc.length - 6)
  console.log(typeof nrcNo);
  $.validator.addMethod(
    "nrcNumber",
    function (value, element) {
      return this.optional(element) || /^\d{6}$/i.test(value);
    },
    "NRC number must contain only numbers"
  );

  $.validator.addMethod(
    "nrcEqual",
    function (value, element) {
      return value === nrcNo ? true : false;
    }, 
    "NRC Number Not Found! Please Contact Admin Team."
  );

  $.validator.addMethod(
    "extension", 
    function(value, element, param) {
      param = typeof param === "string" ? param.replace(/,/g, '|') : "png|jpe?g|gif";
      return this.optional(element) || value.match(new RegExp(".(" + param + ")$", "i"));
    }, 
    "Please enter a value Like (jpg, jpeg, png) a valid extension."
  );

  $.validator.addMethod(
    'maxfilesize', 
    function(value, element, param) {
      var fileSize = 0;
      fileSize = element.files[0].size; // get file size
      fileSize = fileSize / 1024; //file size in Kb
      fileSize = fileSize / 1024; //file size in Mb
      return this.optional( element ) || fileSize <= param;
    }, 
    "File size must not be more than 5 MB."
  );

  paymentForm.validate({
    // errorElement: "span",
    errorPlacement: function(error, element) {
      if(element.attr("name") === "nrcNumber") {
        error.appendTo("#nrcNoRequired");
      } else if (element.attr("name") === "paymentImg") {
        error.appendTo("#ssRequired");
      }
    },
    rules: {
      nrcNumber: {
        required: true,
        minlength: 6,
        maxlength: 6,
        nrcNumber: true,
        nrcEqual: true,
      },
      paymentImg: {
        required: true,
        maxfilesize : 5,
				extension: "jpg|jpeg|png",
      }
    },
    messages: {
      nrcNumber: {
        required: "NRC Number required",
      },
      paymentImg: {
        required: "Payment Screenshot required",
      }
    }
  })
})