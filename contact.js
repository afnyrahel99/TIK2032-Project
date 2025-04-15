document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");

    if (form) {
        form.addEventListener("submit", function (e) {
            e.preventDefault();
            alert("Pesanmu sudah dikirim untuk Toby! 🐾");
            form.reset();
        });
    }

    console.log("Toby menanti pesan dari kamu! 📬");
});
