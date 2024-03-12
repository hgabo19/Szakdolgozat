import "./bootstrap";

import Alpine from "alpinejs";
import Swal from "sweetalert2";

window.Alpine = Alpine;

Alpine.start();

window.addEventListener("alert", (event) => {
    let data = event.detail;
    Swal.fire({
        position: data.position,
        icon: data.type,
        title: data.title,
        showConfirmButton: false,
        timer: data.timer,
        allowOutsideClick: false,
    });

    if (data.redirectUrl) {
        setTimeout(() => {
            window.location.href = data.redirectUrl; // Use the provided URL
        }, data.timer + 100);
    }
});

window.addEventListener("toast", (event) => {
    let data = event.detail;

    const Toast = Swal.mixin({
        toast: true,
        position: data.position,
        showConfirmButton: false,
        timer: 3500,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        },
    });

    Toast.fire({
        icon: data.type,
        title: data.title,
        background: data.background,
        color: data.color,
        iconColor: data.iconColor,
    });
});
