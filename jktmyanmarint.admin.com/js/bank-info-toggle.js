$(document).ready(function() {
    let show = document.getElementById("bank_info_show");
    let add = document.getElementById("bank_info_add");
    show.style.display = "none";
    add.style.display = "none";
    $("#bank_info_show_btn").click(() => {
        if (show.style.display === "none") {
            $("#bank_info_show").slideDown(250);
        } else {
            $("#bank_info_show").slideUp(250);
        }
        add.style.display = "none";
    });

    $("#bank_info_add_btn").click(() => {
        if (add.style.display === "none") {
            $("#bank_info_add").slideDown(250);
        } else {
            $("#bank_info_add").slideUp(250);
        }
        show.style.display = "none";
    });
})