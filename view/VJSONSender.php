<?php


class VJSONSender
{
    public static function headerMaker() {
        header('Access-Control-Allow-Origin: *' );
        header('Access-Control-Allow-Methods: POST, GET');
        header('Access-Control-Allow-Headers: *');
    }



    public static function homepage($immobili)
    {
        self::headerMaker();
        echo json_encode(($immobili));
    }

    public static function sendToken($token)
    {
        self::headerMaker();
        echo json_encode($token);
    }

    public static function sendError($error)
    {
        self::headerMaker();
        echo json_encode(array('error' => $error));
    }

    public static function visualizzaProfilo($utente)
    {
        self::headerMaker();
        echo json_encode($utente);
    }

    public static function sendPassword(string $password) {
        self::headerMaker();
        echo json_encode(array('password' => $password));
    }

    public static function ricercaImmobili(array $immobili)
    {
        $ids = [];
        foreach ($immobili as $item)
        {
            array_push($ids, $item->getId());
        }

        self::headerMaker();
        echo json_encode($ids);
    }

    public static function sendImmobili(array $immobili)
    {
        self::headerMaker();
        echo json_encode($immobili);
    }

    public static function sendImmobile(MImmobile  $immobile)
    {
        self::headerMaker();
        echo json_encode($immobile);
    }

    public static function sendAppuntamenti(array $appuntamenti) {
        self::headerMaker();
        echo json_encode(self::encodeAppuntamenti($appuntamenti, true));
    }

    public static function sendCalendario(array $appuntamenti) {
        self::headerMaker();
        echo json_encode(self::encodeAppuntamenti($appuntamenti, false));
    }

    public static function sendAppuntamento(MAppuntamento $app) {
        self::headerMaker();
        echo json_encode(self::appuntamentoArray($app, true));
    }

    private static function encodeAppuntamenti(array $appuntamenti, bool $calendarioUtente) {
        $toSend = [];
        foreach ($appuntamenti as $item) {


            $toSend[] = self::appuntamentoArray($item, $calendarioUtente);
        }
        return $toSend;
    }

    private static function appuntamentoArray(MAppuntamento $item, bool $foto) {
        $appuntamento = [];
        $appuntamento['id'] = $item->getId();
        $appuntamento['inizio'] = $item->getOrarioInizio()->getFullDataString();
        $appuntamento['fine'] = $item->getOrarioFine()->getFullDataString();
        $nomeAgente = $item->getAgenteImmobiliare()->getNome() . " " . $item->getAgenteImmobiliare()->getCognome();
        $appuntamento['nomeAgente'] = $nomeAgente;
        $appuntamento['mailAgente'] = $item->getAgenteImmobiliare()->getEmail();
        $appuntamento['idAgente'] = $item->getAgenteImmobiliare()->getId();
        $nomeCliente = $item->getCliente()->getNome() . " " . $item->getCliente()->getCognome();
        $appuntamento['nomeCliente'] = $nomeCliente;
        $appuntamento['mailCliente'] = $item->getCliente()->getEmail();
        $appuntamento['idCliente'] = $item->getCliente()->getId();
        $appuntamento['immobile'] = $item->getImmobile()->getId();
        if($foto) {
            $appuntamento['fotoAgente'] = $item->getAgenteImmobiliare()->getImmagine()->viewImageHTML();
            $appuntamento['fotoCliente'] = $item->getCliente()->getImmagine()->viewImageHTML();
        }
        return $appuntamento;
    }

}