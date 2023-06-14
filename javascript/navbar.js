const hamburger = document.querySelector(".hamburger");
const nav_menu = document.querySelector(".navbar-menu");
const navbar = document.querySelector(".navbar-container");

// Tambahkan event listener pada elemen hamburger
hamburger.addEventListener("click", function () {
  // Toggle kelas CSS 'active' pada elemen hamburger dan menu
  hamburger.classList.toggle("active");
  nav_menu.classList.toggle("active");
});

// Tambahkan event listener pada elemen window untuk menutup navbar saat mengklik di luar area
window.addEventListener("click", function (event) {
  // Periksa apakah klik dilakukan di luar area navbar dan hamburger
  if (!navbar.contains(event.target) && !hamburger.contains(event.target)) {
    // Toggle kelas CSS 'active' pada elemen hamburger dan menu
    hamburger.classList.remove("active");
    nav_menu.classList.remove("active");
  }
});
