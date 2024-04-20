let carousels = document.querySelectorAll('.circular-carousel');

carousels.forEach((carousel) => {
  let slideDots = carousel.querySelectorAll('.slide-dot');
  let slideImages = carousel.querySelectorAll('.slide-image');
  let slideNames = carousel.querySelectorAll('.slide-name');
  let slideContent = carousel.querySelectorAll('.slide-content');


  slideDots.forEach((item, index) => {
    item.style.setProperty('--i', index + 1);
    item.setAttribute('data-id', `content-${index + 1}`);
    item.style.setProperty('--total-slides', slideDots.length);
  });

  slideImages.forEach((item, index) => {
    item.setAttribute('data-id', `content-${index + 1}`);
  });

  slideContent.forEach((item, index) => {
    item.setAttribute('data-id', `content-${index + 1}`);
  });

  slideNames.forEach((item, index) => {
    item.setAttribute('data-id', `content-${index + 1}`);
  });

  function clickEvent(){
      slideImages.forEach((item) => {
        item.classList.remove('active');
      });
      slideDots.forEach((item) => {
        item.classList.remove('active');
      });
      slideContent.forEach((item) => {
        item.classList.remove('active');
      });
      slideNames.forEach((item) => {
        item.classList.remove('active');
      });
      let elements = document.querySelectorAll('[data-id="' + this.dataset.id + '"]');
      console.log(elements)
      elements.forEach(function(element) {
        element.classList.add('active');
      });
  };

  slideDots.forEach((dot) => {
    dot.addEventListener('click', clickEvent);
  });
  slideNames.forEach((name) => {
    name.addEventListener('click', clickEvent);
  });
});