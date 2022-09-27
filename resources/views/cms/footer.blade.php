
<script src="{{asset('backend/assets/js/oneui.core.min.js') }}"></script>
<script src="{{asset('backend/assets/js/oneui.app.min.js') }}"></script>
<script src="{{asset('backend/assets/js/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
<script src="{{asset('backend/assets/js/pages/be_pages_dashboard.min.js') }}"></script>
<script src="{{ asset('js/toastify-js.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>



<script>
    jQuery(function () {
        One.helpers(['sparkline']);
    });

    function success(message) {
      Toastify({
            text: message,
            backgroundColor: "linear-gradient(to right, #269E70, #269E70)",
            className: "error",
        }).showToast();
        var play = document.getElementById('success').play(); 
    }

    function error(message) {
      Toastify({
            text: message,
            backgroundColor: "linear-gradient(to right, #6E32CF, #FFA300)",
            className: "error",
        }).showToast();
        var play = document.getElementById('error').play(); 
    }

</script>

@if(session('success'))
<script>
  Toastify({
        text: "{{ session('success') }}",
        backgroundColor: "linear-gradient(to right, #269E70, #269E70)",
        className: "error",
    }).showToast();
</script>
@endif

@if(session('error'))
<script>
    Toastify({
        text: "{{ session('error') }}",
        backgroundColor: "linear-gradient(to right, #6E32CF, #FFA300)",
        className: "error",
    }).showToast();
</script>
@endif


<script src="https://cdn.tiny.cloud/1/qfvlw2y75mlczkfb7l3hxl6vtfzbddkcwixr6vq6i6hzd505/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
  var editor_config = {
    path_absolute : "/",
    selector: 'textarea.my-editor',
    relative_urls: false,
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table directionality",
      "emoticons template paste textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    file_picker_callback : function(callback, value, meta) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
      if (meta.filetype == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.openUrl({
        url : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no",
        onMessage: (api, message) => {
          callback(message.content);
        }
      });
    }
  };

  tinymce.init(editor_config);

//Begin:: Sidebar Mini
function SidebarColpase() {
    var element = document.getElementById("page-container");
     element.classList.add("sidebar-mini");
}
//End:: Sidebar Mini
  
</script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>

<script>
$(document).ready(function() {
    $('.select1').selectpicker();
    $('.select2').selectpicker();
    $('.select3').selectpicker();
    $('.select4').selectpicker();
});

</script>


</body>
</html>
