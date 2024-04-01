function navDropdown(e) {
  let mobileNavbar = document.getElementById("mobile-navbar");
  let openBtn = document.getElementById("hamburger-open");
  let closeBtn = document.getElementById("hamburger-close");
  let navbarBrand = document.getElementById("navbar-brand");
  let navbarLinksDisplayMobile = document.querySelectorAll(".display-mobile")

  console.log(closeBtn, openBtn, document.body);
  
  e === openBtn?
     ( mobileNavbar.classList.remove('hidden'),
      closeBtn.classList.remove('hidden'),
      openBtn.classList.add('hidden'),
      navbarBrand.classList.add('hidden'),
      navbarLinksDisplayMobile.forEach(element => {
        element.classList.remove('hidden');
      }),
      document.body.classList.add('bg-primary', 'overflow-hidden'),
      document.body.classList.remove('bg-white'))
  :
      (mobileNavbar.classList.add('hidden'),
      openBtn.classList.remove('hidden'),
      closeBtn.classList.add('hidden'),
      navbarBrand.classList.remove('hidden'),
      navbarLinksDisplayMobile.forEach(element => {
        element.classList.add('hidden');
      }),
      document.body.classList.remove('bg-primary', 'overflow-hidden'),
      document.body.classList.add('bg-white'))
  }
