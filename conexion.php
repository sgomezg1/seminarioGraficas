<?php
	class conexion{
		public function __construct(){
			$datos = require_once("datos.php");
			$this->driver = $datos['driver'];
			$this->usuario = $datos['usuario'];
			$this->contrasena = $datos['contrasena'];
		}
		public function conectar(){
			try {
			    $gbd = new PDO($this->driver, $this->usuario, $this->contrasena);
			    return $gbd;
			} catch (PDOException $e) {
			    echo 'Falló la conexión: ' . $e->getMessage();
			}
		}
	}
?>