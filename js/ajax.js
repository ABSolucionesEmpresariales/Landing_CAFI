$(document).ready(function(){
  $(document).on('click', '#enviar', function (e) {
      var paquete = $('#basic').attr('id');
      var nombre = $('#registrar-name').val();
      var email = $('#registrar-email').val();
      var telefono = $('#registrar-tel').val();

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
              data:'contactFrmSubmit=1&nombre='+nombre+'&email='+email+'&telefono='+telefono+'&paquete='+paquete,
              beforeSend: function () {
                $('#enviar').attr("disabled","disabled");
                $('body').css('opacity', '.5');
              },
              success:function(msg){
                if(msg == 'insertado'){
                  $('#registrar-name').val('');
                  $('#registrar-email').val('');
                  $('#registrar-tel').val('');

                  $('.statusMsg').html('<span class="font-weight-bold" style="color:green;">Gracias por contactarnos, nos pondremos en contacto contigo lo mas pronto posible.</span>');
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
