<?php


class VImageReceiver
{
    public static function uploadImage($utente): MMediaUtente
    {print_r($_FILES);
        $nomeFile = 'propic';
        if(!is_uploaded_file($_FILES[$nomeFile]["tmp_name"])) {
            $nome = "";
            $type = "";
            $data = "";
        }
        elseif ($_FILES[$nomeFile]['size'] > 2000000)
            throw new RuntimeException('Exceeded filesize limit.');
        elseif (self::isImage($_FILES[$nomeFile]["type"]))
        {
            $img=$_FILES[$nomeFile];
            $name = $img["name"];
            $type = $img["type"];

            $data = file_get_contents($_FILES[$nomeFile]["tmp_name"]);
            $data=base64_encode($data);

            $image = new MMediaUtente();
            $image->setNome($name);
            $image->setUtente($utente);
            $image->setType($type);
            $image->setData($data);
            return $image;
        }

    }
    public static function uploadImageImmobili($immobile): MMediaImmobile
    {
        $nomeFile = 'propic';
        if (!is_uploaded_file($_FILES[$nomeFile]["tmp_name"])) {
            $nome = "";
            $type = "";
            $data = "";
        } elseif ($_FILES[$nomeFile]['size'] > 2000000)
            throw new RuntimeException('Exceeded filesize limit.');
        elseif (self::isImage($_FILES[$nomeFile]["type"])) {
            $img = $_FILES[$nomeFile];
            $name = $img["name"];
            $type = $img["type"];

            $data = file_get_contents($_FILES[$nomeFile]["tmp_name"]);
            $data = base64_encode($data);

            $image = new MMediaImmobile();
            $image->setNome($name);
            $image->setImmobile($immobile);
            $image->setType($type);
            $image->setData($data);
            return $image;
        }
    }

        public static function uploadMultipleImages($immobile):array
    {
        //print_r($_FILES);
        if (isset($_FILES['my_file'])) {
            $myFile = $_FILES['my_file'];
            $fileCount = count($myFile["name"]);
            //print_r("conteggio". "   ".$fileCount);
            $immagini=array();
            for($i = 0; $i < $fileCount; $i++) {

                echo "File #" . ($i + 1);

                echo "Name: " . $myFile["name"][$i];
                echo "Temporary file: " . $myFile["tmp_name"][$i];
                echo "Type:  " . $myFile["type"][$i];
                echo "Size: " . $myFile["size"][$i];
                echo "Error: " . $myFile["error"][$i];
                $img = $_FILES["my_file"];
                $name = $img["name"][$i];
                $type = $img["type"][$i];

                $data = file_get_contents($_FILES["my_file"]["tmp_name"][$i]);
                $data = base64_encode($data);
                $image = new MMediaImmobile();
                $image->setNome($name);
                $image->setImmobile($immobile);
                $image->setType($type);
                $image->setData($data);
                $immagini[]=$image;

            }
            return $immagini;
        }
    }
    private static function isImage($typefile): bool
    {
        $estensione = strtolower(strrchr($typefile, '/'));

        switch($estensione) {
            case '/jpg':
            case '/jpeg':
            case '/gif':
            case '/png':
                return true;
            default:
                return false;
        }
    }
    public static function imgIsUploaded()
    {
        return  is_uploaded_file($_FILES["propic"]["tmp_name"]);
    }
}
