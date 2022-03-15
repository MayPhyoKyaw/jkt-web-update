var current_slide, next_slide, previous_slide;
var left, opacity, scale;
var animation;

var error = false;
var wageParent = $("#eng_wage_parent");
var curWageType = 1;

$("#customConfirm").css({ display: "none" });
// TEXTAREA INPUT KEY DOWN PREVENT
$(".no-keydown").keydown(function(e) {
    e.preventDefault();
    return false;
});

// ENG STEP VALIDATION

$("#job_id").keyup(function() {
    var id = $("#job_id").val();
    if (id == "") {
        $("#error_job_id").text("Please enter Job ID");
        $("#job_id").addClass("box_error");
        error = true;
    } else {
        $("#error_job_id").text("");
        $("#job_id").removeClass("box_error");
        error = false;
    }
});
$("#eng_company_name").keyup(function() {
    var name = $("#eng_company_name").val();
    if (name == "") {
        $("#eng_error_company_name").text("Please enter company Name");
        $("#eng_company_name").addClass("box_error");
        error = true;
    } else {
        $("#eng_error_company_name").text("");
        $("#eng_company_name").removeClass("box_error");
        error = false;
    }
});
$("#eng_job_title").keyup(function() {
    var title = $("#eng_job_title").val();
    if (title == "") {
        $("#eng_error_job_title").text("Please enter job title");
        $("#eng_job_title").addClass("box_error");
        error = true;
    } else {
        $("#eng_error_job_title").text("");
        $("#eng_job_title").removeClass("box_error");
        error = false;
    }
});
$("#eng_wage").keyup(function() {
    var wage = $("#eng_wage").val();
    if (wage == "") {
        $("#eng_error_wage").text("Please enter wage");
        $("#eng_wage").addClass("box_error");
        error = true;
    } else {
        $("#eng_error_wage").text("");
        $("#eng_wage").removeClass("box_error");
        error = false;
    }
});
$("#eng_holidays").keyup(function() {
    var val = $("#eng_holidays").val();
    if (val == "") {
        $("#eng_error_holidays").text("Please enter holidays");
        $("#eng_holidays").addClass("box_error");
        error = true;
    } else {
        $("#eng_error_holidays").text("");
        $("#eng_holidays").removeClass("box_error");
        error = false;
    }
});
$("#eng_workinghr").keyup(function() {
    var val = $("#eng_workinghr").val();
    if (val == "") {
        $("#eng_error_workinghr").text("Please enter working hours");
        $("#eng_workinghr").addClass("box_error");
        error = true;
    } else {
        $("#eng_error_workinghr").text("");
        $("#eng_workinghr").removeClass("box_error");
        error = false;
    }
});
$("#eng_breaktime").keyup(function() {
    var val = $("#eng_breaktime").val();
    if (val == "") {
        $("#eng_error_breaktime").text("Please enter break-time");
        $("#eng_breaktime").addClass("box_error");
        error = true;
    } else {
        $("#eng_error_breaktime").text("");
        $("#eng_breaktime").removeClass("box_error");
        error = false;
    }
});
$("#eng_requirements").keyup(function() {
    var val = $("#eng_requirements").val();
    if (val == "") {
        $("#eng_error_requirements").text("Please enter requirements");
        $("#eng_requirements").addClass("box_error");
        error = true;
    } else {
        $("#eng_error_requirements").text("");
        $("#eng_requirements").removeClass("box_error");
        error = false;
    }
});
$("#eng_benefits").keyup(function() {
    var val = $("#eng_benefits").val();
    if (val == "") {
        $("#eng_error_benefits").text("Please enter benefits");
        $("#eng_benefits").addClass("box_error");
        error = true;
    } else {
        $("#eng_error_benefits").text("");
        $("#eng_benefits").removeClass("box_error");
        error = false;
    }
});
$("#eng_location").keyup(function() {
    var val = $("#eng_location").val();
    if (val == "") {
        $("#eng_error_location").text("Please enter location");
        $("#eng_location").addClass("box_error");
        error = true;
    } else {
        $("#eng_error_location").text("");
        $("#eng_location").removeClass("box_error");
        error = false;
    }
});

// MM STEP VALIDATION
$("#mm_company_name").keyup(function() {
    var name = $("#name").val();
    if (name == "") {
        $("#mm_error_company_name").text("Please enter company Name");
        $("#mm_company_name").addClass("box_error");
        error = true;
    } else {
        $("#mm_error_company_name").text("");
        $("#mm_company_name").removeClass("box_error");
        error = false;
    }
});
$("#mm_job_title").keyup(function() {
    var title = $("#mm_job_title").val();
    if (title == "") {
        $("#mm_error_job_title").text("Please enter job title");
        $("#mm_job_title").addClass("box_error");
        error = true;
    } else {
        $("#mm_error_job_title").text("");
        $("#mm_job_title").removeClass("box_error");
        error = false;
    }
});
$("#mm_wage").keyup(function() {
    var wage = $("#mm_wage").val();
    if (wage == "") {
        $("#mm_error_wage").text("Please enter wage");
        $("#mm_wage").addClass("box_error");
        error = true;
    } else {
        $("#mm_error_wage").text("");
        $("#mm_wage").removeClass("box_error");
        error = false;
    }
});
$("#mm_holidays").keyup(function() {
    var val = $("#mm_holidays").val();
    if (val == "") {
        $("#mm_error_holidays").text("Please enter holidays");
        $("#mm_holidays").addClass("box_error");
        error = true;
    } else {
        $("#mm_error_holidays").text("");
        $("#mm_holidays").removeClass("box_error");
        error = false;
    }
});
$("#mm_workinghr").keyup(function() {
    var val = $("#mm_workinghr").val();
    if (val == "") {
        $("#mm_error_workinghr").text("Please enter working hours");
        $("#mm_workinghr").addClass("box_error");
        error = true;
    } else {
        $("#mm_error_workinghr").text("");
        $("#mm_workinghr").removeClass("box_error");
        error = false;
    }
});
$("#mm_breaktime").keyup(function() {
    var val = $("#mm_breaktime").val();
    if (val == "") {
        $("#mm_error_breaktime").text("Please enter break-time");
        $("#mm_breaktime").addClass("box_error");
        error = true;
    } else {
        $("#mm_error_breaktime").text("");
        $("#mm_breaktime").removeClass("box_error");
        error = false;
    }
});
$("#mm_requirements").keyup(function() {
    var val = $("#mm_requirements").val();
    if (val == "") {
        $("#mm_error_requirements").text("Please enter requirements");
        $("#mm_requirements").addClass("box_error");
        error = true;
    } else {
        $("#mm_error_requirements").text("");
        $("#mm_requirements").removeClass("box_error");
        error = false;
    }
});
$("#mm_benefits").keyup(function() {
    var val = $("#mm_benefits").val();
    if (val == "") {
        $("#mm_error_benefits").text("Please enter benefits");
        $("#mm_benefits").addClass("box_error");
        error = true;
    } else {
        $("#mm_error_benefits").text("");
        $("#mm_benefits").removeClass("box_error");
        error = false;
    }
});
$("#mm_location").keyup(function() {
    var val = $("#mm_location").val();
    if (val == "") {
        $("#mm_error_location").text("Please enter location");
        $("#mm_location").addClass("box_error");
        error = true;
    } else {
        $("#mm_error_location").text("");
        $("#mm_location").removeClass("box_error");
        error = false;
    }
});

