<!--Desenvolvido por Lucas De Carvalho Praxedes-->
  <!--DATA 13/10/2024 -->
  <!--Professor: Luís Alberto Pires de Oliveira-->
  
<?php 
require 'conexao.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $medicamento_id = $_POST['medicamento_id'];
    $quantidade_venda = $_POST['quantidade_venda'];
    $sql = $pdo->prepare("SELECT * FROM medicamentos WHERE id_produto = :id");
    $sql->bindValue(':id', $medicamento_id);
    $sql->execute();
    $medicamento = $sql->fetch(PDO::FETCH_ASSOC);
    if ($medicamento && $medicamento['quantidade'] >= $quantidade_venda) {
        // Atualiza a quantidade em estoque
        $nova_quantidade = $medicamento['quantidade'] - $quantidade_venda;
        $sql = $pdo->prepare("UPDATE medicamentos SET quantidade = :quantidade WHERE id_produto = :id");
        $sql->bindValue(':quantidade', $nova_quantidade);
        $sql->bindValue(':id', $medicamento_id);
        $sql->execute();
        echo "<div class='alert alert-success'>Venda realizada com sucesso!</div>";
    } else {
        echo "<div class='alert alert-danger'>Quantidade em estoque insuficiente!</div>";
    }
}
header('Location:lista_medicamentos.php');
exit;
?>
