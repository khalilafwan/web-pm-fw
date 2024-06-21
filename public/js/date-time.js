window.onload = function () {
  displayClock();
  displayDate();
};

function displayClock() {
  var display = new Date().toLocaleTimeString();
  document.getElementById("time").innerHTML = display;
  setTimeout(displayClock, 1000);
}

function displayDate() {
  var d = new Date();
  var weekday = [
    "Minggu",
    "Senin",
    "Selasa",
    "Rabu",
    "Kamis",
    "Jumat",
    "Sabtu",
  ];
  var monthname = [
    "Januari",
    "Februari",
    "Maret",
    "April",
    "Mei",
    "Juni",
    "Juli",
    "Agustus",
    "September",
    "Oktober",
    "November",
    "Desember",
  ];

  var dateString =
    weekday[d.getDay()] +
    ", " +
    d.getDate() +
    " " +
    monthname[d.getMonth()] +
    " " +
    d.getFullYear();

  document.getElementById("date").innerHTML = dateString;
}
