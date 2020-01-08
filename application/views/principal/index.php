
<div class="container">
	<div class="row justify-content-end">
	    <div class="col-auto mb-2">
	      <button class="btn btn-md btn-success rounded-pill" id="btn_agregar_encuesta"><i class="fas fa-plus-circle"></i> Agregar</button>
	      <!-- <button class="btn btn-md btn-secondary" id="btn_editar_encuesta">Editar</button>
	      <button class="btn btn-md btn-danger"  id="btn_eliminar_encuesta">Eliminar</button> -->
	    </div>
	</div>
	<div class="row">
		<div class="col" id="container_table_encuestas">
			<table class='table table-striped table-hover table-scrolled scroll-dark shadow' id='id_tabla_encuestas'>
              <thead class='thead-dark'>
                <tr>
                  <th scope='col'>#</th>
                  <th scope='col'>Nombre</th>
                  <th scope='col'>Edad</th>
                  <th scope='col'>Domicilio</th>
                  <th scope='col'>Municipio</th>
                  <th scope='col'>Rezago</th>
                  <th scope='col'>Editar</th>
                  <th scope='col'>Eliminar</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
		</div>
	</div>
</div>



<div id='modal_get_encuesta' class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" data-backdrop="static"
   data-keyboard="false" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Encuesta</h5>
        <button type="button" class="close" id="btn_cerrar_event" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="contenedor_encuesta">

      </div>
      <div class="container">
        <div class="row">
          <div class="col">
            <button class="btn btn-sm btn-primary float-right" id="btn_grabar_encuesta" type="submit" >Grabar</button>
          </div>
        </div>
      </div>
      <br>
    </div>
  </div>
</div>