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

toggleNavbar = () => {
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
      navElement.classList.add('bg-primary');
      navElement.classList.remove('bg-white');
    } else {
      // Pozostałe strony
      navElement.classList.remove('bg-white');
      navElement.classList.add('bg-primary');
    }

    navbarLinksDisplayMobile.forEach(element => {
      element.classList.remove('hidden', 'hover:text-primary');
      element.classList.add('hover:text-white');
    });

    setTimeout(() => {
      mobileNavbar.classList.add('active');
      navbarBrand.classList.add('hidden');
      activePageLinks.forEach(link => {
        link.classList.remove('text-primary');
        link.classList.add('text-gray-light');
      });
    }, 100);

    setTimeout(() => {
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
      navElement.classList.add('bg-white');
      navElement.classList.remove('bg-primary');
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

handleResize = () => {
  if (window.innerWidth > 1024) {
    hamburgerBtn.classList.remove("is-active");
    hamburgerLabel.textContent = "menu";
    navbarLinksDisplayMobile.forEach(element => {
      element.classList.add('hidden', 'hover:text-primary');
      element.classList.remove('hover:text-white');
    });

    mobileNavbar.classList.remove('active');
    navbarBrand.classList.remove('hidden');
    if (isIndexPage) {
      // Strona index
      navElement.classList.add('bg-white');
      navElement.classList.remove('bg-primary');
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
    })
  }
}

handleScroll = () => {
  const scrollY = window.scrollY;
  console.log(scrollY)
  if (scrollY > 50) {
    navElement.classList.add('shadow-lg');
  } else {
    navElement.classList.remove('shadow-lg');
  }
}

hamburgerBtn.addEventListener("click", toggleNavbar);
window.addEventListener("resize", handleResize);
window.addEventListener('scroll', handleScroll);


const contextMenu = document.getElementById('custom-context-menu');
const toggleNavLockItem = document.getElementById('toggle-nav-lock');
let isNavSticky = true; // Flaga oznaczająca, czy `nav` jest sticky
if (localStorage.getItem('isNavSticky') === 'false') {
  navElement.classList.remove('sticky', 'top-0');
  isNavSticky = false;
}
// Funkcja obsługująca kliknięcia prawym przyciskiem myszy na `nav`
navElement.addEventListener('contextmenu', (event) => {
  event.preventDefault(); // Zablokowanie domyślnego menu kontekstowego

  // Pozycjonowanie menu w miejscu kliknięcia
  contextMenu.style.top = `${event.clientY}px`;
  contextMenu.style.left = `${event.clientX}px`;
  contextMenu.classList.remove('hidden');

  // Ustawienie odpowiedniej opcji w menu
  toggleNavLockItem.textContent = isNavSticky ? 'Zablokuj menu' : 'Odblokuj menu';
});

// Ukrywanie menu, gdy klikniemy gdziekolwiek indziej
document.addEventListener('click', () => {
  contextMenu.classList.add('hidden');
});

// Funkcja obsługująca włączanie/wyłączanie sticky na `nav`
toggleNavLockItem.addEventListener('click', () => {
  if (isNavSticky) {
    navElement.classList.remove('sticky', 'top-0');
    isNavSticky = false;
  } else {
    navElement.classList.add('sticky', 'top-0');
    isNavSticky = true;
  }
  localStorage.setItem('isNavSticky', isNavSticky);
  contextMenu.classList.add('hidden'); // Ukrywanie menu po kliknięciu opcji
});
