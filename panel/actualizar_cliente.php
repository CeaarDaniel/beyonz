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

 $consulta_clientes = $cone->prepare("select * from clientes where id = '".$id."'"); 
 $consulta_clientes->execute();
 $cliente = $consulta_clientes->fetch(PDO::FETCH_ASSOC);
?>

              <div class="container-fluid head-contenido">
                  <div class="d-flex justify-content-left">
                      <div class="p-2">
                         <h2>Clientes</h2>
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
                        <img src="../img/clientes/<?php echo $cliente['logo']?>" style="height:200px; width:200px;">
              </div>

<form id="actualizar_cliente" action="borrar_planta.php" method=post  class="m-5 p-5 border border-dark rounded">

<div class="row">
  <div class="col-9 mb-3">
      <label>NOMBRE</label>
      <input type="text" minlength=1 maxlength=200 class="form-control mt-1" id="nombre" name="nombre" value="<?php echo $cliente['nombre']?>">
  </div>
</div>
  <div class="row">
    

    <div class="form-group col-md-6 mb-3">
    <label for="inputemail">link de su sitio web</label>
    <input type="text" minlength=1 maxlength=200 value="<?php echo $cliente['link_pagina']?>" class="form-control mt-1" id="link" name="link" rows="8" placeholder="link del sitio web">
    <input type="text" id="id" name="id" value="<?php echo $cliente['id']?>" style="opacity:0%;">
      </div>
  </div>



<div class="d-flex flex-column mb-3">
<label>Imagen o logo del cliente</label>
<input type="file" id="file_imagen" name="file_imagen">
</div>


<button class="btn btn-primary" type="submit">Guardar</button>
</form>


	
<script>
    document.getElementById('actualizar_cliente').addEventListener('submit', function(event) {
    event.preventDefault(); 

  
    const formData = new FormData(this);
    formData.append('opcion', '3');
     

    fetch('crud_clientes.php', {
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