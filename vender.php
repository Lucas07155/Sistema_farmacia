<?php 
require 'conexao.php';
if (isset($_POST['vender'])) {
    $idProduto = $_POST['id_produto'];
    $quantidadeVendida = $_POST['quantidade'];
    $sql = $pdo->prepare("SELECT quantidade FROM medicamentos WHERE id_produto = :id_produto");
    $sql->bindValue(':id_produto', $idProduto);
    $sql->execute();
    $produto = $sql->fetch(PDO::FETCH_ASSOC);
    if ($produto) {
        $quantidadeEstoque = $produto['quantidade'];
        if ($quantidadeVendida <= $quantidadeEstoque) {
            $novaQuantidade = $quantidadeEstoque - $quantidadeVendida;
            $sql = $pdo->prepare("UPDATE medicamentos SET quantidade = :novaQuantidade WHERE id_produto = :id_produto");
            $sql->bindValue(':novaQuantidade', $novaQuantidade);
            $sql->bindValue(':id_produto', $idProduto);
            $sql->execute();
            $sql = $pdo->prepare("INSERT INTO vendas (id_produto, quantidade_vendida) VALUES (:id_produto, :quantidade_vendida)");
            $sql->bindValue(':id_produto', $idProduto);
            $sql->bindValue(':quantidade_vendida', $quantidadeVendida);
            $sql->execute();
            header("Location:  lista_medicamentos.php?status=success");
            exit;
        } else {
            header("Location:relatorio_vendas.php?erro=" . urlencode(" Estoque insuficiente!"));
            exit;
        }
    } else {
        header ("Location:relatorio_vendas.php?erro=" . urlencode("Produto não encontrado!"));
        exit;
    }
}