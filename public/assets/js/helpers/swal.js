const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timerProgressBar: true,
    customClass: {
        popup: 'swal-toast-front'
    },
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});


function swalSuccess(message) {
    Toast.fire({
        icon: "success",
        title: message,
        timer: 1500
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
        icon: "error",
        title: text,
        timer: 2000
    });
}
