
<div class="container">

  <div class="row no-gutters justify-content-md-center mt-4">
    <div class="col-md-5 info-img-1 shadow text-justify">
	<h5 class="card-title"><i class="far fa-comment"></i> Aviso</h5>
        <p class="card-text">
			La comunidad escolar se extiende a las familias. En coordinación con el Instituto
			Sinaloense para la Educación de los Adultos (ISEA) <b>queremos apoyar a los adultos
			que no han concluido la educación básica</b>.
		</p>
        <p class="card-text">
			Pregunta a los alumnos y personal de la escuela si algún pariente cercano que sea
			mayor de edad <b>(padre, madre, abuelos, tíos, primos, etc.)</b> o conocidos no ha concluido
			la primaria o la secundaria y durante el mes de enero regístralos por este medio. Un
			representante del ISEA se pondrá en contacto con ellos.
		</p>
    </div>
    <div class="col-md-5 info-txt-1 shadow">
	  <h5 class="card-title text-center"><i class="fas fa-sign-in-alt color-1"></i> Ingresar</h5>
	            <center class="mensaje-terminado"><?=$this->session->flashdata(MESSAGEREQUEST);?></center>
	            <?= form_open('Login/acceso', array('id' =>'formulario_de_login'));?>
	              <div class="form-label-group">
	              	<label for="inputEmail">CCT</label>
	                <input type="text" id="txt_cct_login" name="txt_cct_login" class="form-control" placeholder="cct">

	              </div>

	              <div class="form-label-group mt-3">
	              	<label for="inputPassword">Turno</label>
	                <select class="form-control" id="txt_turno_login" name="txt_turno_login">
				      <option value="-1">SELECCIONE</option>
				      <?php foreach ($turnos as $turno):?>
				      <option value="<?= $turno['id_turno']?>"><?= $turno['turno']?></option>
				      <?php endforeach; ?>
				    </select>
				  </div>
				  <hr/>
	              <button class="btn btn-lg btn-success btn-block text-uppercase rounded-pill mt-3" type="submit" id="btn_inicia_sesion_encuestas">Iniciar sesión</button>
	            <?= form_close();?>

    </div>
  </div>



	<!-- <div class="container">

	</div> -->
</div>

<script src="<?= base_url('assets/js/login.js') ?>"></script>
