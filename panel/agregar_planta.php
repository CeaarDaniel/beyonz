<?php
include('validacion_usuarios.php');

if($_SESSION['permisos']!='1'){
    echo '
    <script>
    location.href ="panel_perfil.php";
    </script>';
    }
?>
            <div class="container-fluid head-contenido">
                <div class="d-flex justify-content-left">
                    <div class="p-2">
                        <h2>PLANTAS</h2>
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

<form id="agregar_planta" action="borrar_planta.php" method=post  class="m-5 p-5 border border-dark rounded">

<div class="row">
  <div class="col-9 mb-3">
      <label>NOMBRE</label>
      <input type="text" minlength=5 maxlength=200 class="form-control mt-1" id="nombre" name="nombre" placeholder="nombre" required>
  </div>
</div>
  <div class="row">
    
      <div class="form-group col-md-6 mb-3">
          <label for="inputname">TELEFONO</label>
          <input type="text" minlength=10 maxlength=20 class="form-control mt-1" id="telefono" name="telefono" placeholder="numero telefónico" rows="8" required>
      </div>
      <div class="form-group col-md-6 mb-3">
          <label for="inputemail">FAX</label>
         <input type="text" minlength=10 maxlength=20 class="form-control mt-1" id="fax" name="fax" placeholder="numero telefónico" rows="8"></textarea>
      </div>
  </div>
  <div class="mb-3">
      <label>DIRECCIÓN/DESCRIPCION</label>
      <textarea minlength=50 maxlength=300  class="form-control mt-1" id="descripcion" name="descripcion" placeholder="escriba un texto aqui" rows="8" required></textarea>
  </div>

  <div class="mb-3">
      <label>DESCRIPCION EN INGLÉS</label>
      <textarea minlength=50 maxlength=300  class="form-control mt-1" id="descripcioni" name="descripcioni" placeholder="texto en inglés" rows="8"></textarea>
  </div>

<div class="row">
<div class="form-group col-md-6 mb-3">
<label>UBICACIÓN GEOGRAFICA</label>
<input type="text" class="form-control mt-1" id="ubicacion" name="ubicacion" placeholder="ubicacion" required>
</div>
<div class="form-group col-md-6 mb-3">
<label>DIRECCION DE LA PAGINA WEB</label>
<input type="text" class="form-control mt-1" id="pagina" name="pagina" placeholder="pagina">
</div>
</div>

<div class="d-flex flex-column mb-3">
    <label>Seleccione el pais donde esta ubicada la planta </label>
<select class="form-control" id="pais" name="pais" style="max-width:50%" required>
    <option value="">---Seleccione una opcion---</option>
    <option value="1">MÉXICO</option>
    <option value="2">JÁPON</option>
    <option value="3">CHINA</option>
  <option value="4">TAILANDIA</option>
</select>
</div>

<div class="d-flex flex-column mb-3">
<label>Seleccione una imagen</label>
<input type="file" id="imagen" name="file_imagen" required>
</div>


<button class="btn btn-primary" type="submit">Guardar</button>
</form>


	
<script>
    document.getElementById('agregar_planta').addEventListener('submit', function(event) {
    event.preventDefault(); 

    const formData = new FormData(this);
    formData.append('opcion', '1');
     
    fetch('crud_planta.php', {
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