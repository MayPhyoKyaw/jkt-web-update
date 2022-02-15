var nrc = {
  init: function () {
    $("select#nrcCode").change(function () {
      var stateNumber = $(this).children("option:selected").val();
      // console.log(stateNumber);
      nrc.load_townshipName(stateNumber);
    });
  },
  load_townshipName: function (id) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "./nrc.php", true);
    xhr.onload = function () {
      var nrcJson = JSON.parse(xhr.responseText);
      nrcJson.sort((a, b) => (a.name_en > b.name_en ? 1 : -1));
      console.log($("#township").html(``));
      $("#township").html(
        `<option value="" selected disabled>Township</option>`
      );
      nrcJson.forEach((value) => {
        // console.log(value)
        var option = document.createElement("option");
        if (id === value.nrc_code) {
          // console.log(value)
          option.innerText = value.name_en + " - " + value.name_mm;
          option.setAttribute("value", value.name_en + " - " + value.name_mm);
          document.getElementById("township").appendChild(option);
        }
      });
    };
    xhr.send();
  },
};

nrc.init();