// // Mengatur font family dan warna font default baru untuk meniru gaya default Bootstrap
// (Chart.defaults.global.defaultFontFamily =
//   "Nunito, -apple-system,system-ui,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif"),
//   (Chart.defaults.global.defaultFontColor = "#858796");

// // Fungsi untuk mengambil data dan menginisialisasi grafik
// function getData() {
//   $.ajax({
//     type: "GET",
//     url: "{{ url('/api/get-data') }}",
//     data: {
//       functionName: "getDataPieChart",
//     },
//     success: function (response) {
//       let data = JSON.parse(response);
//       console.log(data);

//       let labels = [];
//       let values = [];
//       let backgroundColors = [];

//       data.forEach(function (item, index) {
//         labels.push(item.tipe_fswm);
//         values.push(item.jumlah);
//         backgroundColors.push(index % 2 === 0 ? 'rgba(255, 99, 132, 0.2)' : 'rgba(54, 162, 235, 0.2)'); // Pink and dark blue
//       });

//       // Inisialisasi grafik dengan data yang diambil
//       var ctx = document.getElementById("myPieChart");
//       var myPieChart = new Chart(ctx, {
//         type: "doughnut",
//         data: {
//           labels: labels,
//           datasets: [
//             {
//               data: values,
//               backgroundColor: backgroundColors,
//               hoverBackgroundColor: backgroundColors.map(color => color.replace('0.2', '0.4')),
//               hoverBorderColor: "rgba(234, 236, 244, 1)",
//             },
//           ],
//         },
//         options: {
//           maintainAspectRatio: false,
//           tooltips: {
//             backgroundColor: "rgb(255,255,255)",
//             bodyFontColor: "#858796",
//             borderColor: "#dddfeb",
//             borderWidth: 1,
//             xPadding: 15,
//             yPadding: 15,
//             displayColors: false,
//             caretPadding: 10,
//           },
//           legend: {
//             display: false,
//           },
//           cutoutPercentage: 80,
//         },
//       });
//     },
//   });
// }

// // Panggil fungsi untuk mengambil data dan menginisialisasi grafik
// getData();

// chart-pie.js

document.addEventListener('DOMContentLoaded', function () {
  axios.get('/chart/getDataPieChart')
      .then(response => {
          const data = response.data;

          // Prepare data for pie chart
          const labels = data.map(item => item.tipe_fswm);
          const counts = data.map(item => item.jumlah);

          // Create pie chart
          var ctxPie = document.getElementById('myPieChart').getContext('2d');
          var pieChart = new Chart(ctxPie, {
              type: 'pie',
              data: {
                  labels: labels,
                  datasets: [{
                      label: 'Pie Chart',
                      data: counts,
                      backgroundColor: [
                          'rgba(255, 99, 132, 0.2)',
                          'rgba(54, 162, 235, 0.2)',
                          'rgba(255, 206, 86, 0.2)',
                          'rgba(75, 192, 192, 0.2)',
                          'rgba(153, 102, 255, 0.2)',
                          'rgba(255, 159, 64, 0.2)'
                      ],
                      borderColor: [
                          'rgba(255, 99, 132, 1)',
                          'rgba(54, 162, 235, 1)',
                          'rgba(255, 206, 86, 1)',
                          'rgba(75, 192, 192, 1)',
                          'rgba(153, 102, 255, 1)',
                          'rgba(255, 159, 64, 1)'
                      ],
                      borderWidth: 1
                  }]
              },
              options: {
                  scales: {
                      y: {
                          beginAtZero: true
                      }
                  }
              }
          });
      })
      .catch(error => {
          console.error('Error fetching pie chart data:', error);
      });
});
