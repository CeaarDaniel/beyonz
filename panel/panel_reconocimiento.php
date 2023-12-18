<?php
include('validacion_usuarios.php');

if($_SESSION['permisos']!='1' ){
    echo '
    <script>
    location.href ="panel_perfil.php";
    </script>';
    }

 $consulta_banner = $cone->prepare("select * from banner_reconocimiento");  
?>

              <div class="container-fluid head-contenido">
                  <div class="d-flex justify-content-left">
                      <div class="p-2">
                         <h2>Banner reconocimiento</h2>
                      </div>
                  </div>
              </div>

              <div class="d-flex justify-content-center" style="width:100%;">
                      <form 
                        id="agregar_imagen" 
                        action="" 
                        method=post  
                        class="m-5 p-5" 
                        style="width:50%">

                          <div class="form-group">
                                <div class="d-flex flex-column mb-3">
                                  <label class="m-3 text-center font-weight-bold">AGREGAR UNA NUEVA IMAGEN</label>
                                  <input type="file" id="img_reconocimiento" name="img_reconocimiento" required>
                                </div>
                          </div>

                          <div class="d-flex justify-content-center" style="width:100%;">
                              <button class="btn btn-primary" type="submit">
                              <i class="fas fa-plus" style="color: #ffffff;"> AGREGAR</i>
                              </button>
                          </div>

                      </form>
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
                                            <img src="../img/banner_calidad/'.$fila['img_reconocimiento'].'"> 
                                        </div>
                                    </div>

                                        <div class="col-sm-12 col-md-8">
                                            <div class="d-flex flex-wrap justify-content align-content-center" style="height:100%"> 
                                                <form id="modificar_imagen" 
                                                      enctype="multipart/form-data"
                                                      class="m-auto" 
                                                      method="post" 
                                                      action="crud_calidad.php"
                                                      role="form" 
                                                      style="height:100%">
                                                      <div class="form-group">
                                                              <input type="file" id="img_reconocimiento	" name="img_reconocimiento" required> 
                                                      </div>
                                                      <button class="btn btn-primary" type="submit">
                                                        MODIFICAR IMAGEN
                                                      </button> 
                                                      <a id="eliminar_banner" onclick="borrar_banner('.$fila['id'].');" href="#" class="btn btn-danger" style="width:200px; height:40px;">
                                                        ELIMINAR
                                                      </a>   
                                                      <input type="hidden" id="id" name="id" value="'.$fila['id'].'">
                                                      <input type="hidden" id="opcion" name="opcion" value="8"> 
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
        data.append('opcion', '7');
        data.append('id', id);
        console.log(data);

        fetch('./crud_calidad.php', {
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
    

    document.getElementById('agregar_imagen').addEventListener('submit', function(event) {
    event.preventDefault(); 


    const formData = new FormData(this);
    formData.append('opcion', '6');
     

    fetch('crud_calidad.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        console.log(data);
        location.reload()
    })
    .catch(error => {
        console.error('Error:', error);
    });
});



</script> 
<?php
 include("footer_panel.php");
?>