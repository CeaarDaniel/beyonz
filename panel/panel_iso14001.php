<?php
include('validacion_usuarios.php');

if($_SESSION['permisos']!='1' ){
    echo '
    <script>
    location.href ="panel_perfil.php";
    </script>';
    }

   $consulta_calidad = $cone->prepare("select * from nuestra_calidad"); 
   $consulta_calidad->execute();
   $consulta_objetivos = $cone->prepare("select * from objetivos_ambientales"); 
   $consulta_objetivos->execute();
   $calidad = $consulta_calidad->fetch(PDO::FETCH_ASSOC);
?>

              <div class="container-fluid head-contenido">
                  <div class="d-flex justify-content-left">
                      <div class="p-2">
                         <h2>Nuestra calidad</h2>
                      </div>
                  </div>
              </div>
            <div class="container mt-5">
                  <div class="d-flex justify-content-center">
                      <div class="p-2 text-center">
                         <h5>INGRESE LOS DATOS REQUERIDOS PARA ACTUALIZAR LA PAGINA </h4>
                      </div>
                  </div>
            </div>

<form id="actualizar_calidad" action="borrar_planta.php" method=post  class="m-5 p-5 border border-dark rounded">

    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <label><b>TEXTO ISO 14001</b></label>
                <textarea minlength=50 maxlength=2000  class="form-control mt-1" id="texto_9001" name="texto_9001" rows="8">
                    <?php echo $calidad['texto_9001']?></textarea>
            </div>
        </div>

        <div class="col-12">
            <div class="mb-3 mt-5">
                <label><b>TEXTO ISO 14001 EN INGLÉS</b></label>
                <textarea minlength=50 maxlength=2000  class="form-control mt-1" id="texto_9001i" name="texto_9001i" rows="8">
                    <?php echo $calidad['texto_9001i']?></textarea>
            </div>
        </div>
    </div>


    <input type="hidden" name="">

         <button class="btn btn-primary" type="submit">
            Actualizar datos
         </button>
    

</form>




<p class="text-center">
         <b>OBJETIVOS AMBIENTALES</b>
    </p>


<?php
while ($objetivo = $consulta_objetivos->fetch(PDO::FETCH_ASSOC)) {

    echo '<div class="container">
      <div class="row my-5">                               
            <div class="col-sm-12 col-md-4 px-5">
                <div class="imagen-producto">
                    <img src="../img/calidad/'.$objetivo['img_objetivo'].'"> 
                </div>
            </div>

                <div class="col-sm-12 col-md-8 p-0 m-0">
                    <div class="d-flex flex-wrap justify-content-center align-content-center" style="height:100%"> 
                        <form id="actualizar_equipos" 
                              enctype="multipart/form-data"
                              class="mx-0 px-2" 
                              method="post" 
                              action="crud_calidad.php"
                              role="form" 
                              style="height:100%; width: 100%;">
                              <div class="form-group">
                              <textarea minlength=5 maxlength=300 class="form-control mt-1" id="texto_objetivo" name="texto_objetivo" placeholder="escriba un texto aqui" rows="4">'.$objetivo['texto_objetivo'].'</textarea>
                              <textarea minlength=5 maxlength=300 class="form-control mt-1" id="texto_objetivoi" name="texto_objetivoi" placeholder="escriba texto en inglés" rows="4">'.$objetivo['texto_objetivoi'].'</textarea>
                                      <input type="file" id="img_objetivo" name="img_objetivo"> 
                              </div>
                              <button class="btn btn-primary" type="submit">
                                ACTUALIZAR DATOS
                              </button> 
                              <input type="text" id="id" name="id" value="'.$objetivo['id'].'" style="opacity:0%">
                              <input type="hidden" id="opcion" name="opcion" value="5"> 
                        </form>
                    </div> 
  </div>              </div>
</div>';
  
}

?>



	
<script>

