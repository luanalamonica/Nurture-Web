document.querySelector('.div1').addEventListener('mouseenter', function() {
    this.style.setProperty('--content', '"Texto com Movimento"');
  });
  
  document.querySelector('.div1').addEventListener('mouseleave', function() {
    this.style.removeProperty('--content');
  });
  