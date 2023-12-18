<?php
 include('validacion_usuarios.php');

 if($_SESSION['permisos']!='1' ){
    echo '
    <script>
    location.href ="panel_perfil.php";
    </script>';
    }


  $id =$_POST['id'];
  $consulta = $cone->prepare("select * from usuarios where id= '".$id."'"); 
  $consulta->execute();
  $usuario = $consulta->fetch(PDO::FETCH_ASSOC);

?>
              <div class="container-fluid head-contenido">
                  <div class="d-flex justify-content-left">
                      <div class="p-2">
                         <h2>USUARIOS</h2>
                      </div>
                  </div>
              </div>


            <div class="container mt-5">
                  <div class="d-flex justify-content-center">
                      <div class="p-2 text-center">
                         <h5>INGRESE LOS DATOS REQUERIDOS PARA CREAR EL NUEVO REGISTRO </h4>
                         <a class="nav-link" href="panel_usuarios.php">presiona aqui para regresar a la pagina anterior</a>
                      </div>
                  </div>
            </div>

  <div class="d-flex justify-content-center">
    <form id="actualizar" method=post  class="m-5 p-5 border border-dark rounded" style="width:50%;">

        <div class="d-flex justify-content-center">
            <b>USUARIO: </b> 
            <label>
                <?php echo $usuario['nombre']?>
            </label>
        </div>

      <div class="d-flex flex-column mb-3">
            <label>NOMBRE</label>
            <input type="text" minlength=5 maxlength=200 class="form-control my-2" id="nombre" name="nombre" placeholder="<?php echo $usuario['nombre']?>">
            <label class="mt-2">CONTRASEÑA</label>
            <input type="text" minlength=10 maxlength=200 class="form-control my-2" id="contraseña" name="contraseña" value="<?php echo htmlspecialchars($usuario['password']);?>">
            <input type="hidden" id="id" name="id" value="<?php echo $usuario['id']?>">
        </div>
    
      <div class="d-flex flex-column mb-3">
          <label>Seleccione el rol del usuaio </label>
          <select class="form-control" id="rol" name="rol" style="max-width:50%">
              <option value="">---Seleccione una rol---</option>
              <option value="1">admin</option>
              <option value="2">automotriz</option>
              <option value="3">moldes</option>
              <option value="4">RH</option>
          </select>
      </div>
      <div class="d-flex justify-content-center"><button class="btn btn-primary" type="submit">
        ACTUALIZAR DATOS
      </button>
    </div>
        
    </form>
  </div>
	
<script>
    document.getElementById('actualizar').addEventListener('submit', function(event) {
    event.preventDefault(); 
 
    const formData = new FormData(this);
    formData.append('opcion', '5');
    const regex = /^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/;
     

    if(!(/^\S+$/.test(formData.get('contraseña'))))
                alert("La contraseña no puede contener espacios")

        else if(!regex.test(formData.get('contraseña')))
            alert("La contraseña debe contener al menos una mayuscula, un caracter especial y un numero")

    else
    fetch('crud_usuarios.php', {
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