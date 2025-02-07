// ✨ Smooth Scrolling Effect
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        target.scrollIntoView({ behavior: 'smooth' });
    });
});

// ✨ Button Click Animation
document.getElementById("contactBtn").addEventListener("click", function () {
    alert("Redirecting to the Contact Page!");
    window.location.href = "contact.html";
});
