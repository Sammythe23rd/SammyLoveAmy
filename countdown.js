document.addEventListener("DOMContentLoaded", function () {
    const countdownElement = document.getElementById("timer");

    // Set the target date (February 14, 2025, at 00:00:00)
    const targetDate = new Date("February 14, 2025 00:00:00").getTime();

    function updateCountdown() {
        const now = new Date().getTime();
        const difference = targetDate - now;

        if (difference <= 0) {
            // Redirect to the main Valentine's page when the countdown ends
            window.location.href = "Home.html";
            return;
        }

        // Convert difference into days, hours, minutes, seconds
        const days = Math.floor(difference / (1000 * 60 * 60 * 24));
        const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((difference % (1000 * 60)) / 1000);

        // Display the countdown
        countdownElement.innerHTML = `${days}d ${hours}h ${minutes}m ${seconds}s`;
    }

    // Update countdown every second
    setInterval(updateCountdown, 1000);
    updateCountdown(); // Run immediately on load
});
