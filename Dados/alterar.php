<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Produto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Alterar Produto</h1>

    <?php
    // Incluir o arquivo de conexão com o banco de dados
    include 'sql.php';

    // Verificar se o ID do produto foi passado via GET
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Buscar o produto pelo ID
        try {
            $stmt = $pdo->prepare('SELECT * FROM produtos WHERE id = :id');
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $produto = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // Verificar se o produto existe
            if (!$produto) {
                echo '<div class="alert alert-warning">Produto não encontrado.</div>';
                exit();
            }
        } catch (PDOException $e) {
            echo '<div class="alert">Erro ao buscar produto: ' . $e->getMessage() . '</div>';
            exit();
        }
    } else {
        echo '<div class="alert alert-warning">ID do produto não foi informado.</div>';
        exit();
    }

    // Verificar se o formulário foi enviado para atualizar o produto
    if (isset($_POST['atualizar'])) {
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];

        // Validação simples
        if (!empty($nome) && !empty($preco)) {
            // Atualizar o produto no banco de dados
            try {
                $stmt = $pdo->prepare('UPDATE produtos SET nome = :nome, preco = :preco WHERE id = :id');
                $stmt->bindParam(':nome', $nome);
                $stmt->bindParam(':preco', $preco);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                echo '<div class="alert alert-success">Produto atualizado com sucesso!</div>';
                // Atualizar o produto para mostrar os dados novos
                $produto['nome'] = $nome;
                $produto['preco'] = $preco;
            } catch (PDOException $e) {
                echo '<div class="alert">Erro ao atualizar produto: ' . $e->getMessage() . '</div>';
            }
        } else {
            echo '<div class="alert">Preencha todos os campos.</div>';
        }
    }
    ?>

    <!-- Formulário para alterar dados -->
    <form method="POST">
        <label for="nome">Nome do Produto:</label>
        <input type="text" id="nome" name="nome" class="form-control" value="<?= htmlspecialchars($produto['nome'] ?? '') ?>" required>

        <label for="preco">Preço do Produto:</label>
        <input type="text" id="preco" name="preco" class="form-control" value="<?= htmlspecialchars($produto['preco'] ?? '') ?>" required>

        <button type="submit" name="atualizar">Atualizar Produto</button>
    </form>

    <a href="Home.php">Voltar à lista de produtos</a>
</div>
</body>
</html>
