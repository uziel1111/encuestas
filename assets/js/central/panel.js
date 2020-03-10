$(document).ready(function () {
		obj_cfcentral = new Centraluser();
});

$("#btn_cortecentral_exportarexcel").click(function(e){
		e.preventDefault();
		obj_cfcentral.get_reporte_excel();
});

// $("#btn_genera_estadisticas").click(function(e){
// 		e.preventDefault();
// 		obj_cfcentral.get_estadisticas();
// });

$("#tipo_estadisticas").change(function(){
	obj_cfcentral.get_tipo_estadistica();
});

function Centraluser(){
   _thisccentral = this;
}

Centraluser.prototype.get_reporte_excel = function (){
	var form = document.createElement("form");
	  form.name = "form_corte_central_reporteexcel";
	  form.id = "form_corte_central_reporteexcel";
	  form.method = "POST";
	  form.target = "_blank";
	  form.action =base_url+"Reportes/get_reporte_excel";
	  document.body.appendChild(form);
	  form.submit();
};

// Centraluser.prototype.get_estadisticas = function (form){
// var formulario = $(form).serialize();
//   $.ajax({
//     url: base_url+'estadisticas/get_estadisticas',
//     type: 'POST',
//     dataType: 'JSON',
//     data: formulario,
//     beforeSend: function(xhr) {
//       Loading.loading("");
//     },
//   })
//   .done(function(data) {
//     $("#contenedor_estadisticas").append(data.vista1);
//     // contenedor_estadisticas_pie
//     $("#contenedor_estadisticas_pie").append(data.vista2);
//   })
//   .fail(function(e) {
//     console.error("Al bajar la información"); console.table(e);
//   })
//   .always(function(e) {
//     Swal.close();
//   })
// };

Centraluser.prototype.get_tipo_estadistica = function (){
	var tipo_estadistica = $("#tipo_estadisticas").val();
  $("#contenedor_formulario_por_tipo").empty();
  $.ajax({
    url: base_url+'estadisticas/get_tipo_estadisticas',
    type: 'POST',
    dataType: 'JSON',
    data: {"tipo_estadisticas": tipo_estadistica},
    beforeSend: function(xhr) {
      Loading.loading("");
    },
  })
  .done(function(data) {
    $("#contenedor_formulario_por_tipo").append(data.vista);
  })
  .fail(function(e) {
    console.error("Al bajar la información"); console.table(e);
  })
  .always(function(e) {
    Swal.close();
  })
};