<?php 

if ( !defined('WEB') ) die("Access Denied");

class Account extends Database {
    private $table = 'tb_account';

    public function __construct() { }

    public function getAccountByUsername($username) {
        if (!$username) return null;

        try {
            $query = "SELECT *
                    FROM $this->table
                    WHERE username = :username";
            $statement = self::getDB()->prepare($query);
            $statement->bindValue(':username', $username);
            $statement->execute();
            $count = $statement->rowCount();
            $result = $statement->fetch(\PDO::FETCH_ASSOC);
            $statement->closeCursor();

            return $count > 0 ? $result : null;
        } catch (PDOException $e) {
            //echo $e->getMessage();
            return null;
        }
    }

}