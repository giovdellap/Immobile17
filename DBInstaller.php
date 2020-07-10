<?php


class DBInstaller
{
    /**
     * Creazione del file confDB.conf.php per l'accesso e la creazione del db
     */
    static function installDB(){
        try
        {
            $dbName = VReceiverProxy::getNomeDB();
            $dbPassword = VReceiverProxy::getPasswordDB();
            $dbUsername = VReceiverProxy::getUsernameDB();

            $db = new PDO("mysql:host=127.0.0.1;", $dbUsername, $dbPassword);
            $db->beginTransaction();
            $query = 'DROP DATABASE IF EXISTS ' .$dbName. '; 
                CREATE DATABASE ' . $dbName . ' ; 
                USE ' . $dbName . ';' . 'SET GLOBAL max_allowed_packet=16777216;';
            $query = $query . file_get_contents('immobile17.sql');
            $db->exec($query);
            $db->commit();

            $file = fopen('confDB.conf.php', 'c+');
            $script = '<?php $GLOBALS[\'database\']= \'' . $dbName . '\'; 
                $GLOBALS[\'username\']=  \'' . $dbUsername . '\'; 
                $GLOBALS[\'password\']= \'' . $dbPassword . '\';?>';
            fwrite($file, $script);
            fclose($file);

            if(VReceiverProxy::populateDB())
                self::populateDB($db);

            $db=null;
        }
        catch (PDOException $e)
        {
            echo "Errore : " . $e->getMessage();
            $db->rollBack();
            die;
        }//va cambiato? va ritornato qualcosa?
    }

    public static function populateDB(PDO $db)
    {
        $dir = 'sql';
        foreach (scandir($dir) as $sqlFile)
        {
            $db->beginTransaction();
            $query = file_get_contents('sql/'.$sqlFile);
            $db->exec($query);
            $db->commit();
        }
    }
}