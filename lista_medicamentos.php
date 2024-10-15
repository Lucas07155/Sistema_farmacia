 <!-- Desenvolvido por Lucas De Carvalho Praxedes -->
<!-- DATA 13/10/2024 -->
<!-- Professor: Luís Alberto Pires de Oliveira -->
<?php 
require 'conexao.php';
$search = isset($_POST['search']) ? $_POST['search'] : '';
$sql = $pdo->prepare("SELECT * FROM medicamentos WHERE produto LIKE :search");
$sql->bindValue(':search', '%' . $search . '%');
$sql->execute();
$lista = $sql->fetchAll(PDO::FETCH_ASSOC);
$mensagem = isset($_GET['mensagem']) ? $_GET['mensagem'] : '';
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
        <h1 class="text-center mb-4">Lista de Medicamentos</h1>
        <form method="POST" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar medicamento" value="<?php echo $search; ?>">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-sm btn-danger">Buscar</button>
                </div>
            </div>
        </form>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Produto</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th>Validade</th>
                        <th>Categoria</th>
                        <th>Ações</th>
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
        </div>

        <div class="mt-4">
        <h2 class="text-center mb-4">REGISTRAR VENDA DO MEDICAMENTO </h2>
            <form action="vender_medicamento.php" method="POST">
                <div class="input-group mb-3">
                    <input type="text" name="id_produto" class="form-control" placeholder="ID do Produto" required>
                    <input type="number" name="quantidade" class="form-control" placeholder="Quantidade Vendida" required min="1">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-sm btn-danger">Vender</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
