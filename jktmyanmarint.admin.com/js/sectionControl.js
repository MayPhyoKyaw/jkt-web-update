var btnAddSect = document.getElementById("addSection");
var curSectionNo = 1;

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
{
  /* <label class="mb-2 d-block mt-3" class="sectionNo">Section 1</label>
    <div class="row justify-content-between px-3 mt-2">
        <?php foreach ([["st" => "M", "lg" => "MON"], ["st" => "Tu", "lg" => "TUE"], ["st" => "W", "lg" => "WED"], ["st" => "Th", "lg" => "THU"], ["st" => "F", "lg" => "FRI"], ["st" => "Sa", "lg" => "SAT"], ["st" => "Su", "lg" => "SUN"]] as $day) { ?>
            <div class="custom-control custom-checkbox small days-checkbox form-day-check">
                <input type="checkbox" id="<?= $day["st"] ?>" value="<?= $day["st"] ?>" name="days[]" class="day-chck">
                <label class="mb-0 mt-1" for="<?= $day["st"] ?>"><?= $day["lg"] ?></label>
            </div>
        <?php } ?>
    </div>
    <div class="mt-4 mb-3 mx-auto row justify-content-between">
      <div class=" input-left mb-3 mb-md-0">
          <label for="startTime">Class Starts At:<span class="my-required-field">Required*</span></label>
          <input type="time" class="form-control" id="startTime" name="startTime" aria-describedby="startTimeField" />
      </div>
      <div class="input-right">
          <label for="endTime">Class Ends At:<span class="my-required-field">Required*</span></label>
          <input type="time" class="form-control" id="endTime" name="endTime" aria-describedby="endTimeField" />
      </div>
    </div> */
}

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

  $("#timeSection").append($(`<hr />`),mainLabel, chkbos, timeContainer);
});
