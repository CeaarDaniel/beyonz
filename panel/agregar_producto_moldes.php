<?php
include('validacion_usuarios.php');
 $consulta_moldes = $cone->prepare("select * from categoria_moldes"); 
 $consulta_moldes->execute();
 
 if($_SESSION['permisos']!='1' && $_SESSION['permisos']!='3'){
    echo '
    <script>
    location.href ="panel_perfil.php";
    </script>';
    }
?>

<div class="container-fluid head-contenido">
                  <div class="d-flex justify-content-left">
                      <div class="p-2">
                         <h2>Productos de moldes</h2>
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

<form id="agregar_producto" action="" method=post  class="m-5 p-5 border border-dark rounded">

<div class="row">
  <div class="col-9 mb-3">
      <label>NOMBRE</label>
      <input type="text" minlength=5 maxlength=200 class="form-control mt-1" id="nombre" name="nombre" placeholder="nombre" required>
  </div>
</div>


<div class="row">
  <div class="col-9 mb-3">
      <label>NOMBRE EN INGLÉS</label>
      <input type="text" minlength=5 maxlength=200 class="form-control mt-1" id="nombrei" name="nombrei" placeholder="nombre en inglés" required>
  </div>
</div>


  <div class="mb-3">
      <label>DESCRIPCION</label>
      <textarea minlength=5 maxlength=300  class="form-control mt-1" id="descripcion" name="descripcion" placeholder="escriba un texto aqui" rows="8"></textarea>
  </div>

  <div class="mb-3">
      <label>DESCRIPCION EN INGLÉS</label>
      <textarea minlength=5 maxlength=300  class="form-control mt-1" id="descripcioni" name="descripcioni" placeholder="escriba texto en inglés" rows="8"></textarea>
  </div>


<div class="d-flex flex-column mb-3">
    <label>Seleccione la categoria a la que pertenece el producto </label>
<select class="form-control" id="categoria" name="categoria" style="max-width:50%" required>
    <option value="">---Seleccione una categoria---</option>
    <?php
    while ($categoria = $consulta_moldes->fetch(PDO::FETCH_ASSOC))
     echo '<option value="'.$categoria['id_catm'].'">'.$categoria['nombre_catm'].'</option>'
    ?>
</select>
</div>

<div class="d-flex flex-column mb-3">
<label>Seleccione una imagen</label>
<input type="file" id="file_imagen" name="file_imagen" required>
</div>


<button class="btn btn-primary" type="submit">Guardar</button>
</form>


	
<script>
    document.getElementById('agregar_producto').addEventListener('submit', function(event) {
    event.preventDefault(); 

   
    const formData = new FormData(this);
    formData.append('opcion', '1');
     

    fetch('crud_categoria_moldes.php', {
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