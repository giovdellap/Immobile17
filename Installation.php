<?php
require_once "DBInstaller.php";

class Installation
{
    static function installationStart(){

        if (VReceiverProxy::getRequest()){
            echo('PENIGET');
            // viene inviato un cookie per verificare se questi sono abilitati
            setcookie('verifica', 'verifica',time()+3600);
            VSmartyFactory::basicSmarty()->display('installer.tpl');
        }
        else {
            echo('PENIpost');
            $smarty = VSmartyFactory::basicSmarty();
            // controllo versione PHP
            if (version_compare(PHP_VERSION,'7.4.0' , '<' ))
                VSmartyFactory::errorSmarty($smarty, 'PHP')->display('installer.tpl');
            // controllo cookie
            if (!isset($_COOKIE['verifica']))
                VSmartyFactory::errorSmarty($smarty, 'Cookie')->display('installer.tpl');
            // verifica JS
            if (!isset($_COOKIE['checkjs']))
                VSmartyFactory::errorSmarty($smarty, 'JS')->display('installer.tpl');
            else {
                setcookie('verifica', '',time()-3600);
                setcookie('checkjs', '',time()-3600);
                // si procede con l'installazione e il popolamento del db
                DBInstaller::installDB();

                $admin = FAmministratore::getAmministratore('AM1');
                $admin->setPassword(VReceiverProxy::getPasswordAdmin());
                FAmministratore::modificaAmministratore($admin);

                header ('Location: '.$GLOBALS['path'] . 'Utente/login');
            }

        }
    }

    /**
     * Funzione che verifica la presenza del cookie di installazione; quindi se l'installazione è stata effettuata
     */
    public static function verificaInstallazione(){
        $verifica = false;
        if(file_exists('confDB.conf.php'))
            $verifica = true;
        return $verifica;
    }

}