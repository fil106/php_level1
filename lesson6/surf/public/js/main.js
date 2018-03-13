$(document).ready(function() {

  // Форма регистрации
  $('#register_form').submit(function() {
    var pass1 = $('#register_pass').val();
    var pass2 = $('#register_pass_2').val();

    if(pass1 === pass2) {
      return true;
    } else {
      $('.error').text('Пароли не совпадают!');
      $('#register_pass').addClass('error_input');
      $('#register_pass_2').addClass('error_input');
      $('#register_pass').focus();
      return false;
    }

  });

});