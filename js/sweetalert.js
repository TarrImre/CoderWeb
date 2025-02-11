export function showSuccessMessage(title, text) {
    Swal.fire({
        title: title,
        text: text,
        icon: "success",
        showConfirmButton: false,
        timer: 3000
    }).then(() => {
        window.location.reload();
    });
}

export function showErrorMessage(title, text) {
    Swal.fire({
        title: title,
        text: text,
        icon: "error",
        showConfirmButton: false,
        timer: 3000
    });
}