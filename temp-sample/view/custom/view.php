<div class="leftcolumn">
    <div class="card">
      <h2>ERROR</h2>
      <h5>PAGE NOT FOUND</h5>
      
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./plugins/froala-editor-2.9.1/css/froala_editor.css">
  <link rel="stylesheet" href="./plugins/froala-editor-2.9.1/css/froala_style.css">
  <link rel="stylesheet" href="./plugins/froala-editor-2.9.1/css/plugins/code_view.css">
  <link rel="stylesheet" href="./plugins/froala-editor-2.9.1/css/plugins/image_manager.css">
  <link rel="stylesheet" href="./plugins/froala-editor-2.9.1/css/plugins/image.css">
  <link rel="stylesheet" href="./plugins/froala-editor-2.9.1/css/plugins/table.css">
  <link rel="stylesheet" href="./plugins/froala-editor-2.9.1/css/plugins/video.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">

        <style>

    div#editor {
      width: 81%;
      margin: auto;
      text-align: left;
    }
  </style>
  <div id="editor">
    <form>
      <textarea id='edit' style="margin-top: 30px;" placeholder="Type some text">
        <h1>Textarea</h1>
        <p>The editor can also be initialized on a textarea.</p>
      </textarea>

      <input type="submit">
    </form>
  </div>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>
  <script type="text/javascript" src="./plugins/froala-editor-2.9.1/js/froala_editor.min.js"></script>
  <script type="text/javascript" src="./plugins/froala-editor-2.9.1/js/plugins/align.min.js"></script>
  <script type="text/javascript" src="./plugins/froala-editor-2.9.1/js/plugins/code_beautifier.min.js"></script>
  <script type="text/javascript" src="./plugins/froala-editor-2.9.1/js/plugins/code_view.min.js"></script>
  <script type="text/javascript" src="./plugins/froala-editor-2.9.1/js/plugins/draggable.min.js"></script>
  <script type="text/javascript" src="./plugins/froala-editor-2.9.1/js/plugins/image.min.js"></script>
  <script type="text/javascript" src="./plugins/froala-editor-2.9.1/js/plugins/image_manager.min.js"></script>
  <script type="text/javascript" src="./plugins/froala-editor-2.9.1/js/plugins/link.min.js"></script>
  <script type="text/javascript" src="./plugins/froala-editor-2.9.1/js/plugins/lists.min.js"></script>
  <script type="text/javascript" src="./plugins/froala-editor-2.9.1/js/plugins/paragraph_format.min.js"></script>
  <script type="text/javascript" src="./plugins/froala-editor-2.9.1/js/plugins/paragraph_style.min.js"></script>
  <script type="text/javascript" src="./plugins/froala-editor-2.9.1/js/plugins/table.min.js"></script>
  <script type="text/javascript" src="./plugins/froala-editor-2.9.1/js/plugins/video.min.js"></script>
  <script type="text/javascript" src="./plugins/froala-editor-2.9.1/js/plugins/url.min.js"></script>
  <script type="text/javascript" src="./plugins/froala-editor-2.9.1/js/plugins/entities.min.js"></script>

  <script>
      $(function(){
        $('#edit')
          .on('froalaEditor.initialized', function (e, editor) {
            $('#edit').parents('form').on('submit', function () {
              console.log($('#edit').val());
              return false;
            })
          })
          .froalaEditor({enter: $.FroalaEditor.ENTER_P, placeholderText: null})
      });
  </script>
    
    </div>
  </div>