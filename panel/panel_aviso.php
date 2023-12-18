<?php

include('validacion_usuarios.php');

if($_SESSION['permisos']!='1'){
    echo '
    <script>
    location.href ="panel_perfil.php";
    </script>';
    }
 
 $consulta_empleos = $cone->prepare("select * from contenido_empleos"); 
 $consulta_empleos->execute();
 $empleos = $consulta_empleos->fetch(PDO::FETCH_ASSOC);
?>
           
              <div class="container-fluid head-contenido">
                  <div class="d-flex justify-content-left">
                      <div class="p-2">
                         <h2>AVISO DE RECLUTAMIENTO</h2>
                      </div>
                  </div>
              </div>

              <div class="container mt-5">
                  <div class="d-flex justify-content-center">
                      <div class="p-2 text-center">
                         <h5>INGRESE LOS DATOS REQUERIDOS PARA ACTUALIZAR LA PAGINA </h4>
                      </div>
                  </div>
            </div>
        
            

<form id="actualizar" action="" method=post  class="m-5 p-5 border border-dark rounded">

    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <label><b>AVISO DE RECLUTAMIENTO</b></label>
                <textarea minlength=5 maxlength=500  class="form-control mt-1" id="aviso_reclutamiento" name="aviso_reclutamiento" placeholder="texto en español" rows="8"><?php echo $empleos['aviso_reclutamiento']?></textarea>
            </div>
        </div>

        <div class="col-12">
            <div class="mb-3 mt-5">
                <label><b>TEXTO EN INGLÉS</b></label>
                <textarea minlength=5 maxlength=500  class="form-control mt-1" id="aviso_reclutamientoi" name="aviso_reclutamientoi" placeholder="texto en ingles" rows="8"><?php echo $empleos['aviso_reclutamientoi']?></textarea>
            </div>
        </div>
    </div>

    <div class="mb-3">
        <div class="d-flex aling-content-center justify-content-center my-5">
            <img src="../img/vacantes/<?php  echo $empleos['imagen_reclutamiento']?>" style="max-height:400px; max-width:400px"> <br>
        </div>
    
        <label>Cambiar imagen</label>
        <input type="file" name="imagen_reclutamiento" id="imagen_reclutamiento">
    </div>


    <button class="btn btn-primary" type="submit">ACTUALIZAR DATOS</button>
    <input type="hidden" id="id" name="id" value="<?php echo $empleos['id'] ?>">   
</form>


<script>
document.getElementById('actualizar').addEventListener('submit', function(event) {
    event.preventDefault(); 
    const formData = new FormData(this);
    formData.append('opcion', '8');

    fetch('crud_vacantes.php', {
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