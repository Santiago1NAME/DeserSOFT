<?php

/**
 */
class EnfermeraModelo extends UsuarioModelo{

	/**
	 */
	public function consultarJustificaciones() {
		try{
			$this->_conexion->consultar("SELECT * FROM justificaciones INNER JOIN usuarios ON justificaciones.id_usuario=usuarios.id_usuario /*INNER JOIN tipo_justificaciones ON justificaciones.tipo_justificaciones_id_tipo_justificacion=tipo_justificaciones.id_tipo_justificacion*/");
			$this->_conexion->ejecutar();
			return $this->_conexion->mostrar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
	}
	public function justificaciones() {
		try{
			$this->_conexion->consultar("SELECT * FROM `justificaciones` 
										INNER JOIN usuarios_has_justificaciones ON usuarios_has_justificaciones.id_justificaciones=justificaciones.id_justificaciones INNER JOIN usuarios ON usuarios_has_justificaciones.id_usuario=usuarios.id_usuario 
										INNER JOIN deserciones ON deserciones.id_aprendiz=usuarios.id_usuario WHERE justificaciones.estado_id_estado=3");
			$this->_conexion->ejecutar();
			return $this->_conexion->mostrarTodos();
        } catch (Exception $e) {
            die($e->getMessage());
        }
	}

	/**

	 */
	public function modificarEstadoFecha($Data) {
		try {
			// modificar datos
			$this->_conexion->consultar("UPDATE `justificaciones` SET `estado`=? WHERE id_usuario=?");
			$this->_conexion->bind(1, $Data['estado'], PDO::PARAM_STR);
			return $this->_conexion->ejecutar();
		} catch (Exception $e) {
			die($e);
		}
	}
}
?>