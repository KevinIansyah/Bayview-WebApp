window.addEventListener("scroll", function () {
  var navbar = document.querySelector(".navbar-container");
  if (window.scrollY > 0) {
    navbar.style.backgroundColor = "#ffffff"; /* Warna saat discroll */
  } else {
    navbar.style.backgroundColor =
      "rgba(0, 0, 0, 0.0)"; /* Warna awal (transparan) */
  }
});
