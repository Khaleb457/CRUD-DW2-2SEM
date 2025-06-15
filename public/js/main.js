// public/js/main.js
import { initScrollEffects } from './scroll-effects.js';
import { initSinopseModal } from './sinopse-modal.js';
import { initReservaModal } from './reserva-modal.js';

document.addEventListener('DOMContentLoaded', function() {
  initScrollEffects();
  initSinopseModal();
  initReservaModal();
});