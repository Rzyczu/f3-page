const mobileNavbar = document.getElementById("mobile-navbar");
const hamburgerBtn = document.querySelector(".hamburger");
const hamburgerLabel = document.querySelector(".hamburger-label");
const navbarBrand = document.getElementById("navbar-brand");
const navbarLinksDisplayMobile = document.querySelectorAll(".display-mobile");
const navElement = document.querySelector('nav');
const logo = document.querySelector('img[src="./assets/svg/logo.svg"]');
const activePageLinks = document.querySelectorAll('[aria-current="page"]'); // Selects active page link
activePageLinks.forEach(link => {
  link.classList.add('text-primary');
});
const isSmallScreen = window.matchMedia('(max-width: 640px)').matches; // <=sm
const isIndexPage = navElement.getAttribute('data-page') === 'index';

if (isIndexPage) {
  navElement.classList.add('max-sm:bg-primary');
}

let isAnimating = false;

function toggleNavbar() {
  if (isAnimating) return;
  isAnimating = true;

  const isActive = hamburgerBtn.classList.contains("is-active");
  const isIndexPage = navElement.getAttribute('data-page') === 'index';
  const isSmallScreen = window.matchMedia('(max-width: 640px)').matches; // <=sm
  const isLargeOrSmallerScreen = window.matchMedia('(max-width: 1024px)').matches; // <=lg

  hamburgerBtn.classList.toggle("is-active");

  if (!isActive) {
    // Open menu logic
    hamburgerLabel.textContent = "close";

    if (isIndexPage) {
      // Strona index
      console.log('isSmallScreen: ', isSmallScreen)
      console.log('isLargeOrSmallerScreen: ', isLargeOrSmallerScreen)
      console.log('all: ', !isSmallScreen && isLargeOrSmallerScreen)

      if (!isSmallScreen && isLargeOrSmallerScreen) {
        navElement.classList.remove('bg-white');
        navElement.classList.add('bg-primary');
      }
    } else {
      // Pozostałe strony
      navElement.classList.remove('bg-white');
      navElement.classList.add('bg-primary');
    }

    navbarLinksDisplayMobile.forEach(element => {
      element.classList.remove('hidden', 'hover:text-primary');
      element.classList.add('hover:text-white');
    });

    setTimeout(function () {
      mobileNavbar.classList.add('active');
      navbarBrand.classList.add('hidden');
      activePageLinks.forEach(link => {
        link.classList.remove('text-primary');
        link.classList.add('text-gray-light');
      });
    }, 100);

    setTimeout(function () {
      document.body.classList.add('bg-primary', 'overflow-hidden');
      document.body.classList.remove('bg-white');
      logo.classList.remove('group-hover:svg-color-primary');
      logo.classList.add('group-hover:svg-color-white');
      isAnimating = false;
    }, 500);
  } else {
    // Close menu logic
    hamburgerLabel.textContent = "menu";
    navbarLinksDisplayMobile.forEach(element => {
      element.classList.add('hidden', 'hover:text-primary');
      element.classList.remove('hover:text-white');
    });

    mobileNavbar.classList.remove('active');
    navbarBrand.classList.remove('hidden');

    if (isIndexPage) {
      // Strona index
      if (!isSmallScreen && isLargeOrSmallerScreen) {
        navElement.classList.add('bg-white');
        navElement.classList.remove('bg-primary');
      }
    } else {
      // Pozostałe strony
      navElement.classList.add('bg-white');
      navElement.classList.remove('bg-primary');
    }

    document.body.classList.remove('bg-primary', 'overflow-hidden');
    document.body.classList.add('bg-white');

    logo.classList.remove('group-hover:svg-color-white');
    logo.classList.add('group-hover:svg-color-primary');
    activePageLinks.forEach(link => {
      link.classList.remove('text-gray-light');
      link.classList.add('text-primary');
    });

    setTimeout(() => {
      isAnimating = false;
    }, 500);
  }
}

function handleResize() {
  if (window.innerWidth > 1024) {
    hamburgerBtn.classList.remove("is-active");
    hamburgerLabel.textContent = "menu";
    navbarLinksDisplayMobile.forEach(element => {
      element.classList.add('hidden', 'hover:text-primary');
      element.classList.remove('hover:text-white');
    });

    mobileNavbar.classList.remove('active');
    navbarBrand.classList.remove('hidden');
    navElement.classList.add('sm:bg-transparent');

    if (navElement.getAttribute('data-page') !== 'index') {
      navElement.classList.remove('bg-primary');
    }
    document.body.classList.remove('bg-primary', 'overflow-hidden');
    document.body.classList.add('bg-white');

    logo.classList.remove('group-hover:svg-color-white');
    logo.classList.add('group-hover:svg-color-primary');
    activePageLinks.forEach(link => {
      link.classList.remove('text-gray-light');
      link.classList.add('text-primary');
    })
  }
}

hamburgerBtn.addEventListener("click", toggleNavbar);
window.addEventListener("resize", handleResize);
