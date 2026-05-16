const sidebar = document.getElementById("sidebar");
const toggleBtn = document.getElementById("toggle-btn");

// Restore sidebar

const sidebarState = sessionStorage.getItem("sidebarState");

if (sidebarState === "expanded") {
    sidebar.classList.remove("collapsed");
} else {
    sidebar.classList.add("collapsed");
}

// Toggle sidebar

toggleBtn.addEventListener("click", () => {
    sidebar.classList.toggle("collapsed");

    if (sidebar.classList.contains("collapsed")) {
        sessionStorage.setItem("sidebarState", "collapsed");
    } else {
        sessionStorage.setItem("sidebarState", "expanded");
    }
});

// Icon hover

const links = document.querySelectorAll(".nav-link");

links.forEach((link) => {
    const icon = link.querySelector(".nav-icon");

    if (!icon) return;

    const defaultIcon = icon.dataset.default;
    const hoverIcon = icon.dataset.hover;
    const activeIcon = icon.dataset.active;

    // Hover in

    link.addEventListener("mouseenter", () => {
        // STOP if active
        if (link.classList.contains("active")) return;

        if (hoverIcon) {
            icon.src = hoverIcon;
        }
    });

    // Hover out

    link.addEventListener("mouseleave", () => {
        // KEEP ACTIVE ICON
        if (link.classList.contains("active")) {
            icon.src = activeIcon;
        } else {
            icon.src = defaultIcon;
        }
    });
});

// Date

const dateElement = document.getElementById("date");

if (dateElement) {
    const today = new Date();

    const formatted = today.toLocaleDateString("en-US", {
        year: "numeric",
        month: "long",
        day: "numeric",
    });

    dateElement.textContent = formatted;
}