var editor = document.getElementById("texto_9001");
            var url="";
            const fileInput = document.getElementById('fileInput');
            const subirBoton = document.getElementById('uploadButton');

            CKEDITOR.ClassicEditor.create(editor, {
                
                filebrowserUploadUrl: '../archivos.php',
                toolbar: {
                    items: [
                        'findAndReplace', 'selectAll', '|',
                        'heading', '|',
                        'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                        'bulletedList', 'numberedList', 'todoList', '|',
                        'outdent', 'indent', '|',
                        'undo', 'redo',
                        '-',
                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                        'alignment', '|',
                        'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                        'sourceEditing',  
                    ],
                    shouldNotGroupWhenFull: true
                },

                list: {
                    properties: {
                        styles: true,
                        startIndex: true,
                        reversed: true
                    }
                },
  
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                        { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                        { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                        { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                        { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                    ]
                },
                
                placeholder: '',

                fontSize: {
                    options: [ 'default',10, 11, 12, 13, 14, 15, 16, 17, 18, 19,20, 21, 22],
                    supportAllValues: true
                },
                link: {
                    decorators: {
                        addTargetToExternalLinks: true,
                        defaultProtocol: 'https://',
                        toggleDownloadable: {
                            mode: 'manual',
                            label: 'Downloadable',
                            attributes: {
                                download: 'file'
                            }
                        }
                    }
                },

              
                removePlugins: [
                    'CKBox',
                    'CKFinder',
                    'EasyImage',
                    'RealTimeCollaborativeComments',
                    'RealTimeCollaborativeTrackChanges',
                    'RealTimeCollaborativeRevisionHistory',
                    'PresenceList',
                    'Comments',
                    'TrackChanges',
                    'TrackChangesData',
                    'RevisionHistory',
                    'Pagination',
                    'WProofreader',
                    'SlashCommand',
                    'Template',
                    'DocumentOutline',
                    'FormatPainter',
                    'TableOfContents',
                    'PasteFromOfficeEnhanced'
                ]
            }).then();


            var editori = document.getElementById("texto_9001i");
        
            CKEDITOR.ClassicEditor.create(editori, {
                
                filebrowserUploadUrl: '../archivos.php',
                toolbar: {
                    items: [
                        'findAndReplace', 'selectAll', '|',
                        'heading', '|',
                        'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                        'bulletedList', 'numberedList', 'todoList', '|',
                        'outdent', 'indent', '|',
                        'undo', 'redo',
                        '-',
                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                        'alignment', '|',
                        'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                        'sourceEditing',  
                    ],
                    shouldNotGroupWhenFull: true
                },

                list: {
                    properties: {
                        styles: true,
                        startIndex: true,
                        reversed: true
                    }
                },
  
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                        { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                        { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                        { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                        { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                    ]
                },
                
                placeholder: '',

                fontSize: {
                    options: [ 'default',10, 11, 12, 13, 14, 15, 16, 17, 18, 19,20, 21, 22],
                    supportAllValues: true
                },
                link: {
                    decorators: {
                        addTargetToExternalLinks: true,
                        defaultProtocol: 'https://',
                        toggleDownloadable: {
                            mode: 'manual',
                            label: 'Downloadable',
                            attributes: {
                                download: 'file'
                            }
                        }
                    }
                },

              
                removePlugins: [
                    'CKBox',
                    'CKFinder',
                    'EasyImage',
                    'RealTimeCollaborativeComments',
                    'RealTimeCollaborativeTrackChanges',
                    'RealTimeCollaborativeRevisionHistory',
                    'PresenceList',
                    'Comments',
                    'TrackChanges',
                    'TrackChangesData',
                    'RevisionHistory',
                    'Pagination',
                    'WProofreader',
                    'SlashCommand',
                    'Template',
                    'DocumentOutline',
                    'FormatPainter',
                    'TableOfContents',
                    'PasteFromOfficeEnhanced'
                ]
            }).then();


    document.getElementById('actualizar_calidad').addEventListener('submit', function(event) {
    event.preventDefault(); 

    const formData = new FormData(this);
    formData.append('opcion', '4');
    formData.append('id', '1');
     

    var texto = formData.get('texto_9001');
    var textoi = formData.get('texto_9001i');


    if (texto.length<3000 && textoi.length<3000) {
        fetch('crud_calidad.php', {
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

    else{
        alert("El texto es demasiado largo");
    }
        
    });

</script> 
<?php
 include("footer_panel.php");
?>

