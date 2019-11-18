$(document).ready(function(){
  // $("#paquetes").on( "click", "#enviar", function() {
  //   $('#basic, #standard, #enterprise').hide(); //oculto mediante id
  //   $('#titulo').hide(); //oculto mediante id
  //   $('#Spaquete').hide(); //oculto mediante id
  //   $('#titulo').hide(); //oculto mediante id
  //   $('#enviar').hide(); //oculto mediante id
  //   });
  //   $("#negocio").on( "click", "#enviar", function() {
  //   $('#basic, #standard, #enterprise').show(); //muestro mediante id
  //     $('#registrar-negocioP').show(); //muestro mediante id
  //     $('#registrar-giroP').show(); //muestro mediante id
  //     $('#registrar-domicilioP').show(); //muestro mediante id
  //     $('#registrar-coloniaP').show(); //muestro mediante id
  //     $('#registrar-localidadP').show(); //muestro mediante id
  //     $('#registrar-municipioP').show(); //muestro mediante id
  //     $('#registrar-estadoP').show(); //muestro mediante id
  //     $('#registrar-paisP').show(); //muestro mediante id
  //     $('#registrar-telP').show(); //muestro mediante id
  //     $('#registrar-impresoraP').show(); //muestro mediante id
  //   });


  $(document).on('click', '#enviar', function (e) {
      var pagina = $('section').attr('class').split(' ')[1];
      var paquete = $('#basic, #standard, #enterprise').attr('id');
      var nombre = $('#registrar-name').val();
      var email = $('#registrar-email').val();
      var telefono = $('#registrar-tel').val();
      var domicilio = $('#registrar-domicilio').val();
      var ciudad = $('#registrar-ciudad').val();
      var estado = $('#registrar-estado').val();
      var pais = $('#registrar-pais').val();
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
              data:'pagina='+pagina+'&nombre='+nombre+'&email='+email+'&telefono='+telefono+'&domicilio='+domicilio+'&ciudad='+ciudad+'&estado='+estado+'&pais='+pais+'&paquete='+paquete+'&carrera='+carrera+'&experiencia='+experiencia,
              beforeSend: function () {
                $('#enviar').attr("disabled","disabled");
                $('body').css('opacity', '.5');
              },
              success:function(msg){
                if(msg == 1){
                  $('#registrar-name').val('');
                  $('#registrar-email').val('');
                  $('#registrar-tel').val('');
                  $('#registrar-domicilio').val();
                  $('#registrar-ciudad').val();
                  $('#registrar-estado').val();
                  $('#registrar-pais').val();
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

$(document).ready(function(){
   $(document).on('click', '#envio', function (e) {
     var negocio = $('#registrar-negocioP').val();
     var giro = $('#registrar-giroP').val();
     var domicilio = $('#registrar-domicilioP').val();
     var colonia = $('#registrar-coloniaP').val();
     var localidad = $('#registrar-localidadP').val();
     var municipio = $('#registrar-municipioP').val();
     var estado = $('#registrar-estadoP').val();
     var pais = $('#registrar-paisP').val();
     var telefono = $('#registrar-telP').val();
     var impresora = $('#registrar-impresoraP').val();

  });
});
