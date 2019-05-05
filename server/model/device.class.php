<?php 

if ( !defined('WEB') ) die("Access Denied");

class Device extends Database {
    private $table = 'tb_device';

    public function __construct() { }

    public function getDeviceById($id) {

        try {
            $query = "SELECT *
                    FROM $this->table
                    WHERE id = :id";
            $statement = self::getDB()->prepare($query);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $count = $statement->rowCount();
            $result = $statement->fetch(\PDO::FETCH_ASSOC);
            $statement->closeCursor();

            return $count > 0 ? $result : null;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function getDeviceByToken($token) {
        if (!$token) return null;

        try {
            $query = "SELECT *
                    FROM $this->table
                    WHERE token = :token";
            $statement = self::getDB()->prepare($query);
            $statement->bindValue(':token', $token);
            $statement->execute();
            $count = $statement->rowCount();
            $result = $statement->fetch(\PDO::FETCH_ASSOC);
            $statement->closeCursor();

            return $count > 0 ? $result : null;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function update($name, $id) {
        $query = "UPDATE $this->table SET name = :name WHERE id=:id";

        $conn = self::getDB();
        $statement = $conn->prepare($query);

        $statement->bindValue(':name', $name);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $statement->closeCursor();

        return 1;
    }

    public function insert($name, $token) {
        $query = "INSERT INTO $this->table 
                    (name, token)
                VALUES 
                    (:name, :token)";

        $conn = self::getDB();
        $statement = $conn->prepare($query);

        $statement->bindValue(':name', $name);
        $statement->bindValue(':token', $token);
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

    public function getList() {
        $query = "SELECT * FROM $this->table ORDER BY id";

        $statement = self::getDB()->prepare($query);
        $statement->execute();
        $last = $statement->fetchAll(\PDO::FETCH_ASSOC);
        $statement->closeCursor();

        return $last;
    }

}