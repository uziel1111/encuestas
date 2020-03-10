<!-- <form> -->
  <div class="row">
    <div class="col-2">
      <div class="form-group">
        <label for="edad_minima">Edad minima</label>
        <input type="number" class="form-control" id="edad_minima" value="15" min="15" max="99">
      </div>
    </div>
    <div class="col-2">
      <div class="form-group">
        <label for="edad_maxima">Edad maxima</label>
        <input type="number" class="form-control" id="edad_maxima" value="30" min="15" max="99">
      </div>
    </div>
    <div class="col-4">
      <div class="form-group">
        <label for="exampleFormControlSelect1">Rezago</label>
        <select class="form-control" id="select_tipo_rezago">
          <option>SELECCIONE</option>
          <option value="1">Concluyó la primaria, pero no la secundaria</option>
          <option value="2">No sabe leer ni escribir</option>
          <option value="3">Lee y escribe, pero no ha concluido la primaria</option>
          <option value="4">Todas</option>
        </select>
      </div>
    </div>
    <div class="col-2">
      <div class="form-group">
        <label for="exampleFormControlSelect1">Municipio</label>
        <select class="form-control" id="select_municipio">
          <option value="-1">SELECCIONE</option>
          <?php foreach ($municipios as $municipio): ?>
            <option value="<?=$municipio['id_municipio']?>"><?=$municipio['municipio']?></option>
          <?php endforeach ?>
        </select>
      </div>
    </div>
    <div class="col-2">
      <button class="float-right btn btn-md btn-success rounded-pill" id="btn_get_estadisticas"><i class="fas fa-plus-circle"></i> Ver estadisticas</button>
    </div>
  </div>
<!-- </form> -->
<center>
<div id="columnchart_values" style="width: 900px; height: 300px;"></div>
</center>
<script src="<?= base_url('assets/js/estadisticas/rezago.js') ?>"></script>