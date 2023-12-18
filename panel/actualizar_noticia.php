<?php
include('validacion_usuarios.php');

if($_SESSION['permisos']!='1' &&  $_SESSION['permisos']!='4' ){
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

 $consulta_noticias = $cone->prepare("select * from noticias where id = '".$id."'"); 
 $consulta_noticias->execute();
 $noticia = $consulta_noticias->fetch(PDO::FETCH_ASSOC);
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
                         <h5>INGRESE LOS DATOS REQUERIDOS PARA ACTUALIZAR EL REGISTRO </h4>
                         <a class="nav-link" href="javascript: history.go(-1)">presiona aqui para regresar a la pagina anterior</a>
                      </div>
                  </div>
            </div>
            <div class="d-flex justify-content-center">
                        <img src="../img/noticias/<?php echo $noticia['imagen_principal']?>" style="height:200px; width:200px;">
              </div>


<form id="actualizar_noticia" action="" method=post  class="m-5 p-5 border border-dark rounded">

<div class="row">
  <div class="col-9 mb-3">
      <label>TITULO</label>
      <input type="text" minlength=5 maxlength=200 class="form-control mt-1" id="titulo" name="titulo" value="<?php echo $noticia['titulo']?>">
      <input type="text" id="id" name="id" value="<?php echo $noticia['id']?>" style="opacity:0%">
  </div>
</div>


<div class="row">
  <div class="col-9 mb-3">
      <label>TITULO EN INGLÉS</label>
      <input type="text" minlength=5 maxlength=200 class="form-control mt-1" id="tituloi" name="tituloi" value="<?php echo $noticia['tituloi']?>">
  </div>
</div>

  
<div class="row">
    
      <div class="form-group col-md-9 mb-3">
          <label for="inputname">AUTOR</label>
          <input type="text" minlength=5 maxlength=200 class="form-control mt-1" id="autor" name="autor" value="<?php echo $noticia['autor']?>" rows="8"></textarea>
      </div>
      <div class="form-group col-md-4 mb-3">
          <label for="inputemail">FECHA</label>
         <input type="date" class="form-control mt-1" id="fecha" name="fecha" value="<?php echo $noticia['fecha']?>" rows="8"></textarea>
      </div>
  </div>
  <div class="mb-3">
      <label>Resumen</label>
      <textarea minlength=20 maxlength=300  class="form-control mt-1" id="resumen" name="resumen"  rows="8"><?php echo $noticia['resumen']?>
     </textarea>
  </div>

  <div class="mb-3">
      <label>Resumen en inglés</label>
      <textarea minlength=20 maxlength=300  class="form-control mt-1" id="resumeni" name="resumeni"  rows="8"><?php echo $noticia['resumeni']?>
     </textarea>
  </div>

<div class="d-flex flex-column mb-3">
<label>Imagen pricnipal</label>
<input type="file" id="file_imagen" name="file_imagen">
</div>

<button class="btn btn-primary" type="submit">Guardar</button>
</form>


<script>
    document.getElementById('actualizar_noticia').addEventListener('submit', function(event) {
    event.preventDefault(); 

  
    const formData = new FormData(this);
    formData.append('opcion', '3');
     
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