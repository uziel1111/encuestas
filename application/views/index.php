<style type="">
.margintop60{
  margin-top: 60px;
}
.margintop100{
  margin-top: 100px;
}
.margintop150{
  margin-top: 150px;
}				
</style>
<div class="container">	
	<div class="card margintop60">
	  <div class="card-header">
	    <h5 class="card-title">¡AVISO!</h5>
	  </div>
	  <div class="card-body">
	    <p class="card-text">
	    	<b>
			La comunidad escolar se extiende a las familias. En coordinación con el Instituto
			Sinaloense para la Educación de los Adultos (ISEA) queremos apoyar a los adultos
			que no han concluido la educación básica.
			Pregunta a los alumnos y personal de la escuela si algún pariente cercano que sea
			mayor de edad (padre, madre, abuelos, tíos, primos, etc.) o conocidos no ha concluido
			la primaria o la secundaria y durante el mes de enero regístralos por este medio. Un
			representante del ISEA se pondrá en contacto con ellos.</b></p>

		<div class="row">
	      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
	        <div class="card card-signin my-5">
	          <div class="card-body">
	            <h5 class="card-title text-center">INICIO</h5>
	            <center class="mensaje-terminado"><?=$this->session->flashdata(MESSAGEREQUEST);?></center>
	            <?= form_open('Login/acceso', array('id' =>'formulario_de_login'));?>
	              <div class="form-label-group">
	              	<label for="inputEmail">CCT</label>
	                <input type="text" id="txt_cct_login" name="txt_cct_login" class="form-control" placeholder="cct">
	                
	              </div>

	              <div class="form-label-group">
	              	<label for="inputPassword">Turno</label>
	                <select class="form-control" id="txt_turno_login" name="txt_turno_login">
				      <option value="-1">SELECCIONE</option>
				      <?php foreach ($turnos as $turno):?>
				      <option value="<?= $turno['id_turno']?>"><?= $turno['turno']?></option>
				      <?php endforeach; ?>
				    </select>
	              </div>
	              <button class="btn btn-lg btn-primary btn-block text-uppercase margintop20" type="submit" id="btn_inicia_sesion_encuestas">Iniciar sesión</button>
	            <?= form_close();?>
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>
	<!-- <div class="container margintop60">
	    
	</div> -->
</div>	
<br>	
<script src="<?= base_url('assets/js/login.js') ?>"></script>