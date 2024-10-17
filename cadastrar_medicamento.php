 <!--Desenvolvido por Lucas De Carvalho Praxedes-->
  <!--DATA 13/10/2024 -->
  <!--Professor: Luís Alberto Pires de Oliveira-->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Medicamento</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css"> 

</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">CADASTRAR MEDICAMENTOS</h1>
        <form action="inserir_medicamento.php" method="POST">
            <div class="form-group">
                <label for="produto">Nome do Medicamento</label>
                <input type="text" name="produto" id="produto" class="form-control" placeholder="Nome do Medicamento" required>
            </div>
            <div class="form-group">
            <label for="preco">Preço</label>
            <input type="text" name="preco" id="preco" class="form-control" placeholder="Preço" required>
            </div>
            <div class="form-group">
                <label for="quantidade">Quantidade</label>
                <input type="number" name="quantidade" id="quantidade" class="form-control" placeholder="Quantidade em Estoque" required>
            </div>
            <div class="form-group">
                <label for="validade">Validade</label>
                <input type="date" name="validade" id="validade" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="categoria">Categoria</label>
                <input type="text" name="categoria" id="categoria" class="form-control" placeholder="Categoria do Medicamento" required>
            </div>
            <button type="submit" class="btn btn-sm btn-danger">Salvar Medicamento cadastrado</button>
        </form>
        <br>
        <a href="lista_medicamentos.php" class="btn btn-sm btn-danger">Voltar pra lista de medicamentos</a>
    </div>
</body>
</html>