const mobileNavbar = document.getElementById("mobile-navbar");
const openBtn = document.getElementById("hamburger-open");
const closeBtn = document.getElementById("hamburger-close");
const navbarBrand = document.getElementById("navbar-brand");
const navbarLinksDisplayMobile = document.querySelectorAll(".display-mobile");
const navElement = document.querySelector('nav');
const logo = document.querySelector('img[src="./assets/svg/logo.svg"]');

function toggleNavbar(e) {
  if (e === openBtn) {
    navElement.classList.remove('sm:bg-transparent'); 
    if (navElement.getAttribute('data-page') !== 'index') {
      navElement.classList.add('bg-primary');
    }
    navbarLinksDisplayMobile.forEach(element => {
      element.classList.remove('hidden', 'hover:text-primary');
      element.classList.add('hover:text-white');
    });

    openBtn.classList.remove('svg-color-primary');
    openBtn.classList.add('svg-color-primary');


    setTimeout(function() {
      mobileNavbar.classList.add('active');
      navbarBrand.classList.add('hidden');
    }, 100);

    setTimeout(function() {
      document.body.classList.add('bg-primary', 'overflow-hidden');
      document.body.classList.remove('bg-white');
      closeBtn.classList.remove('hidden');
      openBtn.classList.add('hidden');
      
      logo.classList.remove('group-hover:svg-color-primary');
      logo.classList.add('group-hover:svg-color-white');
    }, 500);
  } else {
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
    openBtn.classList.remove('hidden');
    closeBtn.classList.add('hidden');
    
    logo.classList.remove('group-hover:svg-color-white');
    logo.classList.add('group-hover:svg-color-primary');
  }
}

function handleResize() {
  if (window.innerWidth > 1024) {
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
    openBtn.classList.remove('hidden');
    closeBtn.classList.add('hidden');
    
    logo.classList.remove('group-hover:svg-color-white');
    logo.classList.add('group-hover:svg-color-primary');
  }
}

openBtn.addEventListener('click', () => toggleNavbar(openBtn));
closeBtn.addEventListener('click', () => toggleNavbar(closeBtn));
window.addEventListener('resize', handleResize);
