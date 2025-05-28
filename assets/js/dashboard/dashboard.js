const sidebar = document.getElementById("sidebar");
const sidebarToggleBtn = document.getElementById("sidebarToggleBtn");
const mobileSidebarToggleBtn = document.getElementById("mobileSidebarToggleBtn");
const sidebarOverlay = document.getElementById("sidebarOverlay");
const themeToggle = document.getElementById("themeToggle");
const adminToggle = document.getElementById("adminToggle");
const dropdownMenu = document.getElementById("dropdownMenu");

// Toggle sidebar collapse (desktop)
if (sidebarToggleBtn && sidebar) {
  sidebarToggleBtn.addEventListener("click", () => {
    sidebar.classList.toggle("collapsed");
  });
}

// Toggle sidebar open/close on mobile
function openMobileSidebar() {
  if (sidebar && sidebarOverlay) {
    sidebar.classList.add("active");
    sidebarOverlay.classList.add("active");
  }
}

function closeMobileSidebar() {
  if (sidebar && sidebarOverlay) {
    sidebar.classList.remove("active");
    sidebarOverlay.classList.remove("active");
  }
}

if (mobileSidebarToggleBtn && sidebar) {
  mobileSidebarToggleBtn.addEventListener("click", () => {
    if (sidebar.classList.contains("active")) {
      closeMobileSidebar();
    } else {
      openMobileSidebar();
    }
  });
}

if (sidebarOverlay) {
  sidebarOverlay.addEventListener("click", closeMobileSidebar);
}

// Admin dropdown toggle
if (adminToggle && dropdownMenu) {
  adminToggle.addEventListener("click", () => {
    dropdownMenu.style.display = dropdownMenu.style.display === "block" ? "none" : "block";
  });

  document.addEventListener("click", (e) => {
    if (!adminToggle.contains(e.target) && !dropdownMenu.contains(e.target)) {
      dropdownMenu.style.display = "none";
    }
  });
}

window.addEventListener("DOMContentLoaded", () => {
  const savedTheme = localStorage.getItem("theme");
  if (savedTheme === "dark") {
    document.body.classList.add("dark-theme");
    if (themeToggle) themeToggle.textContent = "☀️";
  } else {
    document.body.classList.remove("dark-theme");
    if (themeToggle) themeToggle.textContent = "🌙";
  }
});

if (themeToggle) {
  themeToggle.addEventListener("click", () => {
    document.body.classList.toggle("dark-theme");
    const isDark = document.body.classList.contains("dark-theme");
    localStorage.setItem("theme", isDark ? "dark" : "light");
    themeToggle.textContent = isDark ? "☀️" : "🌙";
  });
}


// Responsive behavior
function handleResize() {
  if (window.innerWidth <= 768) {
    if (sidebarToggleBtn) sidebarToggleBtn.style.display = "none";
    if (mobileSidebarToggleBtn) mobileSidebarToggleBtn.style.display = "inline-block";
    if (sidebar) sidebar.classList.remove("collapsed");
    closeMobileSidebar();
  } else {
    if (sidebarToggleBtn) sidebarToggleBtn.style.display = "inline-block";
    if (mobileSidebarToggleBtn) mobileSidebarToggleBtn.style.display = "none";
    if (sidebarOverlay) sidebarOverlay.classList.remove("active");
    if (sidebar) sidebar.classList.remove("active");
  }
}

window.addEventListener("resize", handleResize);
window.addEventListener("load", handleResize);

// Highlight current page in sidebar
const currentPath = window.location.pathname;
const sidebarLinks = document.querySelectorAll("#sidebar a");

sidebarLinks.forEach((link) => {
  if (link.getAttribute("href") === currentPath) {
    link.classList.add("active");
  } else {
    link.classList.remove("active");
  }
});
