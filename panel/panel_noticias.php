<?php

include('validacion_usuarios.php');

if($_SESSION['permisos']!='1' && $_SESSION['permisos']!='4' ){
    echo '
    <script>
    location.href ="panel_perfil.php";
    </script>';
    }
 
 $consulta_noticias = $cone->prepare("select * from noticias"); 
 $consulta_noticias->execute();
?>
           
              <div class="container-fluid head-contenido">
                  <div class="d-flex justify-content-left">
                      <div class="p-2">
                         <h2>Noticias</h2>
                      </div>
                  </div>
              </div>

                <div class="d-flex justify-content-center">
                   <a class="btn btn-primary boton-plantas text-center m-5" href="agregar_noticias.php">
                    <i class="fas fa-plus" style="color: #ffffff;"> AGREGAR</i>
                  </a>  
                </div>
        
            
          <div class="row mx-3 my-5">

                <?php
                            while ($fila = $consulta_noticias->fetch(PDO::FETCH_ASSOC)) {
                                echo'
                 <div class=" col-10 col-xl-4 p-4" style="max-height: 750px; overflow:hidden;">
                        <div class="d-flex flex-wrap align-content-center"  style="height:100%">
                            <img class="my-3" my-3 src="../img/noticias/'.$fila['imagen_principal'].'" alt="imagen" style="max-height:200px; min-height:200px; max-width:100%">
                            <div class="card-body" style="overflow:hidden;">
                                    <h4 class="card-title">'.$fila['titulo'].'</h4>
                                    <div class="d-flex justify-content-start">
                                            <h7 class="text-muted">
                                                '.$fila['fecha'].'
                                            </h7>
                                        </div>
                                    <p class="card-text text-justify">'.$fila['resumen'].'</p>
                                    <div class="d-flex justify-content-end"> 
                                     </div> 
                                    <form method="post" role="form" style="height:100%">
                                                <div class="d-flex flex-column justify-content-center align-content-center">
                                                      <a class="nav-link boton-plantas text-center" href="actualizar_noticia.php?id='.base64_encode($fila['id']).'">
                                                        ACTUALIZAR DATOS
                                                      </a>
                                                      <a class="nav-link boton-plantas text-center" href="actualizar_contenido_noticia.php?id='.base64_encode($fila['id']).'">
                                                      ACTUALIZAR CONTENIDO
                                                    </a>
                                                      <input id="eliminar_planta" onclick="borrar_planta('.$fila['id'].');" class="btn btn-danger" value="ELIMINAR">
                                                </div>
                                    </form>
                                </div>
                        </div>  
                    </div>';
                            }
                ?>  


    </div>      
<script>
  
   function borrar_planta(id) {
    var resultado = confirm("¿ESTAS SEGURO QUE DESEAS ELIMINAR ESTE REGISTRO?");

if (resultado) {
  
        const data = new FormData();
        data.append('opcion', '1');
        data.append('id', id);
        console.log(data);

        fetch('./crud_noticias.php', {
            method: 'POST',
            body: data
        })
        .then(response => response.text()) // Lee la respuesta del servidor
        .then(resultado => {
            alert(resultado);
            location.reload();
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