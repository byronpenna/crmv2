<?php 
	
	class Loginm extends CI_Model{
		
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		function consultar_usuario($user, $pass){
			$pass= md5($pass);
			$datos = new stdClass();
			$datos->validacion = false;		
			$sql="SELECT * FROM conf_usuario cu INNER JOIN crm_login cl ON cu.cus_id=cl.clog_cus_id_fk  
			WHERE cl.clog_username='".$user."' AND cl.clog_password='".$pass."'";
			//Verificamos si el usuario existe y su password es correcta
			$this->db->trans_start();
				$query = $this->db->query($sql);
				if ($query->num_rows() > 0 && $query->num_rows() == 1){
         		$datos->validacion = true;
         		$query = $query->result();
      			}
			$this->db->trans_complete();
			//verificacion completa
			if($datos->validacion == true){
			foreach ($query as $key => $datosusuario) {
				$_SESSION['compania_id']= $datosusuario->usu_com_id;
				$_SESSION['cus_id']= $datosusuario->cus_id;
				$_SESSION['cus_nombre']= $datosusuario->cus_nombre;
					//Estas 2 lineas desapareceran por el momento
				//$_SESSION['usu_email1']=$datosusuario->usu_email;
				//$_SESSION['usu_email']='ucontrol.emails@gmail.com';

				//$_SESSION['usu_pass_email']=$datosusuario['usu_pass_email'];
				//$_SESSION['usu_pass_email']='bisa2013';
				$_SESSION['usu_nombres']=$datosusuario->usu_nombres;
				$_SESSION['cus_rol_id_fk']=$datosusuario->cus_rol_id_fk;
				$idrol = $_SESSION['cus_rol_id_fk'];		
				//Verificamos y agregamos el rol
				$sql="SELECT * FROM conf_rol WHERE rol_id=$idrol";
				$this->db->trans_start();
					$query2 = $this->db->query($sql);
					$query2 = $query2->result();
				$this->db->trans_complete();
				//verificacion completa
				foreach ($query2 as $key => $datosrol) {
					$_SESSION['rol_nombre'] = $datosrol->rol_nombre;
				}

				//Verificamos lenguaje
				$sql = "SELECT cid_nombre FROM conf_idioma cid INNER JOIN conf_sucursal csu 
				ON cid.cid_d=csu.csu_cid_id_fk
				WHERE cid.cid_id=$_SESSION[cco_id]";
				$this->db->trans_start();
					$query3 = $this->db->query($sql);
					$query3 = $query3->result();
				$this->db->trans_complete();
				//verificacion completa
				foreach ($query3 as $key => $datosidioma) {
					$_SESSION['cid_nombre'] = $datosidioma->cid_nombre;
					$_SESSION['clog_username']=$user;
					$_SESSION['active']=true;	
				}
			}
		}
		return $datos->validacion;	
		}
	}
 ?>

<!--
<?php 
	/**
	* 
	*/
/*	class LoginM extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		public function getLogin(){
			$this->db->trans_start();
			$query=$this->db->query("SELECT clog_username, clog_password FROM crm_login WHERE clog_password='$clog_password'");           
			$registro=$query->result();
		}
	}/*
 ?> -->