const mobileNavbar = document.getElementById("mobile-navbar");
const hamburgerBtn = document.querySelector(".hamburger");
const hamburgerLabel = document.querySelector(".hamburger-label"); // Label element
const navbarBrand = document.getElementById("navbar-brand");
const navbarLinksDisplayMobile = document.querySelectorAll(".display-mobile");
const navElement = document.querySelector('nav');
const logo = document.querySelector('img[src="./assets/svg/logo.svg"]');

function toggleNavbar() {
  const isActive = hamburgerBtn.classList.contains("is-active");

  hamburgerBtn.classList.toggle("is-active");

  if (!isActive) {
    // Open menu logic
    hamburgerLabel.textContent = "close"; // Set label to "close"
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
    }, 100);

    setTimeout(function() {
      document.body.classList.add('bg-primary', 'overflow-hidden');
      document.body.classList.remove('bg-white');
      logo.classList.remove('group-hover:svg-color-primary');
      logo.classList.add('group-hover:svg-color-white');
    }, 500);
  } else {
    // Close menu logic
    hamburgerLabel.textContent = "menu"; // Set label to "menu"
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
  }
}

function handleResize() {
  if (window.innerWidth > 1024) {
    // Close the menu if the window is resized to larger screens
    hamburgerBtn.classList.remove("is-active");
    hamburgerLabel.textContent = "menu"; // Reset label to "menu" on resize
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
  }
}

hamburgerBtn.addEventListener("click", toggleNavbar);
window.addEventListener("resize", handleResize);
