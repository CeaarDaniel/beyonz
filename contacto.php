<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>
        <?php
        session_start();
        error_reporting(0);
        if ($_SESSION['leng']==="es")  echo "CONTACTANOS";
        else echo"CONTACT";
        ?>
    </title>
    <link rel="icon" href="./img/imagenes/logo.png" type="image/x-icon"> 
</head>
<body>

<?php 
 include("header.php");
 $consulta_contacto = $con->prepare("select * from footer"); 
  $consulta_contacto->execute();
  $datos_contacto = $consulta_contacto->fetch(PDO::FETCH_ASSOC);
?>

<div class="jumbotron mx-0 mt-0 px-0 py-5">
  <h3 class="text-center">
     <?php
        if ($_SESSION['leng']==="es")  echo "CONTACTANOS";
        else echo"CONTACT US";
    ?>
  </h3>

  <div class="d-flex justify-content-center my-4" >
   <p class="text-justify" style="width:40%">
   <?php
        if ($_SESSION['leng']==="es")  echo "Déjanos saber tus necesidades y nos pondremos en contacto contigo o también puedes enviarnos un mensaje a nuestra dirección de correo o comunicarte a nuestro número de teléfono o por vía WhatsApp, nuestro horario de atención es de 8:00 am a 17:30 pm";
        else echo "Let us know your needs and we will contact you or you can also send us a message to our email address or contact us at our phone number or WhatsApp, we are available from 8:00 am to 5:30 pm.";
    ?>
   </p>
   
 </div>
        <iframe 
            class="pb-0 mb-0"
            src="<?php echo $datos_contacto['ubicacion']; ?>" 
            style="width:100%; height:400px; border:0;"
            loading="lazy" 
            allowfullscreen=""
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
</div>


  <div class="container py-5">
     <h3>
     <?php
        if ($_SESSION['leng']==="es")  echo "FORMULARIO DE CONTACTO";
        else echo"CONTACT FORM";
    ?>
     </h3>
                <p>
                <?php
        if ($_SESSION['leng']==="es")  echo "Dejanos tus cometarios y en breve un representante se comunicará";
        else echo "Leave us your comments, soon a representative will communicate";
    ?>
                </p>
        <div class="row my-4 pb-5">
            <form class="col-md-9 m-auto" id="contactanos" method="post" role="form"  enctype='multipart/form-data'>
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputname">
                            <?php
                                if ($_SESSION['leng']==="es")  echo "Nombre";
                                else echo"Name";
                            ?>
                        </label>
                        <input type="text" maxlength=150  class="form-control mt-1" id="nombre" name="nombre" placeholder="<?php
                          if ($_SESSION['leng']==="es")  echo "Nombre";
                          else echo"Name";
                        ?>" required>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputemail"><?php
                          if ($_SESSION['leng']==="es")  echo "Correo";
                          else echo"Email";
                        ?></label>
                        <input type="email" maxlength=200 class="form-control mt-1" id="email" name="email" placeholder="Email" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="inputmessage"><?php
                          if ($_SESSION['leng']==="es")  echo "Mensaje";
                          else echo"Message";
                        ?></label>
                    <textarea class="form-control mt-1" maxlength=900 id="mensage" name="mensage" placeholder="<?php
                          if ($_SESSION['leng']==="es")  echo "Mensaje";
                          else echo"Message";
                        ?>" rows="8" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="inputmessage"><?php
                          if ($_SESSION['leng']==="es")  echo "Número de teléfono";
                          else echo "Phone number";
                        ?>
                    </label>
                    <input type="number" maxlength=100 class="form-control mt-1" id="numero" name="numero" placeholder="<?php
                          if ($_SESSION['leng']==="es")  echo "Número de teléfono";
                          else echo "Phone number";
                        ?>" rows="8" required></textarea>
                </div>

                <div class="d-flex flex-column mb-3">
                    <label> 
                        <?php
                          if ($_SESSION['leng']==="es")  echo "AGREGAR UN ARCHIVO";
                          else echo "ADD A FILE";
                        ?>
                    </label>
                    <input type="file" id="archivo" name="archivo">
                </div>
                <div class="row">
                    <div class="col text-end mt-2">
                        <button type="submit" class="btn btn-primary btn-lg px-3">
                            <?php
                                if ($_SESSION['leng']==="es")  echo "Enviar";
                                else echo "SEND";
                                ?>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

  
<div class="container d-flex flex-column justify-content-center" style="width:100%">
      <h4 class="text-center mb-5">
            <?php
                if ($_SESSION['leng']==="es")  echo "Comunicate al correo";
                else echo"Contact us at email ";
            ?>  
            <a href="mailto:<?php echo $datos_contacto['email']; ?>?subject=Asunto del Correo">
            <i class="fas fa-envelope" style="color: #000000;"></i>
            <?php echo $datos_contacto['email']; ?>
            </a>
            <br> 
                <?php
                    if ($_SESSION['leng']==="es")  echo "o mandanos un mensaje al numero";
                    else echo"or send us a message at the number";
                ?>
            <i class="fas fa-phone" style="color: #000000;"></i><?php echo $datos_contacto['telefono']; ?>
        </h4>  
        <img src="./img/imagenes/mapa.jpg" class="img-fluid">
</div>




<script>
  document.getElementById('contactanos').addEventListener('submit', function(event) {
    event.preventDefault(); 


    const formData = new FormData(this);
    const currentDate = new Date();
    const year = currentDate.getFullYear();
    const month = currentDate.getMonth() + 1;
    const day = currentDate.getDate();
    const fechaActual = `${year}-${month}-${day}`;
    formData.append('fecha', fechaActual);
    formData.append('opcion', '2');

    var input = document.getElementById('archivo');
    var archivo = input.files[0];
    var limiteTamano = 20 * 1024 * 1024; // 20 MB en bytes

    if (input.files.length > 0) {
                if (archivo.size <= limiteTamano) {
                        fetch('./panel/actualizar_contacto.php', {
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
                } else {
                   alert('El archivo no es valido');
                }
        }

        else {
            fetch('./panel/actualizar_contacto.php', {
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
include("footer.php");
?>
  </body>
</html>