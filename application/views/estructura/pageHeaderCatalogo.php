<?php
// include 'clases/nueva.php';
$ci = & get_instance();
$ci->load->database();	
$link = mysqli_connect($ci->db->hostname, $ci->db->username,$ci->db->password, $ci->db->database);
$expcli = $_SESSION['idcatalogo'];
$cat 	= $_SESSION['cat'];

$cat_id = mysqli_query($link,"Select cat_id from crm_cat_catalogo
						where cat_nombre = '$cat'");
$cat_id = mysqli_fetch_array($cat_id,MYSQLI_BOTH);
$cat_id = $cat_id['cat_id'];

$queryNombre= mysqli_query($link,"Select exp_valor from crm_exp_expediente E 
								INNER JOIN crm_atr_atributo A ON E.exp_atr_id = A.atr_id 
								WHERE exp_cat_id = $cat_id
								AND exp_id= $expcli
								AND atr_area='Encabezado'
								AND exp_valor <> 'soy label'
								order by exp_atr_id asc limit 2");
								
$queryApellido= mysqli_query($link,"Select exp_valor from crm_exp_expediente E 
								INNER JOIN crm_atr_atributo A ON E.exp_atr_id = A.atr_id 
								WHERE exp_cat_id = $cat_id 
								AND exp_id= $expcli
								AND atr_nombre like '%Apellido%' 
								AND atr_area='Encabezado'");
								
$filaCliente = mysqli_fetch_row($queryNombre);
$filaApellido = mysqli_fetch_row($queryApellido);
$Nombre = $filaCliente[0];
$Apellido = $filaApellido[0];
?>

<div class="row-fluid">
	
</div>

<div class="rightpanel">
	<div class="pageheader">
		<?php
			$url = base_url();
			$url = str_replace("ci/","", $url);
		?>
		<div class="pull-right">
			<ul class="inline">
				<li>
					<span class="head-icon"><a onclick="history.back()"><img style="float:right;" src=<?php echo base_url("images/icons/regresar.png") ?> /></a></span>
				</li>
				<li>
					<!-- "indexNotasCatalogo.php?cat=<?php echo $cat; ?>" -->
					<span class="head-icon"><a href=<?php echo $url."indexNotasCatalogo.php?cat=".$cat." "; ?> ><img style="float:right;" src=<?php echo base_url("images/icons/bnotas.png") ?> /></a></span>
				</li>
				<li>
					<!-- "indexDocumentosCatalogo.php?cat=<?php echo $cat; ?>" -->
					<span class="head-icon"><a href=<?php echo $url."indexDocumentosCatalogo.php?cat=".$cat." "; ?> ><img style="float:right;" src=<?php echo base_url("images/icons/bdocumentos.png") ?> /></a></span>
				</li>
				<li>
					<!-- "indexEventosCatalogo.php?cat=<?php echo $cat; ?>" -->
					<span class="head-icon"><a href=<?php echo $url."indexEventosCatalogo.php?cat=".$cat." "; ?> ><img style="float:right;" src=<?php echo base_url("images/icons/beventos.png") ?> /></a></span>
				</li>
				<li>
					<!-- "indexHistorialCatalogo.php?cat=<?php echo $cat; ?>" -->
					<span class="head-icon"><a href=<?php echo $url."indexHistorialCatalogo.php?cat=".$cat." "; ?> ><img style="float:right;" src=<?php echo base_url("images/icons/bhistorial.png") ?> /></a></span>
				</li>
				<li>
					<!-- "ci/index.php/exp_maps/index/<?php echo $expcli; ?>" -->
					<span class="head-icon"><a href=<?php echo site_url("exp_maps/index/".$expcli." "); ?> ><img style="float:right;" src=<?php echo base_url("images/icons/map.png") ?> /></a></span>
				</li>
			</ul>
		</div>
		<div class="pageicon"><span class="<?php if( isset($pageicon) ) echo $pageicon; else echo "iconfa-map-marker"; ?>"></span></div><br>
			<div class="pagetitle">
				<h1><?php 
					if(isset($tituloPagina)){
						echo $tituloPagina;
					} 
					else{
						echo $nombrePagina;
					}  ?></h1>
			</div>

		</div><!--pageheader-->
		<ul class="breadcrumbs">
			<li><a href="indexCatalogo.php?sub=<?php echo $cat; ?>"><i class="iconfa-home"></i>Listado de <?php echo $cat; ?></a> <span class="separator"></span></li>
			<li><?php echo $cat; ?>: <?php echo $Nombre.' '.$Apellido;?></li>
		</ul>
		<div class="maincontent">
			<div class="maincontentinner">