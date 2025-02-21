<?php
require_once __DIR__ . '/Database.php';

class UserModel extends Database {
    private $pdo;

    public function __construct() {
        $this->pdo = $this->getConnection();
    
    }

    public function fetch() {
        try {
            $stm = $this->pdo->query("SELECT * FROM users");
            if ($stm->rowCount() > 0) {
                return $stm->fetchAll(PDO::FETCH_ASSOC);
            } else {
                echo "Nenhum dado encontrado na tabela users.";
                return [];
            }
        } catch (PDOException $e) {
            echo "Erro ao buscar dados: " . $e->getMessage();
            return [];
        }
    }
}