// JP STEP VALIDATION
$("#jp_company_name").keyup(function() {
    var name = $("#name").val();
    if (name == "") {
        $("#jp_error_company_name").text("Please enter company Name");
        $("#jp_company_name").addClass("box_error");
        error = true;
    } else {
        $("#jp_error_company_name").text("");
        $("#jp_company_name").removeClass("box_error");
        error = false;
    }
});
$("#jp_job_title").keyup(function() {
    var title = $("#jp_job_title").val();
    if (title == "") {
        $("#jp_error_job_title").text("Please enter job title");
        $("#jp_job_title").addClass("box_error");
        error = true;
    } else {
        $("#jp_error_job_title").text("");
        $("#jp_job_title").removeClass("box_error");
        error = false;
    }
});
$("#jp_wage").keyup(function() {
    var wage = $("#jp_wage").val();
    if (wage == "") {
        $("#jp_error_wage").text("Please enter wage");
        $("#jp_wage").addClass("box_error");
        error = true;
    } else {
        $("#jp_error_wage").text("");
        $("#jp_wage").removeClass("box_error");
        error = false;
    }
});
$("#jp_holidays").keyup(function() {
    var val = $("#jp_holidays").val();
    if (val == "") {
        $("#jp_error_holidays").text("Please enter holidays");
        $("#jp_holidays").addClass("box_error");
        error = true;
    } else {
        $("#jp_error_holidays").text("");
        $("#jp_holidays").removeClass("box_error");
        error = false;
    }
});
$("#jp_workinghr").keyup(function() {
    var val = $("#jp_workinghr").val();
    if (val == "") {
        $("#jp_error_workinghr").text("Please enter working hours");
        $("#jp_workinghr").addClass("box_error");
        error = true;
    } else {
        $("#jp_error_workinghr").text("");
        $("#jp_workinghr").removeClass("box_error");
        error = false;
    }
});
$("#jp_breaktime").keyup(function() {
    var val = $("#jp_breaktime").val();
    if (val == "") {
        $("#jp_error_breaktime").text("Please enter break-time");
        $("#jp_breaktime").addClass("box_error");
        error = true;
    } else {
        $("#jp_error_breaktime").text("");
        $("#jp_breaktime").removeClass("box_error");
        error = false;
    }
});
$("#jp_requirements").keyup(function() {
    var val = $("#jp_requirements").val();
    if (val == "") {
        $("#jp_error_requirements").text("Please enter requirements");
        $("#jp_requirements").addClass("box_error");
        error = true;
    } else {
        $("#jp_error_requirements").text("");
        $("#jp_requirements").removeClass("box_error");
        error = false;
    }
});
$("#jp_benefits").keyup(function() {
    var val = $("#jp_benefits").val();
    if (val == "") {
        $("#jp_error_benefits").text("Please enter benefits");
        $("#jp_benefits").addClass("box_error");
        error = true;
    } else {
        $("#jp_error_benefits").text("");
        $("#jp_benefits").removeClass("box_error");
        error = false;
    }
});
$("#jp_location").keyup(function() {
    var val = $("#jp_location").val();
    if (val == "") {
        $("#jp_error_location").text("Please enter location");
        $("#jp_location").addClass("box_error");
        error = true;
    } else {
        $("#jp_error_location").text("");
        $("#jp_location").removeClass("box_error");
        error = false;
    }
});

