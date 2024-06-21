// Add event listener to the logout link
document
    .getElementById("logoutLink")
    .addEventListener("click", function (event) {
        event.preventDefault(); // Mencegah tautan dari beraksi default

        Swal.fire({
            title: "Are you sure?",
            text: "You will be logged out.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, logout",
        }).then((result) => {
            if (result.isConfirmed) {
                // Lakukan permintaan logout
                fetch("/logout", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document
                            .querySelector('meta[name="csrf-token"]')
                            .getAttribute("content"),
                    },
                })
                    .then((response) => {
                        if (response.ok) {
                            // Redirect ke halaman login setelah logout
                            window.location.href = "/login";
                        } else {
                            console.error(
                                "Logout failed:",
                                response.statusText
                            );
                        }
                    })
                    .catch((error) => {
                        console.error("Logout error:", error);
                    });
            }
        });
    });
