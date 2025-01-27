$(function () {
  $('[data-toggle="tooltip"]').tooltip();
});

function isEven(n) {
  return n % 2 == 0;
}

function isOdd(n) {
  return Math.abs(n % 2) == 1;
}

var daysArr = [
  {
    st: "M",
    lg: "Mon",
  },
  {
    st: "Tu",
    lg: "Tue",
  },
  {
    st: "W",
    lg: "Wed",
  },
  {
    st: "Th",
    lg: "Thu",
  },
  {
    st: "F",
    lg: "FRI",
  },
  {
    st: "Sa",
    lg: "Sat",
  },
  {
    st: "Su",
    lg: "Sun",
  },
];

// enrollments editing
var enrollmentId = document.getElementById("enrollmentId");
var imagePreview = document.getElementById("imagePreview");
var notChangeImg = document.getElementById("notChangeImg");
var userImg = document.getElementById("userImg");
var classId = document.getElementById("classId");
var uname = document.getElementById("uname");
// var dob = document.getElementById("dob");
// var fname = document.getElementById("fname");
// var nrcCode = document.getElementById("nrcCode");
// var township = document.getElementById("township");
// var type = document.getElementById("type");
// var nrcNumber = document.getElementById("nrcNumber");
// var email = document.getElementById("email");
// var phone = document.getElementById("phone");
// var education = document.getElementById("education");
// var address = document.getElementById("address");
var paymentMethod = document.getElementById("paymentMethod");
var paidAmount = document.getElementById("paidAmount");
var showPaidAmount = document.getElementById("showPaidAmount");
var showDiscount = document.getElementById("showDiscount");
var totalCourseFee = document.getElementById("totalCourseFee");
var realFee = document.getElementById("realFee");
var isPending = document.getElementById("isPending");
var createdAt = document.getElementById("createdAt");

// enrollments detail
var detailTitle = document.getElementById("detailTitle");
var detailName = document.getElementById("detailName");
// var detailDob = document.getElementById("detailDob");
// var detailFname = document.getElementById("detailFname");
// var detailNrc = document.getElementById("detailNrc");
// var detailEmail = document.getElementById("detailEmail");
// var detailPhone = document.getElementById("detailPhone");
// var detailEducation = document.getElementById("detailEducation");
// var detailAddress = document.getElementById("detailAddress");
var detailPaymentMethod = document.getElementById("detailPaymentMethod");
var detailPaidAmount = document.getElementById("detailPaidAmount");
var newPaymentField = document.getElementById("newPaymentField");

var pendingBadge = document.getElementById("pendingBadge");

// deleting
var stuName = document.getElementById("stuName");
var enrollmentDeletingId = document.getElementById("enrollmentDeletingId");

// category edit and delete
var catCreatedAt = document.getElementById("catCreatedAt");
var catUpdatedAt = document.getElementById("catUpdatedAt");
var catIdEdit = document.getElementById("catIdEdit");
var catTitle = document.getElementById("catTitle");
var catIdDel = document.getElementById("catIdDel");

// type edit and delete
var typeCreatedAt = document.getElementById("typeCreatedAt");
var typeUpdatedAt = document.getElementById("typeUpdatedAt");
var typeIdEdit = document.getElementById("typeIdEdit");
var typeTitle = document.getElementById("typeTitle");
var typeIdDel = document.getElementById("typeIdDel");

// policy edit and delete
var policyCreatedAt = document.getElementById("policyCreatedAt");
var policyUpdatedAt = document.getElementById("policyUpdatedAt");
var policyIdEdit = document.getElementById("policyIdEdit");
var policyDescription = document.getElementById("policyDescription");
var policyCatId = document.getElementById("policyCatId");
var policyIdDel = document.getElementById("policyIdDel");
// courses edit
var courseIdEdit = document.getElementById("courseIdEdit");
var courseCreatedAt = document.getElementById("courseCreatedAt");
var courseTitleEdit = document.getElementById("courseTitleEdit");
var courseCategoryIdEdit = document.getElementById("courseCategoryIdEdit");
var courseTypeIdEdit = document.getElementById("courseTypeIdEdit");
var level_or_sub = document.getElementById("level_or_sub");
var fee = document.getElementById("fee");
var discountPercent = document.getElementById("discountPercent");
var startDate = document.getElementById("startDate");
var duration = document.getElementById("duration");
var startTime = document.getElementById("startTime");
var endTime = document.getElementById("endTime");
var M = document.getElementById("M");
var Tu = document.getElementById("Tu");
var W = document.getElementById("W");
var Th = document.getElementById("Th");
var F = document.getElementById("F");
var Sa = document.getElementById("Sa");
var Su = document.getElementById("Su");