// START ENG STEP VALIDATION
$(".fs_next_btn").click(function() {

    if ($("#job_id").val() == "") {
        $("#error_job_id").text("Please enter Job ID.");
        $("#job_id").addClass("box_error");
        error = true;
    }
    if ($("#eng_company_name").val() == "") {
        $("#eng_error_company_name").text("Please enter company name.");
        $("#eng_company_name").addClass("box_error");
        error = true;
    }
    if ($("#eng_job_title").val() == "") {
        $("#eng_error_job_title").text("Please enter job title.");
        $("#eng_job_title").addClass("box_error");
        error = true;
    }
    if ($("#eng_wage").val() == "") {
        $("#eng_error_wage").text("Please enter wage.");
        $("#eng_wage").addClass("box_error");
        error = true;
    }
    if ($("#eng_holidays").val() == "") {
        $("#eng_error_holidays").text("Please enter holidays.");
        $("#eng_holidays").addClass("box_error");
        error = true;
    }
    if ($("#eng_workinghr").val() == "") {
        $("#eng_error_workinghr").text("Please enter working hours.");
        $("#eng_workinghr").addClass("box_error");
        error = true;
    }
    if ($("#eng_breaktime").val() == "") {
        $("#eng_error_breaktime").text("Please enter break-time.");
        $("#eng_breaktime").addClass("box_error");
        error = true;
    }
    if ($("#eng_requirements").val() == "") {
        $("#eng_error_requirements").text("Please enter requirements.");
        $("#eng_requirements").addClass("box_error");
        error = true;
    }
    if ($("#eng_benefits").val() == "") {
        $("#eng_error_benefits").text("Please enter benefits.");
        $("#eng_benefits").addClass("box_error");
        error = true;
    }
    if ($("#eng_location").val() == "") {
        $("#eng_error_location").text("Please enter work location.");
        $("#eng_location").addClass("box_error");
        error = true;
    }

    // animation
    if (!error) {
        $("#job_id").removeClass("box_error");
        $("#eng_company_name").removeClass("box_error");
        $("#eng_job_title").removeClass("box_error");
        $("#eng_wage").removeClass("box_error");
        $("#eng_holidays").removeClass("box_error");
        $("#eng_workinghr").removeClass("box_error");
        $("#eng_breaktime").removeClass("box_error");
        $("#eng_requirements").removeClass("box_error");
        $("#eng_benefits").removeClass("box_error");
        $("#eng_location").removeClass("box_error");
        if (animation) return false;
        animation = true;

        current_slide = $(this).parent().parent();
        next_slide = $(this).parent().parent().next();

        $("#progress_header li")
            .eq($(".multistep-box").index(next_slide))
            .addClass("active");
        $("#progress_header li img")
            .eq($(".multistep-box").index(next_slide))
            .addClass("versionFlag-active");

        next_slide.show();
        current_slide.animate({
            opacity: 0,
        }, {
            step: function(now, mx) {
                scale = 1 - (1 - now) * 0.2;
                left = now * 50 + "%";
                opacity = 1 - now;
                current_slide.css({
                    transform: "scale(" + scale + ")",
                });
                next_slide.css({
                    left: left,
                    opacity: opacity,
                });
            },
            duration: 800,
            complete: function() {
                current_slide.hide();
                animation = false;
            },
            easing: "easeInOutBack",
        });
    }
});

// START MM STEP VALIDATION
$(".ss_next_btn").click(function() {
    if ($("#mm_company_name").val() == "") {
        $("#mm_error_company_name").text("Please enter company name.");
        $("#mm_company_name").addClass("box_error");
        error = true;
    }
    if ($("#mm_job_title").val() == "") {
        $("#mm_error_job_title").text("Please enter job title.");
        $("#mm_job_title").addClass("box_error");
        error = true;
    }
    if ($("#mm_wage").val() == "") {
        $("#mm_error_wage").text("Please enter wage.");
        $("#mm_wage").addClass("box_error");
        error = true;
    }
    if ($("#mm_holidays").val() == "") {
        $("#mm_error_holidays").text("Please enter holidays.");
        $("#mm_holidays").addClass("box_error");
        error = true;
    }
    if ($("#mm_workinghr").val() == "") {
        $("#mm_error_workinghr").text("Please enter working hours.");
        $("#mm_workinghr").addClass("box_error");
        error = true;
    }
    if ($("#mm_breaktime").val() == "") {
        $("#mm_error_breaktime").text("Please enter break-time.");
        $("#mm_breaktime").addClass("box_error");
        error = true;
    }
    if ($("#mm_requirements").val() == "") {
        $("#mm_error_requirements").text("Please enter requirements.");
        $("#mm_requirements").addClass("box_error");
        error = true;
    }
    if ($("#mm_benefits").val() == "") {
        $("#mm_error_benefits").text("Please enter benefits.");
        $("#mm_benefits").addClass("box_error");
        error = true;
    }
    if ($("#mm_location").val() == "") {
        $("#mm_error_location").text("Please enter work location.");
        $("#mm_location").addClass("box_error");
        error = true;
    }

    // animation
    if (!error) {
        $("#mm_company_name").removeClass("box_error");
        $("#mm_job_title").removeClass("box_error");
        $("#mm_wage").removeClass("box_error");
        $("#mm_holidays").removeClass("box_error");
        $("#mm_workinghr").removeClass("box_error");
        $("#mm_breaktime").removeClass("box_error");
        $("#mm_requirements").removeClass("box_error");
        $("#mm_benefits").removeClass("box_error");
        $("#mm_location").removeClass("box_error");
        if (animation) return false;
        animation = true;

        current_slide = $(this).parent().parent();
        next_slide = $(this).parent().parent().next();

        $("#progress_header li")
            .eq($(".multistep-box").index(next_slide))
            .addClass("active");
        $("#progress_header li img")
            .eq($(".multistep-box").index(next_slide))
            .addClass("versionFlag-active");

        next_slide.show();
        current_slide.animate({
            opacity: 0,
        }, {
            step: function(now, mx) {
                scale = 1 - (1 - now) * 0.2;
                left = now * 50 + "%";
                opacity = 1 - now;
                current_slide.css({
                    transform: "scale(" + scale + ")",
                });
                next_slide.css({
                    left: left,
                    opacity: opacity,
                });
            },
            duration: 800,
            complete: function() {
                current_slide.hide();
                animation = false;
            },
            easing: "easeInOutBack",
        });
    }

    if (!error) {
        $("#mm_company_name").removeClass("box_error");
        $("#mm_job_title").removeClass("box_error");
        $("#mm_wage").removeClass("box_error");
        $("#mm_holidays").removeClass("box_error");
        $("#mm_workinghr").removeClass("box_error");
        $("#mm_breaktime").removeClass("box_error");
        $("#mm_requirements").removeClass("box_error");
        $("#mm_benefits").removeClass("box_error");
        $("#mm_location").removeClass("box_error");
        if (animation) return false;
        animation = true;

        current_slide = $(this).parent().parent();
        next_slide = $(this).parent().parent().next();

        $("#progress_header li")
            .eq($(".multistep-box").index(next_slide))
            .addClass("active");
        $("#progress_header li img")
            .eq($(".multistep-box").index(next_slide))
            .addClass("versionFlag-active");

        next_slide.show();
        current_slide.animate({
            opacity: 0,
        }, {
            step: function(now, mx) {
                scale = 1 - (1 - now) * 0.2;
                left = now * 50 + "%";
                opacity = 1 - now;
                current_slide.css({
                    transform: "scale(" + scale + ")",
                });
                next_slide.css({
                    left: left,
                    opacity: opacity,
                });
            },
            duration: 800,
            complete: function() {
                current_slide.hide();
                animation = false;
            },
            easing: "easeInOutBack",
        });
    }
});

