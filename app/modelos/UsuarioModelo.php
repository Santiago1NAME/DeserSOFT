<?php
/*
 MODELO DE USUARIO
 */
class UsuarioModelo{
	
	protected $_conexion;
	function __construct()
	{
		try{
			$this->_conexion = new BaseDatos();
		}
		catch(Exception $e){
			die($e);
		}
	}
	
	/*
	
	*/ 
	public function consultarUsuario($Id) {
		// consultar usuario
		try {
			$this->_conexion->consultar("SELECT * FROM `usuarios` INNER JOIN roles ON usuarios.roles_id_rol=roles.id_rol WHERE num_documento=?");
			$this->_conexion->bind(1, $Id, PDO::PARAM_INT);
			$this->_conexion->ejecutar();
			return $this->_conexion->mostrar();

		} catch (Exception $e) {
			die($e);
		}
	}

	public function validarCliente($token) {
		// consultar usuario
		try {
			$this->_conexion->consultar("SELECT `roles_id_rol` FROM `usuarios` WHERE `token`=?");
			$this->_conexion->bind(1, $token, PDO::PARAM_STR);
			$this->_conexion->ejecutar();
			return $this->_conexion->mostrar();
		} catch (Exception $e) {
			die($e);
		}
	}
	
	/**

	 */
	public function modificarDatos($Data) {
		try {
			// modificar datos
			$this->_conexion->consultar("UPDATE `usuarios` SET `contrasenia`=? WHERE num_documento=?");
			$this->_conexion->bind(1, $Data['pass'], PDO::PARAM_STR);
			$this->_conexion->bind(2, $Data['dni'], PDO::PARAM_INT);
			return $this->_conexion->ejecutar();

		} catch (Exception $e) {
			die($e);
		}
	}
	public function asignarToken($token, $id) {
		try
			{
				$this->_conexion->consultar("UPDATE `usuarios` SET `token`=? WHERE `num_documento` = ?");
				$this->_conexion->bind(1, $token, PDO::PARAM_STR);
				$this->_conexion->bind(2, $id, PDO::PARAM_INT);
				$this->_conexion->ejecutar();
			} catch (Exception $e) {
				die($e->getMessage());
			}
	}
	public function removerToken($id) {
		try
			{
				$this->_conexion->consultar("UPDATE `usuarios` SET `token`='' WHERE `num_documento` = ?");
				$this->_conexion->bind(1, $id, PDO::PARAM_INT);
				$this->_conexion->ejecutar();
			} catch (Exception $e) {
				die($e->getMessage());
			}
	}
	public function consultaProceso($data) {
		try{
			$this->_conexion->consultar("SELECT deserciones.id_desercion, usuarios.nombres, usuarios.correo_instu, usuarios.apellidos, tipo_documento.Tip_doc, usuarios.num_documento, usuarios.correo_instu, programas.nom_programa, fichas.num_ficha, competencias.nom_competencia, trimestres.num_trimestre, deserciones.fecha_reporte, deserciones.fecha_desercion1, deserciones.fecha_desercion2, deserciones.fecha_desercion3, desercausa.nombre, deserciones.observaciones FROM `deserciones_has_desercausa` 
			INNER JOIN desercausa ON desercausa.idDCausa = deserciones_has_desercausa.desercausa_idDCausa 
			INNER JOIN deserciones ON deserciones_has_desercausa.deserciones_id_desercion = deserciones.id_desercion 
			INNER join usuarios ON deserciones.id_aprendiz = usuarios.id_usuario 
			INNER JOIN tipo_documento ON tipo_documento.id_doc = usuarios.id_doc 
			INNER JOIN fichas_has_usuarios ON fichas_has_usuarios.usuarios_id_usuario = usuarios.id_usuario 
			INNER JOIN fichas ON fichas.num_ficha = fichas_has_usuarios.fichas_num_ficha 
			INNER JOIN programas ON programas.id_programa = fichas.id_programa 
			INNER JOIN competencias ON competencias.id_programa = programas.id_programa 
			INNER JOIN trimestres ON trimestres.id_trimestre = fichas.id_trimestre WHERE usuarios.id_usuario = ? ORDER BY deserciones.id_desercion DESC LIMIT 1");
			$this->_conexion->bind(1, $data, PDO::PARAM_INT);
			$this->_conexion->ejecutar();
			return $this->_conexion->mostrar();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

}
?>