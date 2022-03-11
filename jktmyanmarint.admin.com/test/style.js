var current_slide, next_slide, previous_slide;
var left, opacity, scale;
var animation;

var error = false;

// email validation
$("#email").keyup(function() {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    if (!emailReg.test($("#email").val())) {
        $("#error-email").text('Please enter an Email addres.');
        $("#email").addClass("box_error");
        error = true;
    } else {
        $("#error-email").text('');
        error = false;
        $("#email").removeClass("box_error");
    }
});
// password validation
$("#pass").keyup(function() {
    var pass = $("#pass").val();
    var cpass = $("#cpass").val();

    if (pass != '') {
        $("#error-pass").text('');
        error = false;
        $("#pass").removeClass("box_error");
    }
    if (pass != cpass && cpass != '') {
        $("#error-cpass").text('Password and Confirm Password is not matched.');
        error = true;
    } else {
        $("#error-cpass").text('');
        error = false;
    }
});
// confirm password validation
$("#cpass").keyup(function() {
    var pass = $("#pass").val();
    var cpass = $("#cpass").val();

    if (pass != cpass) {
        $("#error-cpass").text('Please enter the same Password as above.');
        $("#cpass").addClass("box_error");
        error = true;
    } else {
        $("#error-cpass").text('');
        error = false;
        $("#cpass").removeClass("box_error");
    }
});
// twitter
$("#twitter").keyup(function() {
    var twitterReg = /https?:\/\/twitter\.com\/(#!\/)?[a-z0-9_]+$/;
    if (!twitterReg.test($("#twitter").val())) {
        $("#error-twitter").text('Twitter link is not valid.');
        $("#twitter").addClass("box_error");
        error = true;
    } else {
        $("#error-twitter").text('');
        error = false;
        $("#twitter").removeClass("box_error");
    }
});
// facebook
$("#facebook").keyup(function() {
    var facebookReg = /^(https?:\/\/)?(www\.)?facebook.com\/[a-zA-Z0-9(\.\?)?]/;
    if (!facebookReg.test($("#facebook").val())) {
        $("#error-facebook").text('Facebook link is not valid.');
        $("#facebook").addClass("box_error");
        error = true;
    } else {
        $("#error-facebook").text('');
        error = false;
        $("#facebook").removeClass("box_error");
    }
});
// linkedin
$("#linkedin").keyup(function() {
    var linkedinReg = /(ftp|http|https):\/\/?(?:www\.)?linkedin.com(\w+:{0,1}\w*@)?(\S+)(:([0-9])+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
    if (!linkedinReg.test($("#linkedin").val())) {
        $("#error-linkedin").text('Linkedin link is not valid.');
        $("#linkedin").addClass("box_error");
        error = true;
    } else {
        $("#error-linkedin").text('');
        error = false;
        $("#linkedin").removeClass("box_error");
    }
});
// first name
$("#fname").keyup(function() {
    var fname = $("#fname").val();
    if (fname == '') {
        $("#error-fname").text('Enter your First name.');
        $("#fname").addClass("box_error");
        error = true;
    } else {
        $("#error-fname").text('');
        error = false;
    }
    if ((fname.length <= 2) || (fname.length > 20)) {
        $("#error-fname").text("User length must be between 2 and 20 Characters.");
        $("#fname").addClass("box_error");
        error = true;
    }
    if (!isNaN(fname)) {
        $("#error-fname").text("Only Characters are allowed.");
        $("#fname").addClass("box_error");
        error = true;
    } else {
        $("#fname").removeClass("box_error");
    }
});
// last name
$("#lname").keyup(function() {
    var lname = $("#lname").val();
    if (lname != lname) {
        $("#error-lname").text('Enter your Last name.');
        $("#lname").addClass("box_error");
        error = true;
    } else {
        $("#error-lname").text('');
        error = false;
    }
    if ((lname.length <= 2) || (lname.length > 20)) {
        $("#error-lname").text("User length must be between 2 and 20 Characters.");
        $("#lname").addClass("box_error");
        error = true;
    }
    if (!isNaN(lname)) {
        $("#error-lname").text("Only Characters are allowed.");
        $("#lname").addClass("box_error");
        error = true;
    } else {
        $("#lname").removeClass("box_error");
    }
});
// phone
$("#phone").keyup(function() {
    var phone = $("#phone").val();
    if (phone != phone) {
        $("#error-phone").text('Enter your Phone number.');
        $("#phone").addClass("box_error");
        error = true;
    } else {
        $("#error-phone").text('');
        error = false;
    }
    if (phone.length != 10) {
        $("#error-phone").text("Mobile number must be of 10 Digits only.");
        $("#phone").addClass("box_error");
        error = true;
    } else {
        $("#phone").removeClass("box_error");
    }
});
// address
$("#address").keyup(function() {
    var address = $("#address").val();
    if (address != address) {
        $("#error-address").text('Enter your Address.');
        $("#address").addClass("box_error");
        error = true;
    } else {
        $("#error-address").text('');
        error = false;
        $("#address").removeClass("box_error");
    }
});

// first step validation
$(".fs_next_btn").click(function() {
    // email
    // if ($("#email").val() == '') {
    //     $("#error-email").text('Please enter an email address.');
    //     $("#email").addClass("box_error");
    //     error = true;
    // } else {
    //     var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    //     if (!emailReg.test($("#email").val())) {
    //         $("#error-email").text('Please insert a valid email address.');
    //         error = true;
    //     } else {
    //         $("#error-email").text('');
    //         $("#email").removeClass("box_error");
    //     }
    // }
    // // password
    // if ($("#pass").val() == '') {
    //     $("#error-pass").text('Please enter a password.');
    //     $("#pass").addClass("box_error");
    //     error = true;
    // }
    // if ($("#cpass").val() == '') {
    //     $("#error-cpass").text('Please enter a Confirm password.');
    //     $("#cpass").addClass("box_error");
    //     error = true;
    // } else {
    //     var pass = $("#pass").val();
    //     var cpass = $("#cpass").val();

    //     if (pass != cpass) {
    //         $("#error-cpass").text('Please enter the same password as above.');
    //         error = true;
    //     } else {
    //         $("#error-cpass").text('');
    //         $("#pass").removeClass("box_error");
    //         $("#cpass").removeClass("box_error");
    //     }
    // }
    var error = false;

    // animation
    if (!error) {
        if (animation) return false;
        animation = true;

        current_slide = $(this).parent().parent();
        next_slide = $(this).parent().parent().next();

        $("#progress_header li").eq($(".multistep-box").index(next_slide)).addClass("active");
        $("#progress_header li img").eq($(".multistep-box").index(next_slide)).addClass("versionFlag-active");
        
        next_slide.show();
        current_slide.animate({
            opacity: 0
        }, {
            step: function(now, mx) {
                scale = 1 - (1 - now) * 0.2;
                left = (now * 50) + "%";
                opacity = 1 - now;
                current_slide.css({
                    'transform': 'scale(' + scale + ')'
                });
                next_slide.css({
                    'left': left,
                    'opacity': opacity
                });
            },
            duration: 800,
            complete: function() {
                current_slide.hide();
                animation = false;
            },
            easing: 'easeInOutBack'
        });
    }
});
// second step validation
$(".ss_next_btn").click(function() {
    // email
    // if ($("#mmemail").val() == '') {
        //     $("#mmerror-email").text('Please enter an email address.');
        //     $("#mmemail").addClass("box_error");
    //     error = true;
    // } else {
        //     var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        //     if (!emailReg.test($("#mmemail").val())) {
            //         $("#mmerror-email").text('Please insert a valid email address.');
    //         error = true;
    //     } else {
    //         $("#mmerror-email").text('');
    //         $("#mmemail").removeClass("box_error");
    //     }
    // }
    // // password
    // if ($("#mmpass").val() == '') {
        //     $("#mmerror-pass").text('Please enter a password.');
        //     $("#mmpass").addClass("box_error");
        //     error = true;
        // }
        // if ($("#mmcpass").val() == '') {
            //     $("#mmerror-cpass").text('Please enter a Confirm password.');
            //     $("#mmcpass").addClass("box_error");
            //     error = true;
            // } else {
                //     var pass = $("#mmpass").val();
                //     var cpass = $("#mmcpass").val();

    //     if (pass != cpass) {
    //         $("#mmerror-cpass").text('Please enter the same password as above.');
    //         error = true;
    //     } else {
        //         $("#mmerror-cpass").text('');
    //         $("#mmpass").removeClass("box_error");
    //         $("#mmcpass").removeClass("box_error");
    //     }
    // }
    var error = false;

    if (!error) {
        if (animation) return false;
        animation = true;

        current_slide = $(this).parent().parent();
        next_slide = $(this).parent().parent().next();
        
        $("#progress_header li").eq($(".multistep-box").index(next_slide)).addClass("active");
        $("#progress_header li img").eq($(".multistep-box").index(next_slide)).addClass("versionFlag-active");
        
        next_slide.show();
        current_slide.animate({
            opacity: 0
        }, {
            step: function(now, mx) {
                scale = 1 - (1 - now) * 0.2;
                left = (now * 50) + "%";
                opacity = 1 - now;
                current_slide.css({
                    'transform': 'scale(' + scale + ')'
                });
                next_slide.css({
                    'left': left,
                    'opacity': opacity
                });
            },
            duration: 800,
            complete: function() {
                current_slide.hide();
                animation = false;
            },
            easing: 'easeInOutBack'
        });
    }

});

// third step validation
$(".ts_next_btn").click(function() {
    // first name
    // if ($("#fname").val() == '') {
    //     $("#error-fname").text('Enter your First name.');
    //     $("#fname").addClass("box_error");
    //     error = true;
    // } else {
    //     var fname = $("#fname").val();
    //     if (fname != fname) {
    //         $("#error-fname").text('First name is required.');
    //         error = true;
    //     } else {
    //         $("#error-fname").text('');
    //         error = false;
    //         $("#fname").removeClass("box_error");
    //     }
    //     if ((fname.length <= 2) || (fname.length > 20)) {
    //         $("#error-fname").text("User length must be between 2 and 20 Characters.");
    //         error = true;
    //     }
    //     if (!isNaN(fname)) {
    //         $("#error-fname").text("Only Characters are allowed.");
    //         error = true;
    //     } else {
    //         $("#fname").removeClass("box_error");
    //     }
    // }
    // // last name
    // if ($("#lname").val() == '') {
    //     $("#error-lname").text('Enter your Last name.');
    //     $("#lname").addClass("box_error");
    //     error = true;
    // } else {
    //     var lname = $("#lname").val();
    //     if (lname != lname) {
    //         $("#error-lname").text('Last name is required.');
    //         error = true;
    //     } else {
    //         $("#error-lname").text('');
    //         error = false;
    //     }
    //     if ((lname.length <= 2) || (lname.length > 20)) {
    //         $("#error-lname").text("User length must be between 2 and 20 Characters.");
    //         error = true;
    //     } 
    //     if (!isNaN(lname)) {
    //         $("#error-lname").text("Only Characters are allowed.");
    //         error = true;
    //     } else {
    //         $("#lname").removeClass("box_error");
    //     }
    // }
    // // phone
    // if ($("#phone").val() == '') {
    //     $("#error-phone").text('Enter your Phone number.');
    //     $("#phone").addClass("box_error");
    //     error = true;
    // } else {
    //     var phone = $("#phone").val();
    //     if (phone != phone) {
    //         $("#error-phone").text('Phone number is required.');
    //         error = true;
    //     } else {
    //         $("#error-phone").text('');
    //         error = false;
    //     }
    //     if (phone.length != 10) {
    //         $("#error-phone").text("Mobile number must be of 10 Digits only.");
    //         error = true;
    //     } else {
    //         $("#phone").removeClass("box_error");
    //     }
    // }
    // // address
    // if ($("#address").val() == '') {
    //     $("#error-address").text('Enter your Address.');
    //     $("#address").addClass("box_error");
    //     error = true;
    // } else {
    //     var address = $("#address").val();
    //     if (address != address) {
    //         $("#error-address").text('Address is required.');
    //         error = true;
    //     } else {
    //         $("#error-address").text('');
    //         $("#address").removeClass("box_error");
    //         error = false;
    //     }
    // }

    var error = false;
    if (!error) {
        if (animation) return false;
        animation = true;

        current_slide = $(this).parent().parent();
        next_slide = $(this).parent().parent().next();

        $("#progress_header li").eq($(".multistep-box").index(next_slide)).addClass("active");
        $("#progress_header li img").eq($(".multistep-box").index(next_slide)).addClass("versionFlag-active");
        next_slide.show();
        current_slide.animate({
            opacity: 0
        }, {
            step: function(now, mx) {
                scale = 1 - (1 - now) * 0.2;
                left = (now * 50) + "%";
                opacity = 1 - now;
                current_slide.css({
                    'transform': 'scale(' + scale + ')'
                });
                next_slide.css({
                    'left': left,
                    'opacity': opacity
                });
            },
            duration: 800,
            complete: function() {
                current_slide.hide();
                animation = false;
            },
            easing: 'easeInOutBack'
        });
    }
});
// previous
$(".previous").click(function() {
    if (animation) return false;
    animation = true;

    current_slide = $(this).parent().parent();
    previous_slide = $(this).parent().parent().prev();

    $("#progress_header li").eq($(".multistep-box").index(current_slide)).removeClass("active");
    $("#progress_header li img").eq($(".multistep-box").index(next_slide)).removeClass("versionFlag-active");
    previous_slide.show();
    current_slide.animate({
        opacity: 0
    }, {
        step: function(now, mx) {
            scale = 0.8 + (1 - now) * 0.2;
            left = ((1 - now) * 50) + "%";
            opacity = 1 - now;
            current_slide.css({
                'left': left
            });
            previous_slide.css({
                'transform': 'scale(' + scale + ')',
                'opacity': opacity
            });
        },
        duration: 800,
        complete: function() {
            current_slide.hide();
            animation = false;
        },
        easing: 'easeInOutBack'
    });
});

$(".submit_btn").click(function() {
    if (!error){
        $(".main").addClass("form_submited");
    }
    return false;
})