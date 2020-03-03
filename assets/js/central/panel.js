$(document).ready(function () {
		obj_cfcentral = new Centraluser();
});

$("#btn_cortecentral_exportarexcel").click(function(e){
		e.preventDefault();
		obj_cfcentral.get_reporte_excel();
});

$("#btn_genera_estadisticas").click(function(e){
		e.preventDefault();
		obj_cfcentral.get_estadisticas();
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

Centraluser.prototype.get_estadisticas = function (form){
var formulario = $(form).serialize();
  $.ajax({
    url: base_url+'estadisticas/get_estadisticas',
    type: 'POST',
    dataType: 'JSON',
    data: formulario,
    beforeSend: function(xhr) {
      Loading.loading("");
    },
  })
  .done(function(data) {
    $("#contenedor_estadisticas").append(data.vista1);
    // contenedor_estadisticas_pie
    $("#contenedor_estadisticas_pie").append(data.vista2);
  })
  .fail(function(e) {
    console.error("Al bajar la información"); console.table(e);
  })
  .always(function(e) {
    Swal.close();
  })
};