
<div class="container">
	<div class="row">
      <div class="col-4 mb-4 float-left">
      	<div class="form-group">
		    <label for="tipo_estadisticas">Tipo de estadistica</label>
		    <select class="form-control" id="tipo_estadisticas">
		      <option value="-1">SELECCIONE</option>
		      <option value="1">Rezago</option>
		      <option value="2">Por participación</option>
		      <option value="3">Por nivel</option>
		      <option value="4">Por definir...</option>
		    </select>
		  </div>
      </div>
      <div class="col-4 mb-4">
      </div>
	    <div class="col-4 mb-4 ">
	      <button class="float-right btn btn-md btn-success rounded-pill" id="btn_cortecentral_exportarexcel"><i class="fas fa-plus-circle"></i> Reporte</button>
	    </div>
	</div>
<!-- 	<div class="row">
	    <div class="col-4 mb-4 ">
	      <button class="float-right btn btn-md btn-success rounded-pill" id="btn_genera_estadisticas"><i class="fas fa-plus-circle"></i> Ver estadisticas</button>
	    </div>
	</div> -->

	<div class="row">
	     <div id="contenedor_formulario_por_tipo">
	    </div>
	</div>

<!-- 	<div class="row">
		<div class="col-4 mb-4 ">
	      <div id="contenedor_estadisticas">
	    	</div>
	    </div>
	    <div class="col-4 mb-4 ">
	      <div id="contenedor_estadisticas_pie">
	    </div>
	    </div>
	</div> -->
</div>
<script src="<?= base_url('assets/js/central/panel.js') ?>"></script>