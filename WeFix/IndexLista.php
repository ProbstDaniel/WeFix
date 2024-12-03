<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Solicitações - WeFix</title>
    <link rel="stylesheet" href="StyleLista.css">
</head>
<body>
    <header>
        <div class="Header">
            <div class="DivLogo">
                <img src="img/LogWefix.png" alt="WeFix Logo" class="logo">
            </div>
            <div class="TxtHeader">
                <h1>Visualizar Horários</h1>
            </div>
            <div class="DivMenu">
                <a class="refmenu" href="IndexMain.html"><img src="img/MenuPreto.png" class="Menu"></a>
            </div>
        </div>
    </header>

    <section class="ContainerGrande">
        <h2>Horários</h2>

        <!-- Formulário com Lista Suspensa -->
        <form method="GET" action="">
            <label for="linha" class="labelSelect">Selecione a Linha:</label>
            <select name="linha" id="linha" class="dropdown">
                <option value="">-- Selecione --</option>
                <option value="700 - Itaipava">700 - Itaipava</option>
                <option value="638 - Quarteirao Brasileiro">638 - Quarteirão Brasileiro</option>
                <option value="115 - Campo do Serrano">115 - Campo do Serrano</option>
                <option value="100 - Rodoviaria Bingen">100 - Rodoviária Bingen</option>
            </select>
            <button type="submit" class="btnPesquisar">Pesquisar</button>
        </form>

        <div class="Txts">
            <table>
                <thead> 
                    <tr>
                        <th>Linha</th>
                        <th>Sentido</th>
                        <th>Horário</th>
                        <th>Passageiros</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // Conexão com o banco de dados
                        $host = 'localhost';
                        $db = 'WeFix';
                        $user = 'hitto';
                        $pass = '12345678';
                        $port = 3307; 
                        require_once 'Conexao.php';
                        $database = new Database($host, $db, $user, $pass, $port);
                        $database->connect();
                        $pdo = $database->getConnection();

                        // Verificar se uma linha foi selecionada
                        $linhaSelecionada = isset($_GET['linha']) ? $_GET['linha'] : '';

                        if ($linhaSelecionada) {
                            // Consulta para buscar registros da linha selecionada e ordenar por ID
                            $stmt = $pdo->prepare("SELECT * FROM wefix WHERE linha = :linha ORDER BY id");
                            $stmt->execute(['linha' => $linhaSelecionada]);
                        } else {
                            // Consulta padrão para buscar todos os registros
                            $stmt = $pdo->prepare("SELECT * FROM wefix ORDER BY id");
                            $stmt->execute();
                        }

                        $wefix = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        // Exibir registros na tabela
                        foreach ($wefix as $horarios) {
                            echo "<tr>
                                    <td>" . htmlspecialchars($horarios['linha']) . "</td>
                                    <td>" . htmlspecialchars($horarios['sentido']) . "</td>
                                    <td>" . htmlspecialchars($horarios['horario']) . "</td>
                                    <td>" . htmlspecialchars($horarios['passageiros']) . "</td>
                                  </tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</body>
</html>
