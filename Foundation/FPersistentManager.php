<?php

/**
 * Class FPersistentManager
 * Classe che
 * @author Della Pelle - Di Domenica - Foderà
 * @package foundation
 */
class FPersistentManager
{

    // ------- UTENTE & ADMIN -------

    /**
     * Controlla che la mail dell'utente non esista, e prova ad aggiungerlo al DB
     * @param MUtente $utente
     * @return string risultato dell'operazione
     */
    public static function registrazione(MUtente $utente) :string
    {
        if(FUtente::emailEsistente($utente->getEmail()))
            return "EMAIL ALREADY EXISTS!";

        else {
            $db_result = FUtente::registrazione($utente);
            if ($db_result)
                return "OK";
            else
                return "REGISTRATION FAILED";

        }
    }

    /**
     * Controlla che mail e password corrispondano ad un Utente/Amministratore presente nel DB
     * @param string $mail
     * @param string $password
     * @return string risultato dell'operazione
     */
    public static function login(string $mail, string $password) :string
    {
        if(strpos($mail,"@admin.it"))
        {
            if(FAmministratore::emailEsistente($mail))
            {
                if(FAmministratore::login($mail, $password,))
                    return "OK ADMIN";
                else
                    return "WRONG PASSWORD";
            }
            else
                return "WRONG EMAIL";
        }
        else
        {
            if(FUtente::emailEsistente($mail))
            {
                if(FUtente::login($mail, $password))
                    return "OK USER";
                else
                    return "WRONG PASSWORD";
            }
            else
                return "WRONG EMAIL";
        }

    }

    // ------- UTENTE -------

    /**
     * Controlla che esista un Utente con questo Id
     * @param string $id
     * @return bool
     */
    public static function esisteUtente(string $id) :bool
    {
        return FUtente::idEsistente($id);
    }

    /**
     * Ritorna l'MUtente con l'id passato come parametro
     * @param string $id
     * @return MUtente
     */
    public static function visualizzaUtente(string $id) :MUtente
    {
        return FUtente::visualizzaUtente($id);
    }

    /**
     * Controlla le differenze fra l'MUtente passato come parametro e quello presente nel DB
     * Modifica il DB con i parametri aggiornati
     * @param MUtente $utente
     * @return bool
     */
    public static function modificaUtente(MUtente $utente) :bool
    {
        return FUtente::modificaUtente($utente);
    }

    public static function eliminaUtente(MUtente $utente) :bool
    {
        return FUtente::eliminaUtente($utente);
    }

    /**
     * Ritorna l'MUtente con l'Id passato come parametro con la lista appuntamenti completa
     * @param string $id
     * @return MUtente
     */
    public static function visualizzaAppUtente(string $id) :MUtente
    {
        return FUtente::visualizzaAppUtente($id);
    }

    /**
     * Ritorna l'id dell'utente con la mail passata come parametro
     * @param string $email
     * @return string
     */
    public static function loadIDbyEMail(string $email): string
    {
        return FUtente::loadIDbyEmail($email);
    }

    /**
     * Ritorna un array con tutti gli utenti del tipo passato cme parametro
     * @param string $type
     * @return array
     */
    public static function visualizzaUtenti(string $type)
    {
        return FUtente::getUtenti($type);
    }

    // ------- TOKEN -------

    /**
     * Aggiunge al DB la tupla id-token
     * Se esiste un token con lo stesso id, lo elimina e aggiunge quello passato come parametro
     * @param string $id
     * @param string $token
     */
    public static function storeToken(string $id, string $token, string $type)
    {
        FToken::addToken($id, $token, $type);
    }

    /**
     * Ritorna l'id associato al token passato come parametro, null altrimenti
     * @param string $token
     * @return string|null
     */
    public static function verifyToken(string $token, string $type) :?string
    {
        return FToken::verifyToken($token, $type);
    }

    // -------CODICE -------

