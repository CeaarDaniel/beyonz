<?php
include('validacion_usuarios.php');

if($_SESSION['permisos']!='1' ){
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

   $consulta = $cone->prepare("select * from banner_principal where id = '".$id."'"); 
   $consulta->execute();
  
   $numFilas = $consulta->rowCount();
  
  if($numFilas>0){
    $datos = $consulta->fetch(PDO::FETCH_ASSOC);
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
                  <div class="d-flex justify-content-center">
                      <div class="p-2 text-center">
                         <h5>INGRESE LOS DATOS REQUERIDOS PARA CREAR EL NUEVO REGISTRO </h4>
                         <a class="nav-link" href="javascript: history.go(-1)">presiona aqui para regresar a la pagina anterior</a>
                      </div>
                  </div>
                  <div class="d-flex justify-content-center">
                        <img src="../img/banner/<?php echo $datos['imagen']?>" style="height:200px; width:200px;">
                  </div>
            </div>

<form id="actualizar_producto" action="borrar_planta.php" method=post  class="m-5 p-5 border border-dark rounded">

<div class="row">
  <div class="col-9 mb-3">
      <label>NOMBRE</label>
      <input type="text" minlength=5 maxlength=100 class="form-control mt-1" id="nombre" value="<?php echo $datos['titulo']?>" name="nombre" placeholder="nombre">
      <input type="text" id="id" name="id" value="<?php echo $datos['id']?>" style="opacity:0%">
  </div>

  <div class="col-9 mb-3">
      <label>NOMBRE EN INGLÉS</label>
      <input type="text" minlength=5 maxlength=100 class="form-control mt-1" id="nombrei" value="<?php echo $datos['tituloi']?>" name="nombrei" placeholder="nombre en inglés">
  </div>
</div>

  <div class="mb-3">
      <label>DESCRIPCION</label>
      <textarea minlength=5 maxlength=300  class="form-control mt-1" id="descripcion" name="descripcion" placeholder="escriba un texto aqui" rows="8"><?php echo $datos['descripcion']?></textarea>
  </div>

  <div class="mb-3">
      <label>DESCRIPCION EN INGLÉS</label>
      <textarea minlength=5 maxlength=300  class="form-control mt-1" id="descripcioni" name="descripcioni" placeholder="escriba el texto en inglés" rows="8"><?php echo $datos['descripcioni']?></textarea>
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