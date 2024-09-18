<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css.css">
    <title>Formulário</title>
</head>
<body>
    <?php
    $nome = $email = $data = $endereco = $alimentos = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Validação de e-mail
        if (empty($_POST["email"])) {
            $emailErro = "Email é obrigatório";
        } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErro = "Formato de email inválido";
            }
        }

        // Validação de data de nascimento
        if (!empty($_POST["data"])) {
            $data = test_input($_POST["data"]);
        }

        // Validação de endereço
        if (!empty($_POST["endereco"])) {
            $endereco = test_input($_POST["endereco"]);
        }

        // Validação de Alimento
        if (!empty($_POST["alimentos"])) {
            $alimentos = test_input($_POST["alimentos"]);
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
    <div style="background-color: gray; display: flex; justify-content: center; font-size: 36px">
        <div style="width: 55%;">
            <h1 style="font-size: 40px; text-align: center">Formulário de Cadastro</h1>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="div">
                    Nome: 
                    <input class="input-grande" aria-label="Digite seu nome" type="text" nome="nome" value="<?php echo $nome; ?>" required>
                </div>
                <div class="div">
                    E-mail: 
                    <input class="input-grande" type="email" nome="email" value="<?php echo $email; ?>" required>
                </div>
                <div class="div">
                    Data de Nascimento: 
                    <input style="border-color: black;" class="input-grande" type="date" nome="data" value="<?php echo $data; ?>" required>
                </div>
                <div class="div">
                    Endereço: 
                    <input class="input-grande" type="text" nome="Endereco" value="<?php echo $endereco; ?>" required>
                </div>
                <div class="div">
                    Preferencia de alimentos: 
                    <textarea class="input-pref" type="text" nome="Alimentos" value="<?php echo $alimentos; ?>" required></textarea>
                </div>
                <div style="display: flex; justify-content: space-between; margin-top: 15px;">
                <input type="submit" value="Salvar" style="background-color: green; font-size: 36px;"/>
                <input type="reset" value="Limpar" onchange="" style="background-color: red; font-size: 36px;"/>
                </div>
            </form>
        </div>
    </div>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($nomeErro) && empty($emailErro)) {
        echo "<h3>Dados Recebidos:</h3>";
        echo "Nome: " . $nome . "<br>";
        echo "Email: " . $email . "<br>";
        echo "Data de Nascimento: " . $data . "<br>";
        echo "Endereço: " . $endereco . "<br>";
    }
    ?>
</body>
</html>
