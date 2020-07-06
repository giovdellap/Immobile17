<span class="txt1 p-b-7">Carica Immagini: </span>
<input type="file" name="my_file[]" multiple  />
<input type="submit" value="Upload">


<?php
            if (isset($_FILES['my_file'])) {
                $myFile = $_FILES['my_file'];
                $fileCount = count($myFile["name"]);

                for ($i = 0; $i < $fileCount; $i++) {
                    ?>
<p>File #<?= $i+1 ?>:</p>
<p>
    Name: <?= $myFile["name"][$i] ?><br>
    Temporary file: <?= $myFile["tmp_name"][$i] ?><br>
    Type: <?= $myFile["type"][$i] ?><br>
    Size: <?= $myFile["size"][$i] ?><br>
    Error: <?= $myFile["error"][$i] ?><br>
</p>
<?php
                }
            }
        ?>


<script>
function validateImage() {
var formData = new FormData();

var file = document.getElementById("choose_image").files[0];

formData.append("Filedata", file);
var t = file.type.split('/').pop().toLowerCase();
if (t !== "jpeg" && t !== "jpg" && t !== "png" && t !== "gif") {
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