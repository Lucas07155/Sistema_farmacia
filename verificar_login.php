<!--Desenvolvido por Lucas De Carvalho Praxedes-->
  <!--DATA 13/10/2024 -->
  <!--Professor: Luís Alberto Pires de Oliveira-->
  
<?php
require 'conexao.php';
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$sql = $pdo->prepare("SELECT * FROM administrador WHERE usuario = :usuario AND senha = :senha");
$sql->bindValue(':usuario', $usuario);
$sql->bindValue(':senha', $senha);
$sql->execute();

if ($sql->rowCount() > 0) {
    header("Location: lista_medicamentos.php");
    exit;
} else {
    echo "Usuário ou senha incorretos!";
    echo '<a href="login.php">Tente novamente</a>';
}
?>