// START JP STEP VALIDATION
$(".ts_next_btn").click(function() {
    if ($("#jp_company_name").val() == "") {
        $("#jp_error_company_name").text("Please enter company name.");
        $("#jp_company_name").addClass("box_error");
        error = true;
    }
    if ($("#jp_job_title").val() == "") {
        $("#jp_error_job_title").text("Please enter job title.");
        $("#jp_job_title").addClass("box_error");
        error = true;
        $(".submit_btn").prop("disabled", true);
    }
    if ($("#jp_wage").val() == "") {
        $("#jp_error_wage").text("Please enter wage.");
        $("#jp_wage").addClass("box_error");
        error = true;
    }
    if ($("#jp_holidays").val() == "") {
        $("#jp_error_holidays").text("Please enter holidays.");
        $("#jp_holidays").addClass("box_error");
        error = true;
    }
    if ($("#jp_workinghr").val() == "") {
        $("#jp_error_workinghr").text("Please enter working hours.");
        $("#jp_workinghr").addClass("box_error");
        error = true;
    }
    if ($("#jp_breaktime").val() == "") {
        $("#jp_error_breaktime").text("Please enter break-time.");
        $("#jp_breaktime").addClass("box_error");
        error = true;
    }
    if ($("#jp_requirements").val() == "") {
        $("#jp_error_requirements").text("Please enter requirements.");
        $("#jp_requirements").addClass("box_error");
        error = true;
    }
    if ($("#jp_benefits").val() == "") {
        $("#jp_error_benefits").text("Please enter benefits.");
        $("#jp_benefits").addClass("box_error");
        error = true;
    }
    if ($("#jp_location").val() == "") {
        $("#jp_error_location").text("Please enter work location.");
        $("#jp_location").addClass("box_error");
        error = true;
    }

    if (!error) {
        $("#jp_company_name").removeClass("box_error");
        $("#jp_job_title").removeClass("box_error");
        $("#jp_wage").removeClass("box_error");
        $("#jp_holidays").removeClass("box_error");
        $("#jp_workinghr").removeClass("box_error");
        $("#jp_breaktime").removeClass("box_error");
        $("#jp_requirements").removeClass("box_error");
        $("#jp_benefits").removeClass("box_error");
        $("#jp_location").removeClass("box_error");
        if (animation) return false;
        animation = true;

        current_slide = $(this).parent().parent();
        next_slide = $(this).parent().parent().next();

        $("#progress_header li")
            .eq($(".multistep-box").index(next_slide))
            .addClass("active");
        $("#progress_header li img")
            .eq($(".multistep-box").index(next_slide))
            .addClass("versionFlag-active");
        // next_slide.show();
        // current_slide.animate(
        //   {
        //     opacity: 0,
        //   },
        //   {
        //     step: function (now, mx) {
        //       scale = 1 - (1 - now) * 0.2;
        //       left = now * 50 + "%";
        //       opacity = 1 - now;
        //       current_slide.css({
        //         transform: "scale(" + scale + ")",
        //       });
        //       next_slide.css({
        //         left: left,
        //         opacity: opacity,
        //       });
        //     },
        //     duration: 800,
        //     complete: function () {
        //       current_slide.hide();
        //       animation = false;
        //     },
        //     easing: "easeInOutBack",
        //   }
        // );
    } else {
        $(".submit_btn").prop("disabled", true);
        $(".submit_btn").removeClass("action-button");
        $(".submit_btn").addClass("action-btn-disabled");
    }
});
// previous
$(".previous").click(function() {
    // console.log("go previous");
    // if (animation) return false;
    animation = true;

    current_slide = $(this).parent().parent();
    previous_slide = $(this).parent().parent().prev();

    $("#progress_header li")
        .eq($(".multistep-box").index(current_slide))
        .removeClass("active");
    $("#progress_header li img")
        .eq($(".multistep-box").index(next_slide))
        .removeClass("versionFlag-active");
    previous_slide.show();
    current_slide.animate({
        opacity: 0,
    }, {
        step: function(now, mx) {
            scale = 0.8 + (1 - now) * 0.2;
            left = (1 - now) * 50 + "%";
            opacity = 1 - now;
            current_slide.css({
                left: left,
            });
            previous_slide.css({
                transform: "scale(" + scale + ")",
                opacity: opacity,
            });
        },
        duration: 800,
        complete: function() {
            current_slide.hide();
            animation = false;
        },
        easing: "easeInOutBack",
    });
});

$("#submitBtn").click(function(e) {
    // console.log("stop submit");
    e.preventDefault();
    if (CheckAll()) {
        $("#confirmModal").modal("show");
    } else {
        // do not show modal
    }
});
// $("#confirmCancel").click(function (e) {
//   $("#customConfirm").css({ display: "none" });
// });

// ADD NEW BUTTON FROM ENG VERSION
$("#EngAddNewWage").click(function(event) {
    event.preventDefault(); // cancel default behavior
    // <div>
    //     <label class="wage-title">Type One</label>
    //     <div style="display: flex; justify-content: space-between;" class="my-3">
    //         <input type="text" name="wage0" placeholder="Wage in Yen (eg. 10,000)" id="wage0" class="input-number">
    //         <select name="wage0_unit" id="wage0_unit" class="input-select-sm">
    //             <option value="hourly">Hourly</option>
    //             <option value="daily">Daily</option>
    //             <option value="monthly">Monthly</option>
    //         </select>
    //     </div>
    // </div>
    curWageType++;
    var newWageType = $(`<div id="eng_wage${curWageType}_container"></div>`);
    var option1 = $(
        `<option id="eng_wage${curWageType}_unithourly" value="hourly">Hourly</option>`
    );
    var option2 = $(
        `<option id="eng_wage${curWageType}_unitdaily" value="daily">Daily</option>`
    );
    var option3 = $(
        `<option id="eng_wage${curWageType}_unitmonthly" value="monthly">Monthly</option>`
    );
    var option4 = $(
        `<option id="eng_wage${curWageType}_unitannually" value="annually">Annually</option>`
    );
    var newSelect = $(
        `<select name="eng_wage${curWageType}_unit" id="eng_wage${curWageType}_unit" class="input-select-sm"></select>`
    );
    newSelect.append(option1, option2, option3, option4);
    var input = $(
        `<input type="text" name="eng_wage${curWageType}" placeholder="Wage in Yen (eg. 10,000)" id="eng_wage${curWageType}" class="input-number">`
    );
    var innerWageContainer = $(`<div class="wage-flex my-3">`);
    var removeBtn = $(
        `<i class="fa fa-close mr-3 text-danger" onclick="removeWageType(this)" type="button"></i>`
    );
    innerWageContainer.append(removeBtn, input, newSelect);
    //   var newLabel = $(`<label class="wage-title">Type ${curWageType}</label>`);
    newWageType.append(innerWageContainer);
    wageParent.append(newWageType);
});

