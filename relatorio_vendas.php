<!--Desenvolvido por Lucas De Carvalho Praxedes-->
  <!--DATA 13/10/2024 -->
  <!--Professor: Luís Alberto Pires de Oliveira-->

<?php 
require 'conexao.php';
$sql = $pdo->prepare("SELECT medicamentos.produto, SUM(vendas.quantidade_vendida) AS total_vendido 
                      FROM vendas 
                      INNER JOIN medicamentos ON vendas.id_produto = medicamentos.id_produto 
                      GROUP BY medicamentos.produto");
$sql->execute();
$vendas = $sql->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Vendas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">RELATÓRIO DE VENDAS</h1>
        <?php if (isset($_GET['erro'])): ?>
            <div class="alert alert-danger"><?php echo $_GET['erro']; ?></div>
        <?php endif; ?>
        <table class="table table-bordered table-hover">
            <thead class="thead-light">
                <tr>
                    <th>Produto:</th>
                    <th>Total Vendido:</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($vendas as $venda): ?>
                    <tr>
                        <td><?php echo $venda['produto']; ?></td>
                        <td><?php echo $venda['total_vendido']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="lista_medicamentos.php" class="btn btn-sm btn-danger">Voltar pra lista de medicamentos</a>
    </div>
 </body>
</html>