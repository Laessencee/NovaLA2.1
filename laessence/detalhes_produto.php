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

// Verifica se o ID do produto foi passado via URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepara a consulta para buscar o produto pelo ID
    $sql = "SELECT * FROM rgt_produto WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    // Verifica se o produto foi encontrado
    if ($stmt->rowCount() > 0) {
        $produto = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        die("Produto não encontrado.");
    }
} else {
    die("ID de produto inválido.");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Produto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #FFFAF0;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 90%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #895829;
        }
        .produto {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .produto img {
            max-width: 300px;
            height: auto;
            border-radius: 8px;
        }
        .detalhes {
            flex: 1;
        }
        .detalhes h3 {
            font-size: 24px;
            margin: 0;
            color: #895829;
        }
        .detalhes p {
            margin: 10px 0;
            color: #555;
        }
        .detalhes .preco {
            font-size: 22px;
            font-weight: bold;
            color: #678362;
            margin: 15px 0;
        }
        .detalhes .estoque {
            font-size: 16px;
            color: #333;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #678362;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
        .btn:hover {
            background-color: #895829;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Detalhes do Produto</h2>
        <div class="produto">
            <?php if ($produto['imagem']): ?>
                <img src="<?php echo $produto['imagem']; ?>" alt="<?php echo $produto['nome']; ?>">
            <?php else: ?>
                <img src="sem-imagem.jpg" alt="Sem Imagem">
            <?php endif; ?>
            <div class="detalhes">
                <h3><?php echo $produto['nome']; ?></h3>
                <p><?php echo $produto['descricao']; ?></p>
                <div class="preco">R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></div>
                <div class="estoque">Estoque: <?php echo $produto['estoque']; ?> unidades</div>
                <div class="categoria">Categoria: <?php echo $produto['categoria']; ?></div>
                <a href="loja.php" class="btn">Voltar para a Loja</a>
            </div>
        </div>
    </div>
</body>
</html>