var instructor = document.getElementById("instructor");
var services = document.getElementById("services");
var note = document.getElementById("note");

// course delete
var currentCourseIdDel = document.getElementById("currentCourseIdDel");

// course detail
var detailCourseCategory = document.getElementById("detailCourseCategory");
var detailCourseType = document.getElementById("detailCourseType");
var detailCourseTitle = document.getElementById("detailCourseTitle");
var detailCourseLvlorsub = document.getElementById("detailCourseLvlorsub");
var detailCourseFee = document.getElementById("detailCourseFee");
var detailCourseInstructor = document.getElementById("detailCourseInstructor");
var detailCourseServices = document.getElementById("detailCourseServices");
var detailCourseDiscount = document.getElementById("detailCourseDiscount");
var detailCourseStartDate = document.getElementById("detailCourseStartDate");
var detailCourseDuration = document.getElementById("detailCourseDuration");
var detailCourseDays = document.getElementById("detailCourseDays");
var detailCourseFromTo = document.getElementById("detailCourseFromTo");
var detailCourseNote = document.getElementById("detailCourseNote");

// JOBS DEL
var jobIdDel = document.getElementById("jobIdDel");

var daysObj = {
  M: "Monday",
  Tu: "Tuesday",
  W: "Wednesday",
  Th: "Thursday",
  F: "Friday",
  Sa: "Saturday",
  Su: "Sun",
};

var btnAddSect = document.getElementById("addSection");
var curSectionNo = 0;

let nrcArr = null;

