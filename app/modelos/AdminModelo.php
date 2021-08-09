<?php

/**

 */
class AdminModelo extends UsuarioModelo {

	/**

	 */

	public function consultarProgramas() {
		try{
			$this->_conexion->consultar("SELECT * FROM `programas`");
			$this->_conexion->ejecutar();
			return $this->_conexion->mostrarTodos();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	
	/**
	 * @access public
	 */
	public function registrarProgramas($data) {
		$this->_conexion->consultar("INSERT INTO programas (nom_programa, estado_programa, nvl_programa) VALUES (?,'Activo',?)");
		$this->_conexion->bind(1, $data['nom_programa'], PDO::PARAM_STR);
		$this->_conexion->bind(2, $data['nvl_programa'], PDO::PARAM_STR);
		return $this->_conexion->ejecutar();
	}
	/**
	 * @access public
	 */
	public function enviarNotificacion($id) {
		$this->_conexion->consultar("UPDATE `deserciones` SET `envio_notificacion`=? WHERE `id_desercion`=?");
		$this->_conexion->bind(1, date('Y-m-d'), PDO::PARAM_STR);
		$this->_conexion->bind(2, $id, PDO::PARAM_INT);
		return $this->_conexion->ejecutar();
	}
	public function actualizar_estado_formato($id) {
		$this->_conexion->consultar("UPDATE `deserciones` SET `estado_pdf`=1 WHERE `id_desercion`=?");
		$this->_conexion->bind(1, $id, PDO::PARAM_INT);
		return $this->_conexion->ejecutar();
	}

	/**
	 * @access public
	 */
	public function editarEstadoProgramas($id) {
		try
			{
				$this->_conexion->consultar("UPDATE `programas` SET `estado_programa` =? WHERE `id_programa`=?");
				$this->_conexion->bind(1, 'Activo', PDO::PARAM_INT);
				$this->_conexion->bind(2, $id, PDO::PARAM_INT);
				$this->_conexion->ejecutar();
			} catch (Exception $e) {
				die($e->getMessage());
			}
	}
	
	/**
	 * @access public
	 */
	public function consultarUsuarios($id) {
		try{
			$this->_conexion->consultar("SELECT * FROM `usuarios` 
										INNER JOIN tipo_documento ON tipo_documento.id_doc = usuarios.id_doc WHERE roles_id_rol = ?");
			$this->_conexion->bind(1, $id, PDO::PARAM_INT);
			$this->_conexion->ejecutar();
			return $this->_conexion->mostrarTodos();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	public function procesos() {
		try{
			$this->_conexion->consultar("SELECT * FROM `deserciones` INNER JOIN usuarios ON usuarios.id_usuario=deserciones.id_aprendiz WHERE estado=1 group by usuarios.id_usuario");
			$this->_conexion->ejecutar();
			return $this->_conexion->mostrarTodos();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function notificaciones_enviadas(){
		try{
			$this->_conexion->consultar("SELECT * FROM `deserciones` INNER JOIN usuarios ON usuarios.id_usuario=deserciones.id_aprendiz WHERE estado=1 AND envio_notificacion!='' group by usuarios.id_usuario ORDER BY envio_notificacion");
			$this->_conexion->ejecutar();
			return $this->_conexion->mostrarTodos();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	
}
?>