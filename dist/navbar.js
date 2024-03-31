function navDropdown(e) {
  let mobileNavbar = document.getElementById("mobile-navbar");
  let openBtn = document.getElementById("hamburger-open");
  let closeBtn = document.getElementById("hamburger-close");

  console.log(closeBtn, openBtn, document.body);
  
  e === openBtn?
     ( mobileNavbar.classList.remove('hidden'),
      closeBtn.classList.remove('hidden'),
      openBtn.classList.add('hidden'),
      document.body.classList.add('bg-primary', 'overflow-hidden'),
      document.body.classList.remove('bg-white'))
  :
      (mobileNavbar.classList.add('hidden'),
      openBtn.classList.remove('hidden'),
      closeBtn.classList.add('hidden'),
      document.body.classList.remove('bg-primary', 'overflow-hidden'),
      document.body.classList.add('bg-white'))
  }
