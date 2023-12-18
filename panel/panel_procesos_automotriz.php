<?php
include('validacion_usuarios.php');

if($_SESSION['permisos']!='1' && $_SESSION['permisos']!='2' ){
    echo '
    <script>
    location.href ="panel_perfil.php";
    </script>';
    }
  
   $consulta_automotriz = $cone->prepare("select * from proceso_automotriz"); 
   $consulta_automotriz->execute();
   $automotriz = $consulta_automotriz->fetch(PDO::FETCH_ASSOC);
  
    
?>

              <div class="container-fluid head-contenido">
                  <div class="d-flex justify-content-left">
                      <div class="p-2">
                         <h2>PROCESO AUTOMOTRIZ</h2>
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

<form id="actualizar_proceso_automotriz" action="borrar_planta.php" method=post  class="m-5 p-5 border border-dark rounded">

<div class="mb-3">
    <label><b>TEXTO AUTOMOTRIZ</b></label>
    <textarea id="editor" name="editor"><?php echo $automotriz['parrafo']?></textarea>
</div>

<div class="mb-3">
    <label><b> TEXTO AUTOMOTRIZ EN INGLÉS</b> </label>
    <textarea id="editori" name="editori"><?php echo $automotriz['parrafoi']?></textarea>
</div>


<hr style="background-color:black">
<div class="row">
    <div class="col-8">
    <div class="mb-3">
      <textarea minlength=50 maxlength=500  class="form-control mt-1" id="texto_bps" name="texto_bps" placeholder="escriba un texto aqui" rows="8"><?php echo $automotriz['texto_bps']?></textarea>
    </div>

    </div>
     <div class="col-4 p-3">
          <img src="../img/proceso_automotriz/<?php echo $automotriz['img_bps']?>" style="height:100%; width:100%;">
     </div>
  </div>

  <div class="mb-3">
    <label><b> TEXTO EN INGLÉS</b> </label>
    <textarea minlength=50 maxlength=500  class="form-control mt-1" id="texto_bpsi" name="texto_bpsi" placeholder="escriba un texto aqui" rows="8"><?php echo $automotriz['texto_bpsi']?></textarea>
 </div>

 <label for=""> Selecciona una imagen</label>
 <input type="file" name="img_bps" id="img_bps">


<hr style="background-color:black">         


<div class="row">
  <div class="col-8">
  <div class="mb-3">
    <label>SISTEMA DE PRODUCCION INTEGRADO</label>
    <textarea minlength=50 maxlength=700  class="form-control mt-1" id="sistema_integrado" name="sistema_integrado" placeholder="escriba un texto aqui" rows="8"><?php echo $automotriz['sistema_integrado']?></textarea>
  </div>
  </div>

  <div class="col-4 p-3">
        <img src="../img/proceso_automotriz/<?php echo $automotriz['imagen_sisintegrado']?>" style="height:100%; width:100%;">
   </div>

  <div class="col-10">
  <div class="mb-3">
    <label>TEXTO EN INGLÉS</label>
    <textarea minlength=50 maxlength=700  class="form-control mt-1" id="sistema_integradoi" name="sistema_integradoi" placeholder="escriba un texto en inglés" rows="8"><?php echo $automotriz['sistema_integradoi']?></textarea>
  </div>
  </div>
</div>

<label for="">Seleccioneuna imagen</label>
<input type="file" name="imagen_sisintegrado" id="imagen_sisintegrado">

<hr style="background-color:black">  

<div class="row">
  <div class="col-8">
  <div class="mb-3">
    <label>SISTEMA DE PRODUCCION BPS</label>
    <textarea minlength=50 maxlength=700  class="form-control mt-1" id="sistema_bps" name="sistema_bps" placeholder="escriba un texto aqui" rows="8"><?php echo $automotriz['sistema_bps']?></textarea>
  </div>
  </div>

  <div class="col-4 p-3">
        <img src="../img/proceso_automotriz/<?php echo $automotriz['img_sisbps']?>" style="height:100%; width:100%;">
   </div>

  <div class="col-10">
  <div class="mb-3">
    <label>TEXTO BPS EN INGLÉS</label>
    <textarea minlength=50 maxlength=700  class="form-control mt-1" id="sistema_bpsi" name="sistema_bpsi" placeholder="escriba un texto en inglés" rows="8"><?php echo $automotriz['sistema_bpsi']?></textarea>
  </div>
  </div>
</div>

<input type="hidden" name="id" id="id" value="<?php echo $automotriz['id']?>">
<label for="">Seleccioneuna imagen</label>
<input type="file" name="img_sisbps" id="img_sisbps">



<div class="d-flex justify-content-center" style="width:100%">
<button class="btn btn-primary" type="submit">Actualizar datos</button>
</div>

</form>

	
<script>
var editor = document.getElementById("editor");
            CKEDITOR.ClassicEditor.create(editor, {
                
                filebrowserUploadUrl: '../archivos.php',
                toolbar: {
                    items: [
                        'exportPDF','exportWord', '|',
                        'findAndReplace', 'selectAll', '|',
                        'heading', '|',
                        'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                        'bulletedList', 'numberedList', 'todoList', '|',
                        'outdent', 'indent', '|',
                        'undo', 'redo',
                        '-',
                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                        'alignment', '|',
                        'link', 'blockQuote', 'insertTable', 'mediaEmbed',
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
            }).then();




var editori = document.getElementById("editori");
            CKEDITOR.ClassicEditor.create(editori, {
                
                filebrowserUploadUrl: '../archivos.php',
                toolbar: {
                    items: [
                        'exportPDF','exportWord', '|',
                        'findAndReplace', 'selectAll', '|',
                        'heading', '|',
                        'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                        'bulletedList', 'numberedList', 'todoList', '|',
                        'outdent', 'indent', '|',
                        'undo', 'redo',
                        '-',
                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                        'alignment', '|',
                        'link', 'blockQuote', 'insertTable', 'mediaEmbed',
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
            }).then();



    document.getElementById('actualizar_proceso_automotriz').addEventListener('submit', function(event) {
    event.preventDefault(); 

  
    const formData = new FormData(this);
    formData.append('opcion', '5');
    var texto = formData.get('editor');
    var textoi = formData.get('editori');
    

    if (texto.length<10000 && textoi.length<10000) {
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

else{
    alert("El texto es demasiado largo");
}
});
</script> 
<?php
 include("footer_panel.php");
?>