<?php
include('validacion_usuarios.php');
if($_SESSION['permisos']!='1' && $_SESSION['permisos']!='4' ){
    echo '
    <script>
    location.href ="panel_perfil.php";
    </script>';
    }
?>

              <div class="container-fluid head-contenido">
                  <div class="d-flex justify-content-left">
                      <div class="p-2">
                         <h2>Vacantes</h2>
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


<form id="agregar_vacante" action="" method=post  class="m-5 p-5 border border-dark rounded">

<div class="row">
  <div class="col-9 mb-3">
      <label>NOMBRE DE LA VACANTE</label>
      <input type="text" minlength=5 maxlength=200 class="form-control mt-1" id="nombre_vacante" name="nombre_vacante" placeholder="ingrese aqui el titulo de la vacante" required>
  </div>
</div>


<div class="row">
  <div class="col-9 mb-3">
      <label>NOMBRE DE LA VACANTE EN INGLÉS</label>
      <input type="text" minlength=5 maxlength=200 class="form-control mt-1" id="nombre_vacantei" name="nombre_vacantei" placeholder="ingrese aqui el titulo de la vacante en inglés" required>
  </div>
</div>

  <div class="row">
      <div class="form-group col-md-9 mb-3">
          <label for="inputname">ÁREA</label>
          <input type="text" minlength=5 maxlength=150 class="form-control mt-1" id="area" name="area" placeholder="área" required>
      </div>
      <div class="form-group col-md-9 mb-3">
          <label for="inputname">ÁREA EN INGLÉS</label>
          <input type="text" minlength=5 maxlength=150 class="form-control mt-1" id="areai" name="areai" placeholder="área en inglés" required>
      </div>
      <div class="form-group col-md-4 mb-3">
          <label for="inputemail">FECHA</label>
         <input type="date" class="form-control mt-1" id="fecha" name="fecha" placeholder="fecha" required>
      </div>
  </div>
  <div class="mb-3">
      <label>DESCRIPCION</label>
      <textarea minlength=5 maxlength=400  class="form-control mt-1" id="descripcion" name="descripcion" placeholder="descripcion de la vacante" rows="8"required></textarea>
  </div>
  
  <div class="mb-3">
      <label>DESCRIPCION EN INGLÉS</label>
      <textarea minlength=5 maxlength=400  class="form-control mt-1" id="descripcioni" name="descripcioni" placeholder="descripcion de la vacante en inglés" rows="8" required></textarea>
  </div>

<div class="d-flex flex-column mb-3">
<label>Imagen</label>
<input type="file" id="file_imagen" name="file_imagen" required>
</div>

<button class="btn btn-primary" type="submit">Guardar</button>
</form>


<script>
    document.getElementById('agregar_vacante').addEventListener('submit', function(event) {
    event.preventDefault(); 

  
    const formData = new FormData(this);
    formData.append('opcion', '2');
     

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