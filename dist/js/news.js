const newsContainer = document.querySelector('.news');
const news = document.querySelectorAll('.news-article');
const nextBtnnews = document.getElementById('news-next-btn');
const prevBtnnews = document.getElementById('news-prev-btn');

let activeIndex = 0;
let itemsToShow = calculateItemsToShow();

function calculateItemsToShow() {
    if (window.innerWidth <= 640) {
        return 1;
    } else if (window.innerWidth <= 1536) {
        return 4;
    } else {
        return 5;
    }
}

function updateSlider() {
    const slideWidth = news[0].clientWidth;
    const newstyles = window.getComputedStyle(newsContainer);
    const newsArticleGap =  parseInt(newstyles.getPropertyValue('gap'));

    newsContainer.style.transform = `translateX(-${activeIndex * (slideWidth + newsArticleGap)}px)`;
}

function nextSlide() {
    if (activeIndex < news.length - itemsToShow) {
        activeIndex++;
    } else {
        activeIndex = 0;
    }
    updateSlider();
}

function prevSlide() {
    if (activeIndex > 0) {
        activeIndex--;
    } else {
        activeIndex = news.length - itemsToShow;
    }
    updateSlider();
}

nextBtnnews.addEventListener('click', nextSlide);
prevBtnnews.addEventListener('click', prevSlide);

window.addEventListener('resize', () => {
    itemsToShow = calculateItemsToShow();
    updateSlider();
});

// Initial setup
updateSlider();
setInterval(nextSlide, 44000);
