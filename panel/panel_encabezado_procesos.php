<?php
include('validacion_usuarios.php');

if($_SESSION['permisos']!='1' ){
    echo '
    <script>
    location.href ="panel_perfil.php";
    </script>';
    }

  
   $consulta = $cone->prepare("select * from encabezado_procesos"); 
   $consulta->execute();
   $datos = $consulta->fetch(PDO::FETCH_ASSOC);
  
    
?>

              <div class="container-fluid head-contenido">
                  <div class="d-flex justify-content-left">
                      <div class="p-2">
                         <h2>Procesos</h2>
                      </div>
                  </div>
              </div>

<form id="actualizar_encabezado" action="" method=post  class="m-5 p-5 border border-dark rounded">

  <div class="text-center"><h4>ENCABEZADO</h4></div>

  <div class="mb-3">
      <label>DESCRIPCION</label>
      <textarea minlength=50 maxlength=500  class="form-control mt-1" id="texto" name="texto" placeholder="escriba un texto aqui" rows="8"><?php echo $datos['texto']?></textarea>
  </div>

  
  <div class="mb-3">
      <label>DESCRIPCION EN INGLÉS</label>
      <textarea minlength=50 maxlength=500  class="form-control mt-1" id="textoi" name="textoi" placeholder="escriba el texto en inglés" rows="8"><?php echo $datos['textoi']?></textarea>
  </div>

  <div class="container mt-5">
        <div class="d-flex justify-content-center flex-column">
            <div class="d-flex justify-content-center">
            <img src="../img/equipos/<?php echo $datos['imagen']?>" style="height:200px; width:200px;">
            </div>
        </div>
  </div>


<div class="d-flex flex-column mb-3">
<label>Seleccione una imagen</label>
<input type="file" id="file_imagen" name="file_imagen">
  <input type="text" value="<?php echo $datos['id']?>" id="id" name="id" style="opacity:0%">
</div>




<hr style="width:100%; background-color:black">

<div class="text-center"><h4>PROCESO AUTOMOTRIZ</h4></div>

<div class="mb-3">
      <label>DESCRIPCION</label>
      <textarea minlength=50 maxlength=500  class="form-control mt-1" id="proceso_automotriz" name="proceso_automotriz" placeholder="escriba un texto aqui" rows="8"><?php echo $datos['proceso_automotriz']?></textarea>
  </div>

  
  <div class="mb-3">
      <label>DESCRIPCION EN INGLÉS</label>
      <textarea minlength=50 maxlength=500  class="form-control mt-1" id="proceso_automotrizi" name="proceso_automotrizi" placeholder="escriba el texto en inglés" rows="8"><?php echo $datos['proceso_automotrizi']?></textarea>
  </div>

  <div class="container mt-5">
        <div class="d-flex justify-content-center flex-column">
            <div class="d-flex justify-content-center">
            <img src="../img/imagenes/<?php echo $datos['imagen_automotriz']?>" style="height:200px; width:200px;">
            </div>
        </div>
  </div>


<div class="d-flex flex-column mb-3">
<label>Seleccione una imagen</label>
<input type="file" id="imagen_automotriz" name="imagen_automotriz">
  <input type="text" value="<?php echo $datos['id']?>" id="id" name="id" style="opacity:0%">
</div>



<hr style="width:100%; background-color:black">

<div class="text-center"><h4>MOLDES</h4></div>


<div class="mb-3">
      <label>DESCRIPCION</label>
      <textarea minlength=50 maxlength=500  class="form-control mt-1" id="proceso_moldes" name="proceso_moldes" placeholder="escriba un texto aqui" rows="8"><?php echo $datos['proceso_moldes']?></textarea>
  </div>

  
  <div class="mb-3">
      <label>DESCRIPCION EN INGLÉS</label>
      <textarea minlength=50 maxlength=500  class="form-control mt-1" id="proceso_moldesi" name="proceso_moldesi" placeholder="escriba el texto en inglés" rows="8"><?php echo $datos['proceso_moldesi']?></textarea>
  </div>

  <div class="container mt-5">
        <div class="d-flex justify-content-center flex-column">
            <div class="d-flex justify-content-center">
            <img src="../img/imagenes/<?php echo $datos['imagen_moldes']?>" style="height:200px; width:200px;">
            </div>
        </div>
  </div>


<div class="d-flex flex-column mb-3">
<label>Seleccione una imagen</label>
<input type="file" id="imagen_moldes" name="imagen_moldes">
  <input type="text" value="<?php echo $datos['id']?>" id="id" name="id" style="opacity:0%">
</div>


<hr style="width:100%; background-color:black">
<div class="text-center"><h4>EQUIPOS</h4></div>


<div class="mb-3">
      <label>DESCRIPCION</label>
      <textarea minlength=50 maxlength=500  class="form-control mt-1" id="equipos" name="equipos" placeholder="escriba un texto aqui" rows="8"><?php echo $datos['equipos']?></textarea>
  </div>

  
  <div class="mb-3">
      <label>DESCRIPCION EN INGLÉS</label>
      <textarea minlength=50 maxlength=500  class="form-control mt-1" id="equiposi" name="equiposi" placeholder="escriba el texto en inglés" rows="8"><?php echo $datos['equiposi']?></textarea>
  </div>

  <div class="container mt-5">
        <div class="d-flex justify-content-center flex-column">
            <div class="d-flex justify-content-center">
            <img src="../img/imagenes/<?php echo $datos['imagen_equipos']?>" style="height:200px; width:200px;">
            </div>
        </div>
  </div>


<div class="d-flex flex-column mb-3">
<label>Seleccione una imagen</label>
<input type="file" id="imagen_equipos" name="imagen_equipos">
  <input type="text" value="<?php echo $datos['id']?>" id="id" name="id" style="opacity:0%">
</div>


<button class="btn btn-primary" type="submit">Guardar</button>
</form>


	
<script>
    document.getElementById('actualizar_encabezado').addEventListener('submit', function(event) {
    event.preventDefault(); 

   
    const formData = new FormData(this);
    formData.append('opcion', '1');
     

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