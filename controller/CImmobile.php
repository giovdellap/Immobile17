<?php


class CImmobile
{


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

    public static function visualizza(string $id)
    {
        if($_SERVER["REQUEST_METHOD"]=='GET')
        {
            $immobile= FPersistentManager::visualizzaImmobile($id);
            if(CUtente::isLogged())
            {
                $utente=CSessionManager::getUtenteLoggato();
                VImmobile::visualizza(VSmartyFactory::userSmarty($utente),$immobile);
            }
            else VImmobile::visualizza(VSmartyFactory::basicSmarty(),$immobile);
        }

    }
}