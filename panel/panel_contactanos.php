<?php

include('validacion_usuarios.php');
error_reporting(0);
if($_SESSION['permisos']!='1' && $_SESSION['permisos']!='4' ){
    echo '
    <script>
    location.href ="panel_perfil.php";
    </script>';
    }
 
 $consulta_moldes = $cone->prepare("select * from contactanos order by fecha ASC"); 
 $consulta_moldes->execute();
 $indice=0;
?>
           
           <div class="container-fluid head-contenido">
                  <div class="d-flex justify-content-left">
                      <div class="p-2">
                         <h2>CONTACTANOS</h2>
                      </div>
                  </div>
              </div>
        
            <div id="contenedor-productos" class="container p-0 contenedor-productos">
              <div class="row justify-content-center mx-0">
                <div class="col-12 px-0 my-3 mx-0"> 
                        <div class="row m-0">
                            <div class="col-3"> 
                                <p class="text-center"><b>FECHA</b></p>
                            </div> 

                            <div class="col-3">
                            <p class="text-center"><b>NOMBRE</b></p>
                            </div>

                            <div class="col-3">
                            <p class="text-center"><b>CORREO</b></p>
                            </div>

                            <div class="col-3">
                            <p class="text-center"><b>TELEFONO</b></p>
                            </div>
                        </div>
                </div>

                <?php
                    while ($fila = $consulta_moldes->fetch(PDO::FETCH_ASSOC)) {
                       
                        if(file_exists('../documentos/'.$fila["archivo"]) && isset($fila['archivo']) && $fila['archivo']!="" ) 
                            $archivo=$fila["archivo"];

                        else
                        $archivo="sin.pdf";

                        echo '
                                <div class="col-12 px-0 my-3 mx-0 rounded border"> 
                                        <div class="row m-0">
                                            <div class="col-3"> 
                                            <p class="text-center">'.$fila['fecha'].
                                            '</p>
                                            </div> 
                                            
                                            <div class="col-3">
                                            <p class="text-center">'.$fila['nombre'].'</p>
                                            </div>

                                            <div class="col-3">
                                            <p class="text-center">'.$fila['correo'].'</p>
                                            </div>

                                            <div class="col-3">
                                            <p class="text-center">'.$fila['telefono'].'</p>
                                            </div> 
                                        </div>
                                        <div class="d-flex justify-content-center align-content-center p-2">    
                                            <button class="btn btn-primary mx-3" data-toggle="collapse" data-target="#c'.$fila['id'].'">   
                                                VER INFORMACION                       
                                            </button>
                                            <input type="hidden" name="id" value="'.$fila['id'].'">
                                            <input id="eliminar" onclick="borrar('.$fila['id'].');" class="btn btn-danger mx-3" value="ELIMINAR">   
                                        </div>

                                        <div id="c'.$fila['id'].'" class="collapse">
                                            <div class="d-flex flex-column justify-content-center aling-content-center m-0 p-5 border border-dark rounded" style="width:100%;">
                                                
                                                    <div>
                                                        <b>NOMBRE:</b>
                                                    '.$fila['nombre'].'
                                                    </div>
                                                
                                                    <div>
                                                        <b>CORREO:</b>
                                                        '.$fila['correo'].'
                                                    </div>

                                                    <div>
                                                        <b>TELEFONO:</b>
                                                        '.$fila['telefono'].'
                                                    </div>

                                                    <div>
                                                        <b>TEXTO</b>
                                                        <p class="text-justify">
                                                        '.$fila['mensaje'].'</p>
                                                    </div>
                                                    <embed src="../documentos/'.$archivo.'" type="application/pdf" width="100%" height="600px"/>
                                                    <hr>

                                                    <h4>REENVIAR CORREO</4>
                                                    <div class="d-flex flex-wrap flex-column aling-content-center justify-content-center mt-2">
                                                        <form 
                                                            id="enviar_correo" 
                                                            enctype="multipart/form-data"
                                                            method="post"
                                                            action="actualizar_contacto.php"
                                                            >
                                                                <label style="font-size:18px;">Seleccione un correo </label>
                                                                <select class="form-control" id="correo" name="correo" style="max-width:50%">
                                                                    <option value="">---Seleccione una opcion---</option>
                                                                    <option value="miguel.gomez@beyonz.com.mx">miguel.gomez@beyonz.com.mx</option>
                                                                </select>
                                                        
                                                                <div class="d-flex justify-content-center">
                                                                    <button type="submit" class="btn btn-primary mt-2 px-3">Reenviar</button>
                                                                </div>
                                                                <input type="hidden" name="id" value="'.$fila['id'].'">
                                                                <input type="hidden" name="opcion" value="5">
                                                        </form>
                                                    </div>
                                           </div>
                                        </div>
                                </div>';
                    }
                    ?>
            </div>   
        </div>
<script>
   function borrar(id) {
    var resultado = confirm("¿ESTAS SEGURO QUE DESEAS ELIMINAR ESTE REGISTRO?");

if (resultado) {
  
        const data = new FormData();
        data.append('opcion', '4');
        data.append('id', id);
        console.log(data);

        fetch('./actualizar_contacto.php', {
            method: 'POST',
            body: data
        })
        .then(response => response.text()) 
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