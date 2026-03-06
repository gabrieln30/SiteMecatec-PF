<?php
session_start(); 
require '../services/email.php'; 

// === CONFIGURAÇÕES DO BANCO DE DADOS (POSTGRESQL) ===
$host = 'localhost';
$port = '5432';
$dbname = 'mecanica';
$user = 'postgres';
$password = 'admin';
// ===================================================

$erro = null;
$nome = $email = $cpf = $telefone = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $cpf = $_POST['cpf'] ?? '';
    $telefone = $_POST['telefone'] ?? '';

    if ($nome && $email && $senha) {
        // Conexão temporária para verificar duplicidade
        $conn_string = "host=$host port=$port dbname=$dbname user=$user password=$password";
        $conn = pg_connect($conn_string);
        
        if (!$conn) {
             $erro = 'Erro ao conectar ao banco de dados para verificação inicial.';
        } else {
            // 1. VERIFICAÇÃO DE DUPLICIDADE (E-MAIL, CPF, TELEFONE)
            
            $query_verifica = '
                SELECT 
                    CASE WHEN email_cliente = $1 THEN \'email\' ELSE 
                    CASE WHEN cpf_cliente = $2 THEN \'cpf\' ELSE 
                    CASE WHEN telefone_cliente = $3 THEN \'telefone\' 
                    ELSE NULL END END END AS campo_duplicado
                FROM cliente 
                WHERE email_cliente = $1 OR cpf_cliente = $2 OR telefone_cliente = $3
            ';
            
            $result_verifica = pg_query_params($conn, $query_verifica, array($email, $cpf, $telefone));
            
            if ($result_verifica && pg_num_rows($result_verifica) > 0) {
                $duplicado = pg_fetch_assoc($result_verifica);
                $campo = $duplicado['campo_duplicado'];
                
                // Mensagens específicas de erro
                if ($campo == 'email') {
                    $erro = 'Erro: Já existe um usuário cadastrado com este e-mail.';
                } elseif ($campo == 'cpf') {
                    $erro = 'Erro: Já existe um usuário cadastrado com este CPF.';
                } elseif ($campo == 'telefone') {
                    $erro = 'Erro: Já existe um usuário cadastrado com este telefone.';
                } else {
                    $erro = 'Erro: Dados de contato duplicados.';
                }
                
            } else {
                $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
                $codigo_verificacao = str_pad(mt_rand(100000, 999999), 6, '0', STR_PAD_LEFT);
           
                $_SESSION['codigo_temp'] = $codigo_verificacao;
                $_SESSION['email_temp'] = $email;
                $_SESSION['nome_temp'] = $nome;
                $_SESSION['senha_hash_temp'] = $senha_hash; 
                $_SESSION['cpf_temp'] = $cpf;
                $_SESSION['telefone_temp'] = $telefone;
                
                // Tenta enviar o e-mail
                $email_enviado = enviarCodigoVerificacao($email, $nome, $codigo_verificacao); 

                if ($email_enviado['success']) {
                    header("Location: ../controllers/confirmar_cadastro.php?email=" . urlencode($email));
                    pg_close($conn);
                    exit();
                } else {
                    $erro = 'Falha no envio do e-mail. ' . $email_enviado['message'];
                    unset($_SESSION['codigo_temp']);
                }
            }
            pg_close($conn); // Fecha a conexão após a verificação/sucesso
        }
    } else {
        $erro = 'Preencha todos os campos!';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Mecatec</title>
    <link rel="stylesheet" href="Style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body { background-color: rgb(58, 2, 2); font-family: 'Poppins', sans-serif; background-image: url('../Imagens/motor.jpg.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center; }
        .cadastro-container { background: rgba(0,0,0,0.8); max-width: 400px; margin: 80px auto; padding: 32px 32px 24px 32px; border-radius: 12px; box-shadow: 0 0 16px #0000005f; color: #fff; }
        .cadastro-container h2 { text-align: center; margin-bottom: 24px; font-weight: 700; color: #fff; }
        .cadastro-container label { display: block; margin-bottom: 8px; font-weight: 500; }
        .cadastro-container input[type="text"], .cadastro-container input[type="email"], .cadastro-container input[type="password"] { width: 100%; padding: 10px; margin-bottom: 18px; border: none; border-radius: 6px; background: #222; color: #fff; }
        .cadastro-container button { width: 100%; padding: 12px; background: transparent; border: 1px solid #fff; color: #fff; font-size: 18px; border-radius: 6px; cursor: pointer; transition: 0.3s; }
        .cadastro-container button:hover { background: #fff; color: #000; }
        .mensagem-erro { color: #ff6b6b; text-align: center; margin-bottom: 12px; }
        .mensagem-sucesso { color: #4caf50; text-align: center; margin-bottom: 12px; }
    </style>
</head>
<body>
    <div class="cadastro-container">
        <h2>Cadastro de Usuário</h2>
        
        <?php if($erro): ?>
            <div class="mensagem-erro"><?= $erro ?></div>
        <?php endif; ?>

        <form method="POST" >
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" required value="<?= htmlspecialchars($nome) ?>">

            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" required value="<?= htmlspecialchars($email) ?>">

            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" required>

            <label for="cpf">CPF</label>
            <input type="text" id="cpf" name="cpf" required value="<?= htmlspecialchars($cpf) ?>">

            <label for="telefone">Telefone</label>
            <input type="text" id="telefone" name="telefone" required value="<?= htmlspecialchars($telefone) ?>">

            <button type="submit">Cadastre-se </button>
        </form>
        
        <form method="POST" action="../models/MecatecLogin.php">
            <button type="submit" style="width:100%;background:transparent;border:1px solid #fff;color:#fff;font-size:18px;border-radius:6px;cursor:pointer;transition:0.3s;margin-top:18px;">Faça o Login</button>
        </form>
    </div>
</body>
</html>