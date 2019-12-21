<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> ENCUESTAS </title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url('assets/css/mystiles.css')?>">
	
  <script src="<?=base_url('assets/jquery/jquery-3.2.1.min.js')?>"></script>
  <script src="<?=base_url('assets/jquery/jquery.validate.js')?>"></script>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="<?=base_url('assets/js/load/loading.js')?>"></script>
  <link href="<?= base_url('assets/fonts/fontawesome5/css/all.css') ?>" rel="stylesheet" media="screen">
  <link rel="shortcut icon" href="<?= base_url('assets/img/logosin.png') ?>" />
	<script type="text/javascript">
  var base_url = live_url = "<?= base_url() ?>";
</script>

</head>
  <body>
    <!-- <header> -->
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="<?= base_url() ?>">
          <img width="120" height="120"  src="<?= base_url('assets/img/logosin.png') ?>" alt="">
        </a>
        <h4>Censo de Población Adulta sin Educación Básica en Sinaloa</h4>
  <!-- <a class="navbar-brand" href="#">Censo de Población Adulta sin Educación Básica en Sinaloa </a> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
    </ul>
    <?php if(isset($cct)) :?>
    <span class="navbar-text">
      <i class="fas fa-user color-2 margintop15"> Nombre escuela: <?= $cct['nombre_ct'] ?> </i>&nbsp;
      <br>  
      <i class="fas fa-sun color-2 margintop15"> Turno: <?= $cct['turno'] ?> </i>&nbsp;
      <br>  
      <i class="fas fa-award color-2 margintop15"> Cct: <?= $cct['cct'] ?> </i>&nbsp;
      <a class="btn btn-secondary btn-sm mt-2 float-right" href="<?= site_url("Login/cerrar_sesion")?>">Cerrar Sesión</a>
    </span>
    <?php endif; ?>
  </div>
</nav>

<!-- </header> -->
