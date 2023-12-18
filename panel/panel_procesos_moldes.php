
<?php
 include('validacion_usuarios.php');

 if($_SESSION['permisos']!='1' && $_SESSION['permisos']!='3' ){
    echo '
    <script>
    location.href ="panel_perfil.php";
    </script>';
    }
    
   $consulta_moldes = $cone->prepare("select * from proceso_moldes"); 
   $consulta_moldes->execute();
   $moldes = $consulta_moldes->fetch(PDO::FETCH_ASSOC);
?>

              <div class="container-fluid head-contenido">
                  <div class="d-flex justify-content-left">
                      <div class="p-2">
                         <h2>Proceso de moldes</h2>
                      </div>
                  </div>
              </div>

            <div class="container mt-5">
                  <div class="d-flex justify-content-center flex-column">

                      <div class="p-2 text-center">
                         <h5>INGRESE LOS VALORES PARA LOS CAMPOS QUE DESEA ACTUALIZAR</h4>
                      </div>
                  </div>
            </div>

            
            <form  id="actualizar_proceso_moldes" action="" method="post" class="mx-3">
                <div class="mb-3">
                    <label> <b>PROCESO DE MOLDES</b></label>
                    <textarea class="form-control mt-1" maxlength=1000 id="texto" name="texto" placeholder="Escriba texto aqui" rows="8"><?php echo $moldes['texto']?></textarea>
                </div>
                
                <div class="mb-3">
                    <label class="mt-5"> <b>TEXTO EN INGLÉS </b></label>
                    <textarea id="textoi" name="textoi" class="form-control mt-1"  maxlength=1000 placeholder="Escriba texto aqui" rows="8"><?php echo $moldes['textoi']?></textarea>
                </div>

                <div class="mb-3">
                    <label><b>HERRAMIENTAS</b></label>
                    <textarea minlength=5 maxlength=1000  class="form-control mt-1" id="proceso_plasticidad" name="proceso_plasticidad" placeholder="escriba texto" rows="8"><?php echo $moldes['proceso_plasticidad']?></textarea>
                </div>

                <div class="mb-3">
                    <label><b>TEXTO EN INGLES</b></label>
                    <textarea minlength=5d maxlength=1000  class="form-control mt-1" id="proceso_plasticidadi" name="proceso_plasticidadi" placeholder="escriba texto en ingles" rows="8"><?php echo $moldes['proceso_plasticidadi']?></textarea>
                </div>


                <div class="mb-3">
                    <label><b>HERRAMIENTA UNO</b></label>
                    <textarea minlength=5 maxlength=1000  class="form-control mt-1" id="tool_uno" name="tool_uno" placeholder="escriba texto" rows="8"><?php echo $moldes['tool_uno']?></textarea>
                </div>

                <div class="mb-3">
                    <label><b>TEXTO EN INGLES</b></label>
                    <textarea minlength=5 maxlength=1000  class="form-control mt-1" id="tool_unoi" name="tool_unoi" placeholder="escriba texto" rows="8"><?php echo $moldes['tool_unoi']?></textarea>
                </div>


                <div class="mb-3">
                    <label><b>HERRAMIENTA DOS</b></label>
                    <textarea minlength=5 maxlength=1000  class="form-control mt-1" id="tool_dos" name="tool_dos" placeholder="escriba texto" rows="8"><?php echo $moldes['tool_dos']?></textarea>
                </div>

                <div class="mb-3">
                    <label><b>TEXTO EN INGLES</b></label>
                    <textarea minlength=5 maxlength=1000  class="form-control mt-1" id="tool_dosi" name="tool_dosi" placeholder="escriba texto" rows="8"><?php echo $moldes['tool_dosi']?></textarea>
                </div>

                
                <div class="m-3">
                        <label><b>RECUBRIMIENTOS</b></label>
                        <textarea class="form-control mt-1" id="texto_recu"  maxlength=1000 name="texto_recu" rows="8"><?php echo $moldes['texto_recu']?></textarea>
                </div>
            

                <div class="m-3">
                        <label><b>TEXTO RECUBRIMIENTOS EN INGLÉS</b></label>
                        <textarea class="form-control mt-1"  maxlength=1000 id="texto_recui" name="texto_recui" rows="8"><?php echo $moldes['texto_recui']?></textarea>
                </div>


                <div class="d-flex aling-content-center justify-content-center my-5">
                    <img src="../img/proceso_moldes/<?php  echo $moldes['img_recu']?>" style="max-height:400px; max-width:400px"> <br>
                </div>

                <label>Cambiar imagen</label>
                <input type="file" name="img_recu" id="img_recu">

                <div class="m-3">
                    <label><b> TIPOS RECUBRIMIENTOS</b></label>
                    <textarea class="form-control mt-1" maxlength=1000  id="tipos_recu" name="tipos_recu" rows="8"><?php echo $moldes['tipos_recu']?></textarea>
                </div>
            

                <div class="m-3">
                        <label><b>TEXTO EN INGLÉS</b></label>
                        <textarea class="form-control mt-1" maxlength=1000 id="tipos_recui" name="tipos_recui" rows="8"><?php echo $moldes['tipos_recui']?></textarea>
                </div>

                <div class="d-flex aling-content-center justify-content-center my-5">
                    <img src="../img/proceso_moldes/<?php  echo $moldes['img_tipos_recu']?>" style="max-height:400px; max-width:400px"> <br>
                </div>

                <label>Cambiar imagen</label>
                <input type="file" name="img_tipos_recu" id="img_tipos_recu">


                <div class="d-flex justify-content-center align-content-center my-5">
                  <video src="../videos/<?php echo $moldes['video'];?>" style="width:70%;  height:50%;" controls autoplay muted></video>
              </div>

                <div class="d-flex flex-column mb-3">
                    <label>Actualizar video</label>
                    <input type="file" id="video" name="video">
                </div>
  

    <div class="d-flex justify-content-center">
        <button class="btn btn-primary my-3" type="submit">Actualizar parrafo</button>
    </div>
    <input type="text" name="id" id="id" value="<?php echo $moldes['id']?>" style="opacity:0%;">
</form>
            
 <script>


    
var editor = document.getElementById("tool_uno");
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

var editori = document.getElementById("tool_unoi");
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





var editor2 = document.getElementById("tool_dos");
            CKEDITOR.ClassicEditor.create(editor2, {
                
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
            }).then(editor2 => {
    
            });



var editor2i = document.getElementById("tool_dosi");
            CKEDITOR.ClassicEditor.create(editor2i, {
                
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
            }).then(editor2i => {
    
            });


    document.getElementById('actualizar_proceso_moldes').addEventListener('submit', function(event) {
    event.preventDefault(); 

    const formData = new FormData(this);
    formData.append('opcion', '6');



    var tool1 = formData.get('tool_uno');
    var tool1i = formData.get('tool_unoi');

    var tool2 = formData.get('tool_dos');
    var tool2i = formData.get('tool_dosi');


    var input = document.getElementById('video');
    var file_video = input.files[0];
    
    var limite = 80 * 1024 * 1024; // 80 MB en bytes

    if (input.files.length > 0 && file_video.size > limite){
        alert("No se ha podido actualizar la informacion, el tamaño de los archivos debe de ser menor a 80 megas");  
        location.reload();
    }

else    
{

    if (tool1.length<3000 && tool1i.length<3000 && tool2.length<3000 && tool2i.length<3000) {

    fetch('crud_procesos.php', {
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
    }



    else {
        alert("El texto es demasiado largo");
    }

}
});
</script> 
<?php
 include("footer_panel.php");
?>