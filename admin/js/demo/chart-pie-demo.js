// Set new default font family and font color to mimic Bootstrap's default styling
(Chart.defaults.global.defaultFontFamily = "Nunito"),
  '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = "#858796";
let chartDataPie = [];
let chartLabel = [];
let bgcolorPieLabel = [
  "#268a7b",
  "#ee1ee5",
  "#ac74c4",
  "#480cc4",
  "#392e82",
  "#ff3d39",
  "#089b3e",
  "#71ccb9",
  "#965717",
  "#7d8dca",
  "#fa4e26",
  "#f5a431",
  "#8d66e7",
  "#05508e",
  "#0d3c43",
  "#5f6c0a",
];
$("#chartPieLabel").html("");
$.ajax({
  type: "POST",
  url: "index_get_dash.php",
  data: { act: "getPieChart" },
  dataType: "json",
  success: function (data) {
    console.log(data);

    $.each(data.label, function (key, val) {
      $("#chartPieLabel").append(
        '<span class="mr-2">' +
          '<i class="fas fa-circle" style="color:' +
          bgcolorPieLabel[key] +
          '"></i> ' +
          val +
          "</span>"
      );
      chartLabel[key] = val;
    });

    $.each(data.val, function (key, val) {
      chartDataPie[chartLabel.indexOf(key)] = val;
    });
    // Pie Chart Example
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
      type: "doughnut",
      data: {
        labels: chartLabel,
        datasets: [
          {
            data: chartDataPie,
            backgroundColor: bgcolorPieLabel,
            hoverBackgroundColor: ["#2e59d9", "#17a673", "#2c9faf"],
            hoverBorderColor: "rgba(234, 236, 244, 1)",
          },
        ],
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: "#dddfeb",
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          caretPadding: 10,
        },
        legend: {
          display: false,
        },
        cutoutPercentage: 80,
      },
    });
  },
});
