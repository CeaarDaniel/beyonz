<?php
include('validacion_usuarios.php');

if($_SESSION['permisos']!='1' ){
    echo '
    <script>
    location.href ="panel_perfil.php";
    </script>';
    }

 $consulta_banner = $cone->prepare("select * from banner_principal");  
?>

              <div class="container-fluid head-contenido">
                  <div class="d-flex justify-content-left">
                      <div class="p-2">
                         <h2>Banner principal</h2>
                      </div>
                  </div>
              </div>

              <div class="d-flex justify-content-center">
                   <a class="btn btn-primary boton-plantas text-center m-5" href="agregar_banner_principal.php">
                    <i class="fas fa-plus" style="color: #ffffff;"> AGREGAR</i>
                  </a>  
              </div>

              <?php

                        $consulta_banner->execute(); // Reiniciar la consulta
                        while ($fila = $consulta_banner->fetch(PDO::FETCH_ASSOC)) {
            
                            echo 
                            '
                            <div class="container">
                              <div class="row my-5">                               
                                    <div class="col-sm-12 col-md-4 px-5">
                                        <div class="imagen-producto">
                                            <img src="../img/banner/'.$fila['imagen'].'"> 
                                        </div>
                                    </div>

                                        <div class="col-sm-12 col-md-8">
                                                <div class="d-flex flex-wrap justify-content align-content-center" style="height:100%">
                                                    <h3 class="h2"> '.$fila['titulo'].' </h3>
                                                    <p class="text-justify">  
                                                        '.$fila['descripcion'].'
                                                    </p>
                                                    <form class="m-auto" method="post" role="form" style="height:100%">
                                                    <div class="d-flex flex-row justify-content-center align-content-center px-3">
                                                        <a class="nav-link boton-plantas text-center mx-3" href="actualizar_banner_principal.php?id='.(base64_encode($fila['id'])).'">
                                                          ACTUALIZAR DATOS
                                                        </a>
                                                        <a id="eliminar_banner" onclick="borrar_banner('.$fila['id'].');" href="#" class="btn btn-danger" style="width:200px; height:40px;"> ELIMINAR</a>
                                                        </div>
                                                  </form>
                                                </div> 
                                        </div>
                                    </div> 
                                </div>';
                        }
                  ?>

<script>
  function borrar_banner(id) {
    var resultado = confirm("¿ESTAS SEGURO QUE DESEAS ELIMINAR ESTE REGISTRO?");

if (resultado) {
  
        const data = new FormData();
        data.append('opcion', '1');
        data.append('id', id);
        console.log(data);

        fetch('./crud_banner_principal.php', {
            method: 'POST',
            body: data
        })
        .then(response => response.text()) // Lee la respuesta del servidor
        .then(resultado => {
            alert(resultado);
            location.reload()
        })
        .catch(error => {
            console.error('Error:', error);
        });
    
}
    }

</script> 
<?php
 include("footer_panel.php");
?>