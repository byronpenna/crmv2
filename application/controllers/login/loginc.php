<?php 

	class Login extends CI_Controller{		
		function __construct(){
			parent::__construct();
			session_start();
		}

		//Redirecciona al form para hacer el login
		function index(){
			$this->load->helper('url');

			$idioma = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
			$idioma = substr($idioma, 0, 2);
			if ($idioma == 'es'){
				$this->load->view("general/login/login_es");
			}
			else{
				$this->load->view("general/login/login_en");
			}
		}
		//Valida credenciales y redirecciona
		//la redirecion es por si el user o pass 
		//estan incorrectas
		function logear(){
			$this->load->model("general/loginm");

			$loginm = new Loginm();
		    if($_SERVER["REQUEST_METHOD"]=="POST"){
				$user= addslashes($_POST["username"]);
				$pass= addslashes($_POST["password"]);
				if($loginm->consultar_usuario($user, $pass)=== true){
					header("location:".site_url('general/principal'));
				}else{
					header("location:".site_url('general/login'));
				} 
			}		
		}

		//cierra sesión del usuario
		function logout(){
			session_destroy();
			header("location:".site_url('general/login'));
		}
		
	}
 ?>


<!--
<?php
	/**
	* 
	*/
/*	class Login extends CI_Controller
	{
		function __construct()
		{
			parent::__Constructor();
			$this->load->helper("url");
		}
		public function __Constructor ()
		{
			parent::__Constructor();
			$this->load->helper("url");
		}
		public function cargar ()
		{
			$this->load->model("login/loginm");
			$objecto=new LoginM();//Instanciando una clase 
			$data['1']=$_POST['txtuser'];
			$data['2']=$_POST['txtpass'];
			$objecto->cargar($data);

		}
	}
*/	
 ?>-->













<!--
<?php

/*include 'clases/data.php';
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$myusername= addslashes($_POST["username"]);
	$mypassword= addslashes($_POST["password"]);
	$sql="select * from crm_usuario inner join crm_login on crm_usuario.usu_id=crm_login.log_usu_id
	where log_username='$myusername' and log_password='$mypassword';";
	$resultado= mysql_query($sql);
	$row=  mysql_fetch_array($resultado);
	$count=  mysql_num_rows($resultado);
	//declaro mis variables de session para saber los datos de usuario y compania.
	$_SESSION['compania_id']=$row['usu_com_id'];
	$_SESSION['usu_id']=$row["usu_id"];
	$_SESSION['nombre_usuario']=$row['usu_nombres'];
	$_SESSION['usu_email1']=$row['usu_email'];
	$_SESSION['usu_email']='ucontrol.emails@gmail.com';
	//$_SESSION['usu_pass_,email']=$row['usu_pass_email'];
	$_SESSION['usu_pass_email']='bisa2013';
	$_SESSION['usu_nombres']=$row['usu_nombres'];
	$_SESSION['usu_rol_id']=$row['usu_rol_id'];
	$idrol = $_SESSION['usu_rol_id'];
	$sqlrol="select * from crm_rol where rol_id=$idrol";
	$resultadorol= mysql_query($sqlrol);
	$rowrol=  mysql_fetch_array($resultadorol);
	$_SESSION['nombrerol'] = $rowrol['rol_nombre'];
	//verificar que solo es un registro
	if($count==1){
		$queryIdioma = mysql_query("SELECT lng_abrev FROM crm_lng_lenguaje WHERE lng_com_id=$_SESSION[compania_id]");
		$filaIdioma = mysql_fetch_row($queryIdioma);
		$_SESSION['lng'] = $filaIdioma[0];
		$_SESSION['login_user']=$myusername;
		$_SESSION['active']=true;
		header("Location:index.php");
	//header("Location:mantenimiento.php");
	}
	else{
		$error="Su usuario o password son invalidos por favor verifique sus datos";
	}
}*/
?> -->