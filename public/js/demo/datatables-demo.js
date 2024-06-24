// Call the dataTables jQuery plugin
$(document).ready(function () {
  $("#dataMonitoring").DataTable({
    fixedColumns: true,
    responsive: true,
    lengthMenu: [
      [10, 25, 50, 100, -1],
      [10, 25, 50, 100, "All"],
    ],
    pageLength: 102,
    dom: "<'row'<'col-md-3'l><'col-md-7'f><'col-md-2 text-right'B>><'row'<'col-md-12't>><'row'<'col-md-6'i><'col-md-6'p>>",
    autoWidth: false,
    buttons: [
      'copy', 'csv', 'excel', 'pdf', 'print'
    ],
    language: {
      search: "Search",
      emptyTable: "No records found",
    },
  });
});

// Call the dataTables jQuery plugin
$(document).ready(function () {
  $("#dataKonsesi").DataTable({
    fixedColumns: true,
    responsive: true,
    lengthMenu: [
      [10, 25, 50, 100, -1],
      [10, 25, 50, 100, "All"],
    ],
    pageLength: 102,
    dom: "<'row'<'col-md-3'l><'col-md-7'f><'col-md-2 text-right'B>><'row'<'col-md-12't>><'row'<'col-md-6'i><'col-md-6'p>>",
    autoWidth: false,
    buttons: [
      'copy', 'csv', 'excel', 'pdf', 'print'
    ],
    language: {
      search: "Search",
      emptyTable: "No records found",
    },
  });
});

// Call the dataTables jQuery plugin
$(document).ready(function () {
  $("#dataUser").DataTable({
    fixedColumns: true,
    responsive: true,
    lengthMenu: [
      [10, 25, 50, 100, -1],
      [10, 25, 50, 100, "All"],
    ],
    pageLength: 102,
    dom: "<'row'<'col-md-3'l><'col-md-7'f><'col-md-2 text-right'B>><'row'<'col-md-12't>><'row'<'col-md-6'i><'col-md-6'p>>",
    autoWidth: false,
    language: {
      search: "Search",
      emptyTable: "No records found",
    }
  });
});
