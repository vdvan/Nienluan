<?php 

if ( !defined('WEB') ) die("Access Denied");

class Relay extends Database {
    private $table = 'tb_relay_status';

    public function __construct() { }

    public function getItem($id) {
        $query = "SELECT * FROM $this->table WHERE id = :id";

        $statement = self::getDB()->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $item = $statement->fetch(\PDO::FETCH_ASSOC);
        $statement->closeCursor();

        return $item;
    }

    public function getRelayListByDeviceId($deviceId) {
        if (!$deviceId) return null;

        try {
            $query = "SELECT *
                    FROM $this->table
                    WHERE device_id = :device_id";
            $statement = self::getDB()->prepare($query);
            $statement->bindValue(':device_id', $deviceId);
            $statement->execute();
            $count = $statement->rowCount();
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            $statement->closeCursor();

            return $count > 0 ? $result : null;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function getList() {
        $query = "SELECT * FROM $this->table ORDER BY device_id, id";

        $statement = self::getDB()->prepare($query);
        $statement->execute();
        $last = $statement->fetchAll(\PDO::FETCH_ASSOC);
        $statement->closeCursor();

        return $last;
    }

    public function updateStatus($id, $status) {
        $query = "UPDATE $this->table SET status = :status WHERE id=:id";
        try {
            $statement = self::getDB()->prepare($query);
            $statement->bindValue(':status', $status);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $statement->closeCursor();

            return 1;
        } catch(PDOException $e) {
            return 0;
        }
    }

    public function update($name, $deviceId, $pin, $id) {
        $query = "UPDATE $this->table SET name = :name, device_id = :device_id, pin = :pin WHERE id=:id";
        try {
            $statement = self::getDB()->prepare($query);
            $statement->bindValue(':name', $name);
            $statement->bindValue(':device_id', $deviceId);
            $statement->bindValue(':pin', $pin);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $statement->closeCursor();

            return 1;
        } catch(PDOException $e) {
            return 0;
        }
    }


    public function insert($name, $deviceId, $pin) {

        $query = "INSERT INTO $this->table 
                    (name, device_id, pin)
                VALUES 
                    (:name, :device_id, :pin)";

        $conn = self::getDB();
        $statement = $conn->prepare($query);

        $statement->bindValue(':name', $name);
        $statement->bindValue(':device_id', $deviceId);
        $statement->bindValue(':pin', $pin);
        $statement->execute();
        $lastId = $conn->lastInsertId();
        $statement->closeCursor();

        return $lastId > 0 ? 1 : 0;
    }
    

    public function delete($id) {
        $query = "DELETE FROM $this->table WHERE id = :id";

        $conn = self::getDB();
        $statement = $conn->prepare($query);
        $statement->bindValue(':id', $id);
        $count = $statement->execute();
        $statement->closeCursor();

        return $count > 0;
    }
}