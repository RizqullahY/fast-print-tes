document.addEventListener('input', function (e) {
    if (!e.target.classList.contains('rupiah')) return;
    let raw = e.target.value.replace(/\D/g, '');
    let hidden = e.target.nextElementSibling;
    if (hidden) {
        hidden.value = raw;
    }
    e.target.value = raw.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
});
