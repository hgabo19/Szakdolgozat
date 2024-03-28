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
        timer: data.timer,
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

window.addEventListener("swal:daysConfirm", () => {
    Swal.fire({
        title: "Are you sure you want to remove a day?",
        text: "This will remove every exercise for that day!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#008000",
        cancelButtonColor: "#d33",
        confirmButtonText: "Remove!",
    }).then((result) => {
        if (result.isConfirmed) {
            let event = new Event("daysConfirmed");
            dispatchEvent(event);
        }
    });
});
