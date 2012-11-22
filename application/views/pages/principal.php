<!DOCTYPE html>
<html>
<head>
	<?php $this->load->helper('url'); ?>

	<meta charset="utf-8" />
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/style.css"/>

	<script src="js/jquery-1.7.2.min.js"></script>
	
	<?php if($logged){ ?>
	<script src="js/brain.js"></script>
	<?php } ?>

</head>
<body>
	<section id="cn">
	<?php if($logged){ ?>
		<section id="uventa">
			<form id="uventa-form">
				<div class="special-select">
					<div class="special-sbox">
						<ul >
							<li class="special-index" data-value="1">Normal</li>
							<li class="special-index" data-value="2">Pre-venta</li>
						</ul>
					</div>
					<div class="special-selectbutton">&#x25BC;</div>
				</div>
				<div class="special-bbox">
					<button class="special-button cancelity">Cancelar</button>
				</div>
			</form>
		</section>

		<div id="logout">Salir</div>

	<?php } else {?>

	<section id="fu_l">
		<form id="fufm" action="login" method="POST">
			<input type="text" name="usr" placeholder="Usuario" autocomplete="off" />
			<input type="password" name="pwd" placeholder="Contrase&ntilde;a" />
			<button id="fufm_submit">Iniciar Sesi&oacute;n</button>
		</form>
	</section>

	<?php } ?>
	</section>
</body>
</html>