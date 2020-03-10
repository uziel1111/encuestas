$(function() {
  google.charts.load("current", {packages:['corechart']});
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
  var estadisticas = new Array(["Element", "Cantidad", { role: "style" } ]);
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
      // estadisticas = new Array(["Element", "Cantidad", { role: "style" } ]);
      $.each(data.rezago, function( index, value ) {
        estadisticas.push(value);
      });
	    var data = google.visualization.arrayToDataTable(estadisticas);
      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Numero de personas por tipo de rezago",
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