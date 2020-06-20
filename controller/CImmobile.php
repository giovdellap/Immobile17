<?php


class CImmobile
{
    public static function vendita()
    {
        if($_SERVER["REQUEST_METHOD"] === 'GET')
        {
            $immobili = FPersistentManager::getTipologia("Vendita");
            if (CUtente::isLogged()) {
                $utente = CSessionManager::getUtenteLoggato();
                VImmobile::vendita(VSmartyFactory::userSmarty(), $immobili);
            }
                else VImmobile::vendita(VSmartyFactory::basicSmarty(), $immobili);
        }
    }

    public static function affitto()
    {
        if($_SERVER["REQUEST_METHOD"] === 'GET')
        {
            $immobili = FPersistentManager::getTipologia("Affitto");
            if (CUtente::isLogged()) {
                $utente = CSessionManager::getUtenteLoggato();
                VImmobile::affitto(VSmartyFactory::userSmarty(), $immobili);
            }
            else VImmobile::affitto(VSmartyFactory::basicSmarty(), $immobili);
        }
    }


    /**
     * Visualizza la pagina degli immobili prendendo dal DB solo quelli che matchano i parametri della query
     * Dizionario chiavi:
     *  ti = Affitto/Vendita
     *  pc = Parola Chiave
     *  tp = Tipologia
     *  gmin = Grandezza Minima
     *  gmax = Grandezza Massima
     *  pmin = Prezzo Minimo
     *  pmax = Prezzo Massimo
     * @param array $parameters
     */
    public static function ricerca(array $parameters)
    {
        if($_SERVER["REQUEST_METHOD"] === 'GET')
        {
            $immobili = FPersistentManager::getImmobiliByParameters($parameters);
            if(CUtente::isLogged()) {
                $utente = CSessionManager::getUtenteLoggato();
                VImmobile::ricerca(VSmartyFactory::userSmarty($utente), $immobili, $parameters);
            }
            else VImmobile::ricerca(VSmartyFactory::basicSmarty(), $immobili, $parameters);
        }
    }
}