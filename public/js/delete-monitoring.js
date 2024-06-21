// Handle the delete button click
$(".btn-delete").click(function () {
  var id = $(this).data("id");

  // Display confirmation using SweetAlert
  Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#4e73df",
    confirmButtonText: "Delete",
  }).then((result) => {
    if (result.isConfirmed) {
      // If confirmed, proceed with deletion
      $.ajax({
        url: "delete-monitoring.php",
        type: "GET",
        data: { id: id },
        success: function (response) {
          // Display success message using SweetAlert
          Swal.fire({
            title: "Deleted!",
            text: "Your file has been deleted.",
            icon: "success",
            confirmButtonColor: "#4e73df",
          }).then(function () {
            // Redirect to tables-monitoring.php after the alert is closed
            window.location.href = "tables-monitoring.php";
          });
        },
        error: function () {
          // Display error message using SweetAlert
          Swal.fire({
            title: "Error!",
            text: "Failed to delete the file.",
            icon: "error",
          });
        },
      });
    }
  });
});
