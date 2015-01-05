<?php
include 'clases/data.php';
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
	//$_SESSION['usu_pass_email']=$row['usu_pass_email'];
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
}
?>