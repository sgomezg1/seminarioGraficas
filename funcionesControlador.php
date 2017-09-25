<?php
	class Controlador{
		public function __construct(){
			$modelo = include("funcionesModelo.php");
			$this->modelo = new Modelo();
		}
		public function vista_inicial(){
			require("vista.php");
		}
		public function traer_datos(){
			header("Content-type:application/json");
			$datos = $this->modelo->consultar_parametros($_POST['tabla'], $_POST['fechainicial'], $_POST['fechafinal']);
			$respuesta = array("success"=>true, "vector"=>$datos);
			echo json_encode($respuesta);
			exit;
		}
	}
?>