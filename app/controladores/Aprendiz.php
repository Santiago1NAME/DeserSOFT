<?php

/**
 * @access public
 * @author Amb 302 pc1
 */
class Aprendiz extends Controlador {

	public function __construct() {
		// Not yet implemented
		parent::asignacionModelo('aprendiz');
	//	seguridad(3);
	}
	public function vistaConsultar() {
		// Procesos
		$data = $this->modelo->procesos_finalizados($_SESSION[$_COOKIE["PHPSESSID"]]["id"]);
		parent::vistaConCabecera('aprendiz','aprendiz/consultarProceso', $data);
	

	}
	function justificaciones(){
		parent::vistaConCabecera('aprendiz','aprendiz/justificaciones');
	}

	public function registrarJustificacion() {
		// Not yet implemented
		try {
				$correo_enfe = $this->modelo->enfermeraAsociada($_POST['fch']);
				require_once 'vendor/PHPMailer-master/mensaje.php';
				$nom = explode('.', $_FILES['pdf']['name']);
				move_uploaded_file($_FILES['pdf']['tmp_name'], 'pdf/'.$_FILES['pdf']['name']);
				echo json_encode(["justificacion"=>$this->modelo->registrarJustificacion()]);
				email::envio($correo_enfe->correo_instu, 'Justificacion del proceso: <b>' . $_POST['id_proceso'] . '.</b>', $_POST['id_proceso'].' - Justificacion', $nom[0]);
			} catch (Exception $e) {
				die('Error' . $e . '!');
				# code...
			}	
		}
		// function justificacion(){
		
		// 	echo "<script>window.location.href='" . RUTA_URL . "aprendiz/vistaConsultar'</script>";
		// }
	/**
	 * @access public
	 */
	public function vistaRegistrarJustificacion() {
		// Not yet implemented
		parent::vistaConCabecera('aprendiz/menu', 'aprendiz/registrarJustificacion');
		
	}
}
?>