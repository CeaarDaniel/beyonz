<?php
include('validacion_usuarios.php');

if($_SESSION['permisos']!='1' ){
    echo '
    <script>
    location.href ="panel_perfil.php";
    </script>';
    }

   $consulta_calidad = $cone->prepare("select * from nuestra_calidad"); 
   $consulta_calidad->execute();
   $calidad = $consulta_calidad->fetch(PDO::FETCH_ASSOC);
?>

              <div class="container-fluid head-contenido">
                  <div class="d-flex justify-content-left">
                      <div class="p-2">
                         <h2>Nuestra calidad</h2>
                      </div>
                  </div>
              </div>
            <div class="container mt-5">
                  <div class="d-flex justify-content-center">
                      <div class="p-2 text-center">
                         <h5>INGRESE LOS DATOS REQUERIDOS PARA ACTUALIZAR LA PAGINA </h4>
                      </div>
                  </div>
            </div>

<form id="actualizar_calidad" action="borrar_planta.php" method=post  class="m-5 p-5 border border-dark rounded">
<div class="row">

 <div class="col-8">
    <div class="mb-3">
        <label><b>TEXTO CALIDAD</b></label>
        <textarea minlength=50 maxlength=500  class="form-control mt-1" id="texto_calidad" name="texto_calidad" placeholder="escriba un texto aqui" rows="8"><?php echo $calidad['texto_calidad']?></textarea>
    </div>
  </div>
  
       <div class="col-4 p-3">
          <img src="../img/calidad/<?php echo $calidad['img_calidad']?>" style="height:100%; width:100%;">
     </div>
  


  <div class="d-flex flex-column mb-5">
    <label><b>Cambar imagen</b></label>
    <input type="file" id="imagen_calidad" name="imagen_calidad">
  </div>
</div>

  <div class="mb-3">
      <label><b>TEXTO CALIDAD EN INGLÉS</b></label>
      <textarea minlength=50 maxlength=500  class="form-control mt-1" id="texto_calidadi" name="texto_calidadi" placeholder="escriba texto en inglés" rows="8"><?php echo $calidad['texto_calidadi']?></textarea>
  </div>

  <hr style="background-color:black;">

  <div class="row">
    <div class="col-8">
    <div class="mb-3">
      <label><b>TEXTO POLITICA DE CALIDAD</b></label>
      <textarea minlength=50 maxlength=500  class="form-control mt-1" id="texto_politica" name="texto_politica" placeholder="escriba un texto aqui" rows="8"><?php echo $calidad['texto_politica']?></textarea>
    </div>

    </div>
     <div class="col-4 p-3">
          <img src="../img/calidad/<?php echo $calidad['img_politica']?>" style="height:100%; width:100%;">
     </div>
  </div>

  <div class="d-flex flex-column mb-5">
    <label><b>Cambar imagen</b></label>
    <input type="file" id="imagen_politica" name="imagen_politica">
  </div>

  <div class="col-12">
    <div class="mb-3">
      <label><b>TEXTO POLITICA DE CALIDAD EN INGLÉS</b></label>
      <textarea minlength=50 maxlength=500  class="form-control mt-1" id="texto_politicai" name="texto_politicai" placeholder="escriba texto en inglés" rows="8"><?php echo $calidad['texto_politicai']?></textarea>
    </div>
  </div>

<hr style="background-color:black">

  <div class="row">
    <div class="col-12">
    <div class="mb-3">
      <label><b>TEXTO CERTIFICACION IATF</b></label>
      <textarea minlength=50 maxlength=500  class="form-control mt-1" id="texto_certificacion" name="texto_certificacion" placeholder="escriba un texto aqui" rows="8"><?php echo $calidad['certificacion_iso']?></textarea>
    </div>
    </div>


     <div class="col-12">
    <div class="mb-3">
      <label><b>TEXTO CERTIFICACION IATF EN INGLÉS</b></label>
      <textarea minlength=50 maxlength=500  class="form-control mt-1" id="texto_certificacioni" name="texto_certificacioni" placeholder="escriba texto en inglés" rows="8"><?php echo $calidad['certificacion_isoi']?></textarea>
    </div>
    </div>
  </div>



<div class="d-flex justify-content-center" style="width:100%">
<button class="btn btn-primary" type="submit">Actualizar datos</button>
<div>

</form>


	
<script>
    document.getElementById('actualizar_calidad').addEventListener('submit', function(event) {
    event.preventDefault(); 

   
    const formData = new FormData(this);
    formData.append('opcion', '4');
    formData.append('id', '1');
     

    fetch('crud_calidad.php', {
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