    /**
     * Aggiunge la tupla idCliente - codice al DB
     * @param MCliente $cliente
     * @param string $codice
     */
    public static function addCodice(MCliente $cliente, string $codice)
    {
        FConfermaEmail::addCode($cliente, $codice);
    }

    /**
     * Ritorna true o false a seconda che la tupla cliente - codice sia presente o meno nel DB
     * @param MCliente $cliente
     * @param string $codice
     * @return bool
     */
    public static function confermaCodice(MCliente $cliente, string $codice) :bool
    {
        return FConfermaEmail::verifyCode($cliente, $codice);
    }


    // -------AMMINISTRATORE -------

    /**
     * Ritorna l'MAmministratore con l'id passato come parametro
     * @param string $id
     * @return MAmministratore|null
     */
    public static function visualizzaAmministratore(string $id)
    {
        return FAmministratore::getAmministratore($id);
    }

    /**
     * Controlla le differenze fra l'MAmministratore passato come parametro e quello presente nel DB
     * Modifica il DB con i parametri aggiornati
     * @param MAmministratore $amministratore
     * @return bool
     */
    public static function modificaAmministratore(MAmministratore $amministratore): bool
    {
        return FAmministratore::modificaAmministratore($amministratore);
    }

    // ------- IMMOBILE -------

    /**
     * Aggiunge l'MImmobile passato come parametro al DB
     * @param MImmobile $immobile
     * @return bool
     */
    public static function addImmobile (MImmobile $immobile){

        $db_result= FImmobile::addImmobile($immobile);
        if ($db_result)
            return "OK";
        else
            return "ADD FAILED";
    }

    /**
     * Ritorna l'MImmobile con l'Id passato come parametro
     * @param string $id
     * @return MImmobile
     */
    public static function visualizzaImmobile(string $id):MImmobile {
        return FImmobile::getImmobile($id);
    }

    /**
     * Ritorna l'MImmobile con l'id passato come parametro con la lista appuntamenti completa
     * @param string $id
     * @return MImmobile
     */
    public static function visualizzaAppImmobile(string $id):MImmobile
    {
        return FImmobile::getAppImmobile($id);
    }

    /**
     * Ritorna un array contenente tutti gli MImmobili presenti nel DB
     * @return array
     */
    public static function visualizzaImmobili() :array
    {
        return FImmobile::getImmobili();
    }

    /**
     * Disabilita l'Immobile passato come parametro
     * @param MImmobile $immobile
     * @return bool
     */
    public static function disabilitaImmobile(MImmobile $immobile) :bool
    {
        return FImmobile::disabilita($immobile);
    }

    /**
     * Controlla le differenze fra l'MImmobile passato come parametro e quello presente nel DB
     * Modifica il DB con i parametri aggiornati
     * @param MImmobile $immobile
     * @return bool
     */
    public static function modificaImmobile(MImmobile $immobile): bool
    {
        return FImmobile::modificaImmobile($immobile);
    }

    /**
     * Ritorna i 3 immobili con il prezzo maggiore
     * @return array
     */
    public static function getImmobiliHomepage() :array
    {
        return FImmobile::getImmobiliHomepage();
    }

    /**
     * Ritorna un array con tutti gli immobili attivi
     * @return array
     */
    public static function getImmobiliAttivi() :array
    {
        return FImmobile::getByType("attivo", true);
    }

    /**
     * Ritorna un array di immobili nei quali il parametro field è uguale a type
     * @param $field
     * @param $type
     * @return array
     */
    public static function getByType($field,$type):array
    {
        return FImmobile::getByType($field, $type);
    }

    /**
     * Ritorna un array di immobili nel cui nome è contenuta la keyword
     * @param string $keyword
     * @return array
     */
    public static function getByKeyword(string $keyword):array
    {
        return FImmobile::getByKeyword($keyword);
    }

    /**
     * Ritorna un array di immobili dove dove il parametro field è compreso fra min e max
     * @param $field
     * @param $min
     * @param $max
     * @return array
     */
    public static function getByPriceOrSize($field, $min, $max)
    {
        return FImmobile::getByPriceOrSize($field, $min, $max);
    }

