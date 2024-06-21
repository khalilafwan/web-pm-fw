// // Mengatur font family default baru dan warna font untuk meniru gaya default Bootstrap
// (Chart.defaults.global.defaultFontFamily = "Nunito"),
//   '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
// Chart.defaults.global.defaultFontColor = "#858796";

// Fungsi untuk mengambil data dan menginisialisasi grafik
// function getData() {
//   $.ajax({
//     type: "GET",
//     url: "{{ url('/api/get-data') }}",
//     data: {
//       functionName: "getData",
//     },
//     success: function (response) {
//       let monitoring = JSON.parse(response);
//       console.log(monitoring);

//       // Array nama bulan
//       const monthNames = [
//         "Jan",
//         "Feb",
//         "Mar",
//         "Apr",
//         "May",
//         "Jun",
//         "Jul",
//         "Aug",
//         "Sep",
//         "Oct",
//         "Nov",
//         "Dec",
//       ];

//       // Memetakan angka bulan ke nama bulan
//       let bulan = monitoring.map(function (item) {
//         return monthNames[item.month - 1]; // Convert month number to month name
//       });

//       let jumlah_project = monitoring.map(function (item) {
//         return item.project_count;
//       });

//       console.log(bulan);
//       console.log(jumlah_project);

//       // Inisialisasi grafik dengan data yang diambil

//       });
//     },
//   });
// }

// // Panggil fungsi untuk mengambil data dan menginisialisasi grafik
// getData();

// chart-area.js

document.addEventListener("DOMContentLoaded", function () {
    axios
        .get("/chart/getData")
        .then((response) => {
            const data = response.data;

            // Array nama bulan
            const monthNames = [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "May",
                "Jun",
                "Jul",
                "Aug",
                "Sep",
                "Oct",
                "Nov",
                "Dec",
            ];

            // Prepare data for line chart
            const labels = data.map((item) => monthNames[item.month - 1]);
            const counts = data.map((item) => item.project_count);

            // Create line chart
            var ctx = document.getElementById("myAreaChart");
            var myLineChart = new Chart(ctx, {
                type: "line",
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: "Jumlah Proyek",
                            lineTension: 0.3,
                            backgroundColor: "rgba(78, 115, 223, 0.05)",
                            borderColor: "rgba(78, 115, 223, 1)",
                            pointRadius: 3,
                            pointBackgroundColor: "rgba(78, 115, 223, 1)",
                            pointBorderColor: "rgba(78, 115, 223, 1)",
                            pointHoverRadius: 3,
                            pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                            pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                            pointHitRadius: 10,
                            pointBorderWidth: 2,
                            data: counts,
                        },
                    ],
                },
                options: {
                    maintainAspectRatio: false,
                    layout: {
                        padding: {
                            left: 10,
                            right: 25,
                            top: 25,
                            bottom: 0,
                        },
                    },
                    scales: {
                        xAxes: [
                            {
                                time: {
                                    unit: "date",
                                },
                                gridLines: {
                                    display: false,
                                    drawBorder: false,
                                },
                                ticks: {
                                    maxTicksLimit: 7,
                                },
                            },
                        ],
                        yAxes: [
                            {
                                ticks: {
                                    maxTicksLimit: 5,
                                    padding: 10,
                                    callback: function (value) {
                                        // Memastikan label y-axis bernilai Integer bukan Decimal
                                        return Number.isInteger(value)
                                            ? value
                                            : "";
                                    },
                                },

                                gridLines: {
                                    color: "rgb(234, 236, 244)",
                                    zeroLineColor: "rgb(234, 236, 244)",
                                    drawBorder: false,
                                    borderDash: [2],
                                    zeroLineBorderDash: [2],
                                },
                            },
                        ],
                    },
                    legend: {
                        display: false,
                    },
                    tooltips: {
                        backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        titleMarginBottom: 10,
                        titleFontColor: "#6e707e",
                        titleFontSize: 14,
                        borderColor: "#dddfeb",
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        intersect: false,
                        mode: "index",
                        caretPadding: 10,
                        callbacks: {
                            label: function (tooltipItem, chart) {
                                var datasetLabel =
                                    chart.datasets[tooltipItem.datasetIndex]
                                        .label || "";
                                return datasetLabel + ": " + tooltipItem.yLabel;
                            },
                        },
                    },
                },
            });
        })
        .catch((error) => {
            console.error("Error fetching line chart data:", error);
        });
});
