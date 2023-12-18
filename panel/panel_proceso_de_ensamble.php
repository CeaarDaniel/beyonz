<?php
include('validacion_usuarios.php');

if($_SESSION['permisos']!='1' && $_SESSION['permisos']!='2' ){
    echo '
    <script>
    location.href ="panel_perfil.php";
    </script>';
    }
  
   $consulta_ensamblaje = $cone->prepare("select * from proceso_de_ensamble"); 
   $consulta_ensamblaje->execute();
   $ensamble = $consulta_ensamblaje->fetch(PDO::FETCH_ASSOC);
  
    
?>

              <div class="container-fluid head-contenido">
                  <div class="d-flex justify-content-left">
                      <div class="p-2">
                         <h2>Procesos automotriz</h2>
                      </div>
                  </div>
              </div>

            <div class="container mt-5">
                  <div class="d-flex justify-content-center flex-column">

                      <div class="p-2 text-center">
                         <h5>INGRESE LOS VALORES PARA LOS CAMPOS QUE DESEA ACTUALIZAR</h4>
                      </div>
                  </div>
            </div>

<form id="actualizar_datos" method=post  class="m-5 p-5 border border-dark rounded">


<p class="text-center"><b>PROCESO DE SOLDADURA</b></p>

<div class="mb-3">
    <p><b>TEXTO EN ESPAÑOL</b></p>
    <textarea  id="texto_soldadura" name="texto_soldadura" placeholder="texto en español" class="form-control mt-1" minlength=5 maxlength=500 rows=8><?php echo $ensamble['texto_soldadura']?></textarea>
</div>


<div class="mb-3">
    <p><b>TEXTO EN INGLES</b></p>
    <textarea  id="texto_soldadurai" name="texto_soldadurai" minlength=5 maxlength=500 placeholder="texto en ingles" class="form-control mt-1" rows=8><?php echo $ensamble['texto_soldadurai']?></textarea>
</div>

<div class="d-flex aling-content-center justify-content-center">
<img src="../img/proceso_automotriz/<?php  echo $ensamble['imagen_soldadura']?>" style="max-height:300px; max-width:300px"> <br>
</div>

<label><b>Cambiar imagen</b></label>
<input type="file" name="imagen_soldadura" id="imagen_soldadura">
<br>

<div class="d-flex aling-content-center justify-content-center">
<video src="../videos/<?php echo $ensamble['video_soldadura']?>" style="width:300px; height:300px;" controls></video>
</div>
<label><b>Cambiar video</b></label>
<input type="file" name="video_soldadura" id="video_soldadura">


<hr style="background-color:black">



<p class="text-center"><b>PROCESO DE Co2</b></p>

<div class="mb-3">
    
 <p><b>TEXTO EN ESPAÑOL</b></p>
    <textarea id="texto_co2" name="texto_co2" placeholder="texto en español" class="form-control mt-1" minlength=5 maxlength=500 rows=8><?php echo $ensamble['texto_co2']?></textarea>

    <div class="mb-3">
    <p><b>TEXTO EN INGLES</b></p>
    <textarea  id="texto_co2i" name="texto_co2i" placeholder="texto en ingles" class="form-control mt-1" minlength=5 maxlength=500 rows=8><?php echo $ensamble['texto_co2i']?></textarea>
</div>


<div class="d-flex aling-content-center justify-content-center">
<video src="../videos/<?php echo $ensamble['video_co2']?>" style="width:300px; height:300px;" controls></video>
</div>


    <label>Cambiar video</label>
    <input type="file" name="video_co2" id="video_co2">
</div>




<hr style="background-color:black">

<p class="text-center"><b>PROCESO WET BLAST</b></p>


<div class="mb-3">
    <p><b>TEXTO EN ESPAÑOL</b></p>
    <textarea id="texto_blast" name="texto_blast" placeholder="texto en español" class="form-control mt-1" minlength=5 maxlength=500 rows=8><?php echo $ensamble['texto_blast']?></textarea>
</div>

<div class="mb-3">
    <p><b>TEXTO EN INGLES</b></p>
    <textarea id="texto_blasti" name="texto_blasti" placeholder="texto en ingles" class="form-control mt-1" minlength=5 maxlength=500 rows=8><?php echo $ensamble['texto_blasti']?></textarea>
