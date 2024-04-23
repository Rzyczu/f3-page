let carousels = document.querySelectorAll('.circular-carousel');

carousels.forEach((carousel) => {
  let sliderDotsContainer = carousel.querySelector('.slider-dots');
  let slideImages = carousel.querySelectorAll('.slide-image');
  let slideNames = carousel.querySelectorAll('.slide-name');
  let slideContent = carousel.querySelectorAll('.slide-content');


  slideNames.forEach((item, index) => {
    let dot = document.createElement('div');
    dot.classList.add('slide-dot');
    dot.style.setProperty('--i', index + 1);
    dot.setAttribute('data-id', `content-${index + 1}`);
    dot.style.setProperty('--total-slides', slideNames.length);
    sliderDotsContainer.appendChild(dot);
  });

  let slideDots = carousel.querySelectorAll('.slide-dot');

  slideImages.forEach((item, index) => {
    item.setAttribute('data-id', `content-${index + 1}`);
  });

  slideContent.forEach((item, index) => {
    item.setAttribute('data-id', `content-${index + 1}`);
  });

  slideNames.forEach((item, index) => {
    item.setAttribute('data-id', `content-${index + 1}`);
  });

  const elements = carousel.querySelectorAll('[data-id=content-1]');
  elements.forEach(element => {
    element.classList.add('active');
  });

  function clickEvent() {
    slideImages.forEach(item => {
      item.classList.remove('active');
    });
    slideDots.forEach(item => {
      item.classList.remove('active');
    });
    slideContent.forEach(item => {
      item.classList.remove('active');
    });
    slideNames.forEach(item => {
      item.classList.remove('active');
    });
    const elements = carousel.querySelectorAll(`[data-id="${this.dataset.id}"]`);
    elements.forEach(element => {
      element.classList.add('active');
    });
  }

  slideDots.forEach(dot => {
    dot.addEventListener('click', clickEvent);
  });
  slideNames.forEach(name => {
    name.addEventListener('click', clickEvent);
  });
});