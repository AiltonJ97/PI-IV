<!DOCTYPE html>
<html>
<head>
    <title>Produtos - Sabor 2024</title>
</head>
<body>
    <?php
        // Incluir o array de produtos
        include 'produtos.php';

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
    <h1>Lista de Produtos</h1>
    <ul>
            <li style="list-style: none;">
                <a href="detalhe_produto.php?indice=<?= $indice ?>">
                    <?= $produto['nome'] ?> - R$ <?= number_format($produto['preco'], 2, ',', '.') ?>
                </a>
                <p><?= $produto['descricao'] ?></p>
            </li>
    </ul>
</body>
</html>