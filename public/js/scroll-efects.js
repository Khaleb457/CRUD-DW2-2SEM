// public/js/scroll-effects.js
function initScrollEffects() {
  const navbar = document.getElementById('mainNavbar');
  const carousel = document.getElementById('fullscreenCarousel');
  const cardsSection = document.getElementById('bookCards');
  const scrollIndicator = document.querySelector('.scroll-indicator');
  // Configurações de tempo
  const TRANSITION_DURATION = '0.6s';
  const TRIGGER_POINT = 0.5;
  
  let carouselHeight = carousel.offsetHeight;
  
  function handleScroll() {
    const scrollPosition = window.scrollY;
    
    // Navbar
    navbar.classList.toggle('scrolled', scrollPosition > carouselHeight * 0.2);
    
    // Cards
    if (scrollPosition > carouselHeight * TRIGGER_POINT) {
      cardsSection.style.opacity = '1';
      cardsSection.style.transform = 'translateY(0)';
    } else {
      cardsSection.style.opacity = '0';
      cardsSection.style.transform = 'translateY(30px)';
    }
    
    scrollIndicator.style.opacity = scrollPosition > 100 ? '0' : '1';
  }

  function handleResize() {
    carouselHeight = carousel.offsetHeight;
    handleScroll();
  }

  function init() {
    carousel.style.height = `${window.innerHeight}px`;
    carouselHeight = window.innerHeight;
    
    cardsSection.style.top = `${carouselHeight}px`;
    cardsSection.style.opacity = '0';
    cardsSection.style.transform = 'translateY(30px)';
    cardsSection.style.transition = `all ${TRANSITION_DURATION} ease`;
  }
  
  window.addEventListener('scroll', handleScroll);
  window.addEventListener('resize', handleResize);
  
  init();
  handleScroll();
}