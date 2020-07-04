<div>
    <button id="insert_image"  type="button" style="width: 200px" onclick="document.getElementById('choose_image').click()">Carica Immagine</button>
    <input id="choose_image" type="file" name="propic" onchange="validateImage()" style="display: none" accept=".jpg, .jpeg, .gif, .png">
    <br>
    <b><p id="image_name" class="faq__text" style="text-align: center; max-width: 300px">Nessuna immagine caricata (MAX 2MB)</p></b>

    <br>
    <br>

</div>
<script>
function validateImage() {
var formData = new FormData();

var file = document.getElementById("choose_image").files[0];

formData.append("Filedata", file);
var t = file.type.split('/').pop().toLowerCase();
if (t != "jpeg" && t != "jpg" && t != "png" && t != "gif") {
alert('Inserire un file di immagine valido!');
document.getElementById("choose_image").value = '';
return false;
}
if (file.size > 2048000) {
alert('Non puoi caricare file più grandi di 2 MB');
document.getElementById("choose_image").value = '';
return false;
}
return true;
</script>