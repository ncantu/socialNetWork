var uploadfile = document.querySelector('#{field_htmlId}');
uploadfile.addEventListener('change', function () {
    var files = this.files;
    for(var i=0; i<files.length; i++){
        upload(this.files[i]);
    }

}, false);
 uploadfile.addEventListener('click', function () {
    var files = this.files;
    for(var i=0; i<files.length; i++){
        upload(this.files[i]);
    }

}, false);
 uploadfile.addEventListener('touch', function () {
    var files = this.files;
    for(var i=0; i<files.length; i++){
        upload(this.files[i]);
    }

}, false);