<?php
include('validacion_usuarios.php');

if($_SESSION['permisos']!='1' && $_SESSION['permisos']!='2' ){
    echo '
    <script>
    location.href ="panel_perfil.php";
    </script>';
    }

?>

<div class="container-fluid head-contenido">
                  <div class="d-flex justify-content-left">
                      <div class="p-2">
                         <h2>PROCESO AUTOMOTRIZ</h2>
                      </div>
                  </div>
              </div>

            <div class="container mt-5">
                  <div class="d-flex justify-content-center">
                      <div class="p-2 text-center">
                         <h5>INGRESE LOS DATOS REQUERIDOS PARA CREAR EL NUEVO REGISTRO </h4>
                         <a class="nav-link" href="javascript: history.go(-1)">presiona aqui para regresar a la pagina anterior</a>
                      </div>
                  </div>
            </div>

<form id="agregar" action="borrar_planta.php" method=post  class="m-5 p-5 border border-dark rounded">

<div class="row">
  <div class="col-9 mb-3">
      <label>NOMBRE DEL PROCESO</label>
      <input type="text" minlength=5 maxlength=200 class="form-control mt-1" id="nombre_r" name="nombre_r" placeholder="nombre" required>
  </div>
</div>

<div class="row">
  <div class="col-9 mb-3">
      <label>NOMBRE DEL PROCESO EN INGLÉS</label>
      <input type="text" minlength=5 maxlength=200 class="form-control mt-1" id="nombre_ri" name="nombre_ri" placeholder="nombre en inglés">
  </div>
</div>

  <div class="mb-3">
      <label>DESCRIPCION</label>
      <textarea minlength=20 maxlength=400  class="form-control mt-1" id="texto_r" name="texto_r" placeholder="escriba un texto aqui" rows="8" required></textarea>
  </div>

  <div class="mb-3">
      <label>DESCRIPCION EN INGLÉS</label>
      <textarea minlength=20 maxlength=400  class="form-control mt-1" id="texto_ri" name="texto_ri" placeholder="escriba texto en inglés" rows="8"></textarea>
  </div>

<div class="d-flex flex-column mb-3">
<label>Seleccione una imagen</label>
<input type="file" id="imagen_r" name="imagen_r" required>
</div>


<button class="btn btn-primary" type="submit">Guardar</button>
</form>


	
<script>
    document.getElementById('agregar').addEventListener('submit', function(event) {
    event.preventDefault(); 

   
    const formData = new FormData(this);
    formData.append('opcion', '8');
     

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

</script> 
<?php
 include("footer_panel.php");
?>