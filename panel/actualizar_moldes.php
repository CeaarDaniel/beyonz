<?php
 include('validacion_usuarios.php');

 if($_SESSION['permisos']!='1' && $_SESSION['permisos']!='3'){
    echo '
    <script>
    location.href ="panel_perfil.php";
    </script>';
    }

 if(isset($_GET['id']))
 {  
        $id = $_GET['id'];
        $id = base64_decode($id);
}

  
  

   $consulta_pa = $cone->prepare("select * from producto_moldes where id_pm = '".$id."'"); 
   $consulta_pa->execute();
  
   $numFilas = $consulta_pa->rowCount();
  
  if($numFilas>0){
    $datos = $consulta_pa->fetch(PDO::FETCH_ASSOC);
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
                         <h5>INGRESE LOS DATOS REQUERIDOS PARA ACTUALIZAR LOS DATOS </h4>
                      </div>
                  </div>
                  <div class="d-flex justify-content-center">
                        <img src="../img/productos_moldes/<?php echo $datos['imagen_pm']?>" style="height:200px; width:200px;">
                  </div>
            </div>

<form id="actualizar_producto" action="borrar_planta.php" method=post  class="m-5 p-5 border border-dark rounded">

<div class="row">
  <div class="col-9 mb-3">
      <label>NOMBRE</label>
      <input type="text" minlength=5 maxlength=200 class="form-control mt-1" id="nombre" value="<?php echo $datos['nombre_pm']?>" name="nombre" placeholder="nombre">
      <input type="text" id="id_pm" name="id_pm" value="<?php echo $datos['id_pm']?>" style="opacity:0%">
  </div>
</div>

<div class="row">
  <div class="col-9 mb-3">
      <label>NOMBRE EN INGLÉS</label>
      <input type="text" minlength=5 maxlength=200 class="form-control mt-1" id="nombrei" value="<?php echo $datos['nombre_pmi']?>" name="nombrei" placeholder="nombre en inglés">
  </div>
</div>

  <div class="mb-3">
      <label>DESCRIPCION</label>
      <textarea minlength=5 maxlength=300  class="form-control mt-1" id="descripcion" name="descripcion" placeholder="escriba un texto aqui" rows="8"><?php echo $datos['descripcion_pm']?></textarea>
  </div>

  <div class="mb-3">
      <label>DESCRIPCION EN INGLÉS</label>
      <textarea minlength=5 maxlength=300  class="form-control mt-1" id="descripcioni" name="descripcioni" placeholder="escriba un texto en inglés" rows="8"><?php echo $datos['descripcion_pmi']?></textarea>
  </div>


<div class="d-flex flex-column mb-3">
    <label>Seleccione la categoria a la que pertenece el producto </label>
<select class="form-control" id="categoria" name="categoria" style="max-width:50%">
    <option value="">---Seleccione una categoria---</option>
    <?php
      $cat = $cone->prepare("select * from categoria_moldes"); 
      $cat->execute();
    while ($categoria = $cat->fetch(PDO::FETCH_ASSOC))
     echo '<option value="'.$categoria['id_catm'].'">'.$categoria['nombre_catm'].'</option>'
    ?>
</select>
</div>

<div class="d-flex flex-column mb-3">
<label>Seleccione una imagen</label>
<input type="file" id="file_imagen" name="file_imagen">
</div>


<button class="btn btn-primary" type="submit">Guardar</button>
</form>


	
<script>
    document.getElementById('actualizar_producto').addEventListener('submit', function(event) {
    event.preventDefault(); 

   
    const formData = new FormData(this);
    formData.append('opcion', '3');
     

    fetch('crud_categoria_moldes.php', {
        method: 'POST',
        body: formData, 
    })
    .then(response => response.text()) 
    .then(data => {

        alert(data);
        console.log(data);
        location.reload();
    })
    .catch(error => {
        console.error('Error:', error);
    });
});

</script> 
<?php
 include("footer_panel.php");
?>