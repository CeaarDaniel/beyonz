<?php
include('validacion_usuarios.php');

if($_SESSION['permisos']!='1' && $_SESSION['permisos']!='3' ){
    echo '
    <script>
    location.href ="panel_perfil.php";
    </script>';
    }

 if(isset($_GET['id_c']))
 {  
        $datos = $_GET['id_c'];
        $datos = base64_decode($datos);
}  
   $consulta_categoria = $cone->prepare("select * from categoria_moldes where id_catm= '".$datos."'"); 
   $consulta_categoria->execute();
   $result = $consulta_categoria->fetch(PDO::FETCH_ASSOC);
  
    
?>

              <div class="container-fluid head-contenido">
                  <div class="d-flex justify-content-left">
                      <div class="p-2">
                         <h2>Productos de moldes</h2>
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
                        <img src="../img/productos/<?php echo $result['imagen_catm']?>" style="height:200px; width:200px;">
                      </div>
                  </div>
            </div>

<div class="d-flex justify-content-center" style="width:100%;">
<form 
  id="modificar_categoria" 
  action="crud_categoria_automotriz.php" 
  method=post  
  class="m-5 p-5 border border-dark rounded" 
  style="width:50%">

    <div class="form-group">
          <label class="mt-3">Nombre de la categoria</label>
          <input type="text" name="nombre_categoria" id="nombre_categoria" minlength=5 class="form-control mt-1" value="<?php echo $result['nombre_catm']?>">

          <label class="mt-3">Nombre en inglés</label>
          <input type="text" name="nombre_categoriai" id="nombre_categoriai" placeholder="texto en inglés" minlength=5 class="form-control mt-1" value="<?php echo $result['nombre_catmi']?>">
                   
          <label class="mt-3">Descripcion</label>
          <textarea minlength=50 maxlength=300  class="form-control mt-1" id="descripcion_catm" name="descripcion_catm"  rows="8"><?php echo $result['descripcion_catm']?></textarea>

          <label class="mt-3">Descripcion en inglés</label>
          <textarea minlength=50 maxlength=300  class="form-control mt-1" placeholder="texto en inglés" id="descripcion_catmi" name="descripcion_catmi"  rows="8"><?php echo $result['descripcion_catmi']?></textarea>

          <div class="d-flex flex-column mb-3">
            <label class="mt-3">Seleccione una imagen</label>
            <input type="file" id="file_imagen" name="file_imagen">
          </div>
          <input type="text" id="id_catm" name="id_catm" value="<?php echo $result['id_catm']?>" style="opacity:0%">
    </div>

    <div class="d-flex justify-content-center" style="width:100%;">
        <button class="btn btn-primary" type="submit">
             Actualizar registro
        </button>
    </div>

</form>

</div>
	
<script>
    document.getElementById('modificar_categoria').addEventListener('submit', function(event) {
    event.preventDefault(); 


    const formData = new FormData(this);
    formData.append('opcion', '4');
     

    fetch('crud_categoria_moldes.php', {
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