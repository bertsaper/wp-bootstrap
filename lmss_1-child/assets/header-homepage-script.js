// Immediately-invoked Function Expression (IIFE) to not pollute global namespace.
(function() {
  // Variables holding references to DOM elements.
  var banner;
  var header;
  var navbarBrand;
  var main;

  // Function that initializes styles on page load.
  function setInitialStyles() {
    header.style.opacity = '1';
    main.style.opacity = '1';
  }

  function updateNavbarClass() {
    var scrollPosition = window.scrollY;
    bannerHeight = banner.offsetHeight;

    // Rest of your code handling the classes and opacity...
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
  
  // Event listener for when the DOM is ready.
  document.addEventListener('DOMContentLoaded', function() {
    banner = document.getElementById('banner');
    header = document.getElementById('header');
    navbarBrand = document.querySelector('.navbar-brand');
    main = document.getElementById('main'); // Assuming main is also needed globally

    setInitialStyles();  // Set initial styles now that elements are available.
    updateNavbarClass();
  
    // Now that we have initialized, setup the scroll event listener.
    window.addEventListener('scroll', updateNavbarClass);
  });
})();
