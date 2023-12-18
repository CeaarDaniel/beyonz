<?php

include('validacion_usuarios.php');

if($_SESSION['permisos']!='1'){
    echo '
    <script>
    location.href ="panel_perfil.php";
    </script>';
    }
 
 $consulta_empleos = $cone->prepare("select * from contenido_empleos"); 
 $consulta_empleos->execute();
 $empleos = $consulta_empleos->fetch(PDO::FETCH_ASSOC);
?>
           
              <div class="container-fluid head-contenido">
                  <div class="d-flex justify-content-left">
                      <div class="p-2">
                         <h2>EMPLEOS</h2>
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
        
            

<form id="actualizar_datos" action="" method=post  class="m-5 p-5 border border-dark rounded">

    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <label><b>¿POR QUÉ BEYONZ MEXICANA?</b></label>
                <textarea minlength=50 maxlength=500  class="form-control mt-1" id="texto" name="texto" rows="8"><?php echo $empleos['texto']?></textarea>
            </div>
        </div>

        <div class="col-12">
            <div class="mb-3 mt-5">
                <label><b>TEXTO EN INGLÉS</b></label>
                <textarea minlength=50 maxlength=500  class="form-control mt-1" id="texto_i" name="texto_i" rows="8"><?php echo $empleos['texto_i']?></textarea>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <label><b>TEXTO BENEFICIOS</b></label>
                <textarea minlength=50 maxlength=500  class="form-control mt-1" id="texto_be" name="texto_be" rows="8"><?php echo $empleos['texto_be']?></textarea>
            </div>
        </div>

        <div class="col-12">
            <div class="mb-3 mt-5">
                <label><b>TEXTO EN INGLÉS</b></label>
                <textarea minlength=50 maxlength=500  class="form-control mt-1" id="texto_bei" name="texto_bei" rows="8"><?php echo $empleos['texto_bei']?></textarea>
            </div>
        </div>
    </div> 

    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <label><b>BENEFICIOS</b></label>
                <textarea minlength=50 maxlength=2000  class="form-control mt-1" id="lista_be" name="lista_be" rows="8">
                    <?php echo $empleos['lista_be']?></textarea>
            </div>
        </div>

        <div class="col-12">
            <div class="mb-3 mt-5">
                <label><b>TEXTO EN INGLÉS</b></label>
                <textarea minlength=50 maxlength=2000  class="form-control mt-1" id="lista_bei" name="lista_bei" rows="8"><?php echo $empleos['lista_bei']?></textarea>
            </div>
        </div>
    </div>
    <button class="btn btn-primary" type="submit">ACTUALIZAR DATOS</button>
    <input type="hidden" id="id" name="id" value="<?php echo $empleos['id'] ?>">   
</form>


<script>
  
var editor = document.getElementById("lista_be");
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
            }).then(editor => {
    
            });

            var editori = document.getElementById("lista_bei");

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
                        'specialCharacters', 'horizontalLine', 'pageBreak', '|'
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
            }).then(editori => {
    
            });



document.getElementById('actualizar_datos').addEventListener('submit', function(event) {
    event.preventDefault(); 

  
    const formData = new FormData(this);
    formData.append('opcion', '7');
     
    
    var texto = formData.get('lista_be');
    var textoi = formData.get('lista_bei');


    if (texto.length<2000 && textoi.length<2000) {

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
} 
    
    else {
        alert("El texto es demasiado largo");
    }
});




</script> 

<?php
 include("footer_panel.php");
?>