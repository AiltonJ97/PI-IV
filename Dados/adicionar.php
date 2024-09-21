<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Produto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Adicionar Novo Produto</h1>

    <?php
    // Conexão com banco de dados
    include 'sql.php';

    // Verificar se o formulário foi enviado
    if (isset($_POST['adicionar'])) {
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];

        // Validação simples
        if (!empty($nome) && !empty($preco)) {
            // Inserir produto no banco de dados
            try {
                $stmt = $pdo->prepare('INSERT INTO produtos (nome, preco) VALUES (:nome, :preco)');
                $stmt->bindParam(':nome', $nome);
                $stmt->bindParam(':preco', $preco);
                $stmt->execute();
                echo '<div class="alert alert-success">Produto adicionado com sucesso!</div>';
            } catch (PDOException $e) {
                echo '<div class="alert">Erro ao adicionar produto: ' . $e->getMessage() . '</div>';
            }
        } else {
            echo '<div class="alert">Preencha todos os campos.</div>';
        }
    }
    ?>

    <!-- Formulário para adicionar produto -->
    <form method="POST">
        <label for="nome">Nome do Produto:</label>
        <input type="text" id="nome" name="nome" class="form-control" required>

        <label for="preco">Preço do Produto:</label>
        <input type="text" id="preco" name="preco" class="form-control" required>
        <div style="justify-content: space-between;">
                <button type="submit" name="adicionar">Adicionar Produto</button>
                <button onclick="window.location.href='Home.php';">Voltar</button>
        </div>
    </form>
</div>
</body>
</html>
