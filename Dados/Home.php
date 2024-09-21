<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Lista de Produtos</h1>

    <?php
    // Conexão com banco de dados
    include 'sql.php';

    // Verificar se foi solicitada a remoção de algum produto
    if (isset($_POST['remover'])) {
        $id = $_POST['id'];

        // Remover o produto do banco de dados
        try {
            $stmt = $pdo->prepare('DELETE FROM produtos WHERE id = :id');
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            echo '<div class="alert alert-success">Produto removido com sucesso!</div>';
        } catch (PDOException $e) {
            echo '<div class="alert">Erro ao remover produto: ' . $e->getMessage() . '</div>';
        }
    }

    // Buscar produtos do banco de dados
    try {
        $stmt = $pdo->query('SELECT * FROM produtos');
        $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($produtos) > 0) {
            echo '<table>';
            echo '<tr><th>ID</th><th>Nome</th><th>Preço</th><th>Ações</th></tr>';
            foreach ($produtos as $produto) {
                echo '<tr>';
                echo '<td>' . $produto['id'] . '</td>';
                echo '<td>' . $produto['nome'] . '</td>';
                echo '<td>' . $produto['preco'] . '</td>';
                echo '<td>';
                echo '<button onclick="window.location.href=\'alterar.php?id=' . $produto['id'] . '\'">Alterar</button> '; // Botão Alterar
                echo '<form method="POST" style="display:inline-block;">';
                echo '<input type="hidden" name="id" value="' . $produto['id'] . '">';
                echo '<button type="submit" name="remover">Remover</button>';
                echo '</form>';
                echo '</td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo '<div class="alert alert-warning">Nenhum produto encontrado.</div>';
        }
    } catch (PDOException $e) {
        echo '<div class="alert">Erro ao buscar produtos: ' . $e->getMessage() . '</div>';
    }
    ?>
    <button onclick="window.location.href='adicionar.php';">Adicionar Novo Produto</button>
</div>
</body>
</html>
