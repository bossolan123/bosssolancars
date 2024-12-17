<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administração - Bossolan Cars</title>
</head>
<body>
    <h1>Administração de Carros</h1>
    <form method="POST" action="process.php">
        <input type="text" name="nome" placeholder="Nome do carro" required>
        <textarea name="descricao" placeholder="Descrição" required></textarea>
        <input type="text" name="imagem" placeholder="URL da imagem" required>
        <button type="submit" name="acao" value="inserir">Adicionar Carro</button>
    </form>

    <h2>Lista de Carros</h2>
    <ul>
        <?php
        $sql = "SELECT * FROM carros";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            echo "<li>
                {$row['nome']}
                <form style='display:inline;' method='POST' action='process.php'>
                    <input type='hidden' name='id' value='{$row['id']}'>
                    <button type='submit' name='acao' value='deletar'>Remover</button>
                </form>
            </li>";
        }
        ?>
    </ul>
</body>
</html>