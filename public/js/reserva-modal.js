function initReservaModal() {
  const reservaButtons = document.querySelectorAll('.btn-reservar');
  const modal = new bootstrap.Modal(document.getElementById('reservaModal'));
  const idLivroInput = document.getElementById('idLivroReserva');
  const reservaTexto = document.getElementById('reservaModalTexto');

  reservaButtons.forEach(button => {
    button.addEventListener('click', (e) => {
      e.preventDefault();
      const idLivro = button.getAttribute('data-livro-id');
      const titulo = button.getAttribute('data-livro-titulo');

      idLivroInput.value = idLivro;
      reservaTexto.textContent = `Você deseja realmente reservar o livro "${titulo}"?`;
      modal.show();
    });
  });

  document.getElementById('formReserva').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Mostrar spinner ou feedback visual
    const submitBtn = this.querySelector('[type="submit"]');
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Enviando...';
    
    fetch('/CRUD-DW2-2SEM/controller/ReservaController.php', {
      method: 'POST',
      body: new FormData(this)
    })
    .then(res => res.json())
    .then(data => {
      if (data.success) {
        // Fechar modal e recarregar
        bootstrap.Modal.getInstance(document.getElementById('reservaModal')).hide();
        alert('Livro reservado com sucesso!');
        location.reload();
      } else {
        alert('Erro: ' + data.message);
        submitBtn.disabled = false;
        submitBtn.textContent = 'Confirmar Reserva';
      }
    })
    .catch(err => {
      alert('Erro na requisição.');
      console.error(err);
      submitBtn.disabled = false;
      submitBtn.textContent = 'Confirmar Reserva';
    });
  });
}