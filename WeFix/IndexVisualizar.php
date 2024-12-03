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
                <h1>Visualizar Manutenções</h1>
            </div>
            <div class="DivMenu">
                <a class="refmenu" href="IndexMain.html"><img src="img/MenuPreto.png" class="Menu"></a>
            </div>
        </div>
    </header>

    <section class="ContainerGrande">
        <h2>Manutenções</h2>

        <!-- Formulário com Lista Suspensa -->
        <form method="GET" action="">
            <label for="linha" class="labelSelect">Selecione o tipo:</label>
            <select name="linha" id="linha" class="dropdown">
                <option value="">-- Selecione --</option>
                <option value="Manutencao Urgente">Manutenção Urgente</option>
                <option value="Manutencao Preventiva">Manutenção Preventiva</option>
            </select>
            <button type="submit" class="btnPesquisar">Pesquisar</button>
        </form>

        <div class="Txts">
            <table>
                <thead> 
                    <tr>
                        <th>Tipo</th>
                        <th>Motivo</th>
                        <th>Num Veículo</th>
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
                        $linhaSelecionada = isset($_GET['tipo']) ? $_GET['tipo'] : '';

                        if ($linhaSelecionada) {
                            // Consulta para buscar registros da linha selecionada e ordenar por ID
                            $stmt = $pdo->prepare("SELECT * FROM man WHERE tipo = :tipo ORDER BY id");
                            $stmt->execute(['tipo' => $linhaSelecionada]);
                        } else {
                            // Consulta padrão para buscar todos os registros
                            $stmt = $pdo->prepare("SELECT * FROM man ORDER BY id");
                            $stmt->execute();
                        }

                        $wefix = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        // Exibir registros na tabela
                        foreach ($wefix as $horarios) {
                            echo "<tr>
                                    <td>" . htmlspecialchars($horarios['tipo']) . "</td>
                                    <td>" . htmlspecialchars($horarios['motivo']) . "</td>
                                    <td>" . htmlspecialchars($horarios['nveic']) . "</td>
                                  </tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</body>
</html>
