$(document).ready(function() {
    $('.elementos-externos').on('click', function() {
        const id = $(this).find('input').val();
        const $form = $('<form>', {
          method: 'POST',
          action: '../PHP/perfil.php'
        });

        const $input = $('<input>', {
          type: 'hidden',
          name: 'id',
          value: id
        });

        $form.append($input);
        $('body').append($form);
        $form.submit();
    });
});