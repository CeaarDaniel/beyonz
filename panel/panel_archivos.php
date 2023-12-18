<?php
include('validacion_usuarios.php');


if($_SESSION['permisos']!='1'){
echo '
<script>
location.href ="panel_perfil.php";
</script>';
}


   $consulta_pc = $cone->prepare("select * from nuestra_calidad"); 
   $consulta_pc->execute();
   $politica = $consulta_pc->fetch(PDO::FETCH_ASSOC);  
   
   $consulta_ap = $cone->prepare("select * from footer"); 
   $consulta_ap->execute();
   $aviso = $consulta_ap->fetch(PDO::FETCH_ASSOC);  
?>

              <div class="container-fluid head-contenido">
                  <div class="d-flex justify-content-left">
                      <div class="p-2">
                         <h2>ARCHIVOS</h2>
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

<form id="actualizar_archivos" action="" method=post  class="m-5 p-5 border border-dark rounded">

  <div class="d-flex flex-column mb-3">
    <label>Actualizatr archivo de politica de calidad</label>
    <input type="file" id="politica" name="politica">
    <embed src="../files/<?php echo $politica['archivo_politica']?>" type="application/pdf" width="100%" height="600px" />
  </div>


<div class="d-flex flex-column mb-3">
<label>Actualizar archivo de aviso de privasidad</label>
<input type="file" id="aviso" name="aviso">
<embed src="../files/<?php echo $aviso['archivo_privasidad']?>" type="application/pdf" width="100%" height="600px" />
</div>

<button class="btn btn-primary" type="submit">Actualizar datos</button>
</form>
	
<script>
    document.getElementById('actualizar_archivos').addEventListener('submit', function(event) {
    event.preventDefault(); 

    const formData = new FormData(this);
    formData.append('opcion', '1');

    fetch('actualizar_archivos.php', {
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