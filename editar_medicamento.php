<!--Desenvolvido por Lucas De Carvalho Praxedes-->
  <!--DATA 19/08/2024 -->
  <!--Professor: Luís Alberto Pires de Oliveira-->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Medicamento</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
    <h1 class="text-center mb-4">EDITAR MEDICAMENTOS</h1>
        <?php 
            require 'conexao.php';
            $id = $_REQUEST["id"];
            $dados = []; 
            $sql = $pdo->prepare("SELECT * FROM medicamentos WHERE id_produto = :id");
            $sql->bindValue(":id", $id);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $dados = $sql->fetch(PDO::FETCH_ASSOC);
            } else {
                header("Location:lista_medicamentos.php");
                exit;
            }     
        ?>
        <form action="editando_medicamento.php" method="POST" >
            <input type="hidden" name="id" value="<?=$dados['id_produto']; ?>">
            <div class="form-group">
                <label for="produto">Produto</label>
                <input type="text" class="form-control" name="produto" value="<?=$dados['produto']; ?>" required>
            </div>
            <div class="form-group">
                <label for="preco">Preço</label>
                <input type="number" class="form-control" name="preco" step="0.01" value="<?=$dados['preco']; ?>" required>
            </div>
            <div class="form-group">
                <label for="quantidade">Quantidade</label>
                <input type="number" class="form-control" name="quantidade" value="<?=$dados['quantidade']; ?>" required>
            </div>
            <div class="form-group">
                <label for="validade">Validade</label>
                <input type="date" class="form-control" name="validade" value="<?=$dados['validade']; ?>" required>
            </div>
            <div class="form-group">
                <label for="categoria">Categoria</label>
                <input type="text" class="form-control" name="categoria" value="<?=$dados['categoria']; ?>" required>
            </div>
            <button type="submit" class="btn btn-sm btn-danger">Salvar</button>
        </form>
        <br>
        <a href="lista_medicamentos.php" class="btn btn-sm btn-danger">Voltar</a>
    </div>
</body>
</html>
