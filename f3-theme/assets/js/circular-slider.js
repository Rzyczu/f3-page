document.addEventListener("DOMContentLoaded", function () {

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
      let elements = carousel.querySelectorAll(`[data-id="${this.dataset.id}"]`);
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
});


document.addEventListener('DOMContentLoaded', function () {
  const isMobile = window.matchMedia("(max-width: 768px)").matches;

  document.querySelectorAll('.circular-carousel').forEach(carousel => {
    const links = carousel.querySelectorAll('.slide-link');

    links.forEach(link => {
      const type = link.dataset.type;
      const value = link.dataset.value;

      if ((type === 'mail' || type === 'phone') && !isMobile) {
        link.removeAttribute('href');

        link.addEventListener('click', function (e) {
          e.preventDefault();

         let displayValue = value.replace(/^mailto:|^tel:/, '');

          if (type === 'phone') {
            displayValue = displayValue.replace(/^(\+\d{2})(\d{3})(\d{3})(\d{3})$/, '$1 $2 $3 $4');
          }          
          
          const existingSpan = this.querySelector('.tooltip-info');

          if (existingSpan) {
            existingSpan.remove();
            return;
          }

          const info = document.createElement('span');
          info.textContent = displayValue;
          info.className = 'tooltip-info';
          info.style.marginLeft = '1rem';
          info.style.fontSize = '1.125rem';
          info.style.color = 'inherit';
          info.style.userSelect = 'text';
          info.style.cursor = 'pointer';
          info.style.position = 'relative';

          // Tooltip
          const tooltip = document.createElement('div');
          tooltip.textContent = 'Skopiowano!';
          tooltip.style.position = 'absolute';
          tooltip.style.top = '-2.5em';
          tooltip.style.left = '0';
          tooltip.style.background = '#777';
          tooltip.style.color = '#fff';
          tooltip.style.fontSize = '1.125rem';
          tooltip.style.padding = '2px 6px';
          tooltip.style.borderRadius = '4px';
          tooltip.style.opacity = '0';
          tooltip.style.transition = 'opacity 0.3s ease';
          tooltip.style.pointerEvents = 'none';

          info.appendChild(tooltip);

          info.addEventListener('click', function (e) {
            e.stopPropagation();

            const tempInput = document.createElement('input');
            tempInput.value = displayValue;
            document.body.appendChild(tempInput);
            tempInput.select();
            document.execCommand('copy');
            document.body.removeChild(tempInput);

            tooltip.style.opacity = '1';
            setTimeout(() => {
              tooltip.style.opacity = '0';
            }, 1500);
          });

          this.appendChild(info);
        });
      } else if ((type === 'mail' || type === 'phone') && isMobile) {
        if (type === 'mail') link.href = `mailto:${value.replace(/^mailto:/, '')}`;
        if (type === 'phone') link.href = `tel:${value.replace(/^tel:/, '')}`;
      }
    });
  });
});
