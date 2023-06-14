// Slider image
let slider = document.querySelector(".slider-image");
let images = document.querySelectorAll(".slider-image img");
let currentIndex = 0;
let interval = setInterval(nextSlide, 5000); // Mengganti gambar setiap 5 detik

function nextSlide() {
  currentIndex++;
  if (currentIndex >= images.length) {
    currentIndex = 0;
  }
  slider.style.transform = `translateX(-${currentIndex * 100}%)`;
}

function prevSlide() {
  currentIndex--;
  if (currentIndex < 0) {
    currentIndex = images.length - 1;
  }
  slider.style.transform = `translateX(-${currentIndex * 100}%)`;
}

// Menghentikan interval saat mengarahkan kursor ke slider
slider.addEventListener("mouseenter", function () {
  clearInterval(interval);
});

// Melanjutkan interval saat mengeluarkan kursor dari slider
slider.addEventListener("mouseleave", function () {
  interval = setInterval(nextSlide, 3000);
});
