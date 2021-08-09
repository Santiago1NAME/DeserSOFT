<?php

/**

 */
class AprendizModelo extends UsuarioModelo
{

	/**
	 */
	public function enfermeraAsociada($ficha) {
		try {
			$this->_conexion->consultar("SELECT * FROM `fichas_has_usuarios` 
			INNER JOIN usuarios ON usuarios.id_usuario=fichas_has_usuarios.usuarios_id_usuario WHERE usuarios.roles_id_rol=4 AND fichas_has_usuarios.fichas_num_ficha=?");
			$this->_conexion->bind(1, $ficha, PDO::PARAM_STR);
			$this->_conexion->ejecutar();
			return $this->_conexion->mostrar();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	public function procesos_finalizados($id) {
		try{
			$this->_conexion->consultar("SELECT * FROM `deserciones` 
			INNER JOIN usuarios ON usuarios.id_usuario=deserciones.id_aprendiz
            INNER JOIN deserciones_has_desercausa ON deserciones.id_desercion=deserciones.id_desercion
            INNER JOIN desercausa ON desercausa.idDCausa = deserciones_has_desercausa.desercausa_idDCausa
			WHERE estado_pdf=1 AND usuarios.id_usuario=3 group by usuarios.id_usuario");
			$this->_conexion->bind(1, $id, PDO::PARAM_INT);
			$this->_conexion->ejecutar();
			return $this->_conexion->mostrar();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	/**


	 */	
	public function registrarJustificacion() {
		// Not yet implemented
			try {
				$this->_conexion->consultar("INSERT INTO `justificaciones`(`estado_id_estado`, `tipo_justificacion_idtipo_justificacion`) VALUES (?,?)");
				$this->_conexion->bind(1, 3, PDO::PARAM_STR);
				$this->_conexion->bind(2, 1, PDO::PARAM_INT);
				$this->_conexion->ejecutar();
				$this->_conexion->consultar("INSERT INTO `usuarios_has_justificaciones`(`id_usuario`, `id_justificaciones`) VALUES (?,?)");
				$this->_conexion->bind(1, $_SESSION[$_COOKIE["PHPSESSID"]]['id'], PDO::PARAM_STR);
				$this->_conexion->bind(2, $this->_conexion->lastId(), PDO::PARAM_INT);
				return $this->_conexion->ejecutar();
			} catch (Exception $e) {
				die($e);
			}
			
		}
		/**
	
		 */
		public function consultarProceso($Id) {
			try {
				$this->_conexion->consultar("SELECT * from deserciones 
				INNER JOIN deserciones_has_desercausa ON deserciones.id_desercion=deserciones_has_desercausa.deserciones_id_desercion
				INNER JOIN desercausa ON deserciones_has_desercausa.desercausa_idDCausa=desercausa.idDCausa
				INNER JOIN usuarios ON usuarios.id_usuario=deserciones.instructor
				WHERE id_aprendiz = ?");
				$this->_conexion->bind(1, $Id, PDO::PARAM_INT);
				$this->_conexion->ejecutar();
				return $this->_conexion->mostrar();

			} catch (Exception $e) {
				die($e);
			}
			// Not yet implemented
		}
		
		/**
	
	
		 */
		public function modificarDatos($Data) {
			try {
				$this->_conexion->consultar("UPDATE `usuarios` SET `imagen`=?, `nombre`=?,`apellido`=?,`cel_usuario`=?,`tel_usuario`=?,`correo_person`=?,`correo_instu`=?,`contrasenia`=?, `tip_documentos_id_doc`=? WHERE id_usuario=?");
				$this->_conexion->bind(1, $Data['imagen'], PDO::PARAM_STR);
				$this->_conexion->bind(2, $Data['nombre'], PDO::PARAM_STR);
				$this->_conexion->bind(4, $Data['apellido'], PDO::PARAM_STR);
				$this->_conexion->bind(5, $Data['cel_usuario'], PDO::PARAM_STR);
				$this->_conexion->bind(6, $Data['tel_usuario'], PDO::PARAM_STR);
				$this->_conexion->bind(7, $Data['correo_person'], PDO::PARAM_STR);
				$this->_conexion->bind(8, $Data['correo_instu'], PDO::PARAM_STR);
				$this->_conexion->bind(9, $Data['contrasenia'], PDO::PARAM_STR);
				$this->_conexion->bind(10, $Data['tip_documentos_id_doc'], PDO::PARAM_INT);
				$this->_conexion->bind(11, $Data['id_usuario'], PDO::PARAM_INT);
				return $this->_conexion->ejecutar();
			
			} catch (Exception $e) {
				die($e);
			}
			// Not yet implemented
		}

}
?> 