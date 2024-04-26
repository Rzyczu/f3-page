let mobileNavbar = document.getElementById("mobile-navbar");
let openBtn = document.getElementById("hamburger-open");
let closeBtn = document.getElementById("hamburger-close");
let navbarBrand = document.getElementById("navbar-brand");
let navbarLinksDisplayMobile = document.querySelectorAll(".display-mobile")
var navElement = document.querySelector('nav');


function navDropdown(e) {
  if (e === openBtn) {
    navElement.classList.remove('sm:bg-transparent'); 
      if (navElement.getAttribute('data-page') != 'index') {
        navElement.classList.add('bg-primary');
 
      }
      navbarLinksDisplayMobile.forEach(element => {
        element.classList.remove('hidden');
        element.classList.remove('hover:text-primary');
        element.classList.add('hover:text-white');
      }),
      mobileNavbar.classList.add('active');
      navbarBrand.classList.add('hidden');
      setTimeout(function() {
        document.body.classList.add('bg-primary', 'overflow-hidden'),
        document.body.classList.remove('bg-white'),
        closeBtn.classList.remove('hidden'),
        openBtn.classList.add('hidden')

     }, 300);
    }
  else {
      navbarLinksDisplayMobile.forEach(element => {
        element.classList.add('hidden');
        element.classList.add('hover:text-primary');
        element.classList.remove('hover:text-white')
      });
      mobileNavbar.classList.remove('active');
      navbarBrand.classList.remove('hidden');
      navElement.classList.add('sm:bg-transparent'); 

      setTimeout(function() {
        if (navElement.getAttribute('data-page') != 'index') {
          navElement.classList.remove('bg-primary');
        }
        document.body.classList.remove('bg-primary', 'overflow-hidden'),
        document.body.classList.add('bg-white'),
        openBtn.classList.remove('hidden'),
        closeBtn.classList.add('hidden')
        }, 300)
  }
}
