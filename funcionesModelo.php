<?php
	class Modelo{
		public function __construct(){
			include("conexion.php");
			$db = new conexion();
			$this->conexion = $db->conectar();
		}
		public function consultar_parametros($tabla, $fechainicial, $fechafinal){
			$consulta = $this->conexion->prepare("select * from ".$tabla." where fechainicio between :fechainicial and :fechafinal");
			$consulta->bindParam(":fechainicial", $fechainicial);
			$consulta->bindParam(":fechafinal", $fechafinal);
			$consulta->execute();
			$error = $consulta->errorInfo();
			if($error[1]!=0){
				$respuesta = array("success" => false, "mensaje" => $error[2]);
				echo json_encode($respuesta);
				exit;
			}
			return $consulta->fetchAll();
		}
	}
?>