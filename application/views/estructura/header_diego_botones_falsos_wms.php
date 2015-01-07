<!DOCTYPE html>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<!-- titulo dinamico -->
<title>Ucontrol</title>

<link rel="stylesheet" href="<?php echo base_url() ?>css/style.default.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url() ?>css/style.navyblue.css" type="text/css" />

<!-- estilos especificos -->
<?php 
if( isset($cssFile) AND  sizeof($cssFile) > 0){
	foreach ($cssFile as $key => $value) {
		echo '<link rel="stylesheet" media="all" type="text/css" href="'.base_url().$value.'" />';
	}
}
?>

<link rel="stylesheet" href="<?php echo base_url() ?>css/responsive-tables.css">
<script type="text/javascript" src="<?php echo base_url() ?>js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/modernizr.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/jquery.cookie.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/jquery.uniformDiegoBotonesFalsos.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/flot/jquery.flot.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/flot/jquery.flot.resize.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/responsive-tables.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/custom.js"></script>

<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->

<!--LOS JS PARA LOS TOOLTIP CON ESTILOS-->
<script type="text/javascript" src="<?php echo base_url() ?>jquery/spinners/spinners.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>jquery/tipped/tipped.js"></script>

<!--ESTILO PARA LOS TOOLTIP DE MIS PANTALLAS-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/tipped/tipped.css"/>

<!-- scripts especificos -->
<?php 
if( isset($scriptFile) AND  sizeof($scriptFile) > 0){
	foreach ($scriptFile as $key => $value) {
		echo '<script type="text/javascript" src="'.base_url().$value.'"></script>';
	}
}
?>


</head>
