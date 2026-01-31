const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    customClass: {
        popup: 'swal-toast-sm',
        title: 'swal-toast-title-sm'
    },
    didOpen: (toast) => {
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
    }
});

function swalSuccess(message) {
    Toast.fire({
        icon: 'success',
        title: message || 'Berhasil'
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

    Toast.fire({
        icon: 'error',
        title: text
    });
}
