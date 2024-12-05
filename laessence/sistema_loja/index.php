<?php
// Conexão com o banco de dados
$host = 'localhost';      // Endereço do servidor do banco de dados
$dbname = 'laessencee';   // Nome do banco de dados
$username = 'root';        // Nome de usuário do banco de dados
$password = '';            // Senha do banco de dados

try {
    // Criando uma conexão PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}

// Consulta para buscar todos os produtos
$sql = "SELECT * FROM rgt_produto";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Produtos</title>
    <style>
        /* Estilos gerais para a página */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 90%;
            margin: 20px auto;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        /* Estilo para os links no topo (Registrar Produto e Carrinho de Compras) */
        .top-links {
            position: absolute;
            top: 10px;
            left: 0;
            right: 0;
            display: flex;
            justify-content: space-between;
            padding: 0 20px;
        }

        /* Estilo específico para o botão Registrar Produto */
        .link {
            padding: 8px 16px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .link:hover {
            background-color: #0056b3;
        }

        /* Estilo específico para o botão Carrinho de Compras */
        .carrinho-btn {
            padding: 10px 18px;
            background-color: #28a745;
            color: #fff;
            text-decoration: none;
            border-radius: 50px;
            border: 2px solid #218838;
            font-weight: bold;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
        }
        .carrinho-btn:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        /* Estilo da grid de produtos */
        .produtos {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }
        .produto {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .produto img {
            max-width: 100%;
            height: auto;
            border-radius: 4px;
        }
        .produto h3 {
            font-size: 20px;
            margin: 10px 0;
        }
        .produto p {
            color: #777;
        }
        .produto .preco {
            font-size: 18px;
            font-weight: bold;
            color: #28a745;
            margin: 10px 0;
        }
        .produto .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .produto .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Nossos Produtos</h2>

        <!-- Links para Registrar Produto e Carrinho de Compras -->
        <div class="top-links">
            <a href="registrar_pdt.html" class="link">Registrar Produto</a>
            <a href="carrinho.php" class="carrinho-btn">Carrinho de Compras</a>
        </div>

        <!-- Exibição dos produtos -->
        <div class="produtos">
            <?php foreach ($produtos as $produto): ?>
                <div class="produto">
                    <?php if ($produto['imagem']): ?>
                        <img src="<?php echo $produto['imagem']; ?>" alt="<?php echo $produto['nome']; ?>">
                    <?php else: ?>
                        <img src="sem-imagem.jpg" alt="Sem Imagem">
                    <?php endif; ?>
                    
                    <h3><?php echo $produto['nome']; ?></h3>
                    <p><?php echo substr($produto['descricao'], 0, 100) . '...'; ?></p>
                    <div class="preco">R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></div>

                    <!-- Botão Adicionar ao Carrinho -->
                    <a href="adicionar_ao_carrinho.php?id=<?php echo $produto['id']; ?>" class="btn">Adicionar ao Carrinho</a>

                    <a href="detalhes_produto.php?id=<?php echo $produto['id']; ?>" class="btn">Ver Detalhes</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
