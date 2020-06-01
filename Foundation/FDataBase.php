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
     *
     * @param FObject $foundation
     * @param $model
     * @return bool
     */
    public function storeDb (FObject $foundation, $model):bool
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
    public function existDB($foundation, $field, $param)
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
}