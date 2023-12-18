<?php

include('validacion_usuarios.php');

if($_SESSION['permisos']!='1' ){
  echo '
  <script>
  location.href ="panel_perfil.php";
  </script>';
  }
 
 $consulta = $cone->prepare("select * from usuarios where id !=".$_SESSION['id']); 
 $consulta->execute();
?>
           
              <div class="container-fluid head-contenido">
                  <div class="d-flex justify-content-left">
                      <div class="p-2">
                         <h2>USUARIOS</h2>
                      </div>
                  </div>
              </div>

                <div class="d-flex justify-content-center">
                   <a class="btn btn-primary boton-plantas text-center m-5" href="agregar_usuario.php">
                    <i class="fas fa-plus" style="color: #ffffff;"> AGREGAR</i>
                  </a>  
                </div>            
    <?php
              $indice = 0;

              while ($usuarios = $consulta->fetch(PDO::FETCH_ASSOC)) {
                 echo '
                 <hr style="background-color: #000000;">
                 <div class="row px-5" >
                    <div class="col-12 col-md-4 text-justify">
                      <div class="d-flex flex-column aling-content-center justify-content-center p-0" style="height:100%; overflow: hidden;">
                           <strong> NOMBRE: </strong>'.$usuarios['nombre'].'
                      </div>
                   </div>
                    <div class="col-12 col-md-4 text-justify">
                      <div class="d-flex flex-column aling-content-center justify-content-center p-0" style="height:100%; overflow: hidden;">
                            <strong>PASSWORD: </strong>'.$usuarios['password'].'
                      </div>
                   </div>
                  <div class="col-12 col-md-4 text-center">
                      <div class="d-flex flex-column aling-content-center justify-content-center p-0" style="height:100%; overflow: hidden;">
                      <strong>ROL:</strong> '.$usuarios['rol'].'
                      </div>
                   </div>
                  <div class="col-12 col-md-12">
                      <div class="d-flex flex-column aling-content-center justify-content-center p-0" style="height:100%; overflow: hidden;">
                        <form class="m-auto" method="post" action="modificar_usuario.php" role="form" style="height:100%">
                          <div class="d-flex justify-content-center align-content-center p-2">
                            <button class="btn btn-success mx-3" type="submit"> ACTUALIZAR DATOS</button>      
                             <input type="hidden" name="id" value="'.$usuarios['id'].'">
                            <input id="eliminar_planta" onclick="borrar_usuario('.$usuarios['id'].');" class="btn btn-danger mx-3" value="ELIMINAR">   
                          </div>
                    </form>
                      </div>
                   </div>
                </div>
                 ';
              }
    ?>          
<script>
  
   function borrar_usuario(id) {
    var resultado = confirm("¿ESTAS SEGURO QUE DESEAS ELIMINAR ESTE REGISTRO?");

if (resultado) {
        const data = new FormData();
        data.append('opcion', '3');
        data.append('id', id);
        console.log(data);

        fetch('crud_usuarios.php', {
            method: 'POST',
            body: data
        })
        .then(response => response.text()) 
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