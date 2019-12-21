$(function() {
    obj_encuesta = new Encuesta();
    
});

 // add the rule here
 $.validator.addMethod("valueNotEquals", function(value, element, arg){
  return arg !== value;
 }, "Value must not equal arg.");



$("#formulario_de_prueba" ).validate({
  onclick:false, onfocusout: false, onkeypress:false, onkeydown:false, onkeyup:false,
       rules: {
               nombre: {
                       required: true,
               },
               ape1: {
                       required: true,
               },
               edad: {
                       required: true,
                       number: true,
                       maxlength: 2,
               },
               domicilio: {
                       required: true,
               },
               municipio: {
                       valueNotEquals: "-1",
               },
               localidad: {
                       required: true,
               },
               telefono: {
                       required: true,
                       number: true,
                       maxlength: 10,
                       minlength: 7
               }
       },
       messages: {
               nombre: {
                       required: "<span class='text-danger'>Introduzca un nombre</span>",
               },
               ape1: {
                       required: "<span class='text-danger'>Introduzca apellido</span>",
               },
               edad: {
                       required: "<span class='text-danger'>Introduzca una edad</span>",
                       number: "<span class='text-danger'>Introduzca solo numeros</span>",
                       maxlength: "<span class='text-danger'>Edad no valida</span>",
               },
               domicilio: {
                       required: "<span class='text-danger'>Introduzca un domicilio</span>",
               },
               municipio: {
                       valueNotEquals: "<span class='text-danger'>Seleccione un municipio</span>",
               },
               localidad: {
                       required: "<span class='text-danger'>Introduzca una localidad</span>",
               },
               telefono: {
                       required: "<span class='text-danger'>Introduzca un telefono</span>",
                       number: "<span class='text-danger'>Introduzca solo numeros</span>",
                       maxlength: "<span class='text-danger'>Numero de telefono no valido</span>",
                       minlength: "<span class='text-danger'>Numero de telefono no valido</span>"
               }
       },
       submitHandler: function(form) {
          if($("#input_editando_encuesta").val()==""){
            obj_encuesta.set_encuesta(form);
          }else{
            obj_encuesta.edit_encuesta_save(form);
          }
          
       }
});

function Encuesta(){
  _this = this;
}

$("#btn_grabar_encuesta").click(function(e){
  e.preventDefault();
  $("#formulario_de_prueba").submit();
});

Encuesta.prototype.set_encuesta = function(form){
  var formulario = $(form).serialize();
  $.ajax({
    url: base_url+'encuesta/set_encuesta',
    type: 'POST',
    dataType: 'JSON',
    data: formulario,
    beforeSend: function(xhr) {
      Loading.loading("");
    },
  })
  .done(function(data) {
    Swal.fire(
      '¡Listo!',
      'Se inserto correctamente',
      'success'
    )
    if(data.save == 1 || data.save == 'true'){
      Swal.fire(
      '¡Listo!',
      'Se inserto correctamente',
      'success'
    )
    }else{
      Swal.fire(
      '¡Alerta!',
      'Algo salio mal',
      'error'
    )
    }
    obj_encuesta.cerrar_modal('modal_get_encuesta');
    // obj_registro.get_encuestas();
    location.reload();
  })
  .fail(function(e) {
    console.error("Al bajar la informacion"); console.table(e);
  })
  .always(function() {
    Swal.close();
  })
}

Encuesta.prototype.edit_encuesta_save = function(form){
  var formulario = $(form).serialize();
  $.ajax({
    url: base_url+'encuesta/edit_encuesta_save',
    type: 'POST',
    dataType: 'JSON',
    data: formulario,
    beforeSend: function(xhr) {
      Loading.loading("");
      obj_encuesta.cerrar_modal('modal_get_encuesta');
    },
  })
  .done(function(data) {
    if(data.update == 1 || data.update == 'true'){
      Swal.fire(
      '¡Listo!',
      'Se actualizo correctamente',
      'success'
    )
    }else{
      Swal.fire(
      '¡Alerta!',
      'Algo salio mal',
      'error'
    )

    }
    // obj_registro.get_encuestas();
    location.reload();
  })
  .fail(function(e) {
    console.error("Al bajar la informacion"); console.table(e);
  })
  .always(function() {
    // Swal.close();
  })
}

Encuesta.prototype.cerrar_modal = function(idmodal){
  $("#"+idmodal).modal('hide');//ocultamos el modal
  $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
  $('.modal-backdrop').remove();//eliminamos el backdrop del modal
}