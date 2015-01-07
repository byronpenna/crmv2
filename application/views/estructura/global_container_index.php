<!-- contenedor global -->
<div id="global-container">

	<!-- Lateral -->
	<?php
	include_once("lateral.php");
	?>
	
	<!-- Right panel --><!-- Desde aqui -->
	<?php
		if( !(isset($catalogoCodig) && $catalogoCodig == true) ){ 
	?>
	<div class="rightpanel">
		<!-- pageheader -->
			<div class="pageheader">

				<div class="searchbar">
					<!-- <img style="width:100px; padding-top:12px; padding-right:10px;" src="images/logoBISA.png" alt="" /> -->
					<!-- Middle navigation standard -->
					
					<ul class="midnav">
						<?php if(isset($documentos_URL) ){ ?>
							<li><a href="<?php echo site_url($documentos_URL); ?>" title="Documentos"><img src="images/icons/color/document-library.png" alt="" /></a></li>
						<?php } ?>
						
						<?php if(isset($notas_URL) ) { ?>
							<li><a href="<?php echo site_url($notas_URL); ?>" title="Notas"><img src="images/icons/color/archives.png" alt="" /></a></li>
						<?php } ?>
						
						<?php if(isset($eventos_URL) ) {  ?>
							<li><a href="<?php echo site_url($eventos_URL); ?>" title="Eventos"><img src="images/icons/color/flag.png" alt="" /></a></li>
						<?php } ?>
						
						<?php if(isset($historial_URL) ) { ?>
							<li><a href="<?php echo site_url($historial_URL); ?>" title="Historial"><img src="images/icons/color/publish.png" alt="" /></a></li>
						<?php } ?>
						<?php if(isset($hide_menu) ) { ?>
							<li><a href="#" title="Ocultar men&uacute;"><img style="width:50%;height:50%;" src="<?php echo site_url(); ?>images/icons/usernav/sidebar.png" alt="" /></a></li>
						<?php } ?>
					</ul>
					
					<!-- /middle navigation standard -->
					<div style="clear:both;"></div>
				</div>
				
				<div class="pageicon"><span class="<?php if( isset($pageicon) ) echo $pageicon; else echo "iconfa-home"; ?>"></span></div>
				<div class="pagetitle">
					
					<!-- Titulo dinamico -->
					<h1><?php if(isset($titulo) ) echo $titulo; else echo "T&iacute;tulo"; ?></h1>
					
				</div>
				
				<div style="clear:both;"></div>
				
			</div>
		
		<!-- contenido principal -->
		<div class="maincontent">
		
			<!-- maincontainer -->
			<div class="maincontentinner">
	<!-- Hasta aqui -->
	<?php
		}else{
			$data = array(
				'cat' => $cat,
				'expcli' => $expcli 
				);
			$this->load->view("estructura/pageHeaderCatalogo",$data);
		} 
	?>
				<!-- row fluid -->
				<div class="row-fluid">
					
					<!-- row fluid -->					
					<div id="dashboard-left" class="span12">