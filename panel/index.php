<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/super-build/ckeditor.js"></script>
    <link rel="stylesheet" href="estilo_panel.css">
    <title> PANEL</title>
    <link rel="icon" href="../img/logo.png" type="image/x-icon"> 
</head>

<body>

<?php

session_start();

if (isset($_SESSION['loggedin'])) {
  header('Location: panel_perfil.php');
} 
?>


<div class="d-flex aling-content-center justify-content-center">
<form 
  id="login" 
  action="panel_perfil.php" 
  method=post  
  class="m-5 border border-info rounded" >

  <div class="container head-contenido">
                  <div class="d-flex justify-content-center flex-column">

                      <div class="p-2 text-center">
                         <h5>INGRESE SUS DATOS DE ACCESO</h4>
                      </div>
                  </div>
            </div>

    <div class="form-group p-5" style="width:100%">
          <label class="mt-3">NOMBRE DE USUARIO</label>
          <input type="text" name="user" id="user"  class="form-control mt-1" placeholder="ingrese su nombre de usuario">

          <label class="mt-3">CONTRASEÑA</label>
          <input type="password" name="password" id="password" class="form-control mt-1" placeholder="ingrese su contraseña"> 
    </div>

        <div class="d-flex justify-content-center" style="width:100%;">
          <button class="btn btn-primary active m-3" type="submit">
            ENTRAR
          </button>
        </div>

</form>
</div>
<script>
  
    document.getElementById('login').addEventListener('submit', function(event) {
    event.preventDefault(); 

    const formData = new FormData(this);
    formData.append('opcion', '1');
     

    fetch('crud_usuarios.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.text()) 
    .then(text => {
          respuesta = JSON.parse(text)
          console.log(respuesta);
          

          if(respuesta.login)
            document.getElementById('login').submit();

          else {
            alert("Nombre de usuario o contraseña no validos");
          }

      })
    .catch(error => {
        console.error('Error:', error);
    });
});

</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
