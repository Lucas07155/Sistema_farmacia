<!--Desenvolvido por Lucas De Carvalho Praxedes-->
  <!--DATA 13/10/2024 -->
  <!--Professor: Luís Alberto Pires de Oliveira-->
<?php 
require 'conexao.php';
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
</head>
<body>
    <div class="container mt-5">
        <h1>LISTA DE MEDICAMENTOS</h1>
        <br>
        <form method="POST" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar medicamento" value="<?php echo $search; ?>">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </div>
        </form>

        <table class="table table-bordered">
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
                            <a href="editar_medicamento.php?id=<?php echo $medicamento['id_produto']; ?>" class=" btn btn-primary">[Editar]</a>
                            <a href="excluir_medicamento.php?id=<?php echo $medicamento['id_produto']; ?>" class="btn btn-primary">[Excluir]</a>
                        </td>                
                    </tr>                
                <?php endforeach; ?>    
            </tbody>
        </table>
        
        <br>
        <a href="cadastrar_medicamento.php" class="btn btn-primary">Cadastrar Medicamento</a>
    </div>
</body>
</html>