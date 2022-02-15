// Cover carousel
$(".carousel").carousel({
  pause: "false",
  interval: 3000,
});
AOS.init();

// temperature
const xhr = new XMLHttpRequest();
let Temp = document.getElementById("temperature");
let img = document.getElementById("weatherImage");
let description = document.getElementById("description");
xhr.open(
  "GET",
  `https://api.openweathermap.org/data/2.5/weather?q=sapporo&appid=1474f1e7c77ade332e0e292741d239a0`
);
xhr.send();
xhr.onload = () => {
  if (xhr.status === 404) {
    alert("Place not found");
  } else {
    var data = JSON.parse(xhr.response);
    Temp.innerHTML = `${Math.round(data.main.temp - 273.15)}&#176;C`;
    console.log(Math.round(data.main.temp - 273.15) + "&#176;C");
    //   console.log(secondsToHms(data.timezone));
    console.log(data);
    img.src = `http://openweathermap.org/img/wn/${data.weather[0].icon}@2x.png`;
    description.innerHTML = data.weather[0].description;
  }
};

$(document).ready(function () {
  $(document).ready(function () {
    $(".tabs-list li a").click(function (e) {
      e.preventDefault();
    });

    $(".tabs-list li").click(function () {
      var tabid = $(this).find("a").attr("href");
      $(".tabs-list li,.tabs div.tab").removeClass("active"); // removing active class from tab

      $(".tab").hide(); // hiding open tab
      $(tabid).show(); // show tab
      $(this).addClass("active"); //  adding active class to clicked tab
    });
  });
});
