/**
 * Upload a file
 * @param file
 */
function upload(file){
    var url = "../server/index.php";
    var xhr = new XMLHttpRequest();
    var fd = new FormData();
    xhr.open("POST", url, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Every thing ok, file uploaded
            console.log(xhr.responseText); // handle response.
        }
    };
    fd.append('uploaded_file', file);
    xhr.send(fd);
}