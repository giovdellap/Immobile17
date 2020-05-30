<?php


class FDataBase
{

    /** @var l'unica istanzaq della classe */
    private static $instance;
    /** oggetto PDO che effettua la connessione al DBMS */
    private $db;


    private function __construct()
    {
        try {
            $this->db= new PDO ("mysql:dbname="."agenzia_immobiliare".
                ";host=localhost; charset= utf8;", "root", "");
        } catch (PDOException $e){
            echo "Errore".$e->getMessage();
            die;
        }
    }

    /**
     * Singleton Instance
     * @return FDataBase
     */
    public static function getInstance ()
    {
        if (self::$instance == null) {
            self::$instance = new FDatabase();
        }
        return self::$instance;
    }
}