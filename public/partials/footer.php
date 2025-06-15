</main>
<footer class="footer py-5 bg-dark text-white mt-auto w-100">
  <!-- Remove a div container e coloca diretamente o conteúdo -->
  <div class="row g-0 mx-0 px-4"> <!-- Adicionado g-0 (gutters zero) e mx-0 (margin x zero) -->
    <!-- Seção Sobre -->
    <div class="col-md-4 mb-4 ps-md-5"> <!-- Adicionado padding esquerdo apenas em md+ -->
      <h5 class="text-warning mb-4">
        <i class="bi bi-gem me-2"></i>Acervo Dourado
      </h5>
      <p class="text-white">
        Sistema de gerenciamento de biblioteca com os melhores títulos literários.
        Preservando conhecimento desde 2023.
      </p>
      <div class="social-icons mt-3">
        <a href="#" class="text-white me-3"><i class="bi bi-facebook"></i></a>
        <a href="#" class="text-white me-3"><i class="bi bi-instagram"></i></a>
        <a href="#" class="text-white me-3"><i class="bi bi-twitter-x"></i></a>
        <a href="#" class="text-white"><i class="bi bi-linkedin"></i></a>
      </div>
    </div>

    <!-- Links Rápidos -->
    <div class="col-md-2 mb-4">
      <h5 class="text-warning mb-4">
        <i class="bi bi-bookmark-heart me-2"></i>Links
      </h5>
      <ul class="list-unstyled">
        <li class="mb-2"><a href="#" class="text-white"><i class="bi bi-arrow-right me-2"></i>Início</a></li>
        <li class="mb-2"><a href="#" class="text-white"><i class="bi bi-arrow-right me-2"></i>Acervo</a></li>
        <li class="mb-2"><a href="#" class="text-white"><i class="bi bi-arrow-right me-2"></i>Novidades</a></li>
        <li class="mb-2"><a href="#" class="text-white"><i class="bi bi-arrow-right me-2"></i>Eventos</a></li>
      </ul>
    </div>

    <!-- Contato -->
    <div class="col-md-3 mb-4">
      <h5 class="text-warning mb-4">
        <i class="bi bi-envelope-paper me-2"></i>Contato
      </h5>
      <ul class="list-unstyled text-white">
        <li class="mb-3">
          <i class="bi bi-geo-alt-fill me-2 text-warning"></i>
          Av. Literária, 123 - Centro
        </li>
        <li class="mb-3">
          <i class="bi bi-telephone-fill me-2 text-warning"></i>
          (11) 98765-4321
        </li>
        <li class="mb-3">
          <i class="bi bi-envelope-fill me-2 text-warning"></i>
          contato@acervodourado.com
        </li>
      </ul>
    </div>

    <!-- Horário de Funcionamento -->
    <div class="col-md-3 mb-4 pe-md-5"> <!-- Adicionado padding direito apenas em md+ -->
      <h5 class="text-warning mb-4">
        <i class="bi bi-clock-history me-2"></i>Horários
      </h5>
      <ul class="list-unstyled text-white">
        <li class="mb-2">Seg-Sex: 9h às 18h</li>
        <li class="mb-2">Sábado: 9h às 14h</li>
        <li class="mb-2">Domingo: Fechado</li>
      </ul>
      <div class="mt-4">
        <button class="btn btn-outline-warning btn-sm">
          <i class="bi bi-question-circle me-1"></i> Ajuda
        </button>
      </div>
    </div>
  </div>

  <hr class="border-warning mt-0 mx-4"> <!-- Adicionado margem horizontal -->

  <!-- Rodapé inferior -->
  <div class="row g-0 mx-0 px-4"> <!-- Adicionado g-0 e mx-0 -->
    <div class="col-md-6 text-center text-md-start">
      <p class="mb-0 text-white">
        <i class="bi bi-c-circle"></i> 2023 Acervo Dourado. Todos os direitos reservados.
      </p>
    </div>
    <div class="col-md-6 text-center text-md-end">
      <p class="mb-0 text-white">
        Desenvolvido com <i class="bi bi-heart-fill text-danger"></i> por sua equipe
      </p>
    </div>
  </div>
</footer> 

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>



<script src="/CRUD-DW2-2SEM/public/js/reserva-modal.js"></script>
<script src="/CRUD-DW2-2SEM/public/js/scroll-efects.js"></script>
<script src="/CRUD-DW2-2SEM/public/js/sinopse-modal.js"></script>

<script>
// Garante que tudo está carregado
window.addEventListener('load', function() {
  // Verifica se Bootstrap está disponível
  if (typeof bootstrap === 'undefined' || !bootstrap.Modal) {
    console.error('Bootstrap não está carregado corretamente');
    return;
  }

  // Verifica e inicializa cada módulo com try-catch
  try {
    if(typeof initScrollEffects === 'function') {
      initScrollEffects();
    }
  } catch(e) {
    console.error('Erro em initScrollEffects:', e);
  }

  try {
    if(typeof initSinopseModal === 'function') {
      initSinopseModal();
    }
  } catch(e) {
    console.error('Erro em initSinopseModal:', e);
  }

  try {
    if(typeof initReservaModal === 'function') {
      initReservaModal();
    }
  } catch(e) {
    console.error('Erro em initReservaModal:', e);
  }
});
</script>





</body>
</html>