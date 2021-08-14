<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Abrir_conexion();

$opcion =(isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$clave=(isset($_POST['clave'])) ? $_POST['clave'] : '';
$nombre= (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$imagen=(isset($_FILES['imagen']['name'])) ? $_FILES['imagen']['name']: '';
$descripcion=(isset($_POST['descripcion'])) ? $_POST['descripcion'] : '';
$pcompra= (isset($_POST['pcompra'])) ? $_POST['pcompra'] : '';
$cantidad= (isset($_POST['cantidad'])) ? $_POST['cantidad'] : '';
$proveedor=(isset($_POST['proveedor'])) ? $_POST['proveedor'] : '';
$borrar=(isset($_POST['borrar'])) ? $_POST['borrar'] : '';
switch($opcion){
    case 1:
        $consulta = "SELECT intId_Producto,vchNombre,vchImagen,vchDescripcion,intPCompra,intPVenta,intCantidad,intTotal,intId_Proveedor FROM tblproducto;";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2:
        $consulta = "SELECT intId_Proveedor,vchEmpresa FROM tblproveedor;";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3:
        $pventa=($pcompra*.50)+$pventa;
        $total=$cantidad*$pcompra;
        $consulta="INSERT INTO tblproducto(vchNombre,vchImagen,vchDescripcion,intPCompra,intPVenta,intCantidad,intTotal,intId_Proveedor)VALUES('$nombre','$imagen','$descripcion','$pcompra','$pventa','$cantidad','$total','$proveedor');";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $rtactual=$_FILES['imagen']['tmp_name']; 
        $ruta="../src/img/productos/".$imagen;
        if($resultado) {
            move_uploaded_file($rtactual,$ruta);
        }   
        break;
    case 4:
        $pventa=($pcompra*.50)+$pventa;
        $total=$cantidad*$pcompra;
        if($imagen==null){
            $consulta="UPDATE tblproducto SET vchNombre='$nombre',vchDescripcion='$descripcion',intPCompra='$pcompra',intPVenta='$pventa',intCantidad='$cantidad',intTotal='$total',intId_Proveedor='$proveedor' WHERE intId_Producto='$clave';";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
        }else{
            $consulta="UPDATE tblproducto SET vchNombre='$nombre',vchImagen='$imagen',vchDescripcion='$descripcion',intPCompra='$pcompra',intPVenta='$pventa',intCantidad='$cantidad',intTotal='$total',intId_Proveedor='$proveedor' WHERE intId_Producto='$clave';";
            $rtactual=$_FILES['imagen']['tmp_name']; 
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $ruta="../src/img/productos/".$imagen;
            if($resultado) {
                move_uploaded_file($rtactual,$ruta);
                unlink($borrar);
            }
        }
        break;
    case 5:
        $consulta = "DELETE FROM tblproducto WHERE intId_Producto='$clave';";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        if($resultado) 
        {
            unlink($borrar);
        }
        break;
}
echo json_encode($data, JSON_UNESCAPED_UNICODE);
$conexion = NULL;
?>