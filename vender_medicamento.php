<?php 
require 'conexao.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_produto = $_POST['id_produto'];
    $quantidade_vendida = $_POST['quantidade'];
    $sql = $pdo->prepare("SELECT quantidade FROM medicamentos WHERE id_produto = :id");
    $sql->bindValue(':id', $id_produto);
    $sql->execute();
    $medicamento = $sql->fetch(PDO::FETCH_ASSOC);
    if ($medicamento) {
        $quantidade_em_estoque = $medicamento['quantidade'];

        if ($quantidade_vendida <= $quantidade_em_estoque) {
            $nova_quantidade = $quantidade_em_estoque - $quantidade_vendida;
            $update = $pdo->prepare("UPDATE medicamentos SET quantidade = :quantidade WHERE id_produto = :id");
            $update->bindValue(':quantidade', $nova_quantidade);
            $update->bindValue(':id', $id_produto);
            $update->execute();

            $mensagem = "Registro de Venda realizada com sucesso!";
        } else {
            $mensagem = "Erro: Estoque insuficiente!";
        }
    } else {
        $mensagem = "Medicamento não encontrado!";
    }

    // Redirecionar para a lista de medicamentos com mensagem
    header("Location: Lista de Medicamentos.php?mensagem=" . urlencode($mensagem));
    exit;
}
?>

