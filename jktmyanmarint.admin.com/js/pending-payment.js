var deleteForm = document.getElementById("deleteForm");
var approveForm = document.getElementById("approveForm");

var deletingId = document.getElementById("deletingId");
var approvingId = document.getElementById("approvingId");
var confirmDelete = document.getElementById("confirmDelBtn");
var confirmApprove = document.getElementById("confirmAppBtn");

var tid_pend = document.getElementById("tid_pend_p");
var sname_pend = document.getElementById("sname_pend_p");
var course_pend = document.getElementById("course_pend_p");
var banking_pend = document.getElementById("banking_pend_p");
var amount_pend = document.getElementById("amount_pend_p");
var screenshot_img = document.getElementById("screenshot_img");
var created_at_pend = document.getElementById("created_at_pend_p");

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function setCurrentDetailPayment(tid) {
    console.log("hello");

  $.post(
    "getPayment.php",
    {
      payment_id: tid,
    },
    function (data) {
      console.log(data);
      screenshot_img.src = "https://jktmyanmarint.com/backend/paymentUploads/"+data[0]['screenshot'];
      tid_pend.textContent = data[0]['payment_id'];
      sname_pend.textContent = data[0]['student_name'];
      course_pend.textContent = data[0]['level_or_sub'] == "" && data[0]['title'] || data[0]['title'] + " - " + data[0]['level_or_sub'];
      banking_pend.textContent = data[0]['bank_name'];
      amount_pend.textContent = numberWithCommas(data[0]['payment_amount'])+" MMK";
      created_at_pend.textContent = data[0]['created_at'];
    }
  );
}
function setCurrentDeletingPayment(id) {
  deletingId.value = id;
}
function setCurrentApproving(id) {
  approvingId.value = id;
}

confirmDelete.addEventListener("click", function (e) {
  deleteForm.submit();
});
confirmApprove.addEventListener("click", function (e) {
  approveForm.submit();
});
