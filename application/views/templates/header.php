<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> ENCUESTAS </title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url('assets/css/style.css')?>">
  
   <script src="<?=base_url('assets/jquery/jquery-3.2.1.min.js')?>"></script>
  <script src="<?=base_url('assets/jquery/jquery.validate.js')?>"></script>
  

  <link href="<?= base_url('assets/fonts/fontawesome5/css/all.css') ?>" rel="stylesheet" media="screen">
  <link rel="shortcut icon" href="<?= base_url('assets/img/logosin.png') ?>" />
	<script type="text/javascript">
  var base_url = live_url = "<?= base_url() ?>";
</script>

</head>

<body>

<div class="container-fluid color-bar fixed-top clearfix">
        <div class="row" >
          <div class="col-lg-1 col-2 bg-color-3"></div>
          <div class="col-lg-1 col-2 bg-color-3"></div>
          <div class="col-lg-1 col-2 bg-color-3"></div>
          <div class="col-lg-1 col-2 bg-color-3"></div>
          <div class="col-lg-1 col-2 bg-color-3"></div>
          <div class="col-lg-1 col-2 bg-color-3"></div>

		  <div class="col-1 bg-color-3 d-none d-lg-block"></div>
          <div class="col-1 bg-color-3 d-none d-lg-block"></div>
          <div class="col-1 bg-color-3 d-none d-lg-block"></div>
          <div class="col-1 bg-color-3 d-none d-lg-block"></div>
          <div class="col-1 bg-color-3 d-none d-lg-block"></div>
          <div class="col-1 bg-color-3 d-none d-lg-block"></div>
		
        </div>
      </div>
<div class="header bg-dark">
	<div class="container">
		<div class="row">
    <?php if(isset($cct)) :?>
			<div class="col-6">
      <i class="fas fa-genderless color-animation"></i> <span class="text-white"><strong> <?= $cct['cct'] ?></strong>   <i class="fas fa-genderless color-animation"></i>ESCUELA: <?= $cct['nombre_ct'] ?></span>
			</div>
			<div class="col-6 text-right">
				<div class="btn-group">
				  <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-school"></i>
				  </button>
				  <div class="dropdown-menu dropdown-menu-right">
				  <div class="arrow-up"></div>
					<p>
						<strong><?= $cct['nombre_ct'] ?></strong><br>
						<?= $cct['cct'] ?>
						<div class="dropdown-divider"></div>
						<span class="align-middle"><?= $cct['turno'] ?></span>
						<i class="fas fa-adjust align-middle" aria-hidden="true"></i>
						<div class="dropdown-divider"></div>			  
											  
					</p>

				  </div>
				</div>
        <a class="btn btn-secondary rounded-pill btn-sm" href="<?= site_url("Login/cerrar_sesion")?>">CERRAR SESIÓN</a>
      </div>
      <?php else : ?>
			<div class="col-6">
     BIENVENIDO
			</div>      
      <?php endif; ?>
		</div>        <!--/row-->
	</div>    <!--container-->
</div>



  <!-- Fixed navbar -->

  <nav class="navbar navbar-expand-md navbar-light bg-light shadow">
  <div class="container d-flex justify-content-between">
  
    <a class="navbar-brand"><img src="<?php echo base_url('assets/img/censo-logo.png') ?>" class="img-fluid" alt="Escudo Sinaloa"></a>
    <div class="justify-content-end">
   
    </div>
   <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
    
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Opción 1</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Opción 2</a>
        </li>
      </ul>
       <div class="mt-2 mt-md-0">
        Usuario <i class="far fa-user-circle"></i>
      </div> 
    </div>-->
    </div>

  </nav>





<!-- </header> -->
