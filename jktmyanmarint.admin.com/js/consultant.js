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

var apIdEdit = document.getElementById("appointment_IdEdit");
var apCreatedAt = document.getElementById("appointment_CreatedAt");
var apUpdatedAt = document.getElementById("appointment_UpdatedAt");
var apName = document.getElementById("appointment_name");
var apEmail = document.getElementById("appointment_email");
var apPhone = document.getElementById("appointment_phone");
var apType = document.getElementById("appointment_type");
var apDate = document.getElementById("appointment_date");
var apTime = document.getElementById("appointment_time");
var apDuration = document.getElementById("dropdown");
var apAbout = document.getElementById("description");

var consultName = document.getElementById("consultName");
var consultEmail = document.getElementById("consultEmail");
var consultPhone = document.getElementById("consultPhone");
var consultType = document.getElementById("consultType");
var consultDate = document.getElementById("consultDate");
var consultTime = document.getElementById("consultTime");
var consultDuration = document.getElementById("consultDuration");
var consultAbout = document.getElementById("consultAbout");

function setCurrentConsultantEdit(event, row) {
  $("#editingModal").modal("show");
  event.stopPropagation();
  var tr = row.closest("tr");
  var tds = tr.children;
  var rowArr = [];
  for (var i = 0; i < tds.length; i++) {
    rowArr.push(tds[i].textContent);
  }
  // console.log(rowArr);

  apIdEdit.value = parseInt(rowArr[0]);
  apName.value = rowArr[1];
  apEmail.value = rowArr[2];
  apPhone.value = rowArr[3];
  // apType.value =rowArr[4];
  $("input[name=appointment_type][value=" + rowArr[4] + "]").attr(
    "checked",
    "checked"
  );

  var date = new Date(rowArr[5]);
  // var modifyDate =  date.getFullYear() + '-' + ('0'+ date.getMonth()+1).slice(-2) + '-' + ('0'+ date.getDate()).slice(-2);
  var day = date.getDate();
  var month = date.getMonth() + 1;
  var year = date.getFullYear();
  month = (month < 10 ? "0" : "") + month;
  day = (day < 10 ? "0" : "") + day;
  // $("#appointment_date").val(modifyDate);
  apDate.value = year + "-" + month + "-" + day;
  $(".calendar").datepicker("setDate", day + "/" + month + "/" + year);

  // console.log(day + "/" + month + "/" + year);

  // apTime.value = rowArr[6];
  $("input[name=appointment_time][value=" + rowArr[6] + "]").attr(
    "checked",
    "checked"
  );
  apDuration.value = rowArr[7];
  apAbout.textContent = rowArr[8];
}
function setCurrentConsultantDel(event, idx) {
  $("#deletingModal").modal("show");
  event.stopPropagation();
  document.getElementById("consulDelId").value = idx;
}
function setCurrentConsultDetail(row) {
  var tr = row.closest("tr");
  var tds = tr.children;
  var rowArr = [];
  for (var i = 0; i < tds.length; i++) {
    rowArr.push(tds[i].textContent);
  }
  // console.log(rowArr);
  consultName.textContent = rowArr[1];
  consultEmail.textContent = rowArr[2];
  consultPhone.textContent = rowArr[3];
  consultType.textContent = rowArr[4];
  consultDate.textContent = rowArr[5];
  consultTime.textContent = rowArr[6];
  consultDuration.textContent = rowArr[7];
  consultAbout.textContent = rowArr[8];
}
