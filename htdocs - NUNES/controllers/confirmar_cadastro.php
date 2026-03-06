<?php
session_start(); 


$host = 'localhost';
$port = '5432';
$dbname = 'mecanica';
$user = 'postgres';
$password = 'admin';

$mensagem = '';
$email_usuario = $_GET['email'] ?? '';
$codigo_digitado = ''; 

$codigo_salvo = $_SESSION['codigo_temp'] ?? null;
$email_salvo = $_SESSION['email_temp'] ?? null;
$nome_salvo = $_SESSION['nome_temp'] ?? null;
$senha_hash_salva = $_SESSION['senha_hash_temp'] ?? null;
$cpf_salvo = $_SESSION['cpf_temp'] ?? null;
$telefone_salvo = $_SESSION['telefone_temp'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo_form = $_POST['codigo'] ?? '';
    $codigo_digitado = $codigo_form; 

    if (
        $codigo_salvo && 
        $codigo_form === $codigo_salvo && 
        $email_usuario === $email_salvo &&
        $senha_hash_salva 
    ) {
        
        $conn_string = "host=$host port=$port dbname=$dbname user=$user password=$password";
        $conn = pg_connect($conn_string);

        if (!$conn) {
            $mensagem = 'ERRO FATAL: Falha ao conectar ao banco de dados para finalizar o cadastro.';
        } else {
            $result = pg_query_params(
                $conn,
                'INSERT INTO cliente (nome_cliente, email_cliente, senha_cliente, cpf_cliente, telefone_cliente) 
                 VALUES ($1, $2, $3, $4, $5)',
                array($nome_salvo, $email_salvo, $senha_hash_salva, $cpf_salvo, $telefone_salvo)
            );

            if ($result) {
                $mensagem = 'Sucesso! Seu cadastro foi confirmado e finalizado.';
                unset($_SESSION['codigo_temp'], $_SESSION['email_temp'], $_SESSION['nome_temp'], $_SESSION['senha_hash_temp'], $_SESSION['cpf_temp'], $_SESSION['telefone_temp']);
                pg_close($conn);
            } else {
                $mensagem = 'Erro ao finalizar o cadastro no banco de dados. O código estava correto, mas a inserção falhou.';
                pg_close($conn);
            }
        }
        
    } else {
        $mensagem = 'Código de verificação inválido. Por favor, verifique o código enviado para o seu e-mail e tente novamente.';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Cadastro</title>
    <link rel="stylesheet" href="Style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body { background-color: rgb(58, 2, 2); font-family: 'Poppins', sans-serif; background-image: url('../Imagens/motor.jpg.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center; }
        .cadastro-container { background: rgba(0,0,0,0.8); max-width: 400px; margin: 80px auto; padding: 32px; border-radius: 12px; color: #fff; box-shadow: 0 0 16px #0000005f; }
        .cadastro-container h2 { text-align: center; margin-bottom: 24px; font-weight: 700; color: #fff; }
        .cadastro-container input[type="text"] { width: 100%; padding: 10px; margin-bottom: 18px; border: none; border-radius: 6px; background: #222; color: #fff; text-align: center; font-size: 1.2em; }
        .cadastro-container button { width: 100%; padding: 12px; background: transparent; border: 1px solid #fff; color: #fff; font-size: 18px; border-radius: 6px; cursor: pointer; transition: 0.3s; }
        .cadastro-container button:hover { background: #fff; color: #000; }
        .mensagem { color: #ff6b6b; text-align: center; margin-bottom: 12px; }
        .mensagem-sucesso { color: #4caf50; text-align: center; margin-bottom: 12px; }
    </style>
</head>
<body>
    <div class="cadastro-container">
        <h2>Verificação de E-mail</h2>
        
        <?php if ($mensagem): ?>
            <?php if (strpos($mensagem, 'Sucesso!') !== false): ?>
                <div class="mensagem-sucesso"><?= $mensagem ?></div>
                <p style="text-align:center;"><a href="../models/MecatecLogin.php" style="color:#fff; text-decoration:underline;">Ir para o Login</a></p>
            <?php else: ?>
                <div class="mensagem"><?= $mensagem ?></div>
                <p style="text-align:center;"><a href="../models/MecatecCadastro.php" style="color:#fff; text-decoration:underline; font-size:0.9em;">Voltar ao Início do Cadastro</a></p>
            <?php endif; ?>
        <?php elseif ($email_usuario): ?>
             <p style="text-align:center; margin-bottom: 20px;">Enviamos um código de 6 dígitos para **<?= htmlspecialchars($email_usuario) ?>**.</p>
            <form method="POST">
                <input type="hidden" name="email" value="<?= htmlspecialchars($email_usuario) ?>">
                
                <label for="codigo">Código de Verificação</label>
                <input type="text" id="codigo" name="codigo" required maxlength="6" pattern="\d{6}" value="<?= htmlspecialchars($codigo_digitado) ?>">

                <button type="submit">Confirmar Código</button>
            </form>
            <p style="text-align:center; margin-top: 15px;"><a href="../models/MecatecCadastro.php" style="color:#aaa; text-decoration:underline; font-size:0.9em;">Cancelar e Refazer Cadastro</a></p>
        <?php else: ?>
            <div class="mensagem">Acesso inválido. <a href="../models/MecatecCadastro.php" style="color:#fff; text-decoration:underline;">Voltar ao Cadastro</a></div>
        <?php endif; ?>
    </div>
</body>
</html>