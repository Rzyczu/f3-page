const mobileNavbar = document.getElementById("mobile-navbar");
const hamburgerBtn = document.querySelector(".hamburger");
const hamburgerLabel = document.querySelector(".hamburger-label");
const navbarBrand = document.getElementById("navbar-brand");
const navbarLinksDisplayMobile = document.querySelectorAll(".display-mobile");
const navElement = document.querySelector('nav');
const logo = document.getElementById('logo') || document.querySelector('.custom-logo');
const activePageLinks = document.querySelectorAll('[aria-current="page"]'); // Selects active page link
activePageLinks.forEach(link => {
  link.classList.add('text-primary');
});
const isSmallScreen = window.matchMedia('(max-width: 640px)').matches; // <=sm
const isIndexPage = navElement.getAttribute('data-page') === 'index';

if (isIndexPage) {
  navElement.classList.add('max-sm:bg-primary');
}
if (!logo) {
  console.warn('Element logo nie został znaleziony');
}

let isAnimating = false;

toggleNavbar = () => {
  if (isAnimating) return;
  isAnimating = true;

  const isActive = hamburgerBtn.classList.contains("is-active");
  const isIndexPage = navElement.getAttribute('data-page') === 'index';

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

    document.body.classList.add('bg-primary', 'overflow-hidden');

    setTimeout(() => {
      mobileNavbar.classList.add('active');
      navbarBrand.classList.add('hidden');
      activePageLinks.forEach(link => {
        link.classList.remove('text-primary');
        link.classList.add('text-gray');
      });
    }, 100);

    setTimeout(() => {
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
      link.classList.remove('text-gray');
      link.classList.add('text-primary');
    });

    setTimeout(() => {
      isAnimating = false;
    }, 500);
  }
}

handleResize = () => {
  contextMenu.classList.add('hidden');

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
      link.classList.remove('text-gray');
      link.classList.add('text-primary');
    })
  }
}

handleScroll = () => {
  if (hamburgerBtn.classList.contains("is-active"))
    return;
  contextMenu.classList.add('hidden');

  const scrollY = window.scrollY;
  if (scrollY > 50) {
    navElement.classList.add('shadow-lg');
  } else {
    navElement.classList.remove('shadow-lg');
  }
}

hamburgerBtn.addEventListener("click", toggleNavbar);
window.addEventListener("resize", handleResize);
window.addEventListener('scroll', handleScroll);

// CONTEXT MENU - LOCK/UNLOCK STICKY NAVBAR

const contextMenu = document.createElement('div');
contextMenu.id = 'custom-context-menu';
contextMenu.className = 'hidden';

const menuList = document.createElement('ul');
const menuItem = document.createElement('li');
menuItem.id = 'toggle-nav-lock';
menuItem.className = 'p-2 cursor-pointer hover:bg-gray-100';

// Składanie elementów
menuList.appendChild(menuItem);
contextMenu.appendChild(menuList);

// Dodanie do DOM
document.body.appendChild(contextMenu);

let isNavSticky = true;
if (localStorage.getItem('isNavSticky') === 'false') {
  navElement.classList.remove('sticky', 'top-0');
  isNavSticky = false;
}

// Ustawienia początkowego stanu emoji
const lockIcon = document.getElementById('navbar-lock-icon');
updateLockIconState();

// Funkcja przełączająca stan sticky navbaru
function toggleStickyNavbar() {
  console.log(localStorage.getItem('isNavSticky'));
  console.log(navElement);

  if (isNavSticky) {
    navElement.classList.remove('sticky', 'top-0');
    isNavSticky = false;
  } else {
    navElement.classList.add('sticky', 'top-0');
    isNavSticky = true;
  }
  localStorage.setItem('isNavSticky', isNavSticky);
  updateLockIconState();
}

// Funkcja aktualizująca stan ikony emoji
function updateLockIconState() {
  if (isNavSticky) {
    lockIcon.textContent = '🔓'; // Odblokowana kłódka
    menuItem.textContent = 'Zablokuj menu';
  } else {
    lockIcon.textContent = '🔒'; // Zablokowana kłódka
    menuItem.textContent = 'Odblokuj menu';
  }
}

// Obsługa zdarzeń dla context menu
navElement.addEventListener('contextmenu', (event) => {
  if (hamburgerBtn.classList.contains("is-active")) return;

  event.preventDefault();
  contextMenu.style.top = `${event.clientY}px`;
  contextMenu.style.left = `${event.clientX}px`;
  contextMenu.classList.remove('hidden');
});

document.addEventListener('click', () => {
  contextMenu.classList.add('hidden');
});

menuItem.addEventListener('click', () => {
  toggleStickyNavbar();
  contextMenu.classList.add('hidden');
});

// Obsługa zdarzeń dla ikony emoji
lockIcon.addEventListener('click', () => {
  toggleStickyNavbar();
});
