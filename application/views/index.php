
<div class="container">

  <div class="row no-gutters justify-content-md-center mt-4">
    <div class="col-md-5 info-img-1 shadow text-justify">

        <p class="card-text font-weight-bold">
			La educación debe ser una oportunidad para todos a lo largo de la vida. En la Secretaría de Educación Pública y Cultura de Sinaloa, y el Instituto Sinaloense para la Educación de los Adultos (ISEA), queremos apoyar a todas las personas que no han concluido la educación básica.
		</p>
        <p class="card-text font-weight-bold">
			La escuela es una instancia privilegiada para ayudar a los adultos en este objetivo. Por ello, invitamos a toda la comunidad escolar a que pregunte a los alumnos y personal de la escuela si tienen algún familiar, amigo o conocido que sea mayor de edad y que no haya concluido la primaria o la secundaria. No importa en qué parte del estado viva esa persona.
		</p>
		<p class="card-text font-weight-bold">
			Lo único que hay que hacer es registrar a estas personas en esta aplicación, para que un representante del ISEA se ponga en contacto con ellos. Al registrarla, le habrás ayudado a esa persona a alcanzar una meta que seguramente tendrá un impacto muy positivo en su vida y en la de su familia.
		</p>
		<p class="card-text font-weight-bold">
			¡Todos son bienvenidos!
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
