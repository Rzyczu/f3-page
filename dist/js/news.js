const eventsContainer = document.querySelector('.events');
const events = document.querySelectorAll('.event');
const nextBtnEvents = document.getElementById('events-next-btn');
const prevBtnEvents = document.getElementById('events-prev-btn');

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
    const slideWidth = events[0].clientWidth;
    const eventStyles = window.getComputedStyle(eventsContainer);
    const eventGap =  parseInt(eventStyles.getPropertyValue('gap'));
    console.log(slideWidth);
    console.log(eventGap);
    eventsContainer.style.transform = `translateX(-${activeIndex * (slideWidth + eventGap)}px)`;
}

function nextSlide() {
    if (activeIndex < events.length - itemsToShow) {
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
        activeIndex = events.length - itemsToShow;
    }
    updateSlider();
}

nextBtnEvents.addEventListener('click', nextSlide);
prevBtnEvents.addEventListener('click', prevSlide);

window.addEventListener('resize', () => {
    itemsToShow = calculateItemsToShow();
    updateSlider();
});

// Initial setup
updateSlider();
setInterval(nextSlide, 3000);
