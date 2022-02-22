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
  
  $.ajax({
    url: `http://api.weatherapi.com/v1/current.json?key=6450d6e30f464fd99c173459221702&q=${latLons[0]}`,
    type: "GET",
    dataType: "json", // added data type
    success: function (res) {
      var img = document.createElement("img");
      img.src = "https:" + res.current.condition.icon;
      img.style.width = 32 + "px";
      img.style.height = 32 + "px";
      img.style.margin = "0 5px";
      img.style.padding = 1 + "px";
      document.getElementById("temp" + 0).innerText = res.current.temp_c + " °C";
      document.getElementById("temp" + 0).prepend(img);
    },
  });
  $.ajax({
    url: `http://api.weatherapi.com/v1/current.json?key=6450d6e30f464fd99c173459221702&q=${latLons[1]}`,
    type: "GET",
    dataType: "json", // added data type
    success: function (res) {
      var img = document.createElement("img");
      img.src = "https:" + res.current.condition.icon;
      img.style.width = 32 + "px";
      img.style.height = 32 + "px";
      img.style.margin = "0 5px";
      img.style.padding = 1 + "px";
      document.getElementById("temp" + 1).innerText = res.current.temp_c + " °C";
      document.getElementById("temp" + 1).prepend(img);
    },
  });
  $.ajax({
    url: `http://api.weatherapi.com/v1/current.json?key=6450d6e30f464fd99c173459221702&q=${latLons[2]}`,
    type: "GET",
    dataType: "json", // added data type
    success: function (res) {
      var img = document.createElement("img");
      img.src = "https:" + res.current.condition.icon;
      img.style.width = 32 + "px";
      img.style.height = 32 + "px";
      img.style.margin = "0 5px";
      img.style.padding = 1 + "px";
      document.getElementById("temp" + 2).innerText = res.current.temp_c + " °C";
      document.getElementById("temp" + 2).prepend(img);
    },
  });
  $.ajax({
    url: `http://api.weatherapi.com/v1/current.json?key=6450d6e30f464fd99c173459221702&q=${latLons[3]}`,
    type: "GET",
    dataType: "json", // added data type
    success: function (res) {
      var img = document.createElement("img");
      img.src = "https:" + res.current.condition.icon;
      img.style.width = 32 + "px";
      img.style.height = 32 + "px";
      img.style.margin = "0 5px";
      img.style.padding = 1 + "px";
      document.getElementById("temp" + 3).innerText = res.current.temp_c + " °C";
      document.getElementById("temp" + 3).prepend(img);
    },
  });
  $.ajax({
    url: `http://api.weatherapi.com/v1/current.json?key=6450d6e30f464fd99c173459221702&q=${latLons[4]}`,
    type: "GET",
    dataType: "json", // added data type
    success: function (res) {
      var img = document.createElement("img");
      img.src = "https:" + res.current.condition.icon;
      img.style.width = 32 + "px";
      img.style.height = 32 + "px";
      img.style.margin = "0 5px";
      img.style.padding = 1 + "px";
      document.getElementById("temp" + 4).innerText = res.current.temp_c + " °C";
      document.getElementById("temp" + 4).prepend(img);
    },
  });
  $.ajax({
    url: `http://api.weatherapi.com/v1/current.json?key=6450d6e30f464fd99c173459221702&q=${latLons[5]}`,
    type: "GET",
    dataType: "json", // added data type
    success: function (res) {
      var img = document.createElement("img");
      img.src = "https:" + res.current.condition.icon;
      img.style.width = 32 + "px";
      img.style.height = 32 + "px";
      img.style.margin = "0 5px";
      img.style.padding = 1 + "px";
      document.getElementById("temp" + 5).innerText = res.current.temp_c + " °C";
      document.getElementById("temp" + 5).prepend(img);
    },
  });
  $.ajax({
    url: `http://api.weatherapi.com/v1/current.json?key=6450d6e30f464fd99c173459221702&q=${latLons[6]}`,
    type: "GET",
    dataType: "json", // added data type
    success: function (res) {
      var img = document.createElement("img");
      img.src = "https:" + res.current.condition.icon;
      img.style.width = 32 + "px";
      img.style.height = 32 + "px";
      img.style.margin = "0 5px";
      img.style.padding = 1 + "px";
      document.getElementById("temp" + 6).innerText = res.current.temp_c + " °C";
      document.getElementById("temp" + 6).prepend(img);
    },
  });
  $.ajax({
    url: `http://api.weatherapi.com/v1/current.json?key=6450d6e30f464fd99c173459221702&q=${latLons[7]}`,
    type: "GET",
    dataType: "json", // added data type
    success: function (res) {
      var img = document.createElement("img");
      img.src = "https:" + res.current.condition.icon;
      img.style.width = 32 + "px";
      img.style.height = 32 + "px";
      img.style.margin = "0 5px";
      img.style.padding = 1 + "px";
      document.getElementById("temp" + 7).innerText = res.current.temp_c + " °C";
      document.getElementById("temp" + 7).prepend(img);
    },
  });
  $.ajax({
    url: `http://api.weatherapi.com/v1/current.json?key=6450d6e30f464fd99c173459221702&q=${latLons[8]}`,
    type: "GET",
    dataType: "json", // added data type
    success: function (res) {
      var img = document.createElement("img");
      img.src = "https:" + res.current.condition.icon;
      img.style.width = 32 + "px";
      img.style.height = 32 + "px";
      img.style.margin = "0 5px";
      img.style.padding = 1 + "px";
      document.getElementById("temp" + 8).innerText = res.current.temp_c + " °C";
      document.getElementById("temp" + 8).prepend(img);
    },
  });
  $.ajax({
    url: `http://api.weatherapi.com/v1/current.json?key=6450d6e30f464fd99c173459221702&q=${latLons[9]}`,
    type: "GET",
    dataType: "json", // added data type
    success: function (res) {
      var img = document.createElement("img");
      img.src = "https:" + res.current.condition.icon;
      img.style.width = 32 + "px";
      img.style.height = 32 + "px";
      img.style.margin = "0 5px";
      img.style.padding = 1 + "px";
      document.getElementById("temp" + 9).innerText = res.current.temp_c + " °C";
      document.getElementById("temp" + 9).prepend(img);
    },
  });
  $.ajax({
    url: `http://api.weatherapi.com/v1/current.json?key=6450d6e30f464fd99c173459221702&q=${latLons[10]}`,
    type: "GET",
    dataType: "json", // added data type
    success: function (res) {
      var img = document.createElement("img");
      img.src = "https:" + res.current.condition.icon;
      img.style.width = 32 + "px";
      img.style.height = 32 + "px";
      img.style.margin = "0 5px";
      img.style.padding = 1 + "px";
      document.getElementById("temp" + 10).innerText = res.current.temp_c + " °C";
      document.getElementById("temp" + 10).prepend(img);
    },
  });
  $.ajax({
    url: `http://api.weatherapi.com/v1/current.json?key=6450d6e30f464fd99c173459221702&q=${latLons[11]}`,
    type: "GET",
    dataType: "json", // added data type
    success: function (res) {
      var img = document.createElement("img");
      img.src = "https:" + res.current.condition.icon;
      img.style.width = 32 + "px";
      img.style.height = 32 + "px";
      img.style.margin = "0 5px";
      img.style.padding = 1 + "px";
      document.getElementById("temp" + 11).innerText = res.current.temp_c + " °C";
      document.getElementById("temp" + 11).prepend(img);
    },
  });
  $.ajax({
    url: `http://api.weatherapi.com/v1/current.json?key=6450d6e30f464fd99c173459221702&q=${latLons[12]}`,
    type: "GET",
    dataType: "json", // added data type
    success: function (res) {
      var img = document.createElement("img");
      img.src = "https:" + res.current.condition.icon;
      img.style.width = 32 + "px";
      img.style.height = 32 + "px";
      img.style.margin = "0 5px";
      img.style.padding = 1 + "px";
      document.getElementById("temp" + 12).innerText = res.current.temp_c + " °C";
      document.getElementById("temp" + 12).prepend(img);
    },
  });
  $.ajax({
    url: `http://api.weatherapi.com/v1/current.json?key=6450d6e30f464fd99c173459221702&q=${latLons[13]}`,
    type: "GET",
    dataType: "json", // added data type
    success: function (res) {
      var img = document.createElement("img");
      img.src = "https:" + res.current.condition.icon;
      img.style.width = 32 + "px";
      img.style.height = 32 + "px";
      img.style.margin = "0 5px";
      img.style.padding = 1 + "px";
      document.getElementById("temp" + 13).innerText = res.current.temp_c + " °C";
      document.getElementById("temp" + 13).prepend(img);
    },
  });
  $.ajax({
    url: `http://api.weatherapi.com/v1/current.json?key=6450d6e30f464fd99c173459221702&q=${latLons[14]}`,
    type: "GET",
    dataType: "json", // added data type
    success: function (res) {
      var img = document.createElement("img");
      img.src = "https:" + res.current.condition.icon;
      img.style.width = 32 + "px";
      img.style.height = 32 + "px";
      img.style.margin = "0 5px";
      img.style.padding = 1 + "px";
      document.getElementById("temp" + 14).innerText = res.current.temp_c + " °C";
      document.getElementById("temp" + 14).prepend(img);
    },
  });
  $.ajax({
    url: `http://api.weatherapi.com/v1/current.json?key=6450d6e30f464fd99c173459221702&q=${latLons[15]}`,
    type: "GET",
    dataType: "json", // added data type
    success: function (res) {
      var img = document.createElement("img");
      img.src = "https:" + res.current.condition.icon;
      img.style.width = 32 + "px";
      img.style.height = 32 + "px";
      img.style.margin = "0 5px";
      img.style.padding = 1 + "px";
      document.getElementById("temp" + 15).innerText = res.current.temp_c + " °C";
      document.getElementById("temp" + 15).prepend(img);
    },
  });
  $.ajax({
    url: `http://api.weatherapi.com/v1/current.json?key=6450d6e30f464fd99c173459221702&q=${latLons[16]}`,
    type: "GET",
    dataType: "json", // added data type
    success: function (res) {
      var img = document.createElement("img");
      img.src = "https:" + res.current.condition.icon;
      img.style.width = 32 + "px";
      img.style.height = 32 + "px";
      img.style.margin = "0 5px";
      img.style.padding = 1 + "px";
      document.getElementById("temp" + 16).innerText = res.current.temp_c + " °C";
      document.getElementById("temp" + 16).prepend(img);
    },
  });
  $.ajax({
    url: `http://api.weatherapi.com/v1/current.json?key=6450d6e30f464fd99c173459221702&q=${latLons[17]}`,
    type: "GET",
    dataType: "json", // added data type
    success: function (res) {
      var img = document.createElement("img");
      img.src = "https:" + res.current.condition.icon;
      img.style.width = 32 + "px";
      img.style.height = 32 + "px";
      img.style.margin = "0 5px";
      img.style.padding = 1 + "px";
      document.getElementById("temp" + 17).innerText = res.current.temp_c + " °C";
      document.getElementById("temp" + 17).prepend(img);
    },
  });
  $.ajax({
    url: `http://api.weatherapi.com/v1/current.json?key=6450d6e30f464fd99c173459221702&q=${latLons[18]}`,
    type: "GET",
    dataType: "json", // added data type
    success: function (res) {
      var img = document.createElement("img");
      img.src = "https:" + res.current.condition.icon;
      img.style.width = 32 + "px";
      img.style.height = 32 + "px";
      img.style.margin = "0 5px";
      img.style.padding = 1 + "px";
      document.getElementById("temp" + 18).innerText = res.current.temp_c + " °C";
      document.getElementById("temp" + 18).prepend(img);
    },
  });
  $.ajax({
    url: `http://api.weatherapi.com/v1/current.json?key=6450d6e30f464fd99c173459221702&q=${latLons[19]}`,
    type: "GET",
    dataType: "json", // added data type
    success: function (res) {
      var img = document.createElement("img");
      img.src = "https:" + res.current.condition.icon;
      img.style.width = 32 + "px";
      img.style.height = 32 + "px";
      img.style.margin = "0 5px";
      img.style.padding = 1 + "px";
      document.getElementById("temp" + 19).innerText = res.current.temp_c + " °C";
      document.getElementById("temp" + 19).prepend(img);
    },
  });
  $.ajax({
    url: `http://api.weatherapi.com/v1/current.json?key=6450d6e30f464fd99c173459221702&q=${latLons[20]}`,
    type: "GET",
    dataType: "json", // added data type
    success: function (res) {
      var img = document.createElement("img");
      img.src = "https:" + res.current.condition.icon;
      img.style.width = 32 + "px";
      img.style.height = 32 + "px";
      img.style.margin = "0 5px";
      img.style.padding = 1 + "px";
      document.getElementById("temp" + 20).innerText = res.current.temp_c + " °C";
      document.getElementById("temp" + 20).prepend(img);
    },
  });
  $.ajax({
    url: `http://api.weatherapi.com/v1/current.json?key=6450d6e30f464fd99c173459221702&q=${latLons[21]}`,
    type: "GET",
    dataType: "json", // added data type
    success: function (res) {
      var img = document.createElement("img");
      img.src = "https:" + res.current.condition.icon;
      img.style.width = 32 + "px";
      img.style.height = 32 + "px";
      img.style.margin = "0 5px";
      img.style.padding = 1 + "px";
      document.getElementById("temp" + 21).innerText = res.current.temp_c + " °C";
      document.getElementById("temp" + 21).prepend(img);
    },
  });
  $.ajax({
    url: `http://api.weatherapi.com/v1/current.json?key=6450d6e30f464fd99c173459221702&q=${latLons[22]}`,
    type: "GET",
    dataType: "json", // added data type
    success: function (res) {
      var img = document.createElement("img");
      img.src = "https:" + res.current.condition.icon;
      img.style.width = 32 + "px";
      img.style.height = 32 + "px";
      img.style.margin = "0 5px";
      img.style.padding = 1 + "px";
      document.getElementById("temp" + 22).innerText = res.current.temp_c + " °C";
      document.getElementById("temp" + 22).prepend(img);
    },
  });
  $.ajax({
    url: `http://api.weatherapi.com/v1/current.json?key=6450d6e30f464fd99c173459221702&q=${latLons[23]}`,
    type: "GET",
    dataType: "json", // added data type
    success: function (res) {
      var img = document.createElement("img");
      img.src = "https:" + res.current.condition.icon;
      img.style.width = 32 + "px";
      img.style.height = 32 + "px";
      img.style.margin = "0 5px";
      img.style.padding = 1 + "px";
      document.getElementById("temp" + 23).innerText = res.current.temp_c + " °C";
      document.getElementById("temp" + 23).prepend(img);
    },
  });
  