const mobileNavbar = document.getElementById("mobile-navbar");
const hamburgerBtn = document.querySelector(".hamburger");
const hamburgerLabel = document.querySelector(".hamburger-label");
const navbarBrand = document.getElementById("navbar-brand");
const navbarLinksDisplayMobile = document.querySelectorAll(".display-mobile");
const navElement = document.querySelector('nav');
const logo = document.querySelector('img[src="./assets/svg/logo.svg"]');
const activePageLink = document.querySelector('[aria-current="page"]'); // Selects active page link
activePageLink.classList.add('text-primary');

function toggleNavbar() {
  const isActive = hamburgerBtn.classList.contains("is-active");

  hamburgerBtn.classList.toggle("is-active");

  if (!isActive) {
    // Open menu logic
    hamburgerLabel.textContent = "close";
    navElement.classList.remove('sm:bg-transparent');
    if (navElement.getAttribute('data-page') !== 'index') {
      navElement.classList.add('bg-primary');
    }
    navbarLinksDisplayMobile.forEach(element => {
      element.classList.remove('hidden', 'hover:text-primary');
      element.classList.add('hover:text-white');
    });

    setTimeout(function() {
      mobileNavbar.classList.add('active');
      navbarBrand.classList.add('hidden');
      activePageLink.classList.remove('text-primary');
      activePageLink.classList.add('text-gray-light');
    }, 100);

    setTimeout(function() {
      document.body.classList.add('bg-primary', 'overflow-hidden');
      document.body.classList.remove('bg-white');
      logo.classList.remove('group-hover:svg-color-primary');
      logo.classList.add('group-hover:svg-color-white');
      
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
    navElement.classList.add('sm:bg-transparent');

    if (navElement.getAttribute('data-page') !== 'index') {
      navElement.classList.remove('bg-primary');
    }
    document.body.classList.remove('bg-primary', 'overflow-hidden');
    document.body.classList.add('bg-white');
    
    logo.classList.remove('group-hover:svg-color-white');
    logo.classList.add('group-hover:svg-color-primary');
    activePageLink.classList.remove('text-gray-light');
    activePageLink.classList.add('text-primary');
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
    activePageLink.classList.remove('text-gray-light'); // Ensure it resets on larger screens
    activePageLink.classList.add('text-primary');
  }
}

hamburgerBtn.addEventListener("click", toggleNavbar);
window.addEventListener("resize", handleResize);
