document.addEventListener("DOMContentLoaded", function () {

  let opinions = document.querySelectorAll('.opinions article');
  let nextBtnOpinion = document.getElementById('opinions-next-btn');
  let OpinionOpinion = document.getElementById('opinions-prev-btn');

  let active = 0;

  if (!opinions || opinions.length === 0) {
    return;
  }

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

    if (opinions.length == 0) {
      return;
    }


    const activeOpinion = opinions[active];
    const opinionsContainer = document.querySelector('.opinions');
    opinionsContainer.style.height = activeOpinion.offsetHeight + 'px';
  }

  updateClasses();

  function nextSlide() {
    active = (active + 1) % opinions.length;
    updateClasses();
  }

  function prevSlide() {
    active = (active - 1 + opinions.length) % opinions.length;
    updateClasses();
  }

  nextBtnOpinion.addEventListener('click', nextSlide);

  OpinionOpinion.addEventListener('click', prevSlide);


  setInterval(nextSlide, 15000);
});