<?php
include('validacion_usuarios.php');

if($_SESSION['permisos']!='1' && $_SESSION['permisos']!='2' ){
    echo '
    <script>
    location.href ="panel_perfil.php";
    </script>';
    }

 if(isset($_GET['id']))
 {  
        $datos = $_GET['id'];
        $datos = base64_decode($datos);
}


  
   $consulta_procesosaut = $cone->prepare("select * from descripcion_procesosaut where id_pa= '".$datos."'"); 
   $consulta_procesosaut->execute();
   $procesos = $consulta_procesosaut->fetch(PDO::FETCH_ASSOC);
  
    
?>

              <div class="container-fluid head-contenido">
                  <div class="d-flex justify-content-left">
                      <div class="p-2">
                         <h2>PROCESO AUTOMOTRIZ</h2>
                      </div>
                  </div>
              </div>

            <div class="container mt-5">
                  <div class="d-flex justify-content-center flex-column">

                      <div class="p-2 text-center">
                         <h5>INGRESE LOS VALORES PARA LOS CAMPOS QUE DESEA ACTUALIZAR</h4>
                         <a class="nav-link" href="javascript: history.go(-1)">presiona aqui para regresar a la pagina anterior</a>
                      </div>
                      <div class="d-flex justify-content-center">
                        <img src="../img/proceso_automotriz/procesos/<?php echo $procesos['imagen_pa']?>" style="height:200px; width:200px;">
                      </div>
                  </div>
            </div>

<div class="d-flex justify-content-center" style="width:100%;">
<form 
  id="modificar" 
  action="" 
  method=post  
  class="m-5 p-5 border border-dark rounded" 
  style="width:50%">

    <div class="form-group">
          <label class="mt-3">Nombre del proceso</label>
          <input type="text" name="nombre" id="nombre" minlength=5 maxlength=100 class="form-control mt-1" value="<?php echo $procesos['nombre_pa']?>">

          <label class="mt-3">Nombre del proceso en inglés</label>
          <input type="text" name="nombrei" id="nombrei" minlength=5 maxlength=100 class="form-control mt-1" value="<?php echo $procesos['nombre_pai']?>">
                   
          <label class="mt-3">Descripcion</label>
          <textarea minlength=20 maxlength=500  class="form-control mt-1" id="texto" name="texto"  rows="8"><?php echo $procesos['descripcion_pa']?></textarea>

          <label class="mt-3">Descripcion en inglés</label>
          <textarea minlength=20 maxlength=500  class="form-control mt-1" id="textoi" name="textoi"  rows="8"><?php echo $procesos['descripcion_pai']?></textarea>

          <div class="d-flex flex-column mb-3">
            <label class="mt-3">Seleccione una imagen</label>
            <input type="file" id="imagen" name="imagen">
          </div>
          <input type="hidden" id="id_r" name="id_r" value="<?php echo $procesos['id_pa']?>">
    </div>

    <div class="d-flex justify-content-center" style="width:100%;">
        <button class="btn btn-primary" type="submit">
             Actualizar registro
        </button>
    </div>

</form>

</div>
	
<script>
    document.getElementById('modificar').addEventListener('submit', function(event) {
    event.preventDefault(); 


    const formData = new FormData(this);
    formData.append('opcion', '9');
     

    fetch('crud_procesos.php', {
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