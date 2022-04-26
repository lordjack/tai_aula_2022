<?php
include "../database/bd.php";
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

    if (!empty($_GET['id'])) {
        $result = $objBD->buscar($_GET['id']);
      //  var_dump($result->nome);
      //  var_dump($result->cpf);
      //  exit;
    }
    if (!empty($_POST)) {
        if (!empty($_POST['id'])) {
             echo "Salvar<br>";

            $objBD->update($_POST);
        }
        var_dump($_POST);
        $objBD->inserir($_POST);
        header("Location: index.php");
    }
    ?>
    <h2>Formulário Cliente</h2>
    <form action="index.php" method="post">
        <input type="hidden" name="id"
            value="<?php echo !empty($result->id)? $result->id: "" ?>" /><br>

        <label>Nome</label>
        <input type="text" name="nome"
         value="<?php echo !empty($result->nome)? $result->nome: "" ?>" /><br>

        <label>Telefone</label>
        <input type="text" name="telefone" value="<?php echo !empty($result->telefone)? $result->telefone: "" ?>" /><br>

        <label>CPF</label>
        <input type="text" name="cpf" value="<?php echo !empty($result->cpf)? $result->cpf: "" ?>" /><br>

        <input type="submit" value="Salvar" />
    </form>
    <a href="./usuarioList.php">Voltar</a> <br>
</body>
</html>