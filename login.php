<!--Desenvolvido por Lucas De Carvalho Praxedes-->
  <!--DATA 13/10/2024 -->
  <!--Professor: Luís Alberto Pires de Oliveira-->
  <!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login do adm</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">ÁREA DE LOGIN</h1>
        
        <?php if (isset($_GET['erro'])): ?> <!-- Exibe a mensagem de erro se existir -->
            <div class="alert alert-danger"><?php echo $_GET['erro']; ?></div>
        <?php endif; ?>

        <form action="verificar_login.php" method="POST">
            <div class="form-group">
                <label for="usuario">Usuário</label>
                <input type="text" class="form-control" name="usuario" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" name="senha" required>
            </div>
            <button type="submit" class="btn btn-sm btn-danger">Entrar</button>
        </form>
    </div>
</body>
</html> 
