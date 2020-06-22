<?php


class FPersistentManager
{

    // ------- UTENTE & ADMIN -------

    /**
     * Controlla che la mail dell'utente non esista, e prova ad aggiungerlo al DB
     * @param MUtente $utente
     * @return string
     */
    public static function registrazione(MUtente $utente):string
    {
        if(FUtente::emailEsistente($utente))
            return "EMAIL ALREADY EXISTS!";

        else if(FUtente::registrazione($utente))
            return "OK";
        else
            return "REGISTRATION FAILED";

    }

    /**
     * Controlla che mail e password corrispondano ad un Utente/Amministratore presente nel DB
     * @param string $mail
     * @param string $password
     * @return string
     */
    public static function login(string $mail, string $password):string
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
    public static function esisteUtente(string $id): bool
    {
        return FUtente::idEsistente($id);
    }

    /**
     * Ritorna l'MUtente con l'id passato come parametro
     * @param string $id
     * @return MUtente
     */
    public static function visualizzaUtente(string $id): MUtente
    {
        return FUtente::visualizzaUtente($id);
    }

    /**
     * Controlla le differenze fra l'MUtente passato come parametro e quello presente nel DB
     * Modifica il DB con i parametri aggiornati
     * @param MUtente $utente
     * @return bool
     */
    public static function modificaUtente(MUtente $utente): bool
    {
        return FUtente::modificaUtente($utente);
    }

    /**
     * Ritorna l'MUtente con l'Id passato come parametro con la lista appuntamenti completa
     * @param string $id
     * @return MUtente
     */
    public static function visualizzaAppUtente(string $id): MUtente
    {
        return FUtente::visualizzaAppUtente($id);
    }

    public static function loadIDbyEMail(string $email)
    {
        return FUtente::loadIDbyEmail($email);
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
        return FImmobile::addImmobile($immobile);
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
     * Ritorna un array contenente tutti gli MImmobili presenti nel DB
     * @return array
     */
    public static function visualizzaImmobili(): array
    {
        return FImmobile::getImmobili();
    }

    /**
     * Disabilita l'Immobile passato come parametro
     * @param MImmobile $immobile
     * @return bool
     */
    public static function disabilitaImmobile(MImmobile $immobile):bool{
        return FImmobile::disabilita($immobile);
    }

    /**
     * Controlla le differenze fra l'MImmobile passato come parametro e quello presente nel DB
     * Modifica il DB con i parametri aggiornati
     * @param MImmobile $immobile
     * @return bool
     */
    public static function modificaImmobile(MImmobile $immobile): bool{
        return FImmobile::modificaImmobile($immobile);
    }

    public static function getImmobiliHomepage():array
    {
        return FImmobile::getImmobiliHomepage();
    }


    public static function getByType($field,$type):array
    {
        return FImmobile::getByType($field, $type);
    }

    public static function getByKeyword(string $keyword):array
    {
        return FImmobile::getByKeyword($keyword);
    }

    public static function getByPriceOrSize($field, $min, $max)
    {
        return FImmobile::getByPriceOrSize($field, $min, $max);
    }


    // ------- AGENZIA -------

    /**
     * Controlla le differenze fra l'MAgenzia passato come parametro e quello presente nel DB
     * Modifica il DB con i parametri aggiornati
     * @param MAgenzia $agenzia
     * @return bool
     */
    public static function modificaAgenzia(MAgenzia $agenzia): bool{
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
     * @param string $idAgenzia
     * @return MAgenzia
     */
    public static function getBusyWeek(string $idImm, string $idCliente,MData $dataInizio,MData $dataFine): MAgenzia
    {
        return FAgenzia::getBusyWeek($idImm, $idCliente, $dataInizio, $dataFine);
    }

    /**
     * Prende in ingresso un'array di parametri della tipologia descritta in CImmobile::ricerca()
     * Restituisce un array di Immobili che matchano i parametri
     * @param array $parameters
     * @return array
     */
    public static function getImmobiliByParameters(array $parameters):array
    {
        //TODO
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

    // ------- MEDIA -------

    /**
     * Aggiunge l'MMedia passato come parametro al DB
     * @param MMedia $media
     * @return bool
     */
    public static function addMedia(MMedia $media):bool
    {
        return FMedia::addMedia($media);
    }

    /**
     * Rimuove il Media con Id $id dal DB
     * @param string $id
     * @return bool
     */
    public static function removeMedia(string $id):bool
    {
        return FMedia::removeMedia($id);
    }

}