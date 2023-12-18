<button id="contactanos" type="button" class="btn btn-primary contactanos" data-toggle="modal" data-target="#myModal">
<i class="fas fa-envelope" style="color: #FFFFFF;"></i> 
<?php
      if ($_SESSION['leng']==="es")  echo "CONTACTANOS";
      else echo"CONTACT US";
?>
  </button>

  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      

        <div class="modal-header">
          <div class="d-flex justify-content-center" style="width:100%">
             <h3 class="text-center">
             <?php
                if ($_SESSION['leng']==="es")  echo "CONTACTANOS";
                else echo"CONTACT US";
              ?>
             </h3>
          </div>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
 
        <div class="modal-body">
           <div class="row p-0">
           <form class="col-md-9 m-auto" id="contactar" action="" enctype='multipart/form-data' method="post" role="form">
           <input type="hidden" name="opcion" id="opcion" value="3">
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputname">
                        <?php
                          if ($_SESSION['leng']==="es")  echo "Nombre";
                          else echo"Name";
                        ?>
                        </label>
                        <input type="text" maxlength=150 class="form-control mt-1" id="nombre" name="nombre" placeholder="<?php
                          if ($_SESSION['leng']==="es")  echo "Nombre";
                          else echo"Name";
                        ?>" required>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputemail">
                        <?php
                          if ($_SESSION['leng']==="es")  echo "Correo";
                          else echo"Email";
                        ?>
                        </label>
                        <input type="email" maxlength=200 class="form-control mt-1" id="email" name="email" placeholder="Email" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="inputmessage">
                    <?php
                          if ($_SESSION['leng']==="es")  echo "Mensaje";
                          else echo"Message";
                        ?>
                    </label>
                    <textarea class="form-control mt-1" maxlength=900 id="mensage" name="mensage" 
                    placeholder="<?php
                          if ($_SESSION['leng']==="es")  echo "Mensaje";
                          else echo"Message";
                        ?>" rows="4" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="inputmessage">
                      <?php
                            if ($_SESSION['leng']==="es")  echo "Número de teléfono";
                            else echo "Phone number";
                          ?>
                    </label>
                    <input type="number" maxlength=100 class="form-control mt-1" id="numero" name="numero" placeholder="<?php
                          if ($_SESSION['leng']==="es")  echo "Número de teléfono";
                          else echo "Phone number";
                        ?>" required></textarea>
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
                <div class="d-flex flex-wrap justify-content-center">
                        <button type="submit" class="btn btn-primary btn-lg px-3">
                          <?php
                          if ($_SESSION['leng']==="es")  echo "Enviar";
                          else echo "SEND";
                        ?></button>
                </div>
 
                <input type="hidden" name="fecha" id="fecha" value="<?php  $fechaActual = date('Y-m-d H:i:s'); echo $fechaActual;?>">
            </form>
        </div>
        </div>
        
      </div>
    </div>
  </div>

  <script>
  var boton = document.getElementById("contactanos");
  function mostrarOcultarBoton() {
    if (window.scrollY > 300) { 
      boton.style.display = "block"; 
    } else {
      boton.style.display = "none";
    }
  }

  window.addEventListener("scroll", mostrarOcultarBoton);

    document.getElementById('contactar').addEventListener('submit', function(event) {
    event.preventDefault(); 

    const formData = new FormData(this);
    const currentDate = new Date();
    const year = currentDate.getFullYear();
    const month = currentDate.getMonth() + 1;
    const day = currentDate.getDate();
    const fechaActual = `${year}-${month}-${day}`;
    formData.append('fecha', fechaActual);
    formData.append('opcion', '3');

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