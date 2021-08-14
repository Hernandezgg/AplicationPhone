<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Abrir_conexion();
$_POST = json_decode(file_get_contents("php://input"), true);
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$correo= (isset($_POST['correo'])) ? $_POST['correo'] : '';
$password= (isset($_POST['password'])) ? $_POST['password'] : '';
switch($opcion){
    case 1:
        $consulta="SELECT vchCorreo,vchPassword,vchRool FROM tblusuarios WHERE vchCorreo='$correo' AND vchPassword='$password';";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        if($resultado->rowCount()){
            session_start();
            $_SESSION['Acceso']='AccessoConcedido';
            $contenido=$resultado->fetchAll(PDO::FETCH_ASSOC);
            foreach($contenido as $datos){
                $_SESSION['correo']=$datos['vchCorreo'];
                $_SESSION['password']=$datos['vchPassword'];
                $_SESSION['rool']=$datos['vchRool'];
            }
            $_SESSION['Acceso']='AcessoConcedido'.$_SESSION['rool'];
            $data='AcessoConcedido'.$_SESSION['rool'];
        }
        break;
}
print json_encode($data, JSON_UNESCAPED_UNICODE);
$conexion = NULL;
?>