$(document).ready(function () {
    $('.btn-delete').click(function () {
        var id = $(this).data('id');

        // Use SweetAlert to confirm deletion
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data monitoring akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // If confirmed, proceed with deletion
                deleteData(id);
            }
        });
    });

    // Function to perform deletion via AJAX
    function deleteData(id) {
        $.ajax({
            url: "{{ route('dataMonitoring.destroy', ':id') }}".replace(':id', id),
            type: 'DELETE', // Specify the request method
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                // Handle success response (e.g., show alert)
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses',
                    text: 'Data monitoring berhasil dihapus.'
                }).then((result) => {
                    // Reload or redirect to update view
                    window.location.reload(); // Example: reload current page
                });
            },
            error: function(xhr) {
                // Handle error response (e.g., show alert)
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Gagal menghapus data monitoring.'
                });
            }
        });
    }
});