<?php
require_once 'Conexao.php';

// Obtendo os dados do formulário
$tipo = $_POST['tipo'];
$nveic = $_POST['nveic'];
$motivo = $_POST['motivo'];

try {
    // Criando uma nova instância do banco e conectando
    $database = new Database();
    $database->connect();
    $pdo = $database->getConnection();

    // Preparando a query de inserção
    $stmt = $pdo->prepare("INSERT INTO man (tipo, motivo, nveic) VALUES (:tipo, :motivo, :nveic)");

    // Associando os valores aos placeholders
    $stmt->bindParam(':tipo', $tipo);
    $stmt->bindParam(':motivo', $motivo);
    $stmt->bindParam(':nveic', $nveic);

    // Executando a query
    if ($stmt->execute()) {
        // Redirecionando se a execução for bem-sucedida
        header("Location: IndexMain.html");
        exit;
    } else {
        // Exibindo mensagem de erro em caso de falha
        echo "Erro ao inserir dados.";
    }
} catch (PDOException $e) {
    // Tratamento de erro para exceções do PDO
    echo "Erro: " . $e->getMessage();
}

/*

$tipo = $_POST['tipo'];
$nveic = $_POST['nveic'];
$motivo = $_POST['motivo'];


$database = new Database();
    $database->connect();
    $pdo = $database->getConnection();

    $stmt = $pdo->prepare("INSERT INTO man (tipo, motivo, nveic) VALUES (tipo, motivo, nveic)");
    $stmt->bindParam('tipo', $tipo);
    $stmt->bindParam('motivo', $motivo);
    $stmt->bindParam('nveic', $nveic);

    if ($stmt->execute()) {
        header("Location: IndexMain.html");
    }


if (isset($_POST['tipo'], $_POST['motivo'], $_POST['nveic'])) {
    $linha = htmlspecialchars($_POST['tipo']);
    $sentido = htmlspecialchars($_POST['motivo']);
    $passageiros = (int)$_POST['nveic'];

    $database = new Database();
    $database->connect();
    $pdo = $database->getConnection();

    $stmt = $pdo->prepare("INSERT INTO man (tipo, motivo, nveic) VALUES (:tipo, :motivo, :nveic)");
    $stmt->bindParam(':tipo', $tipo);
    $stmt->bindParam(':motivo', $motivo);
    $stmt->bindParam(':nveic', $nveic);

    if ($stmt->execute()) {
        header("Location: IndexMain.html");
    } else {
        echo "Erro ao inserir dados.";
    }
} else {
    echo "Dados incompletos.";
}*/
?>





