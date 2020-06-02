<?php


class FUtente extends FObject
{
    private static string $values="(:id, :nome, :cognome, :datanascita, :mail, 
                                    :password, :iscrizione, :verifica, :id_agenzia)";


    public static function bind(PDOStatement $stmt, $obj, string $newId)
    {
        $stmt->bindValue(':id', $newId, PDO::PARAM_STR);
        $stmt->bindValue(':nome', $obj->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':cognome', $obj->getCognome(), PDO::PARAM_STR);
        $stmt->bindValue(':datanascita', self::getDateString($obj->getDataNascita()), PDO::PARAM_STR);
        $stmt->bindValue(':mail', $obj->getMail(), PDO::PARAM_STR);
        $stmt->bindValue(':password', $obj->getPassword(), PDO::PARAM_STR);
        $stmt->bindValue(':iscrizione', self::getDateString($obj->getIscrizione()), PDO::PARAM_STR);
        $stmt->bindValue(':verifica', $obj->getAttivato(), PDO::PARAM_STR);
    }
    public static function emailesistente(MUtente $utente):bool
    {
       if($utente instanceof MCliente)
           return FCliente::emailesistente($utente);
       else
           return FagenteImmobiliare::emailesistente($utente);
    }

    public static function registrazione(MUtente $utente):bool
    {
        if($utente instanceof MCliente)
            return FCliente::registrazione($utente);
        else
            return FagenteImmobiliare::registrazione($utente);
    }



}