<?php
session_start();

if (isset($_GET['id'])) {
    $produto_id = $_GET['id'];

    // Conexão com o banco de dados
    $host = 'localhost';
    $dbname = 'laessencee';
    $username = 'root';
    $password = '';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Erro de conexão: " . $e->getMessage());
    }

    // Verifica se o produto existe na tabela rgt_produto
    $sql = "SELECT * FROM rgt_produto WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$produto_id]);
    $produto = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($produto) {
        // Verifica se o produto já está no carrinho
        $sql = "SELECT * FROM carrinho WHERE produto_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$produto_id]);
        $item_no_carrinho = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($item_no_carrinho) {
            // Se o produto já está no carrinho, atualize a quantidade
            $nova_quantidade = $item_no_carrinho['quantidade'] + 1;
            $sql = "UPDATE carrinho SET quantidade = ? WHERE produto_id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$nova_quantidade, $produto_id]);
        } else {
            // Se o produto não está no carrinho, insira um novo registro
            $sql = "INSERT INTO carrinho (produto_id, quantidade) VALUES (?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$produto_id, 1]);
        }
    }
}

header("Location: /NovaLA/laessence/loja.php");
exit;
