<?php

/**
 * @access public
 * @author Amb 302 pc1
 */
class Coordinador extends Controlador {

	/**
	 * @access public
	 */
	public function __construct() {
		// Not yet implemented
	//	seguridad(1);
		parent::asignacionModelo('admin');
	}
	function vistaConsultar() {
		// Procesos
		$Datos = $this->modelo->procesos();
		$Datos2 = $this->modelo->notificaciones_enviadas();
		parent::vistaConCabecera('coordinador','coordinador/procesosActivos', $Datos, $Datos2);

	}
	function usuarios(){
		parent::vistaConCabecera('coordinador','coordinador/usuariosSistema');
	}
	function programas(){
		parent::vistaConCabecera('coordinador','coordinador/programasFormacion');
	}
	function deserciones(){
		$Datos = $this->modelo->procesos();
		parent::vistaConCabecera('coordinador','coordinador/desercionesEfectivas', $Datos);
	}

	public function consultarUsuarios() {
		switch ($_SESSION['PARAM']) {
			case '2':
				$Datos = $this->modelo->consultarUsuarios(2);
				parent::vistaConCabecera('coordinador','coordinador/consultarInstructores', $Datos);				
				break;
			case '3':
				$Datos = $this->modelo->consultarUsuarios(3);
				parent::vistaConCabecera('coordinador','coordinador/consultarAprendices', $Datos);			
			break;
			case '4':
				$Datos = $this->modelo->consultarUsuarios(4);
				parent::vistaConCabecera('coordinador','coordinador/consultarEnfermeria', $Datos);			
			break;
		}
		
	}

	public function vistaProgramas() {
		$Datos = $this->modelo->consultarProgramas();
		parent::vistaConCabecera('coordinador','coordinador/programasFormacion', $Datos);
	}

	/**
	 * @access public
	 */
	public function registrarProgramas() {
		$this->modelo->registrarProgramas($_POST);
		header('Location: '.RUTA_URL.'coordinador/vistaProgramas');
	}
	
	public function registrarDesercion() {
		try{
			if ($this->modelo->enviarNotificacion($_POST['id_desercion'])) {
				$aprendiz = $this->modelo->consultarUsuario($_POST['id_aprendiz']);
				/* 
					1. 
					2. Tiene que aportar las evidencias o soportes respectivos dentro de los cinco (5) días hábiles siguientes al envío.
					3. Se procederá a suscribir el acto académico que declara la deserción y se ordena la respectiva cancelación de la matrícula, debido a que no se recibio respuesta o evidencias que justifiquen el incumplimiento.
				*/	
				$mensaje = ' Tiene que aportar las evidencias o soportes respectivos dentro de los cinco (5) días hábiles siguientes al envío.';
				require_once 'vendor/PHPMailer-master/mensaje.php';
				email::envio($aprendiz->correo_instu, $mensaje, 'Deserción');
				echo "<script>window.location = '".RUTA_URL."coordinador/vistaConsultar'</script>";
			}
		}
		catch(Exception $e){
			die('Error'.$e.'!');
	
		}	
	}
	public function enviar_formato() {
		try{
			if ($this->modelo->actualizar_estado_formato($_POST['id_desercion'])) {
			
				$aprendiz = $this->modelo->consultaProceso($_POST['id_aprendiz']);
				/* 
					1. 
					2. Tiene que aportar las evidencias o soportes respectivos dentro de los cinco (5) días hábiles siguientes al envío.
					3. Se procederá a suscribir el acto académico que declara la deserción y se ordena la respectiva cancelación de la matrícula, debido a que no se recibio respuesta o evidencias que justifiquen el incumplimiento.
				*/	
				$pdf = $this->pdf($aprendiz, $_POST['id_aprendiz']);
				$mensaje = 'Se procederá a suscribir el acto académico que declara la deserción y se ordena la respectiva cancelación de la matrícula, debido a que no se recibió respuesta o evidencias que justifiquen el incumplimiento.';
				require_once 'vendor/PHPMailer-master/mensaje.php';
				email::envio($aprendiz->correo_instu, $mensaje, 'Deserción');				
				echo "<script>window.location = '".RUTA_URL."coordinador/vistaConsultar'</script>";
			}
		}
		catch(Exception $e){
			die('Error'.$e.'!');
		}	
	}
	
	public function pdf($cPD,$id) {
		try{
			require_once 'librerias\fpdf\WriteHTML.php';
			$pdf=new PDF();
			$pdf->AddPage();
			//Seteamos el inicio del margen superior en 25 pixeles
			$y_axis_initial = 25;
			$pdf->SetFillColor(232,232,232);
			$pdf->SetFont('Arial','B',10);
				$titulo = 'titulo';
				$precio = 'precio';
				$pdf->Cell( 31, 24, $pdf->Image("img/sena.jpg", $pdf->GetX()+1, $pdf->GetY()+2, 30), 1, 0, 'C', false );
			//	$pdf->Cell( 32, 24, $pdf->Image($imagen, $pdf->GetX()+1, $pdf->GetY()+2, 30), 1, 0, 'C', false );
				$pdf->MultiCell(160,8,utf8_decode('REPORTE DE DESERCIÓN 
				F-19-08-9210  V. 1  
				EJECUCIÓN DE LA FORMACIÓN PROFESIONAL'),1,'C');
			//Muestro la imagen dentro de la celda GetX y GetY dan las coordenadas actuales de la fila
				$pdf->Ln(5);
				$pdf->MultiCell(0,8,utf8_decode('
					Nombre del aprendiz: '.$cPD->nombres.' '.$cPD->apellidos.'
					Documento de Identidad: '.$cPD->Tip_doc.'		 No. '.$cPD->num_documento.'
					Correo electrónico  del aprendiz: '.$cPD->correo_instu.'
					Programa de Formación:'.$cPD->nom_programa.'
					Ficha Caracterización Sofíaplus:'.$cPD->num_ficha.'
					Competencia que cursa:'.$cPD->nom_competencia.'
					Trimestre que cursa: '.$cPD->num_trimestre.' 		 Fecha reporte: '.$cPD->fecha_reporte.'
					Fechas de inasistencia: '.$cPD->fecha_desercion1.' -  '.$cPD->fecha_desercion2.' - '.$cPD->fecha_desercion3.'
					CAUSA DE DESERCIÓN: '.$cPD->nombre.'
					Observación: '.$cPD->observaciones.'
					VERIFICACIÓN DEL REPORTE: Estado en Sofía: ___________________________________________
					Fecha verificación: D_____ / M______ /A_____

					Nota: Anexar la notificación de la deserción, enviada por correo al aprendiz 
					'),0,'J'); 
					$pdf->Ln(5);
					$pdf->MultiCell(0,5,utf8_decode('
					_________________________________         ________________________________________________  
					Nombre y firma instructor                                Nombre y firma instructor
					'),0,'L');        
					$pdf->MultiCell(0,5,utf8_decode('    
					_________________________________         ________________________________________________  
					Nombre y firma vocero del Grupo                  Nombre y firma responsable de seguimiento aprendices
					'),0,'L');        
					$pdf->MultiCell(0,5,utf8_decode(' 
					_________________________________          
					Vo.Bo,  Coordinador académico


					ACTA No.__________________	FECHA:   D_____ / M______ /A_____
					'),0,'L'); 
			return $pdf->Output('F', 'pdf/'.$id.'.pdf');
		}catch(Exception $e){
			die($e);
		}

	}
}
?>