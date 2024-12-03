
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preencher Horários - WeFix</title>
    <link rel="stylesheet" href="CSS/StylePreencher.css">
</head>
<body>
        <header>
            <div class="Header">
                <div class="DivLogo">
                <img src="img/LogWefix.png" alt="WeFix Logo" class="logo">
                </div>
                <div class="TxtHeader">
                <h1>Preencher Horários</h1>
                </div>
                <div class="DivMenu">
                    <a class="refmenu" href="IndexMain.html"><img src="img/MenuPreto.png" class="Menu"></a>
                </div>
            </div>
        </header>

        <div class="ContainerGrande">
            <form action="preencher.php" method="POST">
                <label for="linha">Linha:</label>
                <select id="linha" name="linha" required>
                    <option value="" disabled selected>Selecione a linha</option>
                    <option value="700 - Itaipava">700 - Itaipava</option>
                    <option value="638 - Quarteirao Brasileiro">638 - Quarteirao Brasileiro</option>
                    <option value="115 - Campo do Serrano">115 - Campo do Serrano</option>
                    <option value="100 - Rodoviaria Bingen">100 - Rodoviaria Bingen</option>
                </select>
        
                <label for="sentido">Sentido:</label>
                <select id="sentido" name="sentido" required>
                    <option value="" disabled selected>Selecione o sentido</option>
                    <option value="Centro">Centro</option>
                    <option value="Bairro">Bairro</option>
                </select>
        
                <label for="passageiros">Número de Passageiros:</label>
                <input class="passageiros" type="number" id="passageiros" name="passageiros" required>
        
                <button type="submit">Enviar</button>
            </form>
        </div>
    </div>
</body>
</html>