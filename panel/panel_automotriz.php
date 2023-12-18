<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/super-build/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="estilo_panel.css">
    <title> PANEL</title>
    <link rel="icon" href="../img/imagenes/logo.png" type="image/x-icon"> 
</head>
<style type="text/css">

body{
       font-family:"Arial";
   }

</style>
<body>
    
<?php 
include 'conexion_panel.php';
 $pagina_actual = basename($_SERVER['PHP_SELF']);

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit(); 
}

?>

    <div class="row" style="height:100%; width:100%;">

        <div class="col-12 col-md-3 bg-dark text-white px-0 mx-0 columna-panel">
            <div class="columna px-0">

                <div class="mt-1 d-flex justify-content-center align-content-center">
                 <div class="m-0 p-1" style="background-color:white; width:50%; height:50px;">
                   <img class="fluid" src="../img/imagenes/logo.png" alt="logo" style="width:100%; height:100%;"> 
                 </div>
               </div>
               
               <h2 class="text-center">Panel de control</h2>
              <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                  
                <!-- Brand -->
                   
                
                  <!-- Toggler/collapsibe Button -->
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                
                  <!-- Navbar links -->
              <div class="collapse navbar-collapse" id="collapsibleNavbar">
                  <ul class="panel" style="list-style: none;">
                  <li class="opcion-panel <?php if ($pagina_actual === 'panel_perfil.php') echo 'select'; ?>">
                        <a class="nav-link" href="panel_perfil.php"><i class="fa fa-cogs" style="color: #ffffff;"></i> Perfil</a>
                    </li>

                    <li class="opcion-panel <?php if ($pagina_actual === 'panel_productos_automotrices.php' 
                      || $pagina_actual ==='actualizar_categoria.php' 
                      || $pagina_actual === 'agregar_producto_automotriz.php' 
                      || $pagina_actual === 'actualizar_automotriz.php' 
                      || $pagina_actual === 'panel_productos_moldes.php' 
                      || $pagina_actual === 'actualizar_categoria_moldes.php' 
                      || $pagina_actual === 'agregar_producto_moldes.php' 
                      || $pagina_actual === 'actualizar_moldes.php' ) echo 'select'; ?>" data-toggle="collapse" data-target="#productos">
                        <a class="nav-link" href="#"><i class="fas fa-tools" style="color: #ffffff;"></i> Productos</a>
                      </li>

                        <div id="productos" class="collapse">
                          <li class="opcion-panel2">
                            <a class="nav-link" href="panel_productos_automotrices.php">AUTOMOTRICES</a>
                          </li>                      
                        </div>


                        <li class="opcion-panel <?php if ( $pagina_actual === 'panel_procesos_automotriz.php' 
                                                          || $pagina_actual==="panel_nuestros_equipos.php"
                                                          || $pagina_actual==="panel_descripcion_procesos.php"
                                                          || $pagina_actual==="actualizar_descripcion_proceso.php"
                                                          || $pagina_actual==="agregar_procesoaut.php"
                                                          ) 
                                                          echo 'select'; ?>" data-toggle="collapse" data-target="#procesos">
                        <a class="nav-link" href="#"><i class="fas fa-list" style="color: #ffffff;"></i> Procesos</a>
                      </li>
                        <div id="procesos" class="collapse"> 
                          <li class="opcion-panel2">
                            <a class="nav-link" href="panel_procesos_automotriz.php">DESCRIPCION PROCESO AUTOMOTRIZ</a>
                          </li>
                          <li class="opcion-panel2">
                            <a class="nav-link" href="panel_descripcion_procesos.php">PROCESOS AUTOMOTRICES</a>
                          </li>
                          <li class="opcion-panel2">
                            <a class="nav-link" href="panel_productos_fundidos.php">ALUMINIO Y HIERRO FUNDIDO</a>
                          </li>
                          <li class="opcion-panel2">
                            <a class="nav-link" href="panel_proceso_de_ensamble.php">PROCESO DE ENSAMBLAJE</a>
                          </li>
                          <li class="opcion-panel2">
                            <a class="nav-link" href="panel_nuestros_equipos.php">EQUIPOS</a>
                          </li>                        
                        </div>



                      <li class="opcion-panel">
                        <a  id="cerrarSesion" class="nav-link" href="./index.php"><i class="fas fa-minus" style="color: #ffffff;"></i> Cerrar sesión</a>
                      </li>               
                  </ul>
                  </div>
                </nav>
            </div>
        </div>

        <div class="col-12 col-md-9 p-0 columna-contenido">

<script>
    document.getElementById('cerrarSesion').addEventListener('click', function(event) {
    event.preventDefault(); 
    const formData = new FormData();
    formData.append('opcion', '2');
     

    fetch('crud_usuarios.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
        location.reload();
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
</script>