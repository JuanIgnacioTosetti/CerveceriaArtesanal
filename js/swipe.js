var mySwiper = new Swiper('.swiper-container', {
  // Opciones opcionales
  direction: 'horizontal',
  loop: true,
  effect: 'fade', // Efecto de desvanecimiento
  autoplay: { delay: 5000 }, // Autoplay cada 5 segundos

  // Si habilitaste la paginación
  pagination: {
      el: '.swiper-pagination',
  },

  // Si habilitaste botones de navegación
  navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
  },

  // Estas opciones son requeridas para el efecto fade
  fadeEffect: {
      crossFade: true
  },
});


