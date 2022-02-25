latLons = [
    "43.9119,144.1727",
    "44.1515,143.5729",
    "42.9799,142.3984",
    "43.7591,142.4872",
    "43.2000,141.0018",
    "41.7687,140.7291",
    "43.4935,142.6141",
    "44.3560,142.4632",
    "43.3420,142.3832",
    "43.0315,141.2985",
    "43.0628,141.2577",
    "43.1225,141.4308",
    "43.2987,140.5981",
    "42.9630,141.1583",
    "42.9630,141.1583",
    "43.0780,141.3400",
    "43.00249361191219,141.45296109739618",
    "44.1785,145.2219",
    "43.0598,141.3467",
    "41.7969,140.7568",
    "42.4128,141.1066",
    "43.0560,142.6108",
    "42.77159906586529,141.40424358204658",
    "42.8048,140.6874",
  ];

  function latLonsSplit(arg) {
    return arg.split(",");
  }

  // console.log(latLonsSplit(latLons[0])[0])
  
  $.ajax({
    url: `https://api.openweathermap.org/data/2.5/weather?lat=${latLonsSplit(latLons[0])[0]}&lon=${latLonsSplit(latLons[0])[1]}&appid=3b732dd9bfd2a0c01fbeb0aed0e87715`,
    type: "GET",
    dataType: "json", // added data type
    success: function (res) {
      var img = document.createElement("img");
      img.src = `http://openweathermap.org/img/wn/${res.weather[0].icon}@2x.png`;
      img.style.width = 32 + "px";
      img.style.height = 32 + "px";
      img.style.margin = "0 5px";
      img.style.padding = 1 + "px";
      document.getElementById("temp" + 0).innerText = Math.round(res.main.temp - 273.15) + " °C";
      document.getElementById("temp" + 0).prepend(img);
    },
  });
  $.ajax({
    url: `https://api.openweathermap.org/data/2.5/weather?lat=${latLonsSplit(latLons[1])[0]}&lon=${latLonsSplit(latLons[1])[1]}&appid=151acfb517bc582ee713aa8b3a3ec7ee`,
    type: "GET",
    dataType: "json", // added data type
    success: function (res) {
      var img = document.createElement("img");
      img.src = `http://openweathermap.org/img/wn/${res.weather[0].icon}@2x.png`;
      img.style.width = 32 + "px";
      img.style.height = 32 + "px";
      img.style.margin = "0 5px";
      img.style.padding = 1 + "px";
      document.getElementById("temp" + 1).innerText = Math.round(res.main.temp - 273.15) + " °C";
      document.getElementById("temp" + 1).prepend(img);
    },
  });
  $.ajax({
    url: `https://api.openweathermap.org/data/2.5/weather?lat=${latLonsSplit(latLons[2])[0]}&lon=${latLonsSplit(latLons[2])[1]}&appid=9d003d005e402339143e753efc552b8e`,
    type: "GET",
    dataType: "json", // added data type
    success: function (res) {
      var img = document.createElement("img");
      img.src = `http://openweathermap.org/img/wn/${res.weather[0].icon}@2x.png`;
      img.style.width = 32 + "px";
      img.style.height = 32 + "px";
      img.style.margin = "0 5px";
      img.style.padding = 1 + "px";
      document.getElementById("temp" + 2).innerText = Math.round(res.main.temp - 273.15) + " °C";
      document.getElementById("temp" + 2).prepend(img);
    },
  });
  $.ajax({
    url: `https://api.openweathermap.org/data/2.5/weather?lat=${latLonsSplit(latLons[3])[0]}&lon=${latLonsSplit(latLons[3])[1]}&appid=164624a20f6296cb36efa79043f6e525`,
    type: "GET",
    dataType: "json", // added data type
    success: function (res) {
      var img = document.createElement("img");
      img.src = `http://openweathermap.org/img/wn/${res.weather[0].icon}@2x.png`;
      img.style.width = 32 + "px";
      img.style.height = 32 + "px";
      img.style.margin = "0 5px";
      img.style.padding = 1 + "px";
      document.getElementById("temp" + 3).innerText = Math.round(res.main.temp - 273.15) + " °C";
      document.getElementById("temp" + 3).prepend(img);
    },
  });
  $.ajax({
    url: `https://api.openweathermap.org/data/2.5/weather?lat=${latLonsSplit(latLons[4])[0]}&lon=${latLonsSplit(latLons[4])[1]}&appid=0918c86d463b3e453bf65526b7a3b94f`,
    type: "GET",
    dataType: "json", // added data type
    success: function (res) {
      var img = document.createElement("img");
      img.src = `http://openweathermap.org/img/wn/${res.weather[0].icon}@2x.png`;
      img.style.width = 32 + "px";
      img.style.height = 32 + "px";
      img.style.margin = "0 5px";
      img.style.padding = 1 + "px";
      document.getElementById("temp" + 4).innerText = Math.round(res.main.temp - 273.15) + " °C";
      document.getElementById("temp" + 4).prepend(img);
    },
  });
  $.ajax({
    url: `https://api.openweathermap.org/data/2.5/weather?lat=${latLonsSplit(latLons[5])[0]}&lon=${latLonsSplit(latLons[5])[1]}&appid=5f6d6d9942b3c5e3e45e78b712579046`,
    type: "GET",
    dataType: "json", // added data type
    success: function (res) {
      var img = document.createElement("img");
      img.src = `http://openweathermap.org/img/wn/${res.weather[0].icon}@2x.png`;
      img.style.width = 32 + "px";
      img.style.height = 32 + "px";
      img.style.margin = "0 5px";
      img.style.padding = 1 + "px";
      document.getElementById("temp" + 5).innerText = Math.round(res.main.temp - 273.15) + " °C";
      document.getElementById("temp" + 5).prepend(img);
    },
  });
  $.ajax({
    url: `https://api.openweathermap.org/data/2.5/weather?lat=${latLonsSplit(latLons[6])[0]}&lon=${latLonsSplit(latLons[6])[1]}&appid=884fae15088844f7cdc264925d18887c`,
    type: "GET",
    dataType: "json", // added data type
    success: function (res) {
      var img = document.createElement("img");
      img.src = `http://openweathermap.org/img/wn/${res.weather[0].icon}@2x.png`;
      img.style.width = 32 + "px";
      img.style.height = 32 + "px";
      img.style.margin = "0 5px";
      img.style.padding = 1 + "px";
      document.getElementById("temp" + 6).innerText = Math.round(res.main.temp - 273.15) + " °C";
      document.getElementById("temp" + 6).prepend(img);
    },
  });
  $.ajax({
    url: `https://api.openweathermap.org/data/2.5/weather?lat=${latLonsSplit(latLons[7])[0]}&lon=${latLonsSplit(latLons[7])[1]}&appid=e511ea2a94d6d4c17e33d1ee9d3f18f5`,
    type: "GET",
    dataType: "json", // added data type
    success: function (res) {
      var img = document.createElement("img");
      img.src = `http://openweathermap.org/img/wn/${res.weather[0].icon}@2x.png`;
      img.style.width = 32 + "px";
      img.style.height = 32 + "px";
      img.style.margin = "0 5px";
      img.style.padding = 1 + "px";
      document.getElementById("temp" + 7).innerText = Math.round(res.main.temp - 273.15) + " °C";
      document.getElementById("temp" + 7).prepend(img);
    },
  });
  $.ajax({
    url: `https://api.openweathermap.org/data/2.5/weather?lat=${latLonsSplit(latLons[8])[0]}&lon=${latLonsSplit(latLons[8])[1]}&appid=4b02c6e9c4cb8095efc683f072822fa2`,
    type: "GET",
    dataType: "json", // added data type
    success: function (res) {
      var img = document.createElement("img");
      img.src = `http://openweathermap.org/img/wn/${res.weather[0].icon}@2x.png`;
      img.style.width = 32 + "px";
      img.style.height = 32 + "px";
      img.style.margin = "0 5px";
      img.style.padding = 1 + "px";
      document.getElementById("temp" + 8).innerText = Math.round(res.main.temp - 273.15) + " °C";
      document.getElementById("temp" + 8).prepend(img);
    },
  });
  $.ajax({
    url: `https://api.openweathermap.org/data/2.5/weather?lat=${latLonsSplit(latLons[9])[0]}&lon=${latLonsSplit(latLons[9])[1]}&appid=6980542974ba79771281c1fb9cd906c0`,
    type: "GET",
    dataType: "json", // added data type
    success: function (res) {
      var img = document.createElement("img");
      img.src = `http://openweathermap.org/img/wn/${res.weather[0].icon}@2x.png`;
      img.style.width = 32 + "px";
      img.style.height = 32 + "px";
      img.style.margin = "0 5px";
      img.style.padding = 1 + "px";
      document.getElementById("temp" + 9).innerText = Math.round(res.main.temp - 273.15) + " °C";
      document.getElementById("temp" + 9).prepend(img);
    },
  });
  $.ajax({
    url: `https://api.openweathermap.org/data/2.5/weather?lat=${latLonsSplit(latLons[10])[0]}&lon=${latLonsSplit(latLons[10])[1]}&appid=51707a02b6b76e53633b1b5df809df03`,
    type: "GET",
    dataType: "json", // added data type
    success: function (res) {
      var img = document.createElement("img");
      img.src = `http://openweathermap.org/img/wn/${res.weather[0].icon}@2x.png`;
      img.style.width = 32 + "px";
      img.style.height = 32 + "px";
      img.style.margin = "0 5px";
      img.style.padding = 1 + "px";
      document.getElementById("temp" + 10).innerText = Math.round(res.main.temp - 273.15) + " °C";
      document.getElementById("temp" + 10).prepend(img);
    },
  });
  $.ajax({
    url: `https://api.openweathermap.org/data/2.5/weather?lat=${latLonsSplit(latLons[11])[0]}&lon=${latLonsSplit(latLons[11])[1]}&appid=d126d382a5b20b5b335bbfc5978c58ab`,
    type: "GET",
    dataType: "json", // added data type
    success: function (res) {
      var img = document.createElement("img");
      img.src = `http://openweathermap.org/img/wn/${res.weather[0].icon}@2x.png`;
      img.style.width = 32 + "px";
      img.style.height = 32 + "px";
      img.style.margin = "0 5px";
      img.style.padding = 1 + "px";
      document.getElementById("temp" + 11).innerText = Math.round(res.main.temp - 273.15) + " °C";
      document.getElementById("temp" + 11).prepend(img);
    },
  });
  $.ajax({
    url: `https://api.openweathermap.org/data/2.5/weather?lat=${latLonsSplit(latLons[12])[0]}&lon=${latLonsSplit(latLons[12])[1]}&appid=5ed0b4724dfec2d2f1ef811afe1a09e8`,
    type: "GET",
    dataType: "json", // added data type
    success: function (res) {
      var img = document.createElement("img");
      img.src = `http://openweathermap.org/img/wn/${res.weather[0].icon}@2x.png`;
      img.style.width = 32 + "px";
      img.style.height = 32 + "px";
      img.style.margin = "0 5px";
      img.style.padding = 1 + "px";
      document.getElementById("temp" + 12).innerText = Math.round(res.main.temp - 273.15) + " °C";
      document.getElementById("temp" + 12).prepend(img);
    },
  });
  $.ajax({
    url: `https://api.openweathermap.org/data/2.5/weather?lat=${latLonsSplit(latLons[13])[0]}&lon=${latLonsSplit(latLons[13])[1]}&appid=fb936f0f79836137359595fb7aa75afa`,
    type: "GET",
    dataType: "json", // added data type
    success: function (res) {
      var img = document.createElement("img");
      img.src = `http://openweathermap.org/img/wn/${res.weather[0].icon}@2x.png`;
      img.style.width = 32 + "px";
      img.style.height = 32 + "px";
      img.style.margin = "0 5px";
      img.style.padding = 1 + "px";
      document.getElementById("temp" + 13).innerText = Math.round(res.main.temp - 273.15) + " °C";
      document.getElementById("temp" + 13).prepend(img);
    },
  });
  $.ajax({
    url: `https://api.openweathermap.org/data/2.5/weather?lat=${latLonsSplit(latLons[14])[0]}&lon=${latLonsSplit(latLons[14])[1]}&appid=22c0075fee20f9c2195476d15096d049`,
    type: "GET",
    dataType: "json", // added data type
    success: function (res) {
      var img = document.createElement("img");
      img.src = `http://openweathermap.org/img/wn/${res.weather[0].icon}@2x.png`;
      img.style.width = 32 + "px";
      img.style.height = 32 + "px";
      img.style.margin = "0 5px";
      img.style.padding = 1 + "px";
      document.getElementById("temp" + 14).innerText = Math.round(res.main.temp - 273.15) + " °C";
      document.getElementById("temp" + 14).prepend(img);
    },
  });
  $.ajax({
    url: `https://api.openweathermap.org/data/2.5/weather?lat=${latLonsSplit(latLons[15])[0]}&lon=${latLonsSplit(latLons[15])[1]}&appid=ed415830caebec9c2573986508b8388c`,
    type: "GET",
    dataType: "json", // added data type
    success: function (res) {
      var img = document.createElement("img");
      img.src = `http://openweathermap.org/img/wn/${res.weather[0].icon}@2x.png`;
      img.style.width = 32 + "px";
      img.style.height = 32 + "px";
      img.style.margin = "0 5px";
      img.style.padding = 1 + "px";
      document.getElementById("temp" + 15).innerText = Math.round(res.main.temp - 273.15) + " °C";
      document.getElementById("temp" + 15).prepend(img);
    },
  });
  $.ajax({
    url: `https://api.openweathermap.org/data/2.5/weather?lat=${latLonsSplit(latLons[16])[0]}&lon=${latLonsSplit(latLons[16])[1]}&appid=f44bc9699e3b616ad3b23a45643a899c`,
    type: "GET",
    dataType: "json", // added data type
    success: function (res) {
      var img = document.createElement("img");
      img.src = `http://openweathermap.org/img/wn/${res.weather[0].icon}@2x.png`;
      img.style.width = 32 + "px";
      img.style.height = 32 + "px";
      img.style.margin = "0 5px";
      img.style.padding = 1 + "px";
      document.getElementById("temp" + 16).innerText = Math.round(res.main.temp - 273.15) + " °C";
      document.getElementById("temp" + 16).prepend(img);
    },
  });
  $.ajax({
    url: `https://api.openweathermap.org/data/2.5/weather?lat=${latLonsSplit(latLons[17])[0]}&lon=${latLonsSplit(latLons[17])[1]}&appid=3b6c9c8251a02f6645c284e44d5c57ed`,
    type: "GET",
    dataType: "json", // added data type
    success: function (res) {
      var img = document.createElement("img");
      img.src = `http://openweathermap.org/img/wn/${res.weather[0].icon}@2x.png`;
      img.style.width = 32 + "px";
      img.style.height = 32 + "px";
      img.style.margin = "0 5px";
      img.style.padding = 1 + "px";
      document.getElementById("temp" + 17).innerText = Math.round(res.main.temp - 273.15) + " °C";
      document.getElementById("temp" + 17).prepend(img);
    },
  });
  $.ajax({
    url: `https://api.openweathermap.org/data/2.5/weather?lat=${latLonsSplit(latLons[18])[0]}&lon=${latLonsSplit(latLons[18])[1]}&appid=795d720e648b3023259c558a53557230`,
    type: "GET",
    dataType: "json", // added data type
    success: function (res) {
      var img = document.createElement("img");
      img.src = `http://openweathermap.org/img/wn/${res.weather[0].icon}@2x.png`;
      img.style.width = 32 + "px";
      img.style.height = 32 + "px";
      img.style.margin = "0 5px";
      img.style.padding = 1 + "px";
      document.getElementById("temp" + 18).innerText = Math.round(res.main.temp - 273.15) + " °C";
      document.getElementById("temp" + 18).prepend(img);
    },
  });
  $.ajax({
    url: `https://api.openweathermap.org/data/2.5/weather?lat=${latLonsSplit(latLons[19])[0]}&lon=${latLonsSplit(latLons[19])[1]}&appid=8a5d33b8f4a36dee912e49348042fb7b`,
    type: "GET",
    dataType: "json", // added data type
    success: function (res) {
      var img = document.createElement("img");
      img.src = `http://openweathermap.org/img/wn/${res.weather[0].icon}@2x.png`;
      img.style.width = 32 + "px";
      img.style.height = 32 + "px";
      img.style.margin = "0 5px";
      img.style.padding = 1 + "px";
      document.getElementById("temp" + 19).innerText = Math.round(res.main.temp - 273.15) + " °C";
      document.getElementById("temp" + 19).prepend(img);
    },
  });
  $.ajax({
    url: `https://api.openweathermap.org/data/2.5/weather?lat=${latLonsSplit(latLons[20])[0]}&lon=${latLonsSplit(latLons[20])[1]}&appid=49daf7e583e29adf88f04b2e5d3b3fec`,
    type: "GET",
    dataType: "json", // added data type
    success: function (res) {
      var img = document.createElement("img");
      img.src = `http://openweathermap.org/img/wn/${res.weather[0].icon}@2x.png`;
      img.style.width = 32 + "px";
      img.style.height = 32 + "px";
      img.style.margin = "0 5px";
      img.style.padding = 1 + "px";
      document.getElementById("temp" + 20).innerText = Math.round(res.main.temp - 273.15) + " °C";
      document.getElementById("temp" + 20).prepend(img);
    },
  });
  $.ajax({
    url: `https://api.openweathermap.org/data/2.5/weather?lat=${latLonsSplit(latLons[21])[0]}&lon=${latLonsSplit(latLons[21])[1]}&appid=1156dd7017644a1b653dc838eff940d4`,
    type: "GET",
    dataType: "json", // added data type
    success: function (res) {
      var img = document.createElement("img");
      img.src = `http://openweathermap.org/img/wn/${res.weather[0].icon}@2x.png`;
      img.style.width = 32 + "px";
      img.style.height = 32 + "px";
      img.style.margin = "0 5px";
      img.style.padding = 1 + "px";
      document.getElementById("temp" + 21).innerText = Math.round(res.main.temp - 273.15) + " °C";
      document.getElementById("temp" + 21).prepend(img);
    },
  });
  $.ajax({
    url: `https://api.openweathermap.org/data/2.5/weather?lat=${latLonsSplit(latLons[22])[0]}&lon=${latLonsSplit(latLons[22])[1]}&appid=2d183f858ea637645669123bf3c97c61`,
    type: "GET",
    dataType: "json", // added data type
    success: function (res) {
      var img = document.createElement("img");
      img.src = `http://openweathermap.org/img/wn/${res.weather[0].icon}@2x.png`;
      img.style.width = 32 + "px";
      img.style.height = 32 + "px";
      img.style.margin = "0 5px";
      img.style.padding = 1 + "px";
      document.getElementById("temp" + 22).innerText = Math.round(res.main.temp - 273.15) + " °C";
      document.getElementById("temp" + 22).prepend(img);
    },
  });
  $.ajax({
    url: `https://api.openweathermap.org/data/2.5/weather?lat=${latLonsSplit(latLons[23])[0]}&lon=${latLonsSplit(latLons[23])[1]}&appid=9e031beef00b6315f863cf2f7ea8a6f8`,
    type: "GET",
    dataType: "json", // added data type
    success: function (res) {
      var img = document.createElement("img");
      img.src = `http://openweathermap.org/img/wn/${res.weather[0].icon}@2x.png`;
      img.style.width = 32 + "px";
      img.style.height = 32 + "px";
      img.style.margin = "0 5px";
      img.style.padding = 1 + "px";
      document.getElementById("temp" + 23).innerText = Math.round(res.main.temp - 273.15) + " °C";
      document.getElementById("temp" + 23).prepend(img);
    },
  });
  