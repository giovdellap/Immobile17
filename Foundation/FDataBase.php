<?php


class FDataBase
{

    /** @var l'unica istanza della classe */
    private static $instance;
    /** oggetto PDO che effettua la connessione al DBMS */
    private $db;


    private function __construct()
    {
        try {
            $this->db = new PDO ("mysql:dbname=" . "agenzia_immobiliare" .
                ";host=127.0.0.1;", "root", "");
        } catch (PDOException $e) {
            echo "Errore costruttore FDatabase: " . $e->getMessage();
            die;
        }
    }

    /**
     * Singleton Instance
     * @return FDataBase
     */
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new FDatabase();
        }
        return self::$instance;
    }

    /**  Metodo che chiude la connessione con il DB */
    public function closeDbConnection()
    {
        static::$instance = null;
    }

    /**
     * Aggiunge l'oggetto $model al DB utilizzando metodi di $foundation
     * @param FObject $foundation
     * @param $model
     * @return bool
     */
    public function storeDb($foundation, $model): bool
    {
        try {
            $lastID = $this->getLastId($foundation::getTable());
            $this->db->beginTransaction();
            $query = "INSERT INTO " . $foundation::getTable() . " VALUES " . $foundation::getValues();

            echo('peni neri: ' . $lastID);
            $stmt = $this->db->prepare($query);
            if ($lastID === '0')
                $newId = $foundation::getID() . strval(1);
            else
                $newId = $foundation::calculateNewID($lastID);
            echo('peni verdastri: ' . $newId);
            $foundation::bind($stmt, $model, $newId);

            $stmt->execute();
            print_r($stmt->errorInfo());
            $this->db->commit();
            $this->closeDbConnection();
            print_r($this->db->errorInfo());
            return true;
        } catch (PDOException $e) {
            echo "ATTENTION ERROR: " . $e->getMessage();
            $this->db->rollBack();
            return false;
        }
    }

    public function getLastId(string $table): string
    {
        $query = "SELECT id FROM " . $table . " GROUP BY " . "id" . " ORDER BY " . "id";
        $result = $this->executeLoadQuery($query);
        if (count($result) == 0)
            return 0;
        $idCode = str_split($result[0]['id'], 2 )[0];
        $numbers = [];
        foreach ($result as &$item)
        {
            $arrayNumbers = str_split($item['id'], 1);
            array_shift($arrayNumbers);
            array_shift($arrayNumbers);
            $numbers[] = intval(implode('', $arrayNumbers));
        }
        $max = max($numbers);
        //$a=$result[0]
        return $idCode . strval($max);
    }

    /**
     * Ritorna un array contente i valori degli attributi della riga cercata
     * @param $foundation
     * @param $field campo di ricerca
     * @param $param valore da cercare
     * @return array|null
     */
    public function loadDB($foundation, $field, $param)
    {
        $query = "SELECT * FROM " . $foundation::getTable() . " WHERE " . $field . "='" . $param . "';";

        return $this->executeLoadQuery($query);
    }

    /**
     * Esegue una query di tipo Load
     * Ritorna un array di dati
     * @param string $query
     * @return array|null
     */
    private function executeLoadQuery(string $query): ?array
    {
        try {
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

    /**
     * Elimina dal DB tutti gli elementi dove $field = $param
     * @param $foundation
     * @param $field
     * @param $param
     * @return bool
     */
    public function deleteDB($foundation, $field, $param): bool
    {
        try {
            $result = null;
            $this->db->beginTransaction();
            $esiste = $this->existDB($foundation, $field, $param);
            if ($esiste) {
                print('pene rossiccio tendente al violaceo');
                $query = "DELETE FROM " . $foundation::getTable() . " WHERE " . $field . "='" . $param . "';";
                $stmt = $this->db->prepare($query);
                $stmt->execute();
                $this->db->commit();
                $this->closeDbConnection();
                print('pene rossiccio tendente al verde');
                $result = true;
                print('pene rossiccio tendente al terre di siena' . $result);
            }
        } catch (PDOException $e) {
            echo "ATTENTION ERROR: " . $e->getMessage();
            $this->db->rollBack();
            return false;
        }
        print('pene rossiccio tendente all immobile scleto'. $result);
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
    public function updateDB($foundation, $field, $newvalue, $searchfield, $searchparam)
    {
        try {
            $this->db->beginTransaction();
            $query = " UPDATE " . $foundation::getTable() . " SET " . $field . "='" . $newvalue . "' WHERE " . $searchfield . "='" . $searchparam . "';";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $this->db->commit();
            $this->closeDbConnection();
            return true;
        } catch (PDOException $e) {
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




    /**
     * Controlla che $mail sia uguale a $password
     * @param $foundation
     * @param string $mail
     * @param string $password
     * @return bool
     */
    public function login($foundation, string $mail, string $password): bool
    {
        try {
            $query = "SELECT * FROM " . $foundation::getTable() . " WHERE mail = '" . $mail . " ' AND password = '" . $password . "';";

            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            if ($stmt->fetch() != 0)
                return true;
            else return false;

        } catch (PDOException $e) {
            echo "ATTENTION ERROR: " . $e->getMessage();
            $this->db->rollBack();
            return false;
        }
    }
    /**  BISOGNA VEDERE COME IMPOSTARLA PER IL NOSTRO DB
     *
     *
     * public function storeMedia ($foundation , $obj,$nome_file) {
     * try {
     * $lastID = $this->db->lastInsertId("id");
     * $this->db->beginTransaction();
     * $query = "INSERT INTO ".$foundation::getTable()." VALUES ".$foundation::getValues();
     *
     * $stmt = $this->db->prepare($query);
     * $foundation::bind($stmt,$obj,$nome_file);
     * $stmt->execute();
     * $id=$this->db->lastInsertId();
     * $this->db->commit();
     * $this->closeDbConnection();
     * return $id;
     * }
     * catch(PDOException $e) {
     * echo "Attenzione errore: ".$e->getMessage();
     * $this->db->rollBack();
     * return null;
     * }
     * }**/

    /**
     * Ritorna tutti gli appuntamenti per i quali $field = $param e data è compresa fra $inizio e $fine
     * @param $foundation
     * @param string $field
     * @param string $param
     * @param string $inizio
     * @param string $fine
     * @return array|null
     */
    public function loadAppInBetween($foundation, string $field, string $param, string $inizio, string $fine)
    {
        $query = " SELECT * FROM " . $foundation::getTable() . " WHERE " . $field . " ='" . $param . "' AND " . "data" . " BETWEEN '" . $inizio . "' AND '" . $fine . "';";

        return $this->executeLoadQuery($query);
    }

    public function loadAppWeek($foundation, string $inizio, string $fine)
    {
        $query = " SELECT * FROM " . $foundation::getTable() . " WHERE data BETWEEN '" . $inizio . "' AND '" . $fine . "';";

        return $this->executeLoadQuery($query);
    }

    public function loadOrderBy($foundation, string $field, string $orderBy)
    {
        $query = " SELECT * FROM " . $foundation::getTable() . " GROUP BY " . $field . " ORDER BY " . $orderBy . " DESC " . ";";

        return $this->executeLoadQuery($query);
        //SELECT * FROM immobile GROUP BY id ORDER BY prezzo DESC
    }

    public function getSomethingby($foundation, string $something, string $field, string $param)
    {
        $query = " SELECT " .$something . "  FROM " . $foundation::getTable() . " WHERE " . $field . " ='" . $param . "';";
        return $this->executeLoadQuery($query);
    }
    public function loadValuesIncluded($foundation, string $field, string $min, string $max)
    {
        $query = " SELECT * FROM " . $foundation::getTable() . " WHERE " . $field .  " BETWEEN '" . $min . "' AND '" . $max . "';";
        return $this->executeLoadQuery($query);
    }

    public function loadByKeyword($foundation, string $field, string $param )
    {
        $query = " SELECT * FROM " . $foundation::getTable() . " WHERE " . $field . " LIKE '%" . $param . "%' ;";
        return $this->executeLoadQuery($query);
    }

    public function loadIntersect($foundation,array $parameters)
    {
        $query = "SELECT * FROM " . $foundation::getTable() . " WHERE " ;
        if(array_key_exists('ti', $parameters))
            $query = $query . "tipo_annuncio = '" . $parameters['ti'] . "' AND ";
        if(array_key_exists('pc', $parameters))
            $query = $query . "nome LIKE '%" . $parameters['pc'] . "%' AND ";
        if(array_key_exists('tp', $parameters))
            $query = $query . "tipologia = '" . $parameters['tp'] . "' AND ";
        $query = $query . "prezzo BETWEEN " . $parameters['pmin'] . " AND " .$parameters['pmax'] .
        " AND dimensione BETWEEN " . $parameters['gmin'] . " AND " . $parameters['gmax'] . ";";

        return $this->executeLoadQuery($query);
    }

    public function storeCode(string $id, string $code): bool
    {
        try{
            $this->db->beginTransaction();
            $query = "INSERT INTO conferma_email (id_cliente,codice) VALUES ('".$id."','".$code."');";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            //print_r($stmt->errorInfo());
            $this->db->commit();
            $this->closeDbConnection();
            //print_r($this->db->errorInfo());
            return true;
        } catch (PDOException $e) {
            echo "ATTENTION ERROR: " . $e->getMessage();
            $this->db->rollBack();
            return false;
        }

    }

    public function loadCode(string $id, string $code): bool
    {
        try {
            $query = "SELECT * FROM conferma_email WHERE id_cliente = '" . $id . "' AND codice = '" . $code . "';";
            echo $query;
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
}


