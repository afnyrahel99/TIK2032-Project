document.addEventListener("DOMContentLoaded", function () {
    const blogTitles = document.querySelectorAll("h3");

    blogTitles.forEach((title) => {
        title.style.cursor = "pointer"; // supaya kelihatan bisa diklik

        title.addEventListener("click", () => {
            // Tambahkan class animasi
            title.classList.add("shake");

            // Hapus class animasi setelah selesai (0.5 detik)
            setTimeout(() => {
                title.classList.remove("shake");
            }, 500);

            // Tampilkan alert
            alert("Kamu klik judul blog! 📚 Siap baca, ya!");
        });
    });

    console.log("Blog siap menemani hari kamu 💛");
});
