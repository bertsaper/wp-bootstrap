// Variables holding references to DOM elements.
var banner = document.getElementById('banner');
var header = document.getElementById('header');
var navbarBrand = document.querySelector('.navbar-brand');
var main = document.getElementById('main'); // Assuming main is also needed globally

// Function that initializes styles on page load.
function setInitialStyles() {
  header.style.opacity = '1';
  main.style.opacity = '1';
}

// Function to add or remove 'fixed-top' class based on scroll position and adjust opacity.
function updateNavbarClass() {
  var scrollPosition = window.scrollY;
  var bannerHeight = banner.offsetHeight;

  if (scrollPosition > (bannerHeight / 3)) {
    main.style.marginTop = (bannerHeight + 40) + 'px'; 
  } else {
    main.style.marginTop = 40 + 'px';
  }

  if (scrollPosition > bannerHeight) {
    header.classList.add('fixed-top');
    navbarBrand.style.opacity = '1';
    banner.style.opacity = '0';
  } else {
    var opacityValue = scrollPosition / bannerHeight;
    header.classList.remove('fixed-top');
    navbarBrand.style.opacity = opacityValue;
    banner.style.opacity = (1 - opacityValue).toString();
  }
}

// Event listener for window load.
window.addEventListener('load', function() {
  setInitialStyles();  // Set initial styles when the page has finished loading.
  updateNavbarClass();
});

// Event listener for window scroll.
window.addEventListener('scroll', updateNavbarClass);
