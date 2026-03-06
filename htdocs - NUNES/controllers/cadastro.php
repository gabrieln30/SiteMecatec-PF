<?php
$host = 'localhost';
$port = '5432';
$dbname = 'mecanica';
$user = 'postgres';
$password = 'admin';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if ($nome && $email && $senha) {
        $conn_string = "host=$host port=$port dbname=$dbname user=$user password=$password";
        $conn = pg_connect($conn_string);

        if (!$conn) {
            $erro = 'Erro ao conectar ao banco de dados.';
        } else {
            $check_email = pg_query_params(
                $conn,
                'SELECT 1 FROM cliente WHERE email_cliente = $1',
                array($email)
            );

            if (pg_num_rows($check_email) > 0) {
                $erro = 'E-mail já cadastrado.';
                $erro = htmlspecialchars($erro);                
            } else {
                $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
                $result = pg_query_params(
                    $conn,
                    'INSERT INTO cliente (nome_cliente, email_cliente, senha_cliente) VALUES ($1, $2, $3)',
                    array($nome, $email, $senha_hash)
                );
                pg_close($conn);

                if ($result) {
                    header('Location: ../models/MecatecCadastro.php?sucesso=1');
                    exit();
                } else {
                    $erro = 'Erro ao cadastrar usuário.';
                }
            }
        }
    } else {
        $erro = 'Preencha todos os campos!';
    }
}
?>
