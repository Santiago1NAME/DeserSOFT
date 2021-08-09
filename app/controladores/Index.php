<?php

/**
 */
use PHPMailer\PHPMailer\PHPMailer;
use vendor\PHPMailer\PHPMailer\Exception;
class Index extends Controlador {
	private $opcion;
	/**
	 * @access public
	 */
	function __construct() {
		parent::asignacionModelo('usuario');
	}
	public function inicio()
	{
		parent::vista('inicio');
	}
	public function iniciarSesion() {
		// Not yet implemented
		$data=$this->modelo->consultarUsuario($_POST['dni']);
		if ($data != null) {
			if(password_verify($_POST['contrasenia'], $data->contrasenia)){
				$token = md5(rand());
				//$_SESSION[$data->tip_rol] = ['nombre' => $data->nombres.' '.$data->apellidos, 'id' => $data->id_usuario, 'rol' => $data->tip_rol, 'imagen' => $data->imagen, 'num'=>$data->num_documento];
				$_SESSION[$_COOKIE["PHPSESSID"]] =['nombre' => $data->nombres.' '.$data->apellidos, 'id' => $data->id_usuario, 'rol' => $data->tip_rol, 'imagen' => $data->imagen, 'num'=>$data->num_documento];
				$this->cliente(true, $token);
				$this->entrada($data->tip_rol, $token, $_POST['dni']);
			}
			else{
				header('Location: '.RUTA_URL.'index/inicio');
			}
		}
		else{
			header('Location: '.RUTA_URL.'index/inicio');
		}
	}
	
	function entrada($nom, $token, $id){
		//$this->modelo->asignarToken($token, $id);
		header('Refresh:1; url='.RUTA_URL.$nom.'/vistaConsultar');
	}
	public function validar() {
		// Not yet implemented
		$valor=false;
		if ($_SERVER['REQUEST_METHOD']) {
			$data=$this->modelo->consultarUsuario($_SESSION[$_COOKIE["PHPSESSID"]]['id']);
			if ($data != null) {
				if(password_verify($_POST['passAc'], $data->contrasenia)){
					$valor=true;				
				}
			}
		}
		
		// echo json_encode(['valor' => $valor]);
	}
	
	/**
	 * @access public
	 */
	public function cliente($opt, $token = ''){
		require_once( '../app/vistas/estructura/header.php');
		if ($opt) {
			echo '<script>
						localStorage.setItem("token", "'.$token.'");
				</script>';
		} else {
			echo '<script>
						localStorage.removeItem("token");
				</script>';
		}
		require_once( '../app/vistas/estructura/footer.php');
		
	}
	public function cerrarSesion() {
		$this->cliente(false);
		//$this->modelo->removerToken($_SESSION[$_COOKIE["PHPSESSID"]]['num']);
		unset($_SESSION[$_COOKIE["PHPSESSID"]]);
		unset($_COOKIE["PHPSESSID"]);
		setcookie('PHPSESSID', '', time() - 3600, '/'); // empty value and old timestamp
		header('Refresh:1; url='.RUTA_URL.'index/inicio');
	}
	
	
	/**
	 * @access public
	 */
	public function cambiarContrasenia() {
		parent::vista('usuarios/recuperarPassword');

	}

	public function emails(){
		$data=$this->modelo->consultarUsuario($_POST['dni']);
		if ($data != null && $data->correo_instu === $_POST['email']) {
			$pass = substr(md5(mt_rand()), 0, 7);
			require_once 'vendor/PHPMailer-master/mensaje.php';
			email::envio($_POST['email'], 'Su contraseña es: <b>'.$pass.'</b>', 'Cambio de contraseña');
			$data = ['dni'=>$_POST['dni'], 'pass'=>password_hash($pass, PASSWORD_BCRYPT)];
			$this->cmbPassword($data);
		}
		else {
			echo json_encode(["menj" => "No se puede cambiar!"]);
		}
	}
	// mostrar formulario de configurción
	function configurar(){
		parent::vistaConCabecera($_SESSION[$_COOKIE['PHPSESSID']]['rol'],'usuarios/configurar');
	}
	function cambiarConfiguracion(){
		$data=$this->modelo->consultarUsuario($_SESSION[$_SESSION['usu']]['num']);
			if(password_verify($_POST['passAc'], $data->contrasenia)){
				$data = ['dni'=>$_SESSION[$_SESSION['usu']]['num'], 'pass'=>password_hash($_POST['passNv'], PASSWORD_BCRYPT)];
				$this->cmbPassword($data);
						echo json_encode(['valor'=>'Cambiada!']);
			}
			else{
				echo json_encode(['valor' => 'Error!']);
				
		 }
	}
	function validarToken(){
		$cliente = $this->modelo->validarCliente($_REQUEST['cliente']);
		if ($cliente) {
			echo json_encode(['msj' => $cliente->roles_id_rol]);
		}else{
			echo json_encode(['msj' => false]);
		}
		
	}
 	function cmbPassword($data){
		 $this->modelo->modificarDatos($data);
	 }

}
?>