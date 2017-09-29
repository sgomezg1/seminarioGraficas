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
			//var_dump($datos);
			$data = array();
			foreach($datos as $d){
				array_push($data, $d['valor']);
			}
			$respuesta = array("success"=>true, "vector"=>implode(",", $data));
			echo json_encode($respuesta);
			exit;
		}
		public function traer_horas(){
			header("Content-type:application/json");
			$datos = $this->modelo->consultar_parametros2($_POST['tabla'], $_POST['fechainicial'], $_POST['fechafinal']);
			//var_dump($datos);
			$data = array();
			foreach($datos as $d){
				array_push($data, $d['valor']);
			}
			$respuesta = array("success"=>true, "vector"=>implode(",", $data));
			echo json_encode($respuesta);
			exit;
		}
	}
?>