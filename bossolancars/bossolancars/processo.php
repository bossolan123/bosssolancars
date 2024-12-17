<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $acao = $_POST['acao'];

    if ($acao == 'inserir') {
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $imagem = $_POST['imagem'];

        $sql = "INSERT INTO carros (nome, descricao, imagem) VALUES ('$nome', '$descricao', '$imagem')";
        $conn->query($sql);
    } elseif ($acao == 'deletar') {
        $id = $_POST['id'];
        $sql = "DELETE FROM carros WHERE id = $id";
        $conn->query($sql);
    }
}

header('Location: admin.php');
?>