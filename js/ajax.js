$(document).ready(function(){
  $(document).on('click', '#enviar', function (e) {
      var pagina = $('section').attr('class').split(' ')[1];
      var paquete = $('#basic, #standard, #enterprise').attr('id');
      var nombre = $('#registrar-name').val();
      var email = $('#registrar-email').val();
      var telefono = $('#registrar-tel').val();
      var carrera = $('#registrar-car').val();
      var experiencia = $('#registrar-exp').val();

      if(nombre.trim() == ''){
          alert('Por favor ingresa una nombre.');
          $('#registrar-name').focus();
          return false;
      }else if(email.trim() == ''){
          alert('Por favor ingresa un correo.');
          $('#registrar-email').focus();
          return false;
      }else if(telefono.trim() == ''){
          alert('Por favor ingresa un número de telefono.');
          $('#registrar-tel').focus();
          return false;
      }else{
          $.ajax({
              type:'post',
              url:'Models/crud.php',
              data:'pagina='+pagina+'&nombre='+nombre+'&email='+email+'&telefono='+telefono+'&paquete='+paquete+'&carrera='+carrera+'&experiencia='+experiencia,
              beforeSend: function () {
                $('#enviar').attr("disabled","disabled");
                $('body').css('opacity', '.5');
              },
              success:function(msg){
                if(msg == 1){
                  $('#registrar-name').val('');
                  $('#registrar-email').val('');
                  $('#registrar-tel').val('');
                  $('#registrar-car').val('');
                  $('#registrar-exp').val('');

                  $('.statusMsg').html('<span class="font-weight-bold" style="color:yellow;">Gracias por contactarnos, nos pondremos en contacto contigo lo mas pronto posible.</span>');
                }else{
                  $('.statusMsg').html('<span class="font-weight-bold" style="color:red;">Ocurrio un problema, porfavor intenta de nuevo.</span>');
                }
                $('#enviar').removeAttr("disabled");
                $('body').css('opacity', '');
              }
          });
          e.preventDefault();
      }
  });
});