</div>


<div class="d-flex aling-content-center justify-content-center">
<video src="../videos/<?php echo $ensamble['video1_blast']?>" style="width:300px; height:300px;" controls></video>
</div>

<label>Cambiar video</label>
<input type="file" name="video1_blast" id="video1_blast">


<div class="d-flex aling-content-center justify-content-center">
<video src="../videos/<?php echo $ensamble['video2_blast']?>" style="width:300px; height:300px;" controls></video>
</div>

<label>Cambiar video</label>
<input type="file" name="video2_blast" id="video2_blast">


<hr style="background-color:black">

<p class="text-center"><b>PROCESO DE RECUBRIMIENTO</b></p>


<div class="mb-3">
    <p><b>TEXTO EN ESPAÑOL</b></p>
    <textarea id="texto_recubrimiento" name="texto_recubrimiento" minlength=5 maxlength=500 placeholder="texto en español" class="form-control mt-1" rows=8><?php echo $ensamble['texto_recubrimiento']?></textarea>

    <p><b>TEXTO EN INGLES</b></p>
    <textarea id="texto_recubrimientoi" name="texto_recubrimientoi" minlength=5 maxlength=500 placeholder="texto en ingles" class="form-control mt-1" rows=8><?php echo $ensamble['texto_recubrimientoi']?></textarea>

    <div class="d-flex aling-content-center justify-content-center my-5">
     <img src="../img/proceso_automotriz/<?php  echo $ensamble['imagen_recubrimiento']?>" style="max-height:400px; max-width:400px"> <br>
    </div>

    <label>Cambiar imagen</label>
     <input type="file" name="imagen_recubrimiento" id="imagen_recubrimiento">
    </div>

<hr style="background-color:black">

<p class="text-center"><b>ENSAMBLAJE</b></p>

<div class="mb-3">
    <p ><b>TEXTO EN ESPAÑOL</b></p>
    <textarea id="texto_ensamble" name="texto_ensamble" minlength=5 maxlength=500 placeholder="texto en español" class="form-control mt-1" rows=8><?php echo $ensamble['texto_ensamble']?></textarea>

    <p><b>TEXTO EN INGLES</b></p>
    <textarea id="texto_ensamblei" name="texto_ensamblei" minlength=5 maxlength=500 placeholder="texto en ingles" class="form-control mt-1" rows=8><?php echo $ensamble['texto_ensamblei']?></textarea>


    <div class="d-flex aling-content-center justify-content-center my-5">
        <img src="../img/proceso_automotriz/<?php  echo $ensamble['imagen_ensamble']?>" style="max-height:400px; max-width:400px"> <br>
    </div>
    
    <label>Cambiar imagen</label>
    <input type="file" name="imagen_ensamble" id="imagen_ensamble">
</div>

<hr style="background-color:black">


<input type="hidden" name="id" id="id" value="<?php echo $ensamble['id']?>">

<div class="d-flex justify-content-center" style="width:100%">
<button class="btn btn-primary" type="submit">Actualizar datos</button>
</div>

</form>

	
<script>
    document.getElementById('actualizar_datos').addEventListener('submit', function(event) {
    event.preventDefault(); 

    const formData = new FormData(this);
    formData.append('opcion', '13');
    
    var input1 = document.getElementById('video_soldadura');
    var input2 = document.getElementById('video_co2');
    var input3 = document.getElementById('video1_blast');
    var input4 = document.getElementById('video2_blast');

    var video_soldadura = input1.files[0];
    var video_co2 = input2.files[0];
    var video1_blast = input3.files[0];
    var video2_blast = input4.files[0];
    
    var limite = 80 * 1024 * 1024; // 80 MB en bytes

    if ((input1.files.length > 0 && video_soldadura.size > limite ) || (input2.files.length > 0 && video_co2.size > limite) || (input3.files.length > 0 && video1_blast.size > limite)  || (input4.files.length > 0 && video2_blast.size > limite) ){
        alert("No se ha podido actualizar la informacion, el tamaño de los archivos debe de ser menor a 80 megas");  
        location.reload();
    }

    else {
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
    }

});
</script> 
<?php
 include("footer_panel.php");
?>