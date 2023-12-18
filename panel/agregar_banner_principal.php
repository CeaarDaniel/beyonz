<?php
include('validacion_usuarios.php');

if($_SESSION['permisos']!='1' ){
    echo '
    <script>
    location.href ="panel_perfil.php";
    </script>';
    }
?>

              <div class="container-fluid head-contenido">
                  <div class="d-flex justify-content-left">
                      <div class="p-2">
                         <h2>Banner principal</h2>
                      </div>
                  </div>
              </div>

            <div class="container mt-5">
                  <div class="d-flex justify-content-center flex-column">

                      <div class="p-2 text-center">
                         <h5>INGRESE LOS VALORES PARA LOS CAMPOS QUE DESEA ACTUALIZAR</h4>
                         <a class="nav-link" href="javascript: history.go(-1)">presiona aqui para regresar a la pagina anterior</a>
                      </div>
                  </div>
            </div>

<div class="d-flex justify-content-center" style="width:100%;">
<form 
  id="agregar" 
  action="crud_categoria_automotriz.php" 
  method=post  
  class="m-5 p-5 border border-dark rounded" 
  style="width:50%">

    <div class="form-group">
          <label class="mt-3">Nombre del producto</label>
          <input type="text" name="nombre" id="nombre" minlength=5 maxlength="100" class="form-control mt-1" placeholder="escriba texto aqui">

          <label class="mt-3">Nombre del producto en inglés</label>
          <input type="text" name="nombrei" id="nombrei" minlength=5 maxlength="100" class="form-control mt-1" placeholder="escriba texto en inglés">
                   
          <label class="mt-3">Descripcion</label>
          <textarea minlength=5 maxlength=300  class="form-control mt-1" id="descripcion" name="descripcion"  placeholder="texto en español" rows="8"></textarea>

          <label class="mt-3">Descripcion en inglés</label>
          <textarea minlength=5 maxlength=300  class="form-control mt-1" id="descripcioni" name="descripcioni" placeholder="escriba el texto en inglés" rows="8"></textarea>

          <div class="d-flex flex-column mb-3">
            <label class="mt-3">Seleccione una imagen</label>
            <input type="file" id="file_imagen" name="file_imagen" required>
          </div>
    </div>

    <div class="d-flex justify-content-center" style="width:100%;">
        <button class="btn btn-primary" type="submit">
             Agregar
        </button>
    </div>

</form>

</div>
	
<script>
    document.getElementById('agregar').addEventListener('submit', function(event) {
    event.preventDefault(); 


    const formData = new FormData(this);
    formData.append('opcion', '2');
     

    fetch('crud_banner_principal.php', {
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