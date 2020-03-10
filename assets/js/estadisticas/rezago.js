$(function() {
    obj_rezago = new Rezago();
    
});

$("#btn_get_estadisticas").click(function(e){
  e.preventDefault();
  obj_rezago.get_rezago($("#edad_minima").val(), $("#edad_maxima").val(), $("#select_tipo_rezago").val(), $("#select_municipio").val());
});

function Rezago(){
  _this = this;
}


Rezago.prototype.get_rezago = function (edadmin, edadmax, rezago, idmunicipio){
	$.ajax({
	    url: base_url+'estadisticas/get_rezago',
	    type: 'POST',
	    dataType: 'JSON',
	    data: {"edadmin": edadmin, "edadmax": edadmax, "rezago": rezago, "idmunicipio": idmunicipio},
	    beforeSend: function(xhr) {
	      Loading.loading("");
	    },
	  })
	  .done(function(data) {
	    // $("#contenedor_estadisticas").append(data.vista1);
	    // contenedor_estadisticas_pie
	    // $("#contenedor_estadisticas_pie").append(data.vista2);
	    console.log(data.rezago);
	    

	    // console.log(data.rezago[0]['total'], data.rezago[0]['rezago']));
	    console.log([
        ["Element", "Cantidad", { role: "style" } ],
        data.rezago
      ]);
	    var data = google.visualization.arrayToDataTable([
        ["Element", "Cantidad", { role: "style" } ],
        [" Concluyó la primaria, pero no la secundaria", 1, "#b87333"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Density of Precious Metals, in g/cm^3",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
	  })
	  .fail(function(e) {
	    console.error("Al bajar la información"); console.table(e);
	  })
	  .always(function(e) {
	    Swal.close();
	  });
};