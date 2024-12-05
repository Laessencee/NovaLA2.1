<?php
// Inclui o arquivo de conexão com o banco de dados
include 'conect.php';

// Verifica se o formulário foi enviado via método POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recebe os dados do formulário
    $nome = $_POST['nome'] ?? ''; // Verifica se 'nome' foi enviado
    $email = $_POST['email'] ?? ''; // Verifica se 'email' foi enviado
    $senha = isset($_POST['senha']) ? password_hash($_POST['senha'], PASSWORD_DEFAULT) : ''; // Criptografa a senha

    // Verifica se os campos não estão vazios
    if (!empty($nome) && !empty($email) && !empty($senha)) {
        // Prepara o comando SQL para inserir os dados
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $nome, $email, $senha);

        // Executa e verifica se o cadastro foi bem-sucedido
        if ($stmt->execute()) {
            echo "Cadastro realizado com sucesso!";
        } else {
            echo "Erro ao cadastrar: " . $stmt->error;
        }

        // Fecha a conexão
        $stmt->close();
        $conn->close();
    } else {
        echo "Por favor, preencha todos os campos.";
    }
}
?>
