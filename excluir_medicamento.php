<!--Desenvolvido por Lucas De Carvalho Praxedes-->
  <!--DATA 13/10/2024 -->
  <!--Professor: Luís Alberto Pires de Oliveira-->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluindo Medicamento</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>EXCLUINDO MEDICAMENTOS</h1>
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
        ?><br>
        <h2>Tem certeza que deseja excluir o medicamento abaixo?</h2>
        <form action="excluindo_medicamento.php" method="POST" >
            <input type="hidden" name="id" value="<?=$dados['id_produto']; ?>">
            <label for="produto">
                Produto <input type="text" class="form-control" name="produto" value="<?=$dados['produto']; ?>" readonly>
            </label>
            <label for="preco">
                Preço <input type="text" class="form-control" name="preco" value="<?=$dados['preco']; ?>" readonly>
            </label>
            <button type="submit" class="btn btn-primary">Excluir</button>
        </form>
        <a href="lista_medicamentos.php" class="btn btn-primary">Voltar</a>
    </div>
</body>
</html>
