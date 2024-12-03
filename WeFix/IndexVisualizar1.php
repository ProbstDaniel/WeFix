<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Manutenções - WeFix</title>
    <link rel="stylesheet" href="StyleVisualizar.css">
</head>
<body>
        <header>
            <div class="Header">
                <div class="DivLogo">
                <img src="img/LogWefix.png" alt="WeFix Logo" class="logo">
                </div>
                <div class="TxtHeader">
                <h1>Visualizar Manutenções</h1>
                </div>
                <div class="DivMenu">
                    <a class="refmenu" href="IndexMain.html"><img src="img/MenuPreto.png" class="Menu"></a>
                </div>
            </div>
        </header>

        <section class="ContainerGrande">
            <h2>Manutenções</h2>
            <form>
                <div class="Txts">
                    <table>
                        <thead>
                            <tr>
                                <th>Tipo</th>
                                <th>Número</th>
                                <th>Motivo</th>
                                <th>Horário</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                    $message = '';
                    // Conexão com o banco de dados (09:30)
                    $host = 'localhost';
                    $db = 'WeFix';
                    $user = 'hitto';
                    $pass = '12345678';
                    $port = 3307; 
                    require_once 'Conexao.php';
                    $database = new Database($host, $db, $user, $pass, $port);
                    $database->connect();
                    $pdo = $database->getConnection();
        
                    // Consulta para buscar alunos (09:32)
                    $stmt = $pdo->prepare("SELECT * FROM manutencao");
                    $stmt->execute();
                    $manutencao = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
                    // Exibir alunos na tabela (09:36)
        foreach ($manutencao as $Infos) {
            echo "<tr>
                    <td>" . htmlspecialchars($Infos['tipo']) . "</td>
                    <td>" . htmlspecialchars($Infos['numero']) . "</td>
                    <td>" . htmlspecialchars($infos['Motivo']) . "</td>
                    <td>" . htmlspecialchars($infos['datahora']) . "</td>
                    
                  </tr>"; //para deletar um aluno (10:30)
        }
                    ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </section>
</body>
</html>
