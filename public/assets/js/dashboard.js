const sidebar = document.getElementById("sidebar");
const toggleBtn = document.getElementById("toggle-btn");

toggleBtn.addEventListener("click", () => {
    sidebar.classList.toggle("collapsed");
});

const today = new Date();

const formatted = today.toLocaleDateString("en-US", {
    year: "numeric",
    month: "long",
    day: "numeric",
});

document.getElementById("date").textContent = formatted;