function numberWithCommas(x) {
  return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function setCurrentEditing(event, row, idx, classIdx, classFee, discount) {
  $("#editingModal").modal("show");
  event.stopPropagation();
  // id_field.value = id;
  var tr = row.closest("tr");
  var tds = tr.children;
  var rowArr = [];
  let approved = "";
  for (var i = 0; i < tds.length; i++) {
    if (i == 1) {
      rowArr.push(tds[i].children[0].alt);
    } else {
      if (i == 6) {
        rowArr.push(tds[i].innerHTML);
      } else {
        rowArr.push(tds[i].textContent);
      }
    }
  }
  console.log(rowArr);
  enrollmentId.value = idx;
  imagePreview.src = "https://jktmyanmarint.com/backend/" + rowArr[1];
  notChangeImg.value = rowArr[1];
  classId.value = classIdx;
  uname.innerHTML = rowArr[3];
  // dob.value = rowArr[3];
  // fname.value = rowArr[4];

  // nrcArr = rowArr[5].split("/");
  // nrcCode.value = nrcArr[0];
  // getTownship(nrcArr[0]);
  // township.value = nrcArr[1].slice(0, -9);
  // type.value = nrcArr[1].slice(-9, -6);
  // nrcNumber.value = nrcArr[1].slice(-6);
  // email.value = rowArr[6];
  // education.value = rowArr[7];
  // address.value = rowArr[8].trim();
  // phone.value = rowArr[9];
  paymentMethod.value = rowArr[4];
  paidAmount.value = parseInt(rowArr[5].substring(0, rowArr[5].length - 5));
  showPaidAmount.textContent = rowArr[5];
  showDiscount.textContent = discount + " MMKs";
  totalCourseFee.textContent = parseInt(classFee);
  realFee.textContent = parseInt(classFee) - parseInt(discount) + "MMKs";

  if (parseInt(rowArr[5].substring(0, rowArr[5].length - 5)) < (parseInt(classFee) - parseInt(discount))) {
    newPaymentField.style.display = "block";
  } else {
    newPaymentField.style.display = "none";
  }

  // console.log(rowArr[5]);
  if (rowArr[6] == "✅") {
    approved = true;
  } else if (rowArr[6] == "❌") {
    approved = false;
  }
  // console.log(approved);
  isPending.checked = (approved == "1" && true) || false;
  createdAt.value = rowArr[7];
}

function setCurrentDeleting(event, row, idx) {
  $("#deletingModal").modal("show");
  event.stopPropagation();
  var tr = row.closest("tr");
  var tds = tr.children;
  // console.log(tds);
  var rowArr = [];
  for (var i = 0; i < tds.length; i++) {
    if (i == 1) {
      rowArr.push(tds[i].children[0].alt);
    } else {
      rowArr.push(tds[i].textContent);
    }
  }
  // console.log(rowArr[2]);

  stuName.innerText = rowArr[3];
  enrollmentDeletingId.value = idx;
}

// enrollment detail show
function setCurrentDetail(row) {
  var tds = row.children;
  var rowArr = [];
  for (var i = 0; i < tds.length; i++) {
    if (i == 1) {
      rowArr.push(tds[i].children[0].alt);
    } else {
      rowArr.push(tds[i].textContent);
    }
  }
  // console.log(rowArr);

  // enrollment id
  // classId
  detailImage.src = "https://jktmyanmarint.com/backend/" + rowArr[1];
  detailTitle.innerText = rowArr[2];
  detailName.innerText = rowArr[3];
  // detailDob.innerText = rowArr[3];
  // detailFname.innerText = rowArr[4];

  // detailNrc.innerText = rowArr[5];
  // detailEmail.innerText = rowArr[6];
  // detailEducation.innerText = rowArr[7];
  // detailAddress.innerText = rowArr[8].trim();
  // detailPhone.innerText = rowArr[9];
  detailPaymentMethod.innerText = rowArr[4];
  detailPaidAmount.innerText = rowArr[5];
  if (rowArr[6] == "❌") {
    pendingBadge.innerText = "Pending";
    pendingBadge.style.backgroundColor = "#ff6347";
  } else {
    pendingBadge.innerText = "Studying";
    pendingBadge.style.backgroundColor = "#3b5998";
  }
}

function setCurrentCatEdit(row) {
  var tr = row.closest("tr");
  var tds = tr.children;
  var rowArr = [];
  for (var i = 0; i < tds.length; i++) {
    rowArr.push(tds[i].textContent);
  }
  catIdEdit.value = rowArr[0];
  catTitle.value = rowArr[1];
  catCreatedAt.value = rowArr[2];
  catUpdatedAt.value = rowArr[3];
}

function setCurrentCatDel(idx) {
  catIdDel.value = idx;
}

// type crud
function setCurrentTypeEdit(row) {
  var tr = row.closest("tr");
  var tds = tr.children;
  var rowArr = [];
  for (var i = 0; i < tds.length; i++) {
    rowArr.push(tds[i].textContent);
  }
  typeIdEdit.value = rowArr[0];
  typeTitle.value = rowArr[1];
  typeCreatedAt.value = rowArr[2];
  typeUpdatedAt.value = rowArr[3];
}

function setCurrentTypeDel(idx) {
  typeIdDel.value = idx;
}

// policy crud
function setCurrentPolicyEdit(row, categoryId) {
  var tr = row.closest("tr");
  var tds = tr.children;
  var rowArr = [];
  for (var i = 0; i < tds.length; i++) {
    rowArr.push(tds[i].textContent);
  }
  console.log(rowArr);
  policyIdEdit.value = rowArr[0];
  policyDescription.value = rowArr[1];
  policyCatId.value = categoryId;
  policyCreatedAt.value = rowArr[2];
  policyUpdatedAt.value = rowArr[3];
}

function setCurrentPolicyDel(idx) {
  policyIdDel.value = idx;
  // console.log(idx);
}

function setCurrentCourseEdit(event, row, catId, typeId) {
  // var M = document.getElementById("M");
  // var Tu = document.getElementById("Tu");
  // var W = document.getElementById("W");
  // var Th = document.getElementById("Th");
  // var F = document.getElementById("F");
  // var Sa = document.getElementById("Sa");
  // var Su = document.getElementById("Su");
  // M.checked = false;
  // Tu.checked = false;
  // W.checked = false;
  // Th.checked = false;
  // F.checked = false;
  // Sa.checked = false;
  // Su.checked = false;
  $("#addSectionHere").html("");
  $("#editingModal").modal("show");
  event.stopPropagation();
  var tr = row.closest("tr");
  var tds = tr.children;
  var rowArr = [];
  var days = "";
  for (var i = 0; i < tds.length; i++) {
    if (i == 8) {
      for (var j = 0; j < tds[i].querySelector("div").children.length; j++) {
        days += tds[i].querySelector("div").children[j].textContent + ",";
      }
      rowArr.push(days.substring(0, days.length - 1));
    } else {
      rowArr.push(tds[i].textContent);
    }
  }
  // console.log(rowArr);
  var sectionsAr = days.split(",,");
  curSectionNo = sectionsAr.length / 2;

  // console.log(sectionsAr);

  var groupArr = [];
  for (var k = 0; k < sectionsAr.length; k += 2) {
    var obj = {
      days: sectionsAr[k],
      time: sectionsAr[k + 1],
    };
    groupArr.push(obj);
  }

  // console.log(groupArr);
  for (var i = 0; i < groupArr.length; i++) {
    var j = i + 1;

    var sectionDays = groupArr[i].days.split(",");
    var mainLabel = $(
      `<label class='mb-2 d-block mt-3' class='sectionNo'>Section ${j}</label>`
    );
    var chkbos = $(`<div class="row justify-content-between px-3 mt-2"></div>`);
    for (const day of daysArr) {
      if (sectionDays.includes(day.st)) {
        var chkbox = $(
          `<input type="checkbox" id="day${j}${day.st}" value="${day.st}" name="days${j}[]" class="day-chck" checked>`
        );
      } else {
        var chkbox = $(
          `<input type="checkbox" id="day${j}${day.st}" value="${day.st}" name="days${j}[]" class="day-chck">`
        );
      }
      var label = $(
        `<label class="mb-0 mt-1" for="day${j}${day.st}">${day.lg}</label>`
      );
      var chkbcontainer = $(
        `<div class="custom-control custom-checkbox small days-checkbox form-day-check"></div>`
      );
      chkbcontainer.append(chkbox, label);
      chkbos.append(chkbcontainer);
    }

    $("#addSectionHere").append(mainLabel, chkbos);
    var sectionhrss = groupArr[i].time.split("~");
    var timeLeft = $(`<div class=" input-left mb-3 mb-md-0"></div>`);
    var stLabel = $(
      `<label for="startTime${j}">Class Starts At:<span class="my-required-field">Required*</span></label>`
    );
    var stTime = $(
      `<input type="time" value="${sectionhrss[0].replace(
        /,/g,
        ""
      )}" class="form-control" id="startTime${j}" name="startTime${j}" aria-describedby="startTimeField" />`
    );
    timeLeft.append(stLabel, stTime);
    var timeRight = $(`<div class=" input-right"></div>`);
    var endLabel = $(
      `<label for="endTime${j}">Class ends At:<span class="my-required-field">Required*</span></label>`
    );
    var endTime = $(
      `<input type="time" value="${sectionhrss[1].replace(
        /,/g,
        ""
      )}" class="form-control" id="endTime${j}" name="endTime${j}" aria-describedby="endTimeField" />`
    );
    timeRight.append(endLabel, endTime);

    var timeContainer = $(
      `<div class="mt-4 mb-3 mx-auto row justify-content-between"></div>`
    );
    timeContainer.append(timeLeft, timeRight);
    $("#addSectionHere").append(timeContainer);

    // var sectionHrs = sectionsAr[];
  }

  courseIdEdit.value = rowArr[1];
  courseCreatedAt.value = rowArr[15];
  courseTitleEdit.value = rowArr[3];
  courseCategoryIdEdit.value = catId;
  courseTypeIdEdit.value = typeId;
  level_or_sub.value = rowArr[4];
  fee.value = parseInt(
    rowArr[6].substring(0, rowArr[6].length - 4).replace(/,/g, "")
  );
  discountPercent.value = parseInt(rowArr[12]);
  var date = new Date(rowArr[9]);

  var day = date.getDate();
  var month = date.getMonth() + 1;
  var year = date.getFullYear();
  month = (month < 10 ? "0" : "") + month;
  day = (day < 10 ? "0" : "") + day;
  startDate.value = year + "-" + month + "-" + day;

  duration.value = parseInt(rowArr[10]);
  // startTime.value = rowArr[8].split("~")[0];
  // endTime.value = rowArr[8].split("~")[1];
  // if (days.includes("M")) {
  //   M.checked = true;
  // }
  // if (days.includes("Tu")) {
  //   Tu.checked = true;
  // }
  // if (days.includes("W")) {
  //   W.checked = true;
  // }
  // if (days.includes("Th")) {
  //   Th.checked = true;
  // }
  // if (days.includes("F")) {
  //   F.checked = true;
  // }
  // if (days.includes("Sa")) {
  //   Sa.checked = true;
  // }
  // if (days.includes("Su")) {
  //   Su.checked = true;
  // }
  instructor.value = rowArr[7] == "-" ? "" : rowArr[7];
  services.textContent = rowArr[11] == "-" ? "" : rowArr[11];
  note.textContent =
    rowArr[13] == "-" ? "" : rowArr[13].replace(/\r?\n|\r/g, " ").trim();
}

// course edit new section
btnAddSect &&
  btnAddSect.addEventListener("click", function (event) {
    event.preventDefault();
    curSectionNo++;
    var mainLabel = $(
      `<label class='mb-2 d-block mt-3' class='sectionNo'>Section ${curSectionNo}</label>`
    );

    var chkbos = $(`<div class="row justify-content-between px-3 mt-2"></div>`);
    for (const day of daysArr) {
      var chkbox = $(
        `<input type="checkbox" id="day${curSectionNo}${day.st}" value="${day.st}" name="days${curSectionNo}[]" class="day-chck">`
      );
      var label = $(
        `<label class="mb-0 mt-1" for="day${curSectionNo}${day.st}">${day.lg}</label>`
      );
      var chkbcontainer = $(
        `<div class="custom-control custom-checkbox small days-checkbox form-day-check"></div>`
      );
      chkbcontainer.append(chkbox, label);
      chkbos.append(chkbcontainer);
    }
    var timeLeft = $(`<div class=" input-left mb-3 mb-md-0"></div>`);
    var stLabel = $(
      `<label for="startTime${curSectionNo}">Class Starts At:<span class="my-required-field">Required*</span></label>`
    );
    var stTime = $(
      `<input type="time" class="form-control" id="startTime${curSectionNo}" name="startTime${curSectionNo}" aria-describedby="startTimeField" />`
    );
    timeLeft.append(stLabel, stTime);
    var timeRight = $(`<div class=" input-right"></div>`);
    var endLabel = $(
      `<label for="endTime${curSectionNo}">Class ends At:<span class="my-required-field">Required*</span></label>`
    );
    var endTime = $(
      `<input type="time" class="form-control" id="endTime${curSectionNo}" name="endTime${curSectionNo}" aria-describedby="endTimeField" />`
    );
    timeRight.append(endLabel, endTime);

    var timeContainer = $(
      `<div class="mt-4 mb-3 mx-auto row justify-content-between"></div>`
    );
    timeContainer.append(timeLeft, timeRight);

    $("#timeSection").append($(`<hr />`), mainLabel, chkbos, timeContainer);
  });

// course detail show
function setCurrentCourseDetail(row) {
  $("#detailCourseDays").html("");
  var tr = row.closest("tr");
  var tds = tr.children;
  var rowArr = [];
  var days = "";
  for (var i = 0; i < tds.length; i++) {
    if (i == 8) {
      // console.log(tds[i].querySelector("div"));
      for (var j = 0; j < tds[i].querySelector("div").children.length; j++) {
        days += tds[i].querySelector("div").children[j].textContent + ",";
        // console.log(tds[i].children[j].textContent);
      }
      // console.log(days);
      rowArr.push(days.substring(2, days.length - 1).trim());
    } else {
      rowArr.push(tds[i].textContent);
    }
  }

  // console.log(rowArr);

  var sectionsAr = days.split(",,");
  for (var i = 0; i < sectionsAr.length; i++) {
    if (isEven(i)) {
      var sectionDays = sectionsAr[i].split(",");

      var daysContainer = $(`<div></div>`);

      for (var j = 0; j < sectionDays.length; j++) {
        var day = $(
          `<span class='days-badges' style='cursor:pointer;' data-toggle='tooltip' data-placement='top' title='${
            daysObj[sectionDays[j]]
          }'>${sectionDays[j]}</span>`
        );
        daysContainer.append(day);
        $("#detailCourseDays").append(
          daysContainer,
          $(`<div style='margin-top: 5px;'></div>`)
        );
      }
    } else {
      var sectionHourss = $(
        `<span class='section-hr-badge mt-3'>${sectionsAr[i]}</span>`
      );
      $("#detailCourseDays").append(
        sectionHourss,
        $(`<div style='margin-top: 20px;'></div>`)
      );
    }

    // var sectionHrs = sectionsAr[];
  }
  detailCourseTitle.innerText = rowArr[3];
  detailCourseCategory.innerText = rowArr[2];
  detailCourseType.innerText = rowArr[5];
  detailCourseLvlorsub.innerText = rowArr[4];
  detailCourseFee.innerText = rowArr[6];
  detailCourseInstructor.innerText = rowArr[7];
  detailCourseServices.innerText = rowArr[11];
  detailCourseDiscount.innerText = rowArr[12];
  detailCourseStartDate.innerText = rowArr[9];
  detailCourseDuration.innerText = rowArr[10];
  // detailCourseDays.innerText = days;
  // detailCourseFromTo.innerText = rowArr[8];
  detailCourseNote.innerText = rowArr[13].replace(/\r?\n|\r/g, " ").trim();
}

function setCurrentCourseDel(event, idx) {
  $("#deletingModal").modal("show");
  event.stopPropagation();
  currentCourseIdDel.value = idx;
  // console.log(idx);
}

// SET CURRENT JOB DETAIL
function jobDetail(event, jobID, target) {
  $("#detailModal").modal("show");
  event.stopPropagation();
  // console.log(typeof jobID);
  let arr = [];
  let url = "";
  arr.push(jobID);
  switch (target) {
    case "eng":
      {
        url = "./backend/getJobEng.php";
      }
      break;
    case "mm":
      {
        url = "./backend/getJobMm.php";
      }
      break;
    case "jp":
      {
        url = "./backend/getJobJp.php";
      }
      break;
  }
  $.ajax({
    url,
    type: "POST",
    dataType: "json",
    data: { job_id: JSON.stringify(arr) },
    success: function (data, textStatus, jqXHR) {
      // console.log(data.job_data);

      // <ul>
      //     <?php
      //     $requirementList = explode("\n", $row["requirements"]);
      //     for ($i = 0; $i < count($requirementList); $i++) {
      //     ?>
      //         <li><?= $requirementList[$i] ?></li>
      //     <?php } ?>
      // </ul>

      var job = data.job_data[0];
      $("#detailJobId").text(job["job_id"]);
      $("#detailJobTitle").text(job["job_title"]);
      $("#detailCompany").text(job["company_name"]);
      $("#detailType").text(job["employment_type"] + "~" + job["job_type"]);
      $("#detailWage").text(job["wage"]);
      $("#detailOverTime").text(job["overtime"]);
      $("#detailHolidays").text(job["holidays"]);
      $("#detailWorkingHr").text(job["working_hour"]);
      $("#detailBreakTime").text(job["breaktime"]);
      $("#detailLocation").text(job["location"]);
      if (job["isavailable"] == "1") {
        $("#detailAvailable").text("Available");
        $("#detailAvailable").css({ backgroundColor: "#00B74A" });
      } else {
        $("#detailAvailable").text("Unavailable");
        $("#detailAvailable").css({ backgroundColor: "#F93154" });
      }
      $("#detailCreatedAt").text(job["created_at"]);
      $("#detailUpdatedAt").text(job["updated_at"]);

      var ulReq = $("<ul style='padding:15px'></ul>");
      for (const req of job["requirements"].split("\n")) {
        var li = $("<li></li>").text(req);
        ulReq.append(li);
      }
      var ulBen = $("<ul style='padding:15px'></ul>");
      for (const ben of job["benefits"].split("\n")) {
        var li = $("<li></li>").text(ben);
        ulBen.append(li);
      }

      $("#detailReq").html(ulReq);
      $("#detailBen").html(ulBen);
      $("#detailNote").text(job["memo"]);
      $("#detailPhoto1").attr(
        "src",
        "https://jktmyanmarint.com/backend/" + job["photos"].split("|")[0]
      );
      $("#detailPhoto2").attr(
        "src",
        "https://jktmyanmarint.com/backend/" + job["photos"].split("|")[1]
      );
    },
    error: function (jqXHR, textStatus, errorThrown) {},
  });
}

// SET CURRENT DELETING ID JOB
function setCurrentJobDel(event, idx) {
  $("#deletingModal").modal("show");
  event.stopPropagation();
  jobIdDel.value = idx;
  console.log("setting");
}
