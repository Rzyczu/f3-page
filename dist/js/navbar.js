let mobileNavbar = document.getElementById("mobile-navbar");
let openBtn = document.getElementById("hamburger-open");
let closeBtn = document.getElementById("hamburger-close");
let navbarBrand = document.getElementById("navbar-brand");
let navbar = document.getElementById("navbar");
let navbarLinksDisplayMobile = document.querySelectorAll(".display-mobile")


function navDropdown(e) {
 
  console.log(navbar);
  
  e === openBtn?
     ( mobileNavbar.classList.remove('hidden'),
      closeBtn.classList.remove('hidden'),
      openBtn.classList.add('hidden'),
      navbarBrand.classList.add('hidden'),
      document.body.classList.add('bg-primary', 'overflow-hidden'),
      document.body.classList.remove('bg-white'),
      navbar.classList.add('bg-primary'),
      navbar.classList.remove('bg-white'),
      navbarLinksDisplayMobile.forEach(element => {
        element.classList.remove('hidden');
        element.classList.remove('hover:text-primary');
        element.classList.add('hover:text-white');
      }))
  :
      (mobileNavbar.classList.add('hidden'),
      openBtn.classList.remove('hidden'),
      closeBtn.classList.add('hidden'),
      navbarBrand.classList.remove('hidden'),
      document.body.classList.remove('bg-primary', 'overflow-hidden'),
      document.body.classList.add('bg-white'),
      navbar.classList.remove('bg-primary'),
      navbar.classList.add('bg-white'),
      navbarLinksDisplayMobile.forEach(element => {
        element.classList.add('hidden');
        element.classList.add('hover:text-primary');
        element.classList.remove('hover:text-white')
      }))
  }
