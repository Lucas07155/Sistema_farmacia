<!--Desenvolvido por Lucas De Carvalho Praxedes-->
  <!--DATA 13/10/2024 -->
  <!--Professor: Luís Alberto Pires de Oliveira-->
<?php 
require 'conexao.php';
$produto = $_POST['produto'];
$preco = $_POST['preco'];
$quantidade = $_POST['quantidade'];
$validade = $_POST['validade'];
$categoria = $_POST['categoria'];
$id = $_POST['id'];
$sql = $pdo->prepare("UPDATE medicamentos SET produto = :produto, preco = :preco, quantidade = :quantidade, validade = :validade, categoria = :categoria WHERE id_produto = :id");
$sql->bindValue(':produto', $produto);
$sql->bindValue(':preco', $preco);
$sql->bindValue(':quantidade', $quantidade);
$sql->bindValue(':validade', $validade);
$sql->bindValue(':categoria', $categoria);
$sql->bindValue(':id', $id);
$sql->execute();
header("Location:lista_medicamentos.php");
?>