// ADD NEW BUTTON FROM MYANMAR VERSION
$("#MmAddNewWage").click(function(event) {
    event.preventDefault(); // cancel default behavior
    var wageParent = $("#mm_wage_parent");
    curWageType++;
    var newWageType = $(`<div id="mm_wage${curWageType}_container"></div>`);
    var option1 = $(
        `<option id="mm_wage${curWageType}_unithourly" value="hourly">Hourly</option>`
    );
    var option2 = $(
        `<option id="mm_wage${curWageType}_unitdaily" value="daily">Daily</option>`
    );
    var option3 = $(
        `<option id="mm_wage${curWageType}_unitmonthly" value="monthly">Monthly</option>`
    );
    var option4 = $(
        `<option id="mm_wage${curWageType}_unitannually" value="annually">Annually</option>`
    );
    var newSelect = $(
        `<select name="mm_wage${curWageType}_unit" id="mm_wage${curWageType}_unit" class="input-select-sm"></select>`
    );
    newSelect.append(option1, option2, option3, option4);
    var input = $(
        `<input type="text" name="mm_wage${curWageType}" placeholder="Wage in Yen (eg. 10,000)" id="mm_wage${curWageType}" class="input-number">`
    );
    var innerWageContainer = $(`<div class="wage-flex my-3">`);
    var removeBtn = $(
        `<i class="fa fa-close mr-3 text-danger" onclick="removeWageType(this)" type="button"></i>`
    );
    innerWageContainer.append(removeBtn, input, newSelect);
    //   var newLabel = $(`<label class="wage-title">Type ${curWageType}</label>`);
    newWageType.append(innerWageContainer);
    wageParent.append(newWageType);
});

// ADD NEW BUTTON FROM JAPAN VERSION
$("#JpAddNewWage").click(function(event) {
    event.preventDefault(); // cancel default behavior
    var wageParent = $("jp_wage_parent");
    curWageType++;
    var newWageType = $(`<div id="jp_wage${curWageType}_container"></div>`);
    var option1 = $(
        `<option id="jp_wage${curWageType}_unithourly" value="hourly">Hourly</option>`
    );
    var option2 = $(
        `<option id="jp_wage${curWageType}_unitdaily" value="daily">Daily</option>`
    );
    var option3 = $(
        `<option id="jp_wage${curWageType}_unitmonthly" value="monthly">Monthly</option>`
    );
    var option4 = $(
        `<option id="jp_wage${curWageType}_unitannually" value="annually">Annually</option>`
    );
    var newSelect = $(
        `<select name="jp_wage${curWageType}_unit" id="jp_wage${curWageType}_unit" class="input-select-sm"></select>`
    );
    newSelect.append(option1, option2, option3, option4);
    var input = $(
        `<input type="text" name="jp_wage${curWageType}" placeholder="Wage in Yen (eg. 10,000)" id="jp_wage${curWageType}" class="input-number">`
    );
    var innerWageContainer = $(`<div class="wage-flex my-3">`);
    var removeBtn = $(
        `<i class="fa fa-close mr-3 text-danger" onclick="removeWageType(this)" type="button"></i>`
    );
    innerWageContainer.append(removeBtn, input, newSelect);
    //   var newLabel = $(`<label class="wage-title">Type ${curWageType}</label>`);
    newWageType.append(innerWageContainer);
    wageParent.append(newWageType);
});

function removeWageType(el) {
    $(el).parent().parent().remove();
}

// FUNCTION TO CHECK ALL ERROR FIEL VALID
function CheckAll() {
    if (
        $("#jp_company_name").val() == "" ||
        $("#jp_job_title").val() == "" ||
        $("#jp_wage").val() == "" ||
        $("#jp_holidays").val() == "" ||
        $("#jp_workinghr").val() == "" ||
        $("#jp_breaktime").val() == "" ||
        $("#jp_requirements").val() == "" ||
        $("#jp_benefits").val() == "" ||
        $("#jp_location").val() == ""
    ) {
        $(".submit_btn").prop("disabled", true);
        $(".submit_btn").removeClass("action-button");
        $(".submit_btn").addClass("action-btn-disabled");
        return false;
    } else {
        $(".submit_btn").prop("disabled", false);
        $(".submit_btn").removeClass("action-btn-disabled");
        $(".submit_btn").addClass("action-button");
        return true;
    }
}

// TEXTAREA RETURN VALUE TO FORM METHODS

// JOB ID
function addTextToJobId() {
    var val = $("textarea#JobIdTextArea").val();
    $("textArea#job_id").val(val);
    if (val == "") {
        $("#error_job_id").text("Please enter Job ID");
        $("#job_id").addClass("box_error");
        error = true;
    } else {
        $("#error_job_id").text("");
        $("#job_id").removeClass("box_error");
        error = false;
    }
}
// COMPANY NAME
function addTextToNameEng() {
    var val = $("textarea#EngNameTextArea").val();
    $("textArea#eng_company_name").val(val);
    if (val == "") {
        $("#eng_error_company_name").text("Please enter company name");
        $("#eng_company_name").addClass("box_error");
        error = true;
    } else {
        $("#eng_error_company_name").text("");
        $("#eng_company_name").removeClass("box_error");
        error = false;
    }
}

