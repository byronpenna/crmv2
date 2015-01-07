<?php
$ci = & get_instance();
$ci->load->database();
// echo "<h1>SERVIDOR ES: ".$ci->db->hostname."</h1>";
$protocol = strtolower(array_shift(explode("/",$_SERVER['SERVER_PROTOCOL'])))."://";
$hostname = $_SERVER['SERVER_NAME'];
/*---------------------------------------*/
$url = $protocol.$hostname.'/ucontrol/';
$url_ci = $protocol.$hostname.'/ucontrol/ci/index.php/';

$link = mysqli_connect($ci->db->hostname, $ci->db->username,$ci->db->password, $ci->db->database);
$queryPadre = mysqli_query($link,"SELECT distinct * FROM crm_menu m 
								INNER JOIN crm_rol_menu_submenu ON crm_rol_menu_submenu.menu_id = m.menu_id
								WHERE rol_id= $_SESSION[usu_rol_id]
								GROUP BY m.menu_id");
// ---------------------------------------------------------------------
// $sql = 	"SELECT distinct * FROM crm_menu m 
// 		INNER JOIN crm_rol_menu_submenu ON crm_rol_menu_submenu.menu_id = m.menu_id
// 		WHERE rol_id= 32
// 		GROUP BY m.menu_id";
// $query = $this->db->query($sql);
// $query = $query->result();
// print_r($query);
?>

<div class="leftpanel style=height:90%">
	<div class="leftmenu">  
		<ul class="nav nav-tabs nav-stacked">
			<li class="active"><a href="<?php echo $url;?>index.php"><span class="iconfa-laptop"></span> Inicio </a></li>
			<?php 
				$anterior='';
				while($filaPadre = mysqli_fetch_array($queryPadre,MYSQLI_BOTH)){
					if($anterior!=$filaPadre['menu_id']){
						$textoMenu = 'menu_titulo_'.$_SESSION['lng']?>
						<li class="dropdown"><a href="<?php echo $filaPadre['menu_enlace']; ?>"><span class="<?php echo $filaPadre['menu_icono']; ?>"></span><?php echo $filaPadre[$textoMenu]; ?></a>
							<ul><?php
								$padre = $filaPadre['menu_id'];
								$queryHijo = mysqli_query($link,"SELECT * FROM crm_submenu
															INNER JOIN crm_rol_menu_submenu ON crm_rol_menu_submenu.submenu_id=crm_submenu.sub_id
															WHERE rol_id= $_SESSION[usu_rol_id] AND crm_rol_menu_submenu.menu_id=$padre");
								while($filaHijo = mysqli_fetch_array($queryHijo,MYSQLI_BOTH)){
									$extension = strrpos($filaHijo['sub_enlace'], '.php');
									$textoSubMenu = 'sub_titulo_'.$_SESSION['lng'];
									if($extension==true){?>
										<li><a href="<?php echo $url.$filaHijo['sub_enlace']; ?>"><?php echo $filaHijo[$textoSubMenu];?> </a></li><?php
									}
									else{?>
										<li><a href="<?php echo $url_ci.$filaHijo['sub_enlace']; ?>"><?php echo $filaHijo[$textoSubMenu];?> </a></li><?php
									}
								}?>
							</ul>
						</li><?php
				}
				$anterior=$filaPadre[0];
			}?>
		</ul>
	</div><!--leftmenu-->
</div><!-- leftpanel -->