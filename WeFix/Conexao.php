<?php
class Database {
    private $host = 'localhost';
    private $db = 'WeFix';
    private $user = 'hitto';
    private $pass = '12345678';
    private $port = 3307;
    private $pdo;

    public function connect() {
        try {
            $this->pdo = new PDO("mysql:host={$this->host};port={$this->port};dbname={$this->db}", $this->user, $this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erro na conexão: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->pdo;
    }
}
?>
