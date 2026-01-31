function swalSuccess(message) {
    Swal.fire({
        toast: true,
        position: "top-end",
        icon: "success",
        title: message,
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer);
            toast.addEventListener('mouseleave', Swal.resumeTimer);
        }
    });
}

function swalError(message) {

    let text = 'Terjadi kesalahan';

    if (typeof message === 'object' && message.errors) {
        const firstKey = Object.keys(message.errors)[0];
        text = message.errors[firstKey][0];
    } else if (typeof message === 'string') {
        text = message;
    }

    Swal.fire({
        toast: true,
        position: "top-end",
        icon: "error",
        title: text,
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer);
            toast.addEventListener('mouseleave', Swal.resumeTimer);
        }
    });
}
