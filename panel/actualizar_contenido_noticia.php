<?php
include('validacion_usuarios.php');

if($_SESSION['permisos']!='1' && $_SESSION['permisos']!='4' ){
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



  
    $consulta_noticia = $cone->prepare("select * from noticias where id='".$id."'");  
    $consulta_noticia->execute();
    $noticia= $consulta_noticia->fetch(PDO::FETCH_ASSOC);

    $consulta_contenido = $cone->prepare("select * from contenido_noticia where id_n= '".$id."'");  
    $consulta_imagenes = $cone->prepare("select * from imagenes_noticia where id_n= '".$id."'");  

?>

              <div class="container-fluid head-contenido">
                  <div class="d-flex justify-content-left">
                      <div class="p-2">
                         <h2>Noticias</h2>
                      </div>
                  </div>
              </div>

         
<div id="noticias">

                 <div  class="d-flex justify-content-center" style="max-height: 100%; overflow:hidden;">
                        <div class="d-flex justify-content-center flex-wrap align-content-center"  style="height:100%; width:30%;">
                            <img class="my-3" src="../img/noticias/<?php echo $noticia['imagen_principal']?>" alt="imagen" style="max-height:200px; min-height:200px;">
                            <div class="card-body" style="overflow:hidden;">
                                    <h4 class="card-title"><?php echo $noticia['titulo']?></h4>
                                    <div class="d-flex justify-content-start">
                                            <h7 class="text-muted">
                                                <?php echo $noticia['fecha'] ?>
                                            </h7>
                                        </div>
                                    <p class="card-text text-justify"><?php echo $noticia['resumen'] ?></p>
                                   <a class="nav-link text-center" href="javascript: history.go(-1)">presiona aqui para regresar a la pagina anterior</a>
                                </div>
                        </div>  
                    </div>




              <div class="d-flex justify-content-center">
                      <a class="btn btn-primary btn m-3" href="" data-toggle="collapse" data-target="#parrafos" >   
                        PARRAFOS                   
                      </a>
                      <a class="btn btn-primary btn m-3" href="" data-toggle="collapse" data-target="#imagenes">
                       IMAGENES
                      </a>
              </div>


    <div id="parrafos" class="collapse" data-parent="#noticias">
              <div class="d-flex justify-content-center" style="width:100%;">
                      <form 
                        id="agregar_parrafo" 
                        action="" 
                        method=post  
                        class="m-5 p-5" 
                        style="width:80%">

                          <div class="form-group">
                                <div class="d-flex flex-column mb-3">
                                  <label class="m-3 text-center font-weight-bold">AGREGAR UN NUEVO PARRAFO</label>
                                  <label><b>TEXTO EN ESPAÑOL</b></label>
                                  <textarea minlength=20 maxlength=9000  class="form-control mt-1" id="parrafo" name="parrafo" placeholder="escriba un texto aqui" rows="8" required></textarea>
                                  <label><b>TEXTO EN INGLÉS</b></label>
                                  <textarea minlength=20 maxlength=9000  class="form-control mt-1" id="parrafoi" name="parrafoi" placeholder="escriba texto en inglés" rows="8"></textarea>
                                </div>
                                <input type="text" id="id_n" name="id_n" value=<?php echo $id?>  style="opacity:0%"> 
                          </div>

                          <div class="d-flex justify-content-center" style="width:100%;">
                              <button class="btn btn-primary" type="submit">
                              <i class="fas fa-plus" style="color: #ffffff;"> AGREGAR TEXTO</i>
                              </button>
                          </div>

                      </form>
                </div>
              <?php

                        $consulta_contenido->execute(); // Reiniciar la consulta
                        while ($parrafos = $consulta_contenido->fetch(PDO::FETCH_ASSOC)) {
            
                            echo 
                            '
                            <div class="container">
                              <div class="row my-5">                               
                                        <div class="col-sm-12 col-md-12">
                                            <div class="d-flex flex-wrap justify-content align-content-center" style="height:100%; width:100%"> 
                                                <form id="modificar_imagen" 
                                                      enctype="multipart/form-data"
                                                      class="m-auto" 
                                                      method="post" 
                                                      action="crud_noticias.php"
                                                      role="form" 
                                                      style="height:100%">
                                                      <div class="form-group">
                                                      <div class="row m-0">
                                                        <div class="col-12">
                                                        <label><b>TEXTO EN ESPAÑOL</b></label>
                                                        <textarea minlength=20 maxlength=9000  class="form-control mt-1" id="parrafo" name="parrafo" placeholder="escriba un texto aqui" rows="8">'.$parrafos['parrafo'].'</textarea>
                                                        </div>
                                                        <div class="col-12">
                                                        <label><b>TEXTO EN INGLES</b></label>
                                                        <textarea minlength=20 maxlength=9000  class="form-control mt-1" id="parrafoi" name="parrafoi" placeholder="escriba texto en inglés" rows="8">'.$parrafos['parrafoi'].'</textarea>
                                                        </div>
                                                      </div>
                                                      </div>
                                                      
                                                  
                                                        <button class="btn btn-primary mx-2" type="submit">
                                                            MODIFICAR PARRAFO
                                                        </button> 
                                                        <a id="eliminar_banner" onclick="borrar_parrafo('.$parrafos['id_c'].');" href="#" class="btn btn-danger mx-2" style="width:200px; height:40px;">
                                                            ELIMINAR
                                                        </a>
                                                         
                                                      
                                                      <input type="text" id="id_c" name="id_c" value="'.$parrafos['id_c'].'" style="opacity:0%">
                                                      <input type="text" id="opcion" name="opcion" value="6"  style="opacity:0%"> 
                                                </form>
                                            </div> 
                                        </div>
                                    </div> 
                              </div>';
                        }
                  ?>
    </div>


<div id="imagenes" class="collapse" data-parent="#noticias">
              <div class="d-flex justify-content-center" style="width:100%;">
                      <form 
                        id="agregar_imagen" 
                        action="" 
                        method=post  
                        class="m-5 p-5" 
                        style="width:80%">
                        
                          <div class="form-group">
                                <div class="d-flex flex-column mb-3">
                                  <label class="m-3 text-center font-weight-bold">AGREGAR UNA IMAGEN</label>
                                  <label><b>Texto en español</b></label>
                                  <textarea minlength=5 maxlength=300  class="form-control mt-1" id="descripcion" name="descripcion" placeholder="descripcion de la imagen" rows="4"></textarea>
                                  <label> <b>Texto en inglés</b> </label>
                                  <textarea minlength=5 maxlength=300  class="form-control mt-1" id="descripcioni" name="descripcioni" placeholder="descripcion de la imagen en inglés" rows="4"></textarea>
                                  <input type="file" id="file_imagen" name="file_imagen" required> 
                                </div>
                                <input type="text" id="id_n" name="id_n" value=<?php echo $id?>  style="opacity:0%"> 
                          </div>

                          <div class="d-flex justify-content-center" style="width:100%;">
                              <button class="btn btn-primary" type="submit">
                              <i class="fas fa-plus" style="color: #ffffff;"> AGREGAR IMAGEN</i>
                              </button>
                          </div>

                      </form>
                </div>

<?php
$consulta_imagenes->execute(); // Reiniciar la consulta
while ($imagenes = $consulta_imagenes->fetch(PDO::FETCH_ASSOC)) {

    echo 
    '
    <div class="container">
      <div class="row my-5">                               
            <div class="col-sm-12 col-md-4 px-5">
                <div class="imagen-producto">
                    <img src="../img/noticias/'.$imagenes['imagen'].'"> 
                </div>
            </div>

                <div class="col-sm-12 col-md-8">
                    <div class="d-flex flex-wrap justify-content align-content-center" style="height:100%"> 
                        <form id="modificar_imagen" 
                              enctype="multipart/form-data"
                              class="m-auto" 
                              method="post" 
                              action="crud_noticias.php"
                              role="form" 
                              style="height:100%">
                              <div class="form-group">
                              <label><b>Texto en español</b></label>
                              <textarea minlength=5 maxlength=300 class="form-control mt-1" id="descripcion" name="descripcion" placeholder="escriba un texto aqui" rows="4">'.$imagenes['descripcion'].'</textarea>
                              <label><b>Texto en inglés</b></label>
                              <textarea minlength=5 maxlength=300 class="form-control mt-1" id="descripcioni" name="descripcioni" placeholder="escriba texto en inglés" rows="4">'.$imagenes['descripcioni'].'</textarea>
                                      <input type="file" id="file_imagen" name="file_imagen"> 
                              </div>
                              <button class="btn btn-primary" type="submit">
                                MODIFICAR IMAGEN
                              </button> 
                              <a id="eliminar_imagen" onclick="borrar_imagen('.$imagenes['id_i'].');" href="#" class="btn btn-danger" style="width:200px; height:40px;">
                                ELIMINAR
                              </a>   
                              <input type="text" id="id_i" name="id_i" value="'.$imagenes['id_i'].'" style="opacity:0%">
                              <input type="text" id="opcion" name="opcion" value="9"  style="opacity:0%"> 
                        </form>
                    </div> 
                </div>
            </div> 
      </div>';}
?>
</div>
</div>
<script>
  function borrar_parrafo(id_c) {
    var resultado = confirm("¿ESTAS SEGURO QUE DESEAS ELIMINAR ESTE REGISTRO?");

if (resultado) {
  
        const data = new FormData();
        data.append('opcion', '4');
        data.append('id_c', id_c);
        console.log(data);

        fetch('./crud_noticias.php', {
            method: 'POST',
            body: data
        })
        .then(response => response.text()) // Lee la respuesta del servidor
        .then(resultado => {
            alert(resultado);
            location.reload()
        })
        .catch(error => {
            console.error('Error:', error);
        });
      }
}


    document.getElementById('agregar_parrafo').addEventListener('submit', function(event) {
    event.preventDefault(); 


    const formData = new FormData(this);
    formData.append('opcion', '5');
     

    fetch('crud_noticias.php', {
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


   function borrar_imagen(id_i) {
    var resultado = confirm("¿ESTAS SEGURO QUE DESEAS ELIMINAR ESTE REGISTRO?");

if (resultado) {
  
        const data = new FormData();
        data.append('opcion', '7');
        data.append('id_i', id_i);
        console.log(data);

        fetch('./crud_noticias.php', {
            method: 'POST',
            body: data
        })
        .then(response => response.text()) // Lee la respuesta del servidor
        .then(resultado => {
            alert(resultado);
            location.reload()
        })
        .catch(error => {
            console.error('Error:', error);
        });
      }
}


  document.getElementById('agregar_imagen').addEventListener('submit', function(event) {
    event.preventDefault(); 


    const formData = new FormData(this);
    formData.append('opcion', '8');
     

    fetch('crud_noticias.php', {
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