function addTextToNameMm() {
    var val = $("textarea#MmNameTextArea").val();
    $("textArea#mm_company_name").val(val);
    if (val == "") {
        $("#mm_error_company_name").text("Please enter company name");
        $("#mm_company_name").addClass("box_error");
        error = true;
    } else {
        $("#mm_error_company_name").text("");
        $("#mm_company_name").removeClass("box_error");
        error = false;
    }
}

function addTextToNameJp() {
    var val = $("textarea#JpNameTextArea").val();
    $("textArea#jp_company_name").val(val);
    if (val == "") {
        $("#jp_error_company_name").text("Please enter company name");
        $("#jp_company_name").addClass("box_error");
        error = true;
    } else {
        $("#jp_error_company_name").text("");
        $("#jp_company_name").removeClass("box_error");
        error = false;
    }
    CheckAll();
}

// JOB TITLE
function addTextToTitleEng() {
    var val = $("textarea#EngTitleTextArea").val();
    $("textArea#eng_job_title").val(val);
    if (val == "") {
        $("#eng_error_job_title").text("Please enter job title");
        $("#eng_job_title").addClass("box_error");
        error = true;
    } else {
        $("#eng_error_job_title").text("");
        $("#eng_job_title").removeClass("box_error");
        error = false;
    }
}

function addTextToTitleMm() {
    var val = $("textarea#MmTitleTextArea").val();
    $("textArea#mm_job_title").val(val);
    if (val == "") {
        $("#mm_error_job_title").text("Please enter job title");
        $("#mm_job_title").addClass("box_error");
        error = true;
    } else {
        $("#mm_error_job_title").text("");
        $("#mm_job_title").removeClass("box_error");
        error = false;
    }
}

function addTextToTitleJp() {
    var val = $("textarea#JpTitleTextArea").val();
    $("textArea#jp_job_title").val(val);
    if (val == "") {
        $("#jp_error_job_title").text("Please enter job title");
        $("#jp_job_title").addClass("box_error");
        error = true;
    } else {
        $("#jp_error_job_title").text("");
        $("#jp_job_title").removeClass("box_error");
        error = false;
    }
    CheckAll();
}

// WAGE
function addTextToWageEng() {
    var val = $("textarea#EngWageTextArea").val();
    $("textArea#eng_wage").val(val);
    if (val == "") {
        $("#eng_error_wage").text("Please enter wage");
        $("#eng_wage").addClass("box_error");
        error = true;
    } else {
        $("#eng_error_wage").text("");
        $("#eng_wage").removeClass("box_error");
        error = false;
    }
}

function addTextToWageMm() {
    var val = $("textarea#MmWageTextArea").val();
    $("textArea#mm_wage").val(val);
    if (val == "") {
        $("#mm_error_wage").text("Please enter wage");
        $("#mm_wage").addClass("box_error");
        error = true;
    } else {
        $("#mm_error_wage").text("");
        $("#mm_wage").removeClass("box_error");
        error = false;
    }
}

function addTextToWageJp() {
    var val = $("textarea#JpWageTextArea").val();
    $("textArea#jp_wage").val(val);
    if (val == "") {
        $("#jp_error_wage").text("Please enter wage");
        $("#jp_wage").addClass("box_error");
        error = true;
    } else {
        $("#jp_error_wage").text("");
        $("#jp_wage").removeClass("box_error");
        error = false;
    }
    CheckAll();
}
// WAGE
function addTextToWageEng() {
    var val = $("textarea#EngWageTextArea").val();
    $("textArea#eng_wage").val(val);
    if (val == "") {
        $("#eng_error_wage").text("Please enter wage");
        $("#eng_wage").addClass("box_error");
        error = true;
    } else {
        $("#eng_error_wage").text("");
        $("#eng_wage").removeClass("box_error");
        error = false;
    }
}

function addTextToWageMm() {
    var val = $("textarea#MmWageTextArea").val();
    $("textArea#mm_wage").val(val);
    if (val == "") {
        $("#mm_error_wage").text("Please enter wage");
        $("#mm_wage").addClass("box_error");
        error = true;
    } else {
        $("#mm_error_wage").text("");
        $("#mm_wage").removeClass("box_error");
        error = false;
    }
}

function addTextToWageJp() {
    var val = $("textarea#JpWageTextArea").val();
    $("textArea#jp_wage").val(val);
    if (val == "") {
        $("#jp_error_wage").text("Please enter wage");
        $("#jp_wage").addClass("box_error");
        error = true;
    } else {
        $("#jp_error_wage").text("");
        $("#jp_wage").removeClass("box_error");
        error = false;
    }
    CheckAll();
}

// OVERTIME PAYMENT
function addTextToOtEng() {
    var val = $("textarea#EngOtTextArea").val();
    $("textArea#eng_ot").val(val);
}

function addTextToOtMm() {
    var val = $("textarea#MmOtTextArea").val();
    $("textArea#mm_ot").val(val);
}

function addTextToOtJp() {
    var val = $("textarea#JpOtTextArea").val();
    $("textArea#jp_ot").val(val);
}

// HOLIDAYS
function addTextToHolidaysEng() {
    var val = $("textarea#EngHolidaysTextArea").val();
    $("textArea#eng_holidays").val(val);
    if (val == "") {
        $("#eng_error_holidays").text("Please enter holidays");
        $("#eng_holidays").addClass("box_error");
        error = true;
    } else {
        $("#eng_error_holidays").text("");
        $("#eng_holidays").removeClass("box_error");
        error = false;
    }
}

function addTextToHolidaysMm() {
    var val = $("textarea#MmHolidaysTextArea").val();
    $("textArea#mm_holidays").val(val);
    if (val == "") {
        $("#mm_error_holidays").text("Please enter holidays");
        $("#mm_holidays").addClass("box_error");
        error = true;
    } else {
        $("#mm_error_holidays").text("");
        $("#mm_holidays").removeClass("box_error");
        error = false;
    }
}

