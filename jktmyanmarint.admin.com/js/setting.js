$(document).ready(function() {
    $(".showDelModal").click(function() {
        let banking = $(this).siblings('.display_banking').html();
        $("#showBankAcc").text(banking);
        let accNumber = $(this).siblings('#accNo').html();
        $("#accNumber").val(accNumber);
    });
})

function showHide() {
    let pswd = document.getElementById("displayPassword");
    let show = document.getElementById("showPsd");
    let hide = document.getElementById("hidePsd");
    if (pswd.type === "password") {
        pswd.type = "text";
        show.style.display = "inline-block";
        hide.style.display = "none";
    } else {
        pswd.type = "password";
        hide.style.display = "inline-block";
        show.style.display = "none";
    }
}