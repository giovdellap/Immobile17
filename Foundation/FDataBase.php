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

    /**  Metodo che chiude la connessione con il DB */
    public function closeDbConnection ()
    {
        static::$instance = null;
    }

    /**
     * Aggiunge l'oggetto $model al DB utilizzando metodi di $foundation
     * @param FObject $foundation
     * @param $model
     * @return bool
     */
    public function storeDb ($foundation, $model):bool
    {
        try{
            $lastID = $this->db->lastInsertId("id");
            $this->db->beginTransaction();
            $query = "INSERT INTO " . $foundation::getTable() . " VALUES " . $foundation::getValues();
            $stmt=$this->db->prepare($query);
            $foundation::bind($stmt, $model, $foundation::calculateNewID($lastID));
            $stmt->execute();
            $this->db->commit();
            $this->closeDbConnection();
            return true;
        } catch (PDOException $e) {
        echo "ATTENTION ERROR: " . $e->getMessage();
        $this->db->rollBack();
        return false;
        }
    }

    /**
     * Ritorna un array contente i valori degli attributi della riga cercata
     * @param $foundation
     * @param $field campo di ricerca
     * @param $param valore da cercare
     * @return array|null
     */
    public function loadDB ($foundation, $field, $param)
    {
        try {

            $query= "SELECT * FROM " . $foundation::getTable() . " WHERE " .  $field . "='" . $param . "';";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $result = array();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            while ($row = $stmt->fetch())
                $result[] = $row;

            return $result;

        }catch (PDOException $e) {
            echo "ATTENTION ERROR: " . $e->getMessage();
            $this->db->rollBack();
            return null;
        }
    }

    public function deleteDB ($foundation, $field, $param)
    {
        try {
            $result = null;
            $this->db->beginTransaction();
            $esiste = $this->existDB($foundation,$field,$param);
            if($esiste){
                $query = "DELETE FROM " . $foundation::getTable() . " WHERE " . $field . "='" . $param . "';";
                $stmt = $this->db->prepare($query);
                $stmt->execute();
                $this->db->commit();
                $this->closeDbConnection();
                $result = true;
            }
        }catch (PDOException $e){
            echo "ATTENTION ERROR: " . $e->getMessage();
            $this->db->rollBack();
        }
        return $result;
    }

    /**
     * Permette di conoscere l'esistenza di una riga della tabbella in cui nel campo $field è presente il valore $param
     * @param $foundation
     * @param $field campo di ricerca
     * @param $param valore da cercare
     * @return bool
     */
    public function existDB($foundation, $field, $param): bool
    {
        try {
            $query = "SELECT * FROM " . $foundation::getTable() . " WHERE " . $field . "='" . $param . "'";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (count($result) > 0) return true;
            else
                return false;
        } catch (PDOException $e) {
            echo "ATTENTION ERROR: " . $e->getMessage();
            return false;
        }
    }

    /**
     * Modifica la riga identificata dalla coppia $searchfield, $searchparam
     * Inserisce il valore $newvalue nel campo $field
     * @param $foundation
     * @param $field campo in cui inserire il nuovo valore
     * @param $newvalue valore da inserire
     * @param $searchfield campo identificativo della riga
     * @param $searchparam valore identificativo della riga
     * @return bool
     */
    public function updateDB ($foundation, $field, $newvalue, $searchfield, $searchparam){
        try{
            $this->db->beginTransaction();
            $query = " UPDATE " . $foundation::getTable() . " SET " . $field . "='" . $newvalue . "' WHERE " . $searchfield . "='" . $searchparam .  "';";
            $stmt =$this->db->prepare($query);
            $stmt->execute();
            $this->db->commit();
            $this->closeDbConnection();
            return true;
           }catch (PDOException $e){
            echo " ATTENTION ERROR: " . $e->getMessage();
            $this->db->rollBack();
            return false;
        }

    }

    /**
     * Ritorna un array contenente tutte le righe della table identificata da $foundation
     * @param $foundation
     * @return array|null
     */
    public function loadAll($foundation)
    {
        try {
            $query = "SELECT * FROM " . $foundation::getTable();
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $result = array();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            while ($row = $stmt->fetch())
                $result[] = $row;
            return $result;

        } catch (PDOException $e) {
            echo "ATTENTION ERROR: " . $e->getMessage();
            $this->db->rollBack();
            return null;
        }
    }

    public function login($foundation, string $mail, string $password): bool
    {
        try {
            $query = "SELECT * FROM " . $foundation::getTable() . " WHERE mail ='" . $mail . "' AND password ='" . $password . "';";
            $stmt =$this->db->prepare($query);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            if($stmt->fetch() != 0)
                return true;
            else return false;

        } catch (PDOException $e)
        {
            echo "ATTENTION ERROR: " . $e->getMessage();
            $this->db->rollBack();
            return false;
        }
    }

}