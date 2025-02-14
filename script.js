document.addEventListener("DOMContentLoaded", function () {
    const text1 = document.getElementById("text1");
    const text2 = document.getElementById("text2");
    const text3 = document.getElementById("text3");
    const heading = document.querySelector("h1");

    // Apply animations on load
    heading.classList.add("animate-heading");
    text1.classList.add("animate-text");
    text2.classList.add("animate-text");
    text3.classList.add("animate-text");

    // Create falling hearts
    setInterval(createHeart, 500);
});

function createHeart() {
    const heart = document.createElement("div");
    heart.classList.add("heart");
    heart.innerHTML = "❤️";
    document.body.appendChild(heart);

    // Set random position and size
    heart.style.left = Math.random() * 100 + "vw";
    heart.style.animationDuration = Math.random() * 3 + 2 + "s";

    // Remove heart after animation ends
    setTimeout(() => {
        heart.remove();
    }, 5000);
}
