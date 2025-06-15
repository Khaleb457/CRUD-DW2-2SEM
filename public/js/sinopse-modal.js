function initSinopseModal() {
  if (window.sinopseModalInitialized) {
    console.log('Modal de sinopse já inicializado');
    return;
  }
  window.sinopseModalInitialized = true;

  document.querySelectorAll('.btn-sinopse').forEach(button => {
    button.removeEventListener('click', handleSinopseClick);
    button.addEventListener('click', handleSinopseClick);
  });
}
function handleSinopseClick() {
  const livroId = this.getAttribute('data-livro-id');
  const livroTitulo = this.getAttribute('data-livro-titulo');
  
  // Atualiza o título
  document.getElementById('sinopseModalTitle').innerHTML = 
    `<i class="bi bi-book me-2"></i>${livroTitulo}`;
  
  // Mostra loading
  document.getElementById('sinopseModalBody').innerHTML = `
    <div class="text-center my-4">
      <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Carregando...</span>
      </div>
      <p class="mt-2">Carregando sinopse...</p>
    </div>
  `;
  
  // Inicializa o modal corretamente
  const modalEl = document.getElementById('sinopseModal');
  const modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl, {
    backdrop: true,
    keyboard: true,
    focus: true
  });
  
  modal.show();

  // Faz a requisição AJAX
  fetch(`/CRUD-DW2-2SEM/controller/LivroController.php?action=getSinopse&id=${livroId}`)
    .then(response => {
      if (!response.ok) throw new Error('Erro na requisição');
      return response.json();
    })
    .then(data => {
      if (data.success && data.descricao) {
        document.getElementById('sinopseModalBody').innerHTML = `
          <div class="sinopse-content">${data.descricao}</div>
        `;
      } else {
        showError(data.message || 'Sinopse não disponível');
      }
    })
    .catch(error => {
      console.error('Erro:', error);
      showError(`Erro ao carregar: ${error.message}`);
    });
}

function showError(message) {
  document.getElementById('sinopseModalBody').innerHTML = `
    <div class="alert alert-danger">
      <i class="bi bi-exclamation-triangle me-2"></i>
      ${message}
    </div>
  `;
}