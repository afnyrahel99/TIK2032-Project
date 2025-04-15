document.addEventListener("DOMContentLoaded", function () {
    const images = document.querySelectorAll("img");

    images.forEach((img) => {
        img.addEventListener("mouseover", () => {
            img.style.transform = "scale(1.1)";
            img.style.transition = "0.3s ease-in-out";
        });

        img.addEventListener("mouseout", () => {
            img.style.transform = "scale(1)";
        });
    });

    console.log("Galeri siap dilihat! 🎨✨");
});
