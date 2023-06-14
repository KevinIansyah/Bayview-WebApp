window.addEventListener("scroll", function () {
  let hamburgerBars = document.querySelectorAll(".hamburger .bar");

  if (window.scrollY > 0) {
    for (let i = 0; i < hamburgerBars.length; i++) {
      hamburgerBars[i].style.backgroundColor = "#4ba3f2";
    }
  } else {
    for (let i = 0; i < hamburgerBars.length; i++) {
      hamburgerBars[i].style.backgroundColor =
        "#ffffff"; /* Warna awal (transparan) */
    }
  }
});
