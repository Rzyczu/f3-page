new Swiper('.swiper-news', {
      loop: true,
      autoplay: {
        delay: 5000,
      },      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      pagination: {
        clickable: true,
      },
      slidesPerView: 1,
      spaceBetween: 90,
      breakpoints: {
        640: {
          slidesPerView: 1,
          spaceBetween: 90,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 60,
        },
        1024: {
            slidesPerView: 3,
            spaceBetween: 60,
        },
        1280: {
          slidesPerView: 4,
          spaceBetween: 60,
        },
        1536: {
            slidesPerView: 4,
            spaceBetween: 80,
        }
      }
    });
