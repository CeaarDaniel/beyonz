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
                         <h2>Clientes</h2>
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

<form id="agregar_cliente" action="borrar_planta.php" method=post  class="m-5 p-5 border border-dark rounded">

<div class="row">
  <div class="col-9 mb-3">
      <label>NOMBRE</label>
      <input type="text" minlength=1 maxlength=200 class="form-control mt-1" id="nombre" name="nombre" placeholder="nombre" required>
  </div>
</div>
  <div class="row">
    

    <div class="form-group col-md-6 mb-3">
          <label for="inputemail">link de su sitio web</label>
         <input type="text" minlength=1 maxlength=200 class="form-control mt-1" id="link" name="link" placeholder="link de la pagina" rows="8"></textarea>
      </div>
  </div>



<div class="d-flex flex-column mb-3">
<label>Imagen o logo del cliente</label>
<input type="file" id="file_imagen" name="file_imagen" required>
</div>


<button class="btn btn-primary" type="submit">Guardar</button>
</form>


	
<script>
    document.getElementById('agregar_cliente').addEventListener('submit', function(event) {
    event.preventDefault(); 

  
    const formData = new FormData(this);
    formData.append('opcion', '2');
     

    fetch('crud_clientes.php', {
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