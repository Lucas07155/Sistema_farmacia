  <!-- Desenvolvido por Lucas De Carvalho Praxedes -->
<!-- DATA 13/10/2024 -->
<!-- Professor: Luís Alberto Pires de Oliveira -->
<?php 
require 'conexao.php';
if (isset($_POST['vender'])) {
    require 'vender.php'; 
}
$search = isset($_POST['search']) ? $_POST['search'] : '';
$sql = $pdo->prepare("SELECT * FROM medicamentos WHERE produto LIKE :search");
$sql->bindValue(':search', '%' . $search . '%');
$sql->execute();
$lista = $sql->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Medicamentos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">LISTA DE MEDICAMENTOS</h1>
                <form method="POST" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar medicamento" value="<?php echo $search; ?>">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-sm btn-danger" >Buscar medicamento</button>
                </div>
            </div>
        </form>
        <form method="POST" class="mb-4">
            <div class="form-row">
                <div class="col-md-5">
                    <input type="number" name="id_produto" class="form-control" placeholder="ID do Produto" required>
                </div>
                <div class="col-md-5">
                    <input type="number" name="quantidade" class="form-control" placeholder="Quantidade a Vender" required>
                </div>
                <div class="col-md-2">
                    <button type="submit" name="vender" class="btn btn-sm btn-danger">Vender medicamento</button>
                </div>
            </div>
        </form>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>Id_produto:</th>
                        <th>Produto:</th>
                        <th>Preço</th>
                        <th>Quantidade:</th>
                        <th>Validade:</th>
                        <th>Categoria:</th>
                        <th>Ações:</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($lista as $medicamento): ?>
                        <tr>
                            <td><?php echo $medicamento['id_produto']; ?></td>  
                            <td><?php echo $medicamento['produto']; ?></td>
                            <td><?php echo $medicamento['preco']; ?></td>
                            <td><?php echo $medicamento['quantidade']; ?></td>
                            <td><?php echo $medicamento['validade']; ?></td>
                            <td><?php echo $medicamento['categoria']; ?></td>
                            <td>
                                <a href="editar_medicamento.php?id=<?php echo $medicamento['id_produto']; ?>" class="btn btn-sm btn-danger">Editar</a>
                                <a href="excluir_medicamento.php?id=<?php echo $medicamento['id_produto']; ?>" class="btn btn-sm btn-danger">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="text-right mt-3">
            <a href="cadastrar_medicamento.php" class="btn btn-sm btn-danger">Cadastrar Novo Medicamento</a>
            <a href="relatorio_vendas.php" class="btn btn-sm btn-danger">Relatório de Vendas</a>
        </div>
    </div>
</body>
</html>