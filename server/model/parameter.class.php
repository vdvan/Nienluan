<?php 

if ( !defined('WEB') ) die("Access Denied");

class Parameter extends Database {
    private $table = 'tb_parameter';

    public function __construct() { }

    public function getLastUpdate() {
        $query = "SELECT * FROM $this->table ORDER BY id DESC LIMIT 1";

        $statement = self::getDB()->prepare($query);
        $statement->execute();
        $last = $statement->fetch(\PDO::FETCH_ASSOC);
        $statement->closeCursor();

        return $last;
    }

    public function getParameterList($limit = 8) {
        $query = "SELECT * FROM $this->table ORDER BY id LIMIT :limit";

        $statement = self::getDB()->prepare($query);
        $statement->bindParam(':limit', $limit, PDO::PARAM_INT);
        $statement->execute();
        $list = $statement->fetchAll(\PDO::FETCH_ASSOC);
        $statement->closeCursor();

        return $list;
    }


    public function insert($ph, $temp, $turb) {

        $query = "INSERT INTO $this->table 
                    (ph, temperature, turbidity, `time`, `date`)
                VALUES 
                    (:ph, :temperature, :turbidity, :time, :date)";

        $conn = self::getDB();
        $statement = $conn->prepare($query);

        $statement->bindValue(':ph', $ph);
        $statement->bindValue(':turbidity', $turb);
        $statement->bindValue(':temperature', $temp);
        $statement->bindValue(':time', date("H:i"));
        $statement->bindValue(':date', date("Y/m/d"));
        $statement->execute();
        $lastId = $conn->lastInsertId();
        $statement->closeCursor();

        return $lastId > 0 ? 1 : 0;
    }

    public function getRangeDate($from, $to, $limit = 50) {
        $query = "SELECT * 
            FROM $this->table 
            WHERE :from <= `date` AND `date` <= :to 
            ORDER BY id LIMIT :limit";

        $statement = self::getDB()->prepare($query);
        $statement->bindValue(':from', $from);
        $statement->bindValue(':to', $to);
        $statement->bindParam(':limit', $limit, PDO::PARAM_INT);
        $statement->execute();
        $list = $statement->fetchAll(\PDO::FETCH_ASSOC);
        $statement->closeCursor();

        return $list;
    }

    public function getRangeDateTime($date, $from, $to, $limit = 50) {
        $query = "SELECT * 
            FROM $this->table 
            WHERE `date` = :date AND :from <= `time` AND `time` <= :to 
            ORDER BY id LIMIT :limit";

        $statement = self::getDB()->prepare($query);
        $statement->bindValue(':date', $date);
        $statement->bindValue(':from', $from);
        $statement->bindValue(':to', $to);
        $statement->bindParam(':limit', $limit, PDO::PARAM_INT);
        $statement->execute();
        $list = $statement->fetchAll(\PDO::FETCH_ASSOC);
        $statement->closeCursor();

        return $list;
    } 

    public function delete($id) {
        if (!$this->checkCanDelete($id)) return 0;

        $query = "DELETE FROM $this->table WHERE id = :id";

        $conn = self::getDB();
        $statement = $conn->prepare($query);
        $statement->bindValue(':id', $id);
        $count = $statement->execute();
        $statement->closeCursor();

        return $count > 0;
    }
}