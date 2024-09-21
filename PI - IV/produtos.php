<?php
    // Inclui o array de produtos
    include 'produtos_dados.php';
?>
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

        h1 {
            text-align: center;
        }

        .container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .produto-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            transition: transform 0.2s;
        }

        .produto-card:hover {
            transform: scale(1.05);
        }

        .produto-card img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .produto-card h3 {
            margin: 10px 0;
            font-size: 1.2em;
            color: #333;
        }

        .produto-card p {
            color: #666;
            margin: 5px 0;
        }

        .produto-card a {
            text-decoration: none;
            color: #1a73e8;
            font-weight: bold;
        }

        .produto-card a:hover {
            text-decoration: underline;
        }

        footer {
            text-align: center;
            margin-top: 40px;
            color: #888;
        }
    </style>
    <title>Produtos - Sabor 2024</title>
</head>

<body>
    <h1>Lista de Produtos</h1>
    <div class="container">
        <ul style="list-style: none;">
            <?php foreach ($produtos as $indice => $produto): ?>
                <div class="produto-card">
                    <li>
                        <a href="http://localhost/detalhe_produto.php?indice=<?= $indice ?>">
                            <img src="<?= $produto['imagem'] ?>" alt="<?= htmlspecialchars($produto['nome']) ?>" width="150"
                                height="150">
                        </a>
                        <a href="http://localhost/detalhe_produto.php?indice=<?= $indice ?>">
                            <h3><?= $produto['nome'] ?></h3>
                        </a>
                    </li>
                </div>
            <?php endforeach; ?>
        </ul>
    </div>
    <footer>
        &copy; 2024 Sabor 2024 - Todos os direitos reservados.
    </footer>
</body>
</html>