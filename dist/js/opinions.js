let opinions = document.querySelectorAll('.opinions article');
let nextBtn = document.getElementById('opinions-next-btn');
let prevBtn = document.getElementById('opinions-prev-btn');

let active = 0;

function updateClasses() {
  opinions.forEach((opinion, index) => {
    opinion.classList.remove('active', 'prev', 'next');
    if (index === active) {
      opinion.classList.add('active');
    } else if (index === (active - 1 + opinions.length) % opinions.length) {
      opinion.classList.add('prev');
    } else if (index === (active + 1) % opinions.length) {
      opinion.classList.add('next');
    }
  });

  // Adjust the height of the container
  const activeOpinion = opinions[active];
  const opinionsContainer = document.querySelector('.opinions');
  opinionsContainer.style.height = activeOpinion.offsetHeight + 'px';
}

// Initial setup
updateClasses();

function nextSlide() {
  active = (active + 1) % opinions.length;
  updateClasses();
}

function prevSlide() {
  active = (active - 1 + opinions.length) % opinions.length;
  updateClasses();
}

// Event listeners for buttons
nextBtn.addEventListener('click', nextSlide);

prevBtn.addEventListener('click', prevSlide);


setInterval(nextSlide, 15000);
