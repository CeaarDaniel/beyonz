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
                         <h2>Noticias</h2>
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


<form id="agregar_noticia" action="" method=post  class="m-5 p-5 border border-dark rounded">

<div class="row">
  <div class="col-9 mb-3">
      <label>TITULO</label>
      <input type="text" minlength=5 maxlength=100 class="form-control mt-1" id="titulo" name="titulo" placeholder="ingrese aqui el titulo" required>
  </div>
</div>

<div class="row">
  <div class="col-9 mb-3">
      <label>TITULO EN INGLÉS</label>
      <input type="text" minlength=5 maxlength=100 class="form-control mt-1" id="tituloi" name="tituloi" placeholder="ingrese el titulo en inglés" required>
  </div>
</div>

  <div class="row">
    
      <div class="form-group col-md-9 mb-3">
          <label for="inputname">AUTOR</label>
          <input type="text" minlength=5 maxlength=100 class="form-control mt-1" id="autor" name="autor" placeholder="Nombre de quien lo edito" required>
      </div>
      <div class="form-group col-md-4 mb-3">
          <label for="inputemail">FECHA</label>
         <input type="date" class="form-control mt-1" id="fecha" name="fecha" placeholder="fecha" required>
      </div>
  </div>
  <div class="mb-3">
      <label>Resumen</label>
      <textarea minlength=20 maxlength=300  class="form-control mt-1" id="resumen" name="resumen" placeholder="resumen de la noticia" rows="8" required></textarea>
  </div>

  <div class="mb-3">
      <label>Resumen en inglés</label>
      <textarea minlength=20 maxlength=300  class="form-control mt-1" id="resumeni" name="resumeni" placeholder="resumen de la noticia en inglés" rows="8" required></textarea>
  </div>

<div class="d-flex flex-column mb-3">
<label>Imagen pricnipal</label>
<input type="file" id="file_imagen" name="file_imagen" required>
</div>

<button class="btn btn-primary" type="submit">Guardar</button>
</form>


<script>
    document.getElementById('agregar_noticia').addEventListener('submit', function(event) {
    event.preventDefault(); 

  
    const formData = new FormData(this);
    formData.append('opcion', '2');
     

    fetch('crud_noticias.php', {
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