function addTextToHolidaysJp() {
    var val = $("textarea#JpHolidaysTextArea").val();
    $("textArea#jp_holidays").val(val);
    if (val == "") {
        $("#jp_error_holidays").text("Please enter holidays");
        $("#jp_holidays").addClass("box_error");
        error = true;
    } else {
        $("#jp_error_holidays").text("");
        $("#jp_holidays").removeClass("box_error");
        error = false;
    }
    CheckAll();
}

// WORKING HOURS
function addTextToWorkinghrEng() {
    var val = $("textarea#EngWorkinghrTextArea").val();
    $("textArea#eng_workinghr").val(val);
    if (val == "") {
        $("#eng_error_workinghr").text("Please enter holidays");
        $("#eng_workinghr").addClass("box_error");
        error = true;
    } else {
        $("#eng_error_workinghr").text("");
        $("#eng_workinghr").removeClass("box_error");
        error = false;
    }
}

function addTextToWorkinghrMm() {
    var val = $("textarea#MmWorkinghrTextArea").val();
    $("textArea#mm_workinghr").val(val);
    if (val == "") {
        $("#mm_error_workinghr").text("Please enter holidays");
        $("#mm_workinghr").addClass("box_error");
        error = true;
    } else {
        $("#mm_error_workinghr").text("");
        $("#mm_workinghr").removeClass("box_error");
        error = false;
    }
}

function addTextToWorkinghrJp() {
    var val = $("textarea#JpWorkinghrTextArea").val();
    $("textArea#jp_workinghr").val(val);
    if (val == "") {
        $("#jp_error_workinghr").text("Please enter holidays");
        $("#jp_workinghr").addClass("box_error");
        error = true;
    } else {
        $("#jp_error_workinghr").text("");
        $("#jp_workinghr").removeClass("box_error");
        error = false;
    }
    CheckAll();
}
// BREAK TIME
function addTextToBreaktimeEng() {
    var val = $("textarea#EngBreaktimeTextArea").val();
    $("textArea#eng_breaktime").val(val);
    if (val == "") {
        $("#eng_error_breaktime").text("Please enter break-time");
        $("#eng_breaktime").addClass("box_error");
        error = true;
    } else {
        $("#eng_error_breaktime").text("");
        $("#eng_breaktime").removeClass("box_error");
        error = false;
    }
}

function addTextToBreaktimeMm() {
    var val = $("textarea#MmBreaktimeTextArea").val();
    $("textArea#mm_breaktime").val(val);
    if (val == "") {
        $("#mm_error_breaktime").text("Please enter break-time");
        $("#mm_breaktime").addClass("box_error");
        error = true;
    } else {
        $("#mm_error_breaktime").text("");
        $("#mm_breaktime").removeClass("box_error");
        error = false;
    }
}

function addTextToBreaktimeJp() {
    var val = $("textarea#JpBreaktimeTextArea").val();
    $("textArea#jp_breaktime").val(val);
    if (val == "") {
        $("#jp_error_breaktime").text("Please enter break-time");
        $("#jp_breaktime").addClass("box_error");
        error = true;
    } else {
        $("#jp_error_breaktime").text("");
        $("#jp_breaktime").removeClass("box_error");
        error = false;
    }
    CheckAll();
}

// REQUIREMENTS
function addTextToReqEng() {
    var val = $("textarea#EngReqTextArea").val();
    $("textArea#eng_requirements").val(val);
    if (val == "") {
        $("#eng_error_requirements").text("Please enter requirements");
        $("#eng_requirements").addClass("box_error");
        error = true;
    } else {
        $("#eng_error_requirements").text("");
        $("#eng_requirements").removeClass("box_error");
        error = false;
    }
}

function addTextToReqMm() {
    var val = $("textarea#MmReqTextArea").val();
    $("textArea#mm_requirements").val(val);
    if (val == "") {
        $("#mm_error_requirements").text("Please enter requirements");
        $("#mm_requirements").addClass("box_error");
        error = true;
    } else {
        $("#mm_error_requirements").text("");
        $("#mm_requirements").removeClass("box_error");
        error = false;
    }
}

function addTextToReqJp() {
    var val = $("textarea#JpReqTextArea").val();
    $("textArea#jp_requirements").val(val);
    if (val == "") {
        $("#jp_error_requirements").text("Please enter requirements");
        $("#jp_requirements").addClass("box_error");
        error = true;
    } else {
        $("#jp_error_requirements").text("");
        $("#jp_requirements").removeClass("box_error");
        error = false;
    }
    CheckAll();
}

// BENEFITS
function addTextToBenEng() {
    var val = $("textarea#EngBenTextArea").val();
    $("textArea#eng_benefits").val(val);
    if (val == "") {
        $("#eng_error_benefits").text("Please enter benefits");
        $("#eng_benefits").addClass("box_error");
        error = true;
    } else {
        $("#eng_error_benefits").text("");
        $("#eng_benefits").removeClass("box_error");
        error = false;
    }
}

function addTextToBenMm() {
    var val = $("textarea#MmBenTextArea").val();
    $("textArea#mm_benefits").val(val);
    if (val == "") {
        $("#mm_error_benefits").text("Please enter benefits");
        $("#mm_benefits").addClass("box_error");
        error = true;
    } else {
        $("#mm_error_benefits").text("");
        $("#mm_benefits").removeClass("box_error");
        error = false;
    }
}

function addTextToBenJp() {
    var val = $("textarea#JpBenTextArea").val();
    $("textArea#jp_benefits").val(val);
    if (val == "") {
        $("#jp_error_benefits").text("Please enter benefits");
        $("#jp_benefits").addClass("box_error");
        error = true;
    } else {
        $("#jp_error_benefits").text("");
        $("#jp_benefits").removeClass("box_error");
        error = false;
    }
    CheckAll();
}

// Work Location
function addTextToLocationEng() {
    var val = $("textarea#EngLocationTextArea").val();
    $("textArea#eng_location").val(val);
    if (val == "") {
        $("#eng_error_location").text("Please enter work location");
        $("#eng_location").addClass("box_error");
        error = true;
    } else {
        $("#eng_error_location").text("");
        $("#eng_location").removeClass("box_error");
        error = false;
    }
}