    /**
     * Prende in ingresso un'array di parametri della tipologia descritta in CImmobile::ricerca()
     * Restituisce un array di Immobili che matchano i parametri
     * @param array $parameters
     * @return array
     */
    public static function getImmobiliByParameters(array $parameters)
    {
        return FImmobile::getImmobiliByParameters($parameters);
    }

    /**
     * Elimina l'immobile con l'id in questione dal DB
     * @param string $id
     * @return bool
     */
    public static function eliminaImmobile(string $id) :bool
    {
        return FImmobile::eliminaImmobile($id);
    }


    // ------- AGENZIA -------

    /**
     * Controlla le differenze fra l'MAgenzia passato come parametro e quello presente nel DB
     * Modifica il DB con i parametri aggiornati
     * @param MAgenzia $agenzia
     * @return bool
     */
    public static function modificaAgenzia(MAgenzia $agenzia) :bool
    {
        return FAgenzia::modificaAgenzia($agenzia);
    }

    /**
     * Ritorna l'MAgenzia con l'Id passato come parametro
     * @param string $id
     * @return MAgenzia
     */
    public static function visualizzaAgenzia(string $id): MAgenzia
    {
        return FAgenzia::getAgenzia($id);
    }

    /**
     * Ritorna un'MAgenzia con l'Id passato come parametro con:
     *  - La lista Immobili con l'Immobile con Id $idImm
     *  - La lista Clienti con il Cliente con Id $idCliente
     *  - La lista Agenti Immobiliari con tutti gli Agenti presenti nel DB
     * Tutti gli oggetti hanno le rispettive liste Appuntamenti complete degli appuntamenti compresi fra $dataInizio e $dataFine
     *
     * @param string $idImm
     * @param string $idCliente
     * @param MData $dataInizio
     * @param MData $dataFine
     * @return MAgenzia
     */
    public static function getBusyWeek(string $idImm, string $idCliente,MData $dataInizio,MData $dataFine): MAgenzia
    {
        return FAgenzia::getBusyWeek($idImm, $idCliente, $dataInizio, $dataFine);
    }


    // ------- APPUNTAMENTO -------

    /**
     * Aggiunge l'Appuntamento passato come parametro al DB
     * @param MAppuntamento $appuntamento
     * @return bool
     */
    public static function addAppuntamento(MAppuntamento $appuntamento) :bool
    {
        return FAppuntamento::addAppuntamento($appuntamento);
    }

    /**
     * Elimina l'Appuntamento passato come parametro dal DB
     * @param string $id
     * @return bool
     */
    public static function deleteAppuntamento(string $id) :bool
    {
        return FAppuntamento::deleteAppuntamento($id);
    }

    /**
     *Ritorna l'MAppuntamento con l'id passato come parametro
     * @param string $id
     * @return MAppuntamento
     */
    public static function visualizzaAppuntamento(string $id) :MAppuntamento
    {
        return FAppuntamento::getAppuntamento($id);
    }

    /**
     * Ritorna tutti gli appuntamenti presenti nel DB
     * @return array
     */
    public static function visualizzaAppuntamenti(): array
    {
        return FAppuntamento::getAppuntamenti();
    }

    /**
     * Ritorna tutti gli appuntamenti compresi fra inizio e fine
     * @param MData $inizio
     * @param MData $fine
     * @return array
     */
    public static function loadAppWeek(MData $inizio, MData $fine) :array
    {
        return FAppuntamento::getAppWeek($inizio, $fine);
    }

    /**
     * Aggiunge l'MMedia passato come parametro al DB
     * @param MMedia $media
     * @return bool
     */
    public static function addMedia (MMedia $media) :bool
    {
        return FMedia::addMedia($media);
    }

    /**
     * Rimuove l'MMedia con Id $id dal DB
     * @param string $id
     * @return bool
     */
    public static function removeMedia(string $id) :bool
    {
        return FMedia::removeMedia($id);
    }





}