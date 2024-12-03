<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manutenção - WeFix</title>
    <link rel="stylesheet" href="CSS/StyleSolicitarMan.css">
</head>
<body>
    <header>
        <div class="Header">
            <div class="DivLogo">
            <img src="img/LogWefix.png" alt="WeFix Logo" class="logo">
            </div>
            <div class="TxtHeader">
            <h1>Solicitar Manutenção</h1>
            </div>
            <div class="DivMenu">
                <a class="refmenu" href="IndexMain.html"><img src="img/MenuPreto.png" class="Menu"></a>
            </div>
        </div>
    </header>
        <div class="ContainerGrande">
            <section class="form-container">
                <h2>Manutenção</h2>
                <form action="Manutencao.php" method="POST">
                    <label for="tipo">Tipo Manutenção:</label>
                    <select id="tipo" name="tipo" required>
                        <option value="" disabled selected>Selecione o tipo de manutenção</option>
                        <option value="Manutencao Urgente">Manutenção Urgente</option>
                        <option value="Manutencao Preventiva">Manutenção Preventiva</option>
                    </select>

                    <label for="nveic">Número do Veículo:</label>
                <input class="nveic" type="number" id="nveic" name="nveic" required>

                    <label for="motivo">Motivo (Caso seja urgente)</label>
                    <input type="text" id="motivo" name="motivo" ></textarea>

                    <button type="submit">Enviar</button>
                </form>
            </section>
        </div>
    </div>
</body>
</html>
