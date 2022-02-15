
$(function () {
  $(".calendar").datepicker({
    dateFormat: "dd/mm/yy",
    minDate: 0,
    // maxDate: '6m'
  });

  $(document).on("click", ".date-picker .input", function (e) {
    var me = $(this),
      parent = me.parents(".date-picker");
    parent.toggleClass("open");
  });

  $(".calendar").on("change", function () {
    var me = $(this),
      selected = me.val(),
      parent = me.parents(".date-picker");
    parent.find(".result").val(`Selected Date: ${selected}`);
    // document.getElementById("appointment_date").value = selected;
  });

  $.validator.addMethod(
    "nameRegex",
    function (value, element) {
      return this.optional(element) || /^([a-zA-Z]{1,}[ ]{0,1})*$/i.test(value);
    },
    "Name must contain only letters (Please Spell in English)"
  );

  $("#survey-form").validate({
    errorElement: "p",
    errorClass: "help-block",
    highlight: function (element, errorClass, validClass) {
      $(element).closest(".appointment-label").addClass("has-error");
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).closest(".appointment-label").removeClass("has-error");
    },
    rules: {
      name: {
        required: true,
        nameRegex: true,
        minlength: 4,
      },
      email: {
        required: true,
      },
      phone: {
        required: true,
        minlength: 8,
        maxlength: 12,
      },
      appointment_type: {
        required: true,
      },
      appointment_date: {
        required: true,
      },
      appointment_time: {
        required: true,
      },
      appointment_duration: {
        required: true,
      },
      about_consultant: {
        required: true,
      },
    },
    messages: {
      name: {
        required: "Name required",
      },
      email: {
        required: "Email required",
      },
      phone: {
        required: "Phone number required",
      },
      appointment_type: {
        required: "Appointment type required",
      },
      appointment_date: {
        required: "Appointment date required",
      },
      appointment_time: {
        required: "Appointment time required",
      },
      appointment_duration: {
        required: "Appointment duration required",
      },
      about_consultant: {
        required: "Consultant description required",
      },
    },
    errorPlacement: function (error, element) {
      if (element.is(":radio[name='appointment_type']")) {
        error.appendTo(element.parents(".appointment-type"));
      } else if (element.is(":radio[name='appointment_time']")) {
        error.appendTo(element.parents(".appointment-time"));
      } else if (element.is("input[name='appointment_date']")) {
        error.appendTo(element.parents(".appointment-date"));
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
    submitHandler: function (form) {
      $("#confirmationModal").modal('show');
      $('#consultSubmit').click(function () {
        console.log(form)
          form.submit();
     });
  }
  });
  $("#appointment_date").on("focusin", function () {
    $(this).prop("readonly", true);
  });
  $("#appointment_date").on("focusout", function () {
    $(this).prop("readonly", false);
  });
});
