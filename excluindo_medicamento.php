<!--Desenvolvido por Lucas De Carvalho Praxedes-->
  <!--DATA 19/08/2024 -->
  <!--Professor: Luís Alberto Pires de Oliveira-->

<?php  
require 'conexao.php';
$id = $_POST['id'];
$sql = $pdo->prepare("DELETE FROM medicamentos WHERE id_produto = :id");
$sql->bindValue(':id', $id);
$sql->execute();
header("Location:lista_medicamentos.php");
?>
