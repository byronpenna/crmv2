<?php
	$explorar = explode("/",$_SERVER['SERVER_PROTOCOL']);
	$protocol = strtolower(array_shift($explorar))."://";
	$hostname = $_SERVER['SERVER_NAME'].":";
	
	$url = $protocol.$hostname.'/ucontrol/';
?>
<body>

<div class="mainwrapper">
    
    <div class="header">
        <div class="logo">
            <img src="<?php echo base_url() ?>images/uControlB.png" alt="" />
        </div>
        <div class="headerinner">
            <ul class="headmenu">
				
				<?php if(isset($documentos_URL) ){  ?>
				<li class="odd">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="<?php echo site_url($documentos_URL); ?>">

                    <span class="head-icon head-document"></span>
					<span class="headmenu-label">Documentos</span>
                    </a>
                </li>
                <?php } ?>
				
				<?php if(isset($notas_URL) ){  ?>
                <li class="odd">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="<?php  echo site_url($notas_URL);  ?>">

                    <span class="head-icon head-notas"></span>
					<span class="headmenu-label">Notas</span>
                    </a>
                </li>
				<?php } ?>
				
				<?php if(isset($eventos_URL) ) {  ?>
				<li class="odd">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="<?php  echo site_url($eventos_URL);  ?>">

                    <span class="head-icon head-event"></span>
					<span class="headmenu-label">Eventos</span>
                    </a>
                </li>
				<?php } ?>
				
				<?php if(isset($mensajes_URL) ) { ?>
                <li class="odd">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="<?php  echo site_url($mensajes_URL); ?>">
                        <span class="head-icon head-message"></span>
						<span class="headmenu-label">Mensajes</span>
                    </a>
                </li>
                <?php } ?>
				
				<?php if(isset($historial_URL) ) { ?>
                <li class="odd">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo site_url($historial_URL);  ?>">
                        <span class="head-icon head-historial"></span>
						<span class="headmenu-label">Historial</span>
                    </a>
                </li>
				<?php } ?>
				
				<?php if(isset($cuenta_URL) ) { ?>
				<li class="odd">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="<?php echo site_url($cuenta_URL); ?>">

                    <span class="head-icon head-users"></span>
					<span class="headmenu-label">Mi cuenta</span>
                    </a>
                </li>
				<?php } ?>
				
				<?php if(isset($_SESSION["active"]) and $_SESSION["active"] === TRUE){ ?>
                <li class="right">
                    <div class="userloggedinfo">
                        <div class="userinfo">
                            <h5>
                            	<a href="#"><?php echo $_SESSION['nombre_usuario']; ?></a>
                            	<small>- <?php  echo $_SESSION["usu_email1"]; ?> -</small>
                            </h5>
                            <ul>
                                <li class="text-center"><a href="<?php echo site_url('general/login/logout'); ?>">Cerrar sesi&oacute;n</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
				<?php } ?>
            </ul><!--headmenu-->
        </div>
    </div>
	
