<?php


class VImageReceiver
{
    public static function uploadImage($utente): MMediaUtente
    {
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
}