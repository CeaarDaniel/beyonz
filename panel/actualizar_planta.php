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
  
  
   $consulta_planta = $cone->prepare("select * from plantas where id = '".$id."'"); 
   $consulta_planta->execute();
  
   $numFilas = $consulta_planta->rowCount();
  
  if($numFilas>0){
    $datos = $consulta_planta->fetch(PDO::FETCH_ASSOC);
  }
  

?>

            <div class="container-fluid head-contenido">
                <div class="d-flex justify-content-left">
                    <div class="p-2">
                        <h2>PLANTAS</h2>
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
                        <img src="../img/instalaciones/<?php echo $datos['imagen']?>" style="height:200px; width:200px;">
                      </div>
                  </div>
            </div>

<form id="actualizar_planta" action="borrar_planta.php" method=post  class="m-5 p-5 border border-dark rounded">

<div class="row">
  <div class="col-9 mb-3">
      <label>NOMBRE</label>
      <input type="text" minlength=5 maxlength=200 class="form-control mt-1" id="nombre" name="nombre" value="<?php echo $datos['nombre']?>">
      <input type="text" id="id_p" name="id_p" value="<?php echo $datos['id']?>" style="opacity:0%">
  </div>
</div>
  <div class="row">
    
      <div class="form-group col-md-6 mb-3">
          <label for="inputname">TELEFONO</label>
          <input type="text" minlength=10 maxlength=20 class="form-control mt-1" id="telefono" name="telefono" value="<?php echo $datos['telefono']?>" rows="8"></textarea>
      </div>
      <div class="form-group col-md-6 mb-3">
          <label for="inputemail">FAX</label>
         <input type="text" minlength=10 maxlength=20 class="form-control mt-1" id="fax" name="fax" value="<?php echo $datos['fax']?>" rows="8"></textarea>
      </div>
  </div>
  <div class="mb-3">
      <label>DIRECCIÓN/DESCRIPCION</label>
      <textarea minlength=5 maxlength=400  class="form-control mt-1" id="descripcion" name="descripcion"  rows="8"><?php echo $datos['direccion']?></textarea>
  </div>
  <div class="mb-3">
      <label>DESCRIPCION EN INGLÉS</label>
      <textarea minlength=5 maxlength=400  class="form-control mt-1" id="descripcioni" name="descripcioni" placeholder="texto en inglés" rows="8"><?php echo $datos['direccioni']?></textarea>
  </div>

<div class="row">
<div class="form-group col-md-6 mb-3">
<label>UBICACIÓN GEOGRAFICA</label>
<input type="text" class="form-control mt-1" id="ubicacion" name="ubicacion" value="<?php echo $datos['mapa']?>">
</div>
<div class="form-group col-md-6 mb-3">
<label>DIRECCION DE LA PAGINA WEB</label>
<input type="text" class="form-control mt-1" id="pagina" name="pagina" value="<?php echo $datos['pagina']?>">
</div>
</div>

<div class="d-flex flex-column mb-3">
    <label>Seleccione el pais donde esta ubicada la planta </label>
<select class="form-control" id="pais" name="pais" style="max-width:50%">
    <option value="">---Seleccione una opcion---</option>
    <option value="1">MÉXICO</option>
    <option value="2">JÁPON</option>
    <option value="3">CHINA</option>
  <option value="4">TAILANDIA</option>
</select>
</div>

<div class="d-flex flex-column mb-3">
<label>Seleccione una imagen</label>
<input type="file" id="file_imagen" name="file_imagen">
</div>


<button class="btn btn-primary" type="submit">Guardar</button>
</form>


	
<script>
    document.getElementById('actualizar_planta').addEventListener('submit', function(event) {
    event.preventDefault(); 

    // Crear un objeto FormData para recopilar los datos del formulario
    const formData = new FormData(this);
    formData.append('opcion', '3');
     
    // Enviar los datos al servidor usando fetch
    fetch('crud_planta.php', {
        method: 'POST',
        body: formData, // Pasar los datos del formulario como cuerpo de la solicitud
    })
    .then(response => response.text()) // Opcional: si esperas una respuesta JSON del servidor
    .then(data => {
        // Manejar la respuesta del servidor aquí
        alert(data);
        console.log(data);
        location.reload();
    })
    .catch(error => {
        // Manejar errores aquí
        console.error('Error:', error);
    });
});

</script> 
<?php
 include("footer_panel.php");
?>