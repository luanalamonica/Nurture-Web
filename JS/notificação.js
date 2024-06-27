document.addEventListener('DOMContentLoaded', function() {
    const notificationContainer = document.getElementById('notificationContainer');
    const notificationClose = document.getElementById('notificationClose');
  
    // Exibe a notificação assim que a página for carregada
    notificationContainer.classList.add('visible');
  
    // Adiciona evento de clique no botão de fechar
    notificationClose.addEventListener('click', function() {
      // Adiciona a classe hidden para iniciar a animação de desaparecimento
      notificationContainer.classList.add('hidden');
  
      // Remove a classe visible após a animação para esconder completamente a notificação
      setTimeout(function() {
        notificationContainer.classList.remove('visible');
      }, 300); // Tempo correspondente à duração da animação em milissegundos
    });
  });
  