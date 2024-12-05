<?php
// Conexão com o banco de dados
$host = 'localhost';      // Endereço do servidor do banco de dados
$dbname = 'laessencee';   // Nome do banco de dados
$username = 'root';        // Nome de usuário do banco de dados
$password = '';            // Senha do banco de dados

try {
    // Criando uma conexão PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Configura o PDO para lançar exceções em caso de erro
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $estoque = $_POST['estoque'];
    $categoria = $_POST['categoria'];

    // Tratamento do upload da imagem
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        $imagem = $_FILES['imagem'];
        $nomeImagem = uniqid() . '-' . $imagem['name'];  // Nome único para a imagem
        $caminhoImagem = 'uploads/' . $nomeImagem;       // Caminho onde a imagem será salva
        
        // Move a imagem para a pasta "uploads"
        if (!move_uploaded_file($imagem['tmp_name'], $caminhoImagem)) {
            die("Erro ao fazer upload da imagem.");
        }
    } else {
        $caminhoImagem = null;  // Caso não haja imagem, define como null
    }

    // Inserção dos dados no banco de dados
    $sql = "INSERT INTO rgt_produto (nome, descricao, preco, estoque, categoria, imagem) 
            VALUES (:nome, :descricao, :preco, :estoque, :categoria, :imagem)";
    
    $stmt = $pdo->prepare($sql);
    
    // Bind dos valores
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':preco', $preco);
    $stmt->bindParam(':estoque', $estoque);
    $stmt->bindParam(':categoria', $categoria);
    $stmt->bindParam(':imagem', $caminhoImagem);
    
    // Executa a consulta
    if ($stmt->execute()) {
header("Location: \NovaLA/laessence/loja.php");

    } else {
        echo "Erro ao cadastrar o produto.";
    }
}
?>