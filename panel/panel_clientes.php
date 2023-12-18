<?php

include('validacion_usuarios.php');

if($_SESSION['permisos']!='1' ){
    echo '
    <script>
    location.href ="panel_perfil.php";
    </script>';
    }
 
 $consulta_clientes = $cone->prepare("select * from clientes"); 
 $consulta_clientes->execute();
?>
           
              <div class="container-fluid head-contenido">
                  <div class="d-flex justify-content-left">
                      <div class="p-2">
                         <h2>Clientes</h2>
                      </div>
                  </div>
              </div>

                <div class="d-flex justify-content-center">
                   <a class="btn btn-primary boton-plantas text-center m-5" href="agregar_clientes.php">
                    <i class="fas fa-plus" style="color: #ffffff;"> AGREGAR</i>
                  </a>  
                </div>
        
            
          <div class="row mx-3">

                <?php
                            while ($fila = $consulta_clientes->fetch(PDO::FETCH_ASSOC)) {
                                echo'
                 <div class=" col-10 col-xl-4 p-4" style="max-height: 700px; overflow:hidden;">
                        <div class="d-flex flex-wrap align-content-center border border-dark"  style="height:100%">
                            <img class="card-img-top" src="../img/clientes/'.$fila['logo'].'" alt="imagen" style="max-height:200px; min-height:200px;">
                            <div class="card-body" style="overflow:hidden;">
                                    <h4 class="card-title">'.$fila['nombre'].'</h4>
                                    <p class="card-text text-justify font-weight-bold">Link de su pagina:</p>
                                    <a href="'.$fila['link_pagina'].'" class="btn stretched-link">'.$fila['link_pagina'].'</a>
                                    <form method="post" role="form" style="height:100%">
                                                <div class="d-flex flex-column justify-content-center align-content-center">
                                                      <a class="nav-link boton-plantas text-center" href="actualizar_cliente.php?id='.base64_encode($fila['id']).'">
                                                        ACTUALIZAR DATOS
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

        fetch('./crud_clientes.php', {
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