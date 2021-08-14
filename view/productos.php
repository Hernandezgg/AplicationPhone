<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');
if ($_SESSION['Acceso']=='AcessoConcedidoAdmin')
{?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>EcoMerce</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template"> 
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link rel="apple-touch-icon" href="apple-icon.png"> 
    <link rel="shortcut icon" href="favicon.ico"> 
    <link rel="stylesheet" href="../src/css/bootstrap.min.css">
    <link rel="stylesheet" href="../src/css/font-awesome.min.css">
    <link rel="stylesheet" href="../src/css/themify-icons.css">
    <link rel="stylesheet" href="../src/css/flag-icon.min.css">
    <link rel="stylesheet" href="../src/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../src/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../src/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="../src/css/style.css">
    <link rel="stylesheet" href="../src/css/sweetalert2.min.css">
    <script src="../src/js/validaciones.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
    <div id="productos">
        <aside id="left-panel" class="left-panel">
            <nav class="navbar navbar-expand-sm navbar-default">
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="./"><img src="../src/img/logo.png" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="./"><img src="../src/img/logo2.png" alt="Logo"></a>
                </div>
                <div id="main-menu" class="main-menu collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="index.php"> <i class="menu-icon fa fa-home"></i>Home</a>
                        </li>
                        <h3 class="menu-title">Catalogo</h3>
                            <li class="menu-item-has-children dropdown">
                                <a href="index.php" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-car"></i>Provedores</a>
                            </li>
                        <h3 class="menu-title">Movimiento</h3>
                        <li class="menu-item-has-children dropdown">
                            <a href="productos.php" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tablet"></i>Productos</a>
                        </li>
                        <!-- <li class="active">
                            <a href="productos.php"> <i class="menu-icon fa fa-home"></i>Home</a>
                        </li> -->
                    </ul>
                </div>
            </nav>
        </aside>
        <div id="right-panel" class="right-panel">
            <header id="header" class="header">
                <div class="header-menu">
                    <div class="col-sm-7">
                        <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                        <div class="header-left">
                            <div class="dropdown for-notification">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bell"></i>
                                    <span class="count bg-danger">5</span>
                                </button>
                            </div>
                            <div class="dropdown for-message">
                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                    id="message"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ti-email"></i>
                                    <span class="count bg-primary">9</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="user-area dropdown float-right">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="user-avatar rounded-circle" src="../src/img/admin.jpg" alt="User Avatar">
                            </a>

                            <div class="user-menu dropdown-menu">
                                <a class="nav-link" href="#"><i class="fa fa-envelope-o mr-2"></i><?php echo $_SESSION["correo"]?></a>
                                <a class="nav-link" href="#"><i class="fa fa-user-circle mr-2"></i><?php echo $_SESSION["rool"]?></a>
                                <a class="nav-link" href="Cerrar_Sesion.php"><i class="fa fa-power-off mr-2"></i>Finalizar</a> 
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div class="breadcrumbs">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Proveedores</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                            <button type="button" class="btn btn-primary" title="Nuevo"  data-toggle="modal" data-target="#Insert"> <i class="fa fa-tablet mr-2" aria-hidden="true"></i>Nuevo</button>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content mt-3">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">Lista de proveedores agregados</strong>
                                </div>
                                <div class="card-body">
                                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Clave</th>
                                                <th>Nombre</th>
                                                <th>Imagen</th>
                                                <th>Descripcion</th>
                                                <th>PCompra</th>
                                                <th>PVenta</th>
                                                <th>Cantidad</th>
                                                <th>Total</th>
                                                <th>Proveedor</th>
                                                <th>Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(productos,indice) of ctproductos">
                                                <td class="text-center">{{productos.intId_Producto}}</td>
                                                <td class="text-center">{{productos.vchNombre}}</td>
                                                <td class="text-center"><img :src="'../src/img/productos/'+productos.vchImagen" class="rounded" width="50px" height="50px"></td>
                                                <td class="text-center">{{productos.vchDescripcion}}</td> 
                                                <td class="text-center">{{productos.intPCompra}}</td>
                                                <td class="text-center">{{productos.intPVenta}}</td>
                                                <td class="text-center">{{productos.intCantidad}}</td>
                                                <td class="text-center">{{productos.intTotal}}</td>
                                                <td class="text-center">{{productos.intId_Proveedor}}</td>
                                                <td class="text-center">
                                                    <div class="btn-group" role="group">
                                                        <button class="btn btn-success btn-sm" title="Editar empleado" data-toggle="modal" @click="cargarvalue(productos.intId_Producto,productos.vchNombre,productos.vchImagen,productos.vchDescripcion,productos.intPCompra,productos.intCantidad,productos.intId_Proveedor)" data-target="#Update" ><i class="fa fa-edit"></i></button>    
                                                        <button class="btn btn-danger btn-sm" title="Eliminar empleado" @click="eliminar(productos.intId_Producto,productos.vchImagen)"><i class="fa fa-trash"></i></button>       
                                                    </div>
                                                </td>
                                            </tr>                                             
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .animated -->
            </div> 
            <!-- modal insertar -->
            <div class="modal fade" id="Insert" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="largeModalLabel">Nuevo producto</h5>
							<button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
                            <form enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <img v-if="urlIns" :src="urlIns " alt="" width="200" class="mx-auto d-block m-1 img-user" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <div class="custom-file">
                                                <input class="custom-file-input" id="flInsproducto" type="file" accept="image/*" @change="imgInsert"/>
                                                <label class="custom-file-label">Imagen del producto</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <select class="form-control" id="cmbInsproveedor">
                                                <option v-bind:value="0">Proveedor</option>
                                                <option v-for="(proveedor,indice) of ctproveedor" v-bind:value="proveedor.intId_Proveedor">
                                                    {{proveedor.vchEmpresa}}
                                                </option> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <input id="txtInsnombre" type="text" class="form-control" maxlength="50" placeholder="Nombre" onkeypress="return soloLetras(event)" onpaste="return false"/>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <input id="txtInspcompra" type="text" class="form-control" maxlength="50" placeholder="Precio" onkeypress="return soloNumeros(event)" onpaste="return false"/>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <input id="txtInscantidad" type="text" class="form-control" maxlength="50" placeholder="Cantidad" onkeypress="return soloNumeros(event)" onpaste="return false"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <input id="txtInsdescripcion" type="text" class="form-control" maxlength="500" placeholder="Descripcion" onkeypress="return soloLetras(event)" onpaste="return false"/>
                                        </div>
                                    </div>
                                </div>
                            </form>
						</div>
						<div class="modal-footer">
                            <button type="button" class="btn btn-primary" title="Guardar" @click="insertar"><i class="fa fa-save"></i></button>
                        </div>
					</div>
				</div>
			 </div>
            <!-- find del modal insertar -->
            <!-- model actualizar -->
            <div class="modal fade" id="Update" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="largeModalLabel">Editar producto</h5>
							<button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
                            <form enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <img v-if="urlUpd" :src="urlUpd" alt="" width="200" class="mx-auto d-block m-1 img-user" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <div class="custom-file">
                                                <input class="custom-file-input" id="flUpdproducto" type="file" accept="image/*" @change="imgUpd"/>
                                                <label class="custom-file-label">Imagen del producto</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <select class="form-control" id="cmbUpdproveedor">
                                                <option v-bind:value="0">Proveedor</option>
                                                <option v-for="(proveedor,indice) of ctproveedor" v-bind:value="proveedor.intId_Proveedor">
                                                    {{proveedor.vchEmpresa}}
                                                </option> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <input id="txtUpdnombre" type="text" class="form-control" maxlength="50" placeholder="Nombre" onkeypress="return soloLetras(event)" onpaste="return false"/>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <input id="txtUpdpcompra" type="text" class="form-control" maxlength="50" placeholder="Precio" onkeypress="return soloNumeros(event)" onpaste="return false"/>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <input id="txtUpdcantidad" type="text" class="form-control" maxlength="50" placeholder="Cantidad" onkeypress="return soloNumeros(event)" onpaste="return false"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <input id="txtUpddescripcion" type="text" class="form-control" maxlength="500" placeholder="Descripcion" onkeypress="return soloLetras(event)" onpaste="return false"/>
                                        </div>
                                    </div>
                                </div>
                            </form>
						</div>
						<div class="modal-footer">
                            <button type="button" class="btn btn-primary" title="Editar" @click="editar" data-dismiss="modal" aria-label="Close"><i class="fa fa-save"></i></button>
                        </div>
					</div>
				</div>
			 </div>
            <!-- fin del model actualizar -->
        </div>
    </div>
    <script src="../src/js/jquery.min.js"></script>
    <script src="../src/js/popper.min.js"></script>
    <script src="../src/js/bootstrap.min.js"></script>
    <script src="../src/js/main.js"></script>
    <script src="../src/js/dashboard.js"></script>
    <script src="../src/js/jquery.dataTables.min.js"></script>
    <script src="../src/js/dataTables.bootstrap4.min.js"></script>
    <script src="../src/js/dataTables.buttons.min.js"></script>
    <script src="../src/js/buttons.bootstrap4.min.js"></script>
    <script src="../src/js/buttons.html5.min.js"></script>
    <script src="../src/js/buttons.print.min.js"></script>
    <script src="../src/js/buttons.colVis.min.js"></script>
    <script src="../src/js/datatables-init.js"></script>
    <script src="../src/js/vue.js"></script>
    <script src="../src/js/axios.js"></script>
    <script src="../src/js/sweetalert2.all.min.js"></script>
    <script src="../controller/productos.js"></script>
</body>
</html>
<?php
  }
  else
  {
    header("location:login.php");
  }
?>