function addTextToLocationMm() {
    var val = $("textarea#MmLocationTextArea").val();
    $("textArea#mm_location").val(val);
    if (val == "") {
        $("#mm_error_location").text("Please enter work location");
        $("#mm_location").addClass("box_error");
        error = true;
    } else {
        $("#mm_error_location").text("");
        $("#mm_location").removeClass("box_error");
        error = false;
    }
}

function addTextToLocationJp() {
    var val = $("textarea#JpLocationTextArea").val();
    $("textArea#jp_location").val(val);
    if (val == "") {
        $("#jp_error_location").text("Please enter work location");
        $("#jp_location").addClass("box_error");
        error = true;
    } else {
        $("#jp_error_location").text("");
        $("#jp_location").removeClass("box_error");
        error = false;
    }
    CheckAll();
}

// MEMO
function addTextToMemoEng() {
    var val = $("textarea#EngMemoTextArea").val();
    $("textArea#eng_memo").val(val);
}

function addTextToMemoMm() {
    var val = $("textarea#MmMemoTextArea").val();
    $("textArea#mm_memo").val(val);
}

function addTextToMemoJp() {
    var val = $("textarea#JpMemoTextArea").val();
    $("textArea#jp_memo").val(val);
}

// IMAGE VALIDATION
//Check file extension in the array.if -1 that means the file extension is not in the list.

//Validate image size before upload
function validateTypeAndSize1(uploadCtrl) {
    // Get uploaded file extension
    var extension = $(uploadCtrl).val().split(".").pop().toLowerCase();
    var validFileExtensions = ["jpeg", "jpg", "png"];
    // Create array with the files extensions that we wish to upload
    if ($.inArray(extension, validFileExtensions) == -1) {
        $("#error_photo_one")
            .text("Please upload only jpg, jpeg and png image")
            .show();
        // Clear fileuload control selected file
        $(uploadCtrl).replaceWith($(uploadCtrl).val("").clone(true));
        //Disable Submit Button
        //Clear Image preview
        $("#photo1-preview").prop("src", "./img/cmp-default.png");
    } else {
        // Check and restrict the file size to 32 KB.
        if ($(uploadCtrl).get(0).files[0].size > 1500000) {
            $("#error_photo_one").text("Max allowed image size is 1.5 MB").show();
            // Clear fileuload control selected file
            $(uploadCtrl).replaceWith($(uploadCtrl).val("").clone(true));
            //Clear Image preview
            $("#photo1-preview").prop("src", "./img/cmp-default.png");
        } else {
            // check dimension
            var reader = new FileReader();
            //Read the contents of Image File.
            reader.readAsDataURL(uploadCtrl.files[0]);
            reader.onload = function(e) {
                //Initiate the JavaScript Image object.
                var image = new Image();

                //Set the Base64 string return from FileReader as source.
                image.src = e.target.result;

                //Validate the File Height and Width.
                image.onload = function() {
                    var imgHeight = this.height;
                    var imgWidth = this.width;
                    // console.log(imgHeight, imgWidth);
                    if (!(imgHeight === 150 || imgWidth === 150)) {
                        $("#error_photo_one")
                            .text("Please upload image size (150x150).")
                            .show();
                        $("#photo1-preview").prop("src", "./img/cmp-default.png");
                    } else {
                        //Clear and Hide message span
                        $("#error_photo_one").text("").hide();
                        //Preview Image if valid
                        previewImage1(uploadCtrl);
                    }
                };
            };

        }
    }
}

function validateTypeAndSize2(uploadCtrl) {
    var extension = $(uploadCtrl).val().split(".").pop().toLowerCase();
    var validFileExtensions = ["jpeg", "jpg", "png"];
    // Create array with the files extensions that we wish to upload
    if ($.inArray(extension, validFileExtensions) == -1) {
        $("#error_photo_two")
            .text("Please upload only jpg, jpeg and png image")
            .show();
        // Clear fileuload control selected file
        $(uploadCtrl).replaceWith($(uploadCtrl).val("").clone(true));
        //Clear Image preview
        $("#photo2-preview").prop("src", "./img/cmp-default.png");
    } else {
        // Check and restrict the file size to 32 KB.
        if ($(uploadCtrl).get(0).files[0].size > 1500000) {
            $("#error_photo_two").text("Max allowed image size is 1.5 MB").show();
            // Clear fileuload control selected file
            $(uploadCtrl).replaceWith($(uploadCtrl).val("").clone(true));
            //Clear Image preview
            $("#photo2-preview").prop("src", "./img/cmp-default.png");
        } else {
            // check dimension
            var reader = new FileReader();
            //Read the contents of Image File.
            reader.readAsDataURL(uploadCtrl.files[0]);
            reader.onload = function(e) {
                //Initiate the JavaScript Image object.
                var image = new Image();

                //Set the Base64 string return from FileReader as source.
                image.src = e.target.result;

                //Validate the File Height and Width.
                image.onload = function() {
                    var imgHeight = this.height;
                    var imgWidth = this.width;
                    // console.log(imgHeight, imgWidth);
                    if (!(imgHeight === 150 || imgWidth === 150)) {
                        $("#error_photo_two")
                            .text("Please upload image size (150x150).")
                            .show();
                        $("#photo2-preview").prop("src", "./img/cmp-default.png");
                    } else {
                        //Clear and Hide message span
                        $("#error_photo_two").text("").hide();
                        //Preview Image if valid
                        previewImage2(uploadCtrl);
                    }
                };
            };
        }
    }
}
//Preview image before upload
function previewImage1(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $("#photo1-preview").attr("src", e.target.result).width(150).height(120);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function previewImage2(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $("#photo2-preview").attr("src", e.target.result).width(150).height(120);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

var photos = $("#h_photos").val();
// console.log(photos);
if (photos.split("|")[1]) {
    setPreview1(photos.split("|")[0]);
    setPreview1(photos.split("|")[1]);
} else {
    setPreview1(photos.split("|")[0]);
}

function setPreview1(url) {
    $("#photo1-preview").attr("src", "./backend/" + url).width(150).height(120);
}

function setPreview2(url) {
    $("#photo2-preview").attr("src", "./backend/" + url).width(150).height(120);
}