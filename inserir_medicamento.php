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
    $sql = $pdo->prepare("INSERT INTO medicamentos (produto, preco, quantidade, validade, categoria) VALUES (:produto, :preco, :quantidade, :validade, :categoria)");
    $sql->bindValue(':produto', $produto);
    $sql->bindValue(':preco', $preco);
    $sql->bindValue(':quantidade', $quantidade);
    $sql->bindValue(':validade', $validade);
    $sql->bindValue(':categoria', $categoria);
    $sql->execute();
    header("Location: lista_medicamentos.php");
?>
