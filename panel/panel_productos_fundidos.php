<?php
include('validacion_usuarios.php');

if($_SESSION['permisos']!='1' && $_SESSION['permisos']!='2' && $_SESSION['permisos']!='3' ){
    echo '
    <script>
    location.href ="panel_perfil.php";
    </script>';
    }
   $consulta = $cone->prepare("select * from productos_fundidos"); 
   $consulta->execute(); 
?>

              <div class="container-fluid head-contenido">
                  <div class="d-flex justify-content-left">
                      <div class="p-2">
                         <h2>EQUIPOS</h2>
                      </div>
                  </div>
              </div>

            <div class="container mt-5">
                  <div class="d-flex justify-content-center flex-column">

                      <div class="p-2 text-center">
                         <h5>INGRESE LOS VALORES PARA LOS CAMPOS QUE DESEA ACTUALIZAR</h4>
                      </div>
                  </div>
            </div>


              <div class="d-flex justify-content-center" style="width:100%;">
                      <form id="agregar_equipo"  method=post class="m-5 p-5" style="width:80%">
                        
                          <div class="form-group">
                                <div class="d-flex flex-column mb-3">
                                  <label class="m-3 text-center font-weight-bold">AGREGAR UNA PRODUCTO</label>
                                    <textarea minlength=5 maxlength=300  class="form-control mt-1" id="descripcion" name="descripcion" placeholder="descripcion de la imagen en español" rows="4"></textarea>

                                  <label class="m-3 text-center font-weight-bold">TEXTO EN INGLÉS</label>
                                    <textarea minlength=5 maxlength=300  class="form-control mt-1" id="descripcioni" name="descripcioni" placeholder="descripcion de la imagen en inglés" rows="4"></textarea>
                                  <input type="file" id="file_imagen" name="file_imagen" required>
                                </div>

                          </div>

                          <div class="d-flex justify-content-center" style="width:100%;">
                              <button class="btn btn-primary" type="submit">
                              <i class="fas fa-plus" style="color: #ffffff;"> AGREGAR EQUIPO</i>
                              </button>
                          </div>

                      </form>
                </div>

   <?php
while ($producto = $consulta->fetch(PDO::FETCH_ASSOC)) {

    echo '<div class="container">
      <div class="row my-5">                               
            <div class="col-sm-12 col-md-4 px-5">
                <div class="imagen-producto">
                    <img src="../img/proceso_automotriz/productos_fundidos/'.$producto['imagen'].'"> 
                </div>
            </div>

                <div class="col-sm-12 col-md-8">
                    <div class="d-flex flex-wrap justify-content-center align-content-center" style="height:100%"> 
                        <form id="actualizar_equipos" 
                              enctype="multipart/form-data"
                              class="m-auto" 
                              method="post" 
                              action="crud_procesos.php"
                              role="form" 
                              style="height:100%">
                              <div class="form-group">
                              <textarea minlength=5 maxlength=300 class="form-control mt-1" id="descripcion" name="descripcion" placeholder="escriba un texto aqui" rows="4">'.$producto['descripcion'].'</textarea>
                              <textarea minlength=5 maxlength=300 class="form-control mt-1" id="descripcioni" name="descripcioni" placeholder="escriba texto en inglés" rows="4">'.$producto['descripcioni'].'</textarea>
                                      <input type="file" id="file_imagen" name="file_imagen"> 
                              </div>
                              <button class="btn btn-primary" type="submit">
                                MODIFICAR IMAGEN
                              </button> 
                              <a id="eliminar_imagen" onclick="borrar_equipo('.$producto['id'].');" href="#" class="btn btn-danger" style="width:200px; height:40px;">
                                ELIMINAR
                              </a>   
                              <input type="text" id="id" name="id" value="'.$producto['id'].'" style="opacity:0%">
                              <input type="hidden" id="opcion" name="opcion" value="12"> 
                        </form>
                    </div> 
  </div>              </div>
</div>';
  
}

?>


  	<script>

      document.getElementById('agregar_equipo').addEventListener('submit', function(event) {
    event.preventDefault(); 

    
    const formData = new FormData(this);
    formData.append('opcion', '11');
     
    
    fetch('crud_procesos.php', {
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
      
  function borrar_equipo(id) {
    var resultado = confirm("¿ESTAS SEGURO QUE DESEAS ELIMINAR ESTE REGISTRO?");

if (resultado) {
  
        const data = new FormData();
        data.append('opcion', '10');
        data.append('id', id);
        console.log(data);

        fetch('./crud_procesos.php', {
            method: 'POST',
            body: data
        })
        .then(response => response.text())
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