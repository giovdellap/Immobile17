<?php

/**
 * Class VImageReceiver
 * Si occupa della trasformazione delle immagini ricevute tramite richiesta HTTP POST in oggetti MMedia
 * @author Della Pelle - Di Domenica - Foderà
 * @package view
 */
class VImageReceiver
{
    /**
     * Converte l'immagine ricevuta tramite richiesta HTTP POST in un MMediaCliente
     * @param $utente
     * @return MMediaUtente
     */
    public static function uploadImage($utente): MMediaUtente
    {
        //print_r($_FILES);
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

    /**
     * Converte l'immagine ricevuta tramite richiesta HTTP POST in un MMediaImmobile
     * @param $immobile
     * @return MMediaImmobile
     */
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

    /**
     * Converte l'immagine ricevuta tramite richiesta HTTP POST in un array di MMediaImmobile
     * @param $immobile
     * @return array
     */
    public static function uploadMultipleImages($immobile):array
    {
        //print_r($_FILES);
        if (isset($_FILES['my_file'])) {
            $myFile = $_FILES['my_file'];
            $fileCount = count($myFile["name"]);
            //print_r("conteggio". "   ".$fileCount);
            $immagini=array();
            for($i = 0; $i < $fileCount; $i++) {

                //echo "File #" . ($i + 1);

                //echo "Name: " . $myFile["name"][$i];
                //echo "Temporary file: " . $myFile["tmp_name"][$i];
                //echo "Type:  " . $myFile["type"][$i];
                //echo "Size: " . $myFile["size"][$i];
                //echo "Error: " . $myFile["error"][$i];
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

    /**
     * Controlla che il file caricato sia un'immagine
     * @param $typefile
     * @return bool
     */
    private static function isImage($typefile) :bool
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

    /**
     * Controlla che sia stata caricata un'immagine
     * @return bool
     */
    public static function imgIsUploaded()
    {
        if(array_key_exists("propic", $_FILES))
            return  is_uploaded_file($_FILES["propic"]["tmp_name"]);
        else return false;
    }
}
