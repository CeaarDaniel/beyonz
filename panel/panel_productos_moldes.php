<?php

include('validacion_usuarios.php');

if($_SESSION['permisos']!='1' && $_SESSION['permisos']!='3'){
    echo '
    <script>
    location.href ="panel_perfil.php";
    </script>';
    }
 
 $consulta_moldes = $cone->prepare("select * from categoria_moldes"); 
 $consulta_moldes->execute();
 $indice=0;
?>
           
           <div class="container-fluid head-contenido">
                  <div class="d-flex justify-content-left">
                      <div class="p-2">
                         <h2>Productos de moldes</h2>
                      </div>
                  </div>
              </div>
        
              <div id="contenedor-productos" class="container p-0 contenedor-productos">
              <div class="row justify-content-center mx-0">

                <?php
                    while ($fila = $consulta_moldes->fetch(PDO::FETCH_ASSOC)) {
                        $datos_codificados = base64_encode($fila['id_catm']);
                        echo '
                                <div class="col-12 col-md-4 px-1 my-3 mx-0"> 
                                    <div class="d-flex flex-wrap justify-content-center align-content-center px-2 border border-dark cat-aut"  style="height:100%;">
                                        <img class="rounded-circle mt-2" src="../img/productos/'.$fila['imagen_catm'].'" style="width:200px"> 
                                    <div class="d-flex flex-column my-3" style="width:100%">
                                           <h3 class="text-center"> '.$fila['nombre_catm'].'</h3> 
                                    </div>
                                        <p class="text-center">
                                            '.$fila['descripcion_catm'].'
                                        </p>
                                        <a class="btn btn-primary btn m-3" href="#" data-toggle="collapse" data-target="#c'.$fila['id_catm'].'">   
                                           VER PRODUCTOS                       
                                        </a>
                                        <a class="btn btn-primary btn m-3" href="actualizar_categoria_moldes.php?id_c='.$datos_codificados.'">
                                        MODIFICAR CATEGORIA
                                        </a>
                                    </div>
                                </div>';
                    }
                    ?>

                <div class="d-flex justify-content-center">
                   <a class="btn btn-primary boton-plantas text-center m-5" href="agregar_producto_moldes.php">
                    <i class="fas fa-plus" style="color: #ffffff;"> AGREGAR UNA PRODUCTO</i>
                  </a>  
                </div>
            </div>   
            <?php
                $consulta_moldes->execute();
                 while($fila = $consulta_moldes->fetch(PDO::FETCH_ASSOC)){
                        echo '<div id="c'.$fila['id_catm'].'" class="collapse" data-parent="#contenedor-productos">';
                        echo '<div class="row mt-3">';
                            $consulta_producto = $cone->prepare("select * from producto_moldes where id_pcm= '".$fila['id_catm']."'"); 
                            $consulta_producto->execute();
                                    while ($producto = $consulta_producto->fetch(PDO::FETCH_ASSOC)) {
                                        echo '
                                            <div class="col-12 py-3 px-5">
                                                    <div class="row">
                                                            <div class="col-sm-12 col-md-4 px-5">
                                                                    <div class="imagen-producto">
                                                                        <img src="../img/productos_moldes/'.$producto['imagen_pm'].'"> 
                                                                    </div>
                                                                </div>
                                            
                                                                <div class="col-sm-12 col-md-8 p-0">
                                                                      <h4>'.$producto['nombre_pm'].'</h4> 
                                                                        <div class="descripcion-prodcto text-justify pr-2" style="overflow:hidden;">
                                                                            '.$producto['descripcion_pm'].'
                                                                        </div>
                                                                        
                                          <form class="m-auto" method="post" role="form" style="height:100%">
                                            <div class="d-flex flex-row justify-content-center align-content-center px-3">
                                                <a class="nav-link boton-plantas text-center mx-3" target="_blank" href="actualizar_moldes.php?id='.(base64_encode($producto['id_pm'])).'">
                                                  ACTUALIZAR DATOS
                                                </a>
                                                <input id="eliminar_planta" onclick="borrar_producto('.$producto['id_pm'].');" class="btn btn-danger" value="ELIMINAR">
                                                </div>
                                          </form>
                                                                </div>
                                                    </div>
                                            </div>';
                                    }
                      echo  '</div>';
                      echo '</div>';
                    } 
            ?>
</div>
<script>
  
   function borrar_producto(id) {
    var resultado = confirm("¿ESTAS SEGURO QUE DESEAS ELIMINAR ESTE REGISTRO?");

if (resultado) {
  
        const data = new FormData();
        data.append('opcion', '2');
        data.append('id_pm', id);
        console.log(data);

        fetch('./crud_categoria_moldes.php', {
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