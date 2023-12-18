<?php
include('validacion_usuarios.php');

if($_SESSION['permisos']!='1' && $_SESSION['permisos']!='4' ){
    echo '
    <script>
    location.href ="panel_perfil.php";
    </script>';
    }
    
 $empleos = $cone->prepare("select * from empleos"); 
 $empleos->execute();
?>

              <div class="container-fluid head-contenido">
                  <div class="d-flex justify-content-left">
                      <div class="p-2">
                         <h2>Vacantes</h2>
                      </div>
                  </div>
              </div>

              <div class="d-flex justify-content-center m-5">
                          <div class="d-flex justify-content-center">
                            <a class="btn btn-primary" href="agregar_vacante.php" type="submit">
                              <i class="fas fa-plus" style="color: #ffffff;"> AGREGAR VACANTE</i>
                            </a>
                          </div>
                </div>
                <div class="row mx-0">
                <?php
            while($empleo = $empleos->fetch(PDO::FETCH_ASSOC)){
            echo '<div class="col-6 mt-3 mx-0">
                        <div class="card empleo" style="overflow:hidden;">
                                <div class="card-body text-center">
                                    <p class="text-right m-0">'.$empleo['fecha'].'</p>
                                    <p class="text-left m-0">'.$empleo['area'].'</p>
                                    <p class="text-center">'.$empleo['nombre_vacante'].'</p>
                                    <p class="text-justify mx-0 my-3">'.$empleo['descripcion'].'</p>
                                </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-primary mx-3" href="actualizar_vacante.php?id='.(base64_encode($empleo['id'])).'">
                                ACTUALIZAR
                            </a> 
                            <a class="btn btn-success mx-3" href="contenido_vacante.php?id='.(base64_encode($empleo['id'])).'">
                                PARRAFOS
                            </a> 
                            <a id="eliminar_banner" onclick="borrar_empleo('.$empleo['id'].');" href="#" class="btn btn-danger">
                                ELIMINAR
                            </a>   
                      </div>
                    </div>';
            }
            ?>
 </div>
<script>
       function borrar_empleo(id) {
    var resultado = confirm("¿ESTAS SEGURO QUE DESEAS ELIMINAR ESTE REGISTRO?");

if (resultado) {
  
        const data = new FormData();
        data.append('opcion', '1');
        data.append('id', id);
        console.log(data);

        fetch('./crud_vacantes.php', {
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