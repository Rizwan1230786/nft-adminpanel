<script src="{{URL::asset('assets/tinymce/tinymce.min.js')}}"></script>
<script>
    tinymce.init({
        theme: 'advanced',
        resize: false,
        fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
        selector: "textarea.ckeditor",
        theme: "modern",
        width: '100%',
        height: 500,
        autoresize_min_height: 500,
        autoresize_max_height: 800,
        plugins: [
          "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
          "searchreplace wordcount visualblocks code fullscreen visualchars insertdatetime media nonbreaking",
          "table contextmenu directionality emoticons paste textcolor responsivefilemanager autoresize"
        ],
        toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent  | fontselect |  fontsizeselect ",
        toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code | styleselect ",
        image_advtab: true,
        external_filemanager_path: "/assets/tinymce/filemanager/",
        filemanager_title: "filemanager",
        external_plugins: {
          "filemanager": "filemanager/plugin.min.js"
        }
      });
      $("textarea.ckeditor").change(function() {
        var s = $(this).val(); 
        alert(s);
        tinyMCE.activeEditor.setContent(s);
    });
    </script>
