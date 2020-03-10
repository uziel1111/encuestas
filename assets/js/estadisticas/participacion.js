$(function() {
  google.charts.load("current", {packages:['corechart']});
    obj_participacion = new Participacion();
    obj_participacion.get_por_participacion();
    
});

// $("#btn_get_estadisticas").click(function(e){
//   e.preventDefault();
//   obj_rezago.get_rezago($("#edad_minima").val(), $("#edad_maxima").val(), $("#select_tipo_rezago").val(), $("#select_municipio").val());
// });

function Participacion(){
  _this = this;
}


Participacion.prototype.get_por_participacion = function (edadmin, edadmax, rezago, idmunicipio){
  var estadisticas = new Array(['Task', 'Hours per Day']);
	$.ajax({
	    url: base_url+'estadisticas/get_por_participacion',
	    type: 'POST',
	    dataType: 'JSON',
	    data: {},
	    beforeSend: function(xhr) {
	      Loading.loading("");
	    },
	  })
	  .done(function(data) {
      // estadisticas = new Array(["Element", "Cantidad", { role: "style" } ]);
      $.each(data.participacion, function( index, value ) {
        estadisticas.push(value);
      });
      console.log(estadisticas);
	    var data = google.visualization.arrayToDataTable(estadisticas);


      // var data = google.visualization.arrayToDataTable([
      //     ,
      //     ['Work',     11],
      //     ['Eat',      2],
      //     ['Commute',  2],
      //     ['Watch TV', 2],
      //     ['Sleep',    7]
      //   ]);

        var options = {
          title: 'Participación por turnos'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);

	  })
	  .fail(function(e) {
	    console.error("Al bajar la información"); console.table(e);
	  })
	  .always(function(e) {
	    Swal.close();
	  });
};