<?php
 include('validacion_usuarios.php');

 if($_SESSION['permisos']!='1' ){
    echo '
    <script>
    location.href ="panel_perfil.php";
    </script>';
    }
 
   $consulta_nosotros = $cone->prepare("select * from nosotros"); 
   $consulta_nosotros->execute();
   $nosotros = $consulta_nosotros->fetch(PDO::FETCH_ASSOC);
?>

              <div class="container-fluid head-contenido">
                  <div class="d-flex justify-content-left">
                      <div class="p-2">
                         <h2>Quienes somos</h2>
                      </div>
                  </div>
              </div>
            <div class="container mt-5">
                  <div class="d-flex justify-content-center">
                      <div class="p-2 text-center">
                         <h5>INGRESE LOS DATOS REQUERIDOS PARA ACTUALIZAR LA PAGINA</h4>
                      </div>
                  </div>
            </div>

<form id="actualizar_pagina_nosotros" action="borrar_planta.php" method=post  class="m-5 p-5 border border-dark rounded">

  <div class="mb-3">
      <label>Texto quienes somos</label>
      <textarea minlength=50 maxlength=300  class="form-control mt-1" id="nosotros" name="nosotros" placeholder="escriba un texto aqui" rows="8"><?php echo $nosotros['texto_nosotros']?></textarea>
  </div>

  <div class="mb-3">
      <label>Texto quienes somos en inglés</label>
      <textarea minlength=50 maxlength=300  class="form-control mt-1" id="nosotrosi" name="nosotrosi" placeholder="texto en inglés" rows="8"><?php echo $nosotros['texto_nosotrosi']?></textarea>
  </div>


  <div class="row">
    <div class="col-8">
        <div class="mb-3">
        <label>Texto filosofia</label>
        <textarea minlength=50 maxlength=500  class="form-control mt-1" id="filosofia" name="filosofia" placeholder="escriba un texto aqui" rows="8"><?php echo $nosotros['filosofia']?></textarea>
        </div>
    </div>
     <div class="col-4 p-3">
          <img src="../img/nosotros/<?php echo $nosotros['img_filosofia']?>" style="height:100%; width:100%;">
     </div>
  </div>

  <div class="d-flex flex-column mb-3">
    <label> <b> Cambar imagen </b></label>
    <input type="file" id="file_imagen" name="file_imagen">
  </div>
 <hr>
  <div class="row">
    <div class="col-8">
        <div class="mb-3">
        <label>Texto filosofia en ingles</label>
        <textarea minlength=50 maxlength=500  class="form-control mt-1" id="filosofiai" name="filosofiai" placeholder="texto en inglés" rows="8"><?php echo $nosotros['filosofiai']?></textarea>
        </div>
    </div>
  </div>


  <div class="mb-3">
      <label>Mision</label>
      <textarea minlength=50 maxlength=400  class="form-control mt-1" id="mision" name="mision" placeholder="escriba un texto aqui" rows="8"><?php echo $nosotros['mision']?></textarea>
  </div>

  <div class="mb-3">
      <label>Mision en ingles</label>
      <textarea minlength=50 maxlength=400  class="form-control mt-1" id="misioni" name="misioni" placeholder="texto en inglés" rows="8"><?php echo $nosotros['misioni']?></textarea>
  </div>

  <div class="mb-3">
      <label>Vision</label>
      <textarea minlength=50 maxlength=400  class="form-control mt-1" id="vision" name="vision" placeholder="escriba un texto aqui" rows="8"><?php echo $nosotros['vision']?></textarea>
  </div>

  <div class="mb-3">
      <label>Vision en inglés</label>
      <textarea minlength=50 maxlength=400  class="form-control mt-1" id="visioni" name="visioni" placeholder="texto en inglés" rows="8"><?php echo $nosotros['visioni']?></textarea>
  </div>




  <div class="mb-3">
      <label>Video</label>
      <div class="d-flex justify-content-center align-content-center my-5">
         <video src="../files/<?php echo $nosotros['video']?>" style="width:100%; height:100%;" controls autoplay></video>
  </div>
  </div>

    <div class="d-flex flex-column mb-3">
<label>Actualizar video</label>
<input type="file" id="file_video" name="file_video">
<input type="text" id="id" name="id" value="<?php echo $nosotros['id']?>" style="opacity:0%">
</div>

<button class="btn btn-primary" type="submit">Actualizar datos</button>
</form>


	
<script>
    document.getElementById('actualizar_pagina_nosotros').addEventListener('submit', function(event) {
    event.preventDefault(); 

   
    const formData = new FormData(this);
    formData.append('opcion', '1');
     

    var input = document.getElementById('file_video');
    var file_video = input.files[0];
    
    var limite = 80 * 1024 * 1024; // 80 MB en bytes

    if (input.files.length > 0 && file_video.size > limite  ){
        alert("No se ha podido actualizar la informacion, el tamaño de los archivos debe de ser menor a 80 megas");  
        location.reload();
    }

    else {
    fetch('actualizar_nosotros.php', {
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
}

});

</script> 
<?php
 include("footer_panel.php");
?>
