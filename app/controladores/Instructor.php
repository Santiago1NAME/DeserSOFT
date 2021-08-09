<?php
/**
 * @access public
 * @author Amb 302 pc1
 */

use PHPMailer\PHPMailer\PHPMailer;
use vendor\PHPMailer\PHPMailer\Exception;
class Instructor extends Controlador {
	/**
	 */
	function __construct() {
		parent::asignacionModelo('instructor');
		//seguridad(2);
	}
	function procesos(){
		$Datos = $this->modelo->aprendicesPD();
		parent::vistaConCabecera('instructor','instructor/consultarProcesos', $Datos);
	}
	
	/**
	 */
	public function vistaModificarDatos() {

		parent::vistaConCabecera('instructor','instructor/modificarDatos');
	}

	/**
	 */
	public function vistaConsultar() {
		// FICHAS
			$Datos = $this->modelo->consultarFichas();
			parent::vistaConCabecera('instructor','instructor/consultFichas', $Datos);

	}

	/**
	 */
	public function vistaRegistrarAprendices() {
		
		$Datos = $this->modelo->consultarAprendicesFicha($_SESSION['PARAM']);
		$data = $this->modelo->consultaCausas();
		parent::vistaConCabecera('instructor', 'instructor/consultAprendices', $Datos, $data);
	}
	
	/**
	 */
	public function registrarAprendices() {
		$this->modelo->registrarAprendices($_POST);
		header('Location: '.RUTA_URL.'instructor/vistaRegistrarAprendices/'.$_POST['ficha']);
	}
	
	public function registrarDesercion() {
		try{
			if ($this->modelo->registrarInicioProceso($_POST)) {
				$coordinador = $this->modelo->consultarCoordinador();
				$cPD = $this->modelo->consultaProceso($_POST['id_aprendiz']);
				//$this->modelo->actualizarEAprendiz($_POST['id_aprendiz']);
				/* 
					1. 
					2. Tiene que aportar las evidencias o soportes respectivos dentro de los cinco (5) días hábiles siguientes al envío.
					3. Se procederá a suscribir el acto académico que declara la deserción y se ordena la respectiva cancelación de la matrícula, debido a que no se recibio respuesta o evidencias que justifiquen el incumplimiento.
				*/	
				$mensaje = 'Al aprendiz con el número de documento '.$cPD->num_documento.', se le inicio el proceso por '.$_POST['obser'].'.';
				require_once 'vendor/PHPMailer-master/mensaje.php';
				email::envio($coordinador->correo_instu, $mensaje, 'Deserción');
			}
		}
		catch(Exception $e){
			die('Error'.$e.'!');
			# code...
		}	
	}

}
?>