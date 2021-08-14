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
    <link rel="stylesheet" href="../src/css/style.css">
    <link rel="stylesheet" href="../src/css/sweetalert2.min.css">
    <script src="../src/js/validaciones.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body class="bg-dark">
    <div id="login">
        <div class="sufee-login d-flex align-content-center flex-wrap">
            <div class="container">
                <div class="login-content">
                    <div class="login-form">
                        <form>
                            <div class="login-logo">
                                <a href="index.html">
                                    <img class="align-content" src="../src/img/logo2.png" alt="">
                                </a>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" id="txtcorreo"class="form-control" placeholder="Email" maxlength="50" onpaste="return false">
                            </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" id="txtpassword" class="form-control" placeholder="Password" maxlength="50" onpaste="return false">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Recordar
                                </label>
                            </div>
                            <button type="button" class="btn btn-success btn-flat m-b-30 m-t-30" @click="iniciarsesion">Iniciar sesion</button>
                            <div class="register-link m-t-15 text-center">
                                <p><a href="registrarse.php">Registrate aqui...</a></p>
                            </div>      
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../src/js/jquery.min.js"></script>
    <script src="../src/js/popper.min.js"></script>
    <script src="../src/js/bootstrap.min.js"></script>
    <script src="../src/js/main.js"></script>
    <script src="../src/js/vue.js"></script>
    <script src="../src/js/axios.js"></script>
    <script src="../src/js/sweetalert2.all.min.js"></script>
    <script src="../controller/login.js"></script>
</body>
</html>
