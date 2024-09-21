<!DOCTYPE html>
<html>
<head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .produto-detalhe {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .produto-detalhe img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        h1 {
            font-size: 2em;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.1em;
            color: #666;
        }

        a {
            text-decoration: none;
            color: #1a73e8;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
    <title>Produtos - Sabor 2024</title>
</head>
<body>
    <?php
        // Incluir o array de produtos
        include 'produtos_dados.php';

        // Obter o índice do produto selecionado
        $indice = isset($_GET['indice']) ? (int) $_GET['indice'] : -1;

        // Verificar se o índice é válido
        if ($indice >= 0 && $indice < count($produtos)) {
            $produto = $produtos[$indice];
        } else {
            echo "Produto não encontrado.";
            exit;
        }
    ?>
    <h1 style="text-align: center">Detalhes do Produto</h1>
    <div class="produto-detalhe">
    <h1><?= htmlspecialchars($produto['nome']) ?></h1>
        <img src="<?= $produto['imagem'] ?>" alt="<?= htmlspecialchars($produto['nome']) ?>">
        <p><strong>Descrição:</strong> <?= htmlspecialchars($produto['descricao']) ?></p>
        <p><strong>Preço:</strong> R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
        <a href="http://localhost/produtos.php">Voltar à lista de produtos</a>
    </div>
</body>
</html>