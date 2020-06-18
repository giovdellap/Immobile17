<?php


class CSessionManager
{
    public static function getUtenteLoggato()
    {
        $id = $_SESSION['id'];
        if ($id == 'AM1')
            return FPersistentManager::visualizzaAmministratore($id);
        else
            return FPersistentManager::visualizzaUtente($id);
    }
}