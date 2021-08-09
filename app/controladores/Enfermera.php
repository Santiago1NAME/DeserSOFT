<?php
/**
 * @access public
 * @author Amb 302 pc1
 */
class Enfermera extends Controlador {

	/**
	 * @access public
	 */
	function __construct() {
		parent::asignacionModelo('enfermera');
		//seguridad(4);
	}
	function justificaciones(){
		parent::vistaConCabecera('enfermera','enfermera/justificaciones');
	}
	function vistaConsultar() {
		// Procesos
		$Datos = $this->modelo->justificaciones();
		parent::vistaConCabecera('enfermera','enfermera/consultJustificaciones', $Datos);
	}
}
?>