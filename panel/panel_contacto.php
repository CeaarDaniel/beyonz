<?php

include('validacion_usuarios.php');

if($_SESSION['permisos']!='1' ){
    echo '
    <script>
    location.href ="panel_perfil.php";
    </script>';
    }

   $consulta_contacto = $cone->prepare("select * from footer"); 
   $consulta_contacto->execute();
   $datos = $consulta_contacto->fetch(PDO::FETCH_ASSOC);
?>

              <div class="container-fluid head-contenido">
                  <div class="d-flex justify-content-left">
                      <div class="p-2">
                         <h2>Datos de contacto</h2>
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

<div class="d-flex justify-content-center" style="width:100%;">
<form 
  id="actualizar_contacto" 
  action="actualizar_planta.php" 
  method=post  
  class="m-5 p-5 border border-dark rounded" 
  style="width:50%">

    <div class="form-group">

          <label for="inputname">HORARIO DE ATENCION</label>
          <input type="text" name="horario" id="horario" minlength=13 maxlength=30 class="form-control mt-1" value="<?php echo $datos['horario']?>">
            
          <label class="mt-3">TELEFONO</label>
          <input type="text" name="telefono" id="telefono" minlength=10 maxlength=30 class="form-control mt-1" value="<?php echo $datos['telefono']?>"> 

          <label class="mt-3">FAX</label>
          <input type="text" name="fax" id="fax" minlength=10 maxlength=30 class="form-control mt-1" value="<?php echo $datos['fax']?>" rows="8">

          <label class="mt-3" >LINK DE LA PAGINA DE LINKENDIN</label>
          <input type="text" name="enlace_linkendin" id="enlace_linkendin" minlength=16 class="form-control mt-1" value="<?php echo $datos['enlace_linkendin']?>">
          
          <label class="mt-3">LINK DE LA PAGINA DE FACEBOOK</label>
          <input type="text" name="enlace_facebook" id="enlace_facebook" minlength=16 class="form-control mt-1" value="<?php echo $datos['enlace_facebook']?>">

          <label class="mt-3">LINK DUNS</label>
          <input type="text" name="enlace_dun" id="enlace_dun" minlength=16 class="form-control mt-1" value="<?php echo $datos['enlace_dun']?>"> 

          <label class="mt-3">Correo de contacto</label>
          <input type="email" name="email" id="email" minlength=20 class="form-control mt-1" value="<?php echo $datos['email']?>"> 
          
    </div>

        <div class="d-flex justify-content-center" style="width:100%;">
          <button class="btn btn-primary" type="submit">
            Actualizar registro
          </button>
        </div>

</form>

</div>
	
<script>
    document.getElementById('actualizar_contacto').addEventListener('submit', function(event) {
    event.preventDefault(); 


    const formData = new FormData(this);
    formData.append('opcion', '1');
     

    fetch('actualizar_contacto.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        console.log(data);
    })
    .catch(error => {
        console.error('Error:', error);
    });
});

</script> 
<?php
 include("footer_panel.php");
?>