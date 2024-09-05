<?php
$produtos = [
    [
        'nome' => 'Snack Saudável',
        'descricao' => 'Snack feito com frutas desidratadas',
        'preco' => 15.90
    ],
    [
        'nome' => 'Refeição Congelada Fitness',
        'descricao' => 'Refeição balanceada, rica em proteínas',
        'preco' => 25.99
    ],
    [
        'nome' => 'Suco Natural Detox',
        'descricao' => 'Suco natural a base de frutas e vegetais',
        'preco' => 8.75
    ]
];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Produtos - Sabor 2024</title>
</head>
<body>
<h1>Lista de Produtos</h1>
    <ul style="list-style: none;">
        <?php foreach ($produtos as $indice => $produto): ?>
            <li>
                <a href="detalhe_produto.php?indice=<?= $indice ?>">
                    <?= $produto['nome'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>