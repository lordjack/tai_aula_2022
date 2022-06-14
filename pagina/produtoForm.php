<?php
include "../database/bd.php";
include "./head.php";

$objBD = new BD();
$objBD->conn();
$tb_nome = "produto";

if (!empty($_GET['id'])) {
    $result = $objBD->buscar($tb_nome, $_GET['id']);
    //select * from produto where id = ?
}
if (!empty($_POST)) {

    if (empty($_POST['id'])) {
        $objBD->inserir($tb_nome, $_POST);
    } else {
        $objBD->update($tb_nome, $_POST);
    }
    header("Location: ./produtoList.php");
}
?>
<h2>Formulário Produto</h2>
<form action="./produtoForm.php" method="post">
    <div class="row">
        <input type="hidden" name="id" value="<?php echo !empty($result->id) ? $result->id : "" ?>" /><br>
        <div class="col-4">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" value="<?php echo !empty($result->nome) ? $result->nome : "" ?>" /><br>
        </div>
        <div class="col-3">
            <label>Lote</label>
            <input type="text" name="lote" class="form-control" value="<?php echo !empty($result->telefone) ? $result->telefone : "" ?>" /><br>
        </div>
        <div class="col-3">
            <label>Preço</label>
            <input type="text" name="preco" class="form-control" value="<?php echo !empty($result->telefone) ? $result->telefone : "" ?>" /><br>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <label>Imagem</label>
            <input type="file" name="nome_imagem" class="form-control" value="<?php echo !empty($result->cpf) ? $result->cpf : "" ?>" /><br>
        </div>
    </div>
    <input type="submit" class="btn btn-success" value="Salvar" />
    <a href="./produtoList.php" class="btn btn-primary">Voltar</a> <br>
</form>
<?php
include "./footer.php";
?>