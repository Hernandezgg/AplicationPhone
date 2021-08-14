<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Abrir_conexion();
$_POST= json_decode(file_get_contents("php://input"), true);
$opcion=(isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$clave=(isset($_POST['clave'])) ? $_POST['clave'] : '';
$nombre=(isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$empresa=(isset($_POST['empresa'])) ? $_POST['empresa'] : '';
$correo=(isset($_POST['correo'])) ? $_POST['correo'] : '';
$telefono=(isset($_POST['telefono'])) ? $_POST['telefono'] : '';
switch($opcion){
    case 1:
        $consulta="SELECT intId_Proveedor,vchNombre,vchEmpresa,vchTelefono,vchCorreo FROM tblproveedor;";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();  
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;
    case 2:
        $consulta="INSERT INTO tblproveedor(vchNombre,vchEmpresa,vchTelefono,vchCorreo)VALUES('$nombre','$empresa','$telefono','$correo');";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        break;
    case 3:
        $consulta="UPDATE tblproveedor SET vchNombre='$nombre',vchEmpresa='$empresa',vchTelefono='$telefono',vchCorreo='$correo' WHERE intId_Proveedor='$clave';";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();       
        break;       
    case 4:
        $consulta = "DELETE FROM tblproveedor WHERE intId_Proveedor='$clave';";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break; 
}
print json_encode($data,JSON_UNESCAPED_UNICODE);
$conexion = NULL;
?>