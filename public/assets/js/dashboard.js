const sidebar = document.getElementById("sidebar");
const toggleBtn = document.getElementById("toggle-btn");

toggleBtn.addEventListener("click", () => {
    sidebar.classList.toggle("collapsed");
});

const links = document.querySelectorAll(".nav-link");

links.forEach((link) => {
    const icon = link.querySelector(".nav-icon");

    if (!icon) return;

    const original = icon.src;
    const hover = icon.dataset.hover;

    link.addEventListener("mouseenter", () => {
        if (hover) {
            icon.src = hover;
        }
    });

    link.addEventListener("mouseleave", () => {
        icon.src = original;
    });
});

const today = new Date();

const formatted = today.toLocaleDateString("en-US", {
    year: "numeric",
    month: "long",
    day: "numeric",
});

document.getElementById("date").textContent = formatted;
