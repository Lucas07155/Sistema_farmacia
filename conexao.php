<!--Desenvolvido por Lucas De Carvalho Praxedes-->
  <!--DATA 13/10/2024 -->
  <!--Professor: Luís Alberto Pires de Oliveira-->
<?php
$pdo = new PDO("mysql:dbname=farmacia;host=localhost;port=3307", "root", "lucas123");
if (!$pdo) {
    echo "Falha na conexão com o banco de dados!";
} 
?>
