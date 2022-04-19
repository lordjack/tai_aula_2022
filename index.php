<?php
include "./database/bd.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $objBD = new BD();
    $objBD->conn();
    $result = $objBD->select();
    foreach ($result as $item) {
        echo "ID" . $item['id'] . " Nome: " . $item['nome'] .
        " Telefone: " . $item['telefone'] . " CPF: " . $item['cpf'] . "<br>";
    }

    if (!empty($_POST)) {
        echo "Salvar<br>";
        var_dump($_POST);
        $objBD->inserir($_POST);
        header("Location: index.php");
    }
    ?>
    <h2>Formulário Cliente</h2>
    <form action="index.php" method="post">
        <label>Nome</label>
        <input type="text" name="nome" /><br>

        <label>Telefone</label>
        <input type="text" name="telefone" /><br>

        <label>CPF</label>
        <input type="text" name="cpf" /><br>

        <input type="submit" value="Salvar" />
    </form>
</body>

</html>