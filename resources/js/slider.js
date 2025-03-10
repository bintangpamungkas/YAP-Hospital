document.addEventListener('DOMContentLoaded', function() {
  const slider = document.querySelector('.slider');
  if (!slider) return;
  const slidesContainer = slider.querySelector('.slides');
  let slides = slider.querySelectorAll('.slide');
  const totalOriginal = slides.length;

  // Clone slide pertama dan terakhir
  const firstClone = slides[0].cloneNode(true);
  const lastClone = slides[totalOriginal - 1].cloneNode(true);
  slidesContainer.appendChild(firstClone);
  slidesContainer.insertBefore(lastClone, slidesContainer.firstChild);

  // Update NodeList slides
  slides = slider.querySelectorAll('.slide');
  const totalSlides = slides.length; // = totalOriginal + 2

  // Atur indeks awal ke 1 (slide pertama asli)
  let currentIndex = 1;

  const prevBtn = slider.querySelector('.prev');
  const nextBtn = slider.querySelector('.next');
  const dotsContainer = slider.querySelector('.dots');

  // Buat dots secara dinamis untuk slide asli
  for (let i = 0; i < totalOriginal; i++) {
    let dot = document.createElement('span');
    dot.classList.add('dot');
    if(i === 0) dot.classList.add('active');
    dot.addEventListener('click', function() {
      currentIndex = i + 1;
      updateSlides();
    });
    dotsContainer.appendChild(dot);
  }
  let dots = slider.querySelectorAll('.dot');

  // Set transisi untuk geseran yang halus
  slidesContainer.style.transition = 'transform 0.5s ease-in-out';

  // Pindahkan slider ke posisi awal
  updateSlides(true);

  function updateSlides(noTransition) {
    if(noTransition) {
      slidesContainer.style.transition = 'none';
    } else {
      slidesContainer.style.transition = 'transform 0.5s ease-in-out';
    }
    slidesContainer.style.transform = `translateX(-${currentIndex * 100}%)`;
    updateDots();
  }

  // Saat transisi selesai, periksa jika berada di clone, lalu lompat ke slide yang sesuai (tanpa transisi)
  slidesContainer.addEventListener('transitionend', function() {
    if(currentIndex === totalSlides - 1) {
      currentIndex = 1;
      updateSlides(true);
    } else if(currentIndex === 0) {
      currentIndex = totalOriginal;
      updateSlides(true);
    }
  });

  function updateDots() {
    dots.forEach((dot, i) => {
      dot.classList.toggle('active', i === currentIndex - 1);
    });
  }

  prevBtn.addEventListener('click', function() {
    currentIndex--;
    updateSlides();
  });

  nextBtn.addEventListener('click', function() {
    currentIndex++;
    updateSlides();
  });
});
