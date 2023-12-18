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

 $consulta_empleo = $cone->prepare("select * from empleos where id = '".$id."'"); 
 $consulta_empleo->execute();
 $vacante = $consulta_empleo->fetch(PDO::FETCH_ASSOC);

 $consulta_parrafo = $cone->prepare("select * from parrafo_empleo where id_e = '".$id."'"); 
 $consulta_parrafo->execute();

?>

              <div class="container-fluid head-contenido">
                  <div class="d-flex justify-content-left">
                      <div class="p-2">
                         <h2>Vacantes</h2>
                      </div>
                  </div>
              </div>

            <div class="container mt-5">
                  <div class="d-flex justify-content-center">
                      <div class="p-2 text-center">
                         <h5>INGRESE LOS DATOS REQUERIDOS PARA CREAR EL NUEVO REGISTRO </h4>
                         <a class="nav-link" href="javascript: history.go(-1)">presiona aqui para regresar a la pagina anterior</a>
                      </div>
                  </div>
            </div>

            <div class="d-flex justify-content-center">
                <img src="../img/vacantes/<?php echo $vacante['imagen_vacante']?>" style="height:200px; width:200px;">
            </div>

            <div class="d-flex justify-content-center">
                <a class="btn btn-primary boton-plantas text-center my-2" href="agregar_contenido_vacante.php?id_e=<?php echo (base64_encode($id))?>">
                    <i class="fas fa-plus" style="color: #ffffff;"> AGREGAR PARRAFO</i>
                </a>  
            </div>


    <?php while($parrafo = $consulta_parrafo->fetch(PDO::FETCH_ASSOC)){
        echo'<div class="m-5 p-5 border border-dark rounded">
        <label><b>TEXTO EN ESPAÑOL</b></label>
                '.$parrafo['parrafo'].'
                <hr style="background-color:black;"> 
                <label><b>TEXTO EN INGLES</b></label>
                 '.$parrafo['parrafoi'].'   <br>    
                    <a class="btn btn-primary mx-3" href="actualizar_contenido_vacante.php?id_p='.(base64_encode($parrafo['id_p'])).'">
                        MODIFICAR TEXTO
                    </a> 

                    <a id="eliminar_banner" onclick="borrar_parrafo('.$parrafo['id_p'].');" href="#" class="btn btn-danger">
                        ELIMINAR
                    </a>
            </div>';}
    ?>

<script>
    document.getElementById('agregar_vacante').addEventListener('submit', function(event) {
    event.preventDefault(); 

  
    const formData = new FormData(this);
    formData.append('opcion', '3');
     

    fetch('crud_vacantes.php', {
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



function borrar_parrafo(id) {
    var resultado = confirm("¿ESTAS SEGURO QUE DESEAS ELIMINAR ESTE REGISTRO?");

if (resultado) {
  
        const data = new FormData();
        data.append('opcion', '5');
        data.append('id_p', id);
        console.log(data);

        fetch('./crud_vacantes.php', {
            method: 'POST',
            body: data
        })
        .then(response => response.text()) // Lee la respuesta del servidor
        .then(resultado => {
            alert(resultado);
            location.reload();
        })
        .catch(error => {
            console.error('Error:', error);
        });
    
}
    }


</script> 
<?php
 include("footer_panel.php");
?>


