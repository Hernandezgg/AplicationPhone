<?php
    class Conexion{
        public static function Abrir_conexion(){
            define('servidor', 'localhost');
            define('bdatos', 'bdcelulares');
            define('usuario', 'root');
            define('password', 'edgar5090');	
            $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');			
            try{
                $conexion = new PDO("mysql:host=".servidor."; dbname=".bdatos, usuario, password, $opciones);
                return $conexion;
            }catch (Exception $e){
                die("El error de Conexión es: ". $e->getMessage());
            }
        }
    }
?>