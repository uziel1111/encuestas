$(function() {
    obj_registro = new Registro();
    obj_registro.get_encuestas();
});



function Registro(){
  _this = this;
}

$("#btn_agregar_encuesta").click(function(e){
  e.preventDefault();
    obj_registro.get_encuesta();
});


// $("#btn_eliminar_encuesta").click(function(){
//   if(obj_tabla.id_select && obj_tabla.id_select != undefined){
//     // Swal.fire({
//     //   title: '<strong>Alerta</strong>',
//     //   icon: 'question',
//     //   html:
//     //     '¿Estas seguro de eliminar esta encuesta?',
//     //   showCloseButton: true,
//     //   showCancelButton: true,
//     //   focusConfirm: false,
//     //   confirmButtonText:
//     //     'SI',
//     //   cancelButtonText:
//     //     'NO',
//     // }).then((result) => {
//     //   if (result.value) {
//     //     obj_registro.delete_encuesta();
//     //     obj_registro.get_encuestas();
//     //   }
//     // })
//   }else{
//     Swal.fire(
//       '¡Alerta!',
//       'Seleccione una fila',
//       'warning'
//     )
//   }
  
// });

// $("#btn_editar_encuesta").click(function(e){
//   e.preventDefault();
//   // alert(obj_tabla.id_select);
//   if(obj_tabla.id_select && obj_tabla.id_select != undefined){
//     obj_registro.edit_encuesta();
//   }else{
//     Swal.fire(
//       '¡Alerta!',
//       'Seleccione una fila',
//       'warning'
//     )
//   }
// });

Registro.prototype.get_encuesta = function(){
  $.ajax({
    url: base_url+'encuesta/get_encuesta',
    type: 'POST',
    dataType: 'JSON',
    data: {},
    beforeSend: function(xhr) {
          Loading.loading("");
      },
  })
  .done(function(data) {
    var view = data.vista;
    $("#contenedor_encuesta").empty();
    $("#contenedor_encuesta").append(view);
    $("#modal_get_encuesta").modal("show");
  })
  .fail(function(e) {
    console.error("Al bajar la informacion"); console.table(e);
  })
  .always(function() {
        Swal.close()
  })
}

Registro.prototype.edit_encuesta = function(idencuesta){
  $("#contenedor_encuesta").empty();
  $.ajax({
    url: base_url+'encuesta/edit_encuesta',
    type: 'POST',
    dataType: 'JSON',
    data: {"id_encuesta": idencuesta},
    beforeSend: function(xhr) {
          Loading.loading("");
      },
  })
  .done(function(data) {
    var view = data.vista;
    
    $("#contenedor_encuesta").append(view);
    $("#modal_get_encuesta").modal("show");
    $("#nombre").val(data.respuestas[0]['respuesta']);
    $("#ape1").val(data.respuestas[1]['respuesta']);
    $("#ape2").val(data.respuestas[2]['respuesta']);
    $("#edad").val(data.respuestas[3]['respuesta']);
    $("#domicilio").val(data.respuestas[4]['respuesta']);
    $("#colonia").val(data.respuestas[5]['respuesta']);
    $("#slt_encuesta_municipio").val(data.respuestas[6]['respuesta']);
    $("#localidad").val(data.respuestas[7]['respuesta']);
    $("#telefono").val(data.respuestas[8]['respuesta']);
    let resp = data.respuestas[9]['respuesta'];
    $('input[name=rezago][value="'+resp+'"]').prop('checked', true); 
    $("#input_editando_encuesta").val(data.id_encuesta_edit);
  })
  .fail(function(e) {
    console.error("Al bajar la informacion"); console.table(e);
  })
  .always(function() {
    Swal.close();
  })
}

Registro.prototype.get_encuestas = function(){
  $.ajax({
    url: base_url+'encuesta/get_encuestasxcct',
    type: 'POST',
    dataType: 'JSON',
    data: {},
    beforeSend: function(xhr) {
      Loading.loading("");
    },
  })
  .done(function(data) {
    $('#id_tabla_encuestas tbody').empty();
    $('#id_tabla_encuestas tbody').append(data.str_table);
    // obj_tabla.seleccion('id_tabla_encuestas');
    obj_tabla.id_select = undefined;

  })
  .fail(function(e) {
    console.error("Al bajar la informacion"); console.table(e);
  })
  .always(function() {
      Swal.close();
  })
}

Registro.prototype.delete_encuesta = function(idencuesta){
  Swal.fire({
      title: '<strong>Alerta</strong>',
      icon: 'question',
      html:
        '¿Estas seguro de eliminar esta encuesta?',
      showCloseButton: true,
      showCancelButton: true,
      focusConfirm: false,
      confirmButtonText:
        'SI',
      cancelButtonText:
        'NO',
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: base_url+'encuesta/delete_encuesta',
          type: 'POST',
          dataType: 'JSON',
          data: {"id_encuesta": idencuesta},
          beforeSend: function(xhr) {
            Loading.loading("");
          },
        })
        .done(function(data) {
          Swal.fire(
            '¡Listo!',
            'Se elimino correctamente',
            'success'
          )
          // obj_tabla.id_select = undefined;
          location.reload();
        })
        .fail(function(e) {
          console.error("Al bajar la informacion"); console.table(e);
        })
        .always(function() {
          // Swal.close();
        })
        
      }
    })
  
}