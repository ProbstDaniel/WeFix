<?php
require_once 'Conexao.php';

if (isset($_POST['linha'], $_POST['sentido'], $_POST['passageiros'])) {
    $linha = htmlspecialchars($_POST['linha']);
    $sentido = htmlspecialchars($_POST['sentido']);
    $passageiros = (int)$_POST['passageiros'];
    $timezone = new DateTimeZone('America/Sao_Paulo');
    $horario = new DateTime('now', $timezone);
    $horarioFormatado = $horario->format('d-m-Y H:i');

    $database = new Database();
    $database->connect();
    $pdo = $database->getConnection();

    $stmt = $pdo->prepare("INSERT INTO wefix (linha, sentido, horario, passageiros) VALUES (:linha, :sentido, :horario, :passageiros)");
    $stmt->bindParam(':linha', $linha);
    $stmt->bindParam(':sentido', $sentido);
    $stmt->bindParam(':horario', $horarioFormatado);
    $stmt->bindParam(':passageiros', $passageiros);

    if ($stmt->execute()) {
        header("Location: IndexMain.html");
    } else {
        echo "Erro ao inserir dados.";
    }
} else {
    echo "Dados incompletos.";
}
?>
