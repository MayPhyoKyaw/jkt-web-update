$(document).ready(function () {
  studentLabel = document.getElementById("studentLabel");
  courseLabel = document.getElementById("courseLabel");
  incomeLabel = document.getElementById("incomeLabel");
  showStuByMonths();
  showStuByCourses();
  showPayments();
});

function showStuByMonths(e) {
  $("#stuByMonths").remove();
  //   console.log(e.target.value);

  $.post(
    "chartData.php",
    {
      selectedId: (e && e.target.value) || 5,
      currentShowing: "stuByMonths",
    },
    function (data) {
      // console.log(data);
      let months = [];
      let count = [];

      for (var i in data) {
        months.push(data[i].date);
        count.push(data[i].count);
      }

      var chartData = {
        labels: months,
        datasets: [
          {
            label: "Students By Month",

            backgroundColor: "#49e2ff",
            borderColor: "#46d5f1",
            hoverBackgroundColor: "#CCCCCC",
            hoverBorderColor: "#666666",
            data: count,
          },
        ],
      };
      var newCanvas = $("<canvas/>", {
        id: "stuByMonths",
      });
      $("#stuByMonthsArea").append(newCanvas);
      var graphTarget = $("#stuByMonths");
      var barGraph = new Chart(graphTarget, {
        type: "bar",
        data: chartData,
        options: {
          plugins: {
            labels: {
              render: () => {},
            },
          },
          maintainAspectRatio: false,
          responsive: true,
          scales: {
            yAxes: [
              {
                ticks: {
                  beginAtZero: true,
                },
              },
            ],
          },
        },
      });
      switch (e.target.value) {
        case "0":
          studentLabel.textContent = "during This Month";
          break;
        case "1":
          studentLabel.textContent = "during Last 5 Months";
          break;
        default:
          studentLabel.textContent = "during This Year";
      }
    }
  );
}
function showStuByCourses(e) {
  $("#stuByCourses").remove();
  // console.log(e.target.value);

  $.post(
    "chartData.php",
    {
      selectedId: (e && e.target.value) || "",
      currentShowing: "stuByCourses",
    },
    function (data) {
      // console.log(data);
      let categories = [];
      let count = [];

      for (var i in data) {
        categories.push(data[i].category);
        count.push(data[i].count);
      }

      let chartData = {
        labels: categories,
        datasets: [
          {
            data: count,
            backgroundColor: [
              "rgb(255, 99, 132)",
              "rgb(54, 162, 235)",
              "rgb(255, 205, 86)",
            ],
            hoverOffset: 4,
          },
        ],
      };
      var newCanvas = $("<canvas/>", {
        id: "stuByCourses",
      });
      $("#stuByCoursesArea").append(newCanvas);
      var graphTarget = $("#stuByCourses");
      var doughnut = new Chart(graphTarget, {
        type: "doughnut",
        data: chartData,
        options: {
          plugins: {
            labels: {
              fontColor: "#fff",
              fontSize: 14,
            },
          },
          cutoutPercentage: 1,
          maintainAspectRatio: false,
          responsive: true,
          scales: {
            yAxes: {
              drawBorder: false,
            },
          },
        },
      });
      switch (e.target.value) {
        case "0":
          courseLabel.textContent = "during This Month";
          break;
        case "1":
          courseLabel.textContent = "during Last 5 Months";
          break;
        default:
          courseLabel.textContent = "during This Year";
      }
    }
  );
}

function showPayments(e) {
  $("#showPayments").remove();
  // console.log(e.target.value);

  $.post(
    "chartData.php",
    {
      selectedId: (e && e.target.value) || "",
      currentShowing: "showPayments",
    },
    function (data) {
      // console.log(data);
      let months = [];
      let sum = [];

      for (var i in data) {
        months.push(data[i].date);
        sum.push(data[i].sum);
      }

      let chartData = {
        labels: months,
        datasets: [
          {
            label: "Income Rate (MMKs)",
            data: sum,
            fill: false,
            borderColor: "rgb(62, 101, 211)",
            tension: 0.1,
          },
        ],
      };
      var newCanvas = $("<canvas/>", {
        id: "showPayments",
      });
      $("#showPaymentsArea").append(newCanvas);
      var graphTarget = $("#showPayments");
      var doughnut = new Chart(graphTarget, {
        type: "line",
        data: chartData,
        options: {
          maintainAspectRatio: false,
          responsive: true,
          scales: {
            yAxes: [
              {
                ticks: {
                  beginAtZero: true,
                },
              },
            ],
          },
        },
      });
      switch (e.target.value) {
        case "0":
          incomeLabel.textContent = "during This Month";
          break;
        case "1":
          incomeLabel.textContent = "during Last 5 Months";
          break;
        default:
          incomeLabel.textContent = "during This Year";
      }
    }
  );
}
