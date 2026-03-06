<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('Location: ../models/MecatecCadastro.php');
    exit();
}

$host = 'localhost';
$port = '5432';
$dbname = 'mecanica';
$user = 'postgres';
$password = 'admin';

$conn_string = "host=$host port=$port dbname=$dbname user=$user password=$password";
$conn = pg_connect($conn_string);

if (!$conn) {
    die("Erro ao conectar ao banco de dados.");
}

$usuario = null;
$id = $_SESSION['usuario_id'];
$result = pg_query_params(
    $conn,
    'SELECT nome_cliente, email_cliente, senha_cliente, cpf_cliente, telefone_cliente FROM cliente WHERE id_cliente = $1',
    array($id)
);
if ($result && $row = pg_fetch_assoc($result)) {
    $usuario = $row;
} else {
    die("Usuário não encontrado.");
}

$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $novoNome = $_POST['nome'];
    $novoEmail = $_POST['email'];
    $novaSenha = $_POST['senha'];
    $novoCpf = $_POST['cpf'];
    $novoTelefone = $_POST['telefone'];

    if (!empty($novaSenha)) {
        $novaSenhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);
    }

    $senhaParaSalvar = $novaSenhaHash ?? $usuario['senha_cliente'];
    $update = pg_query_params(
        $conn,
        'UPDATE cliente SET nome_cliente = $1, email_cliente = $2, senha_cliente = $3, cpf_cliente = $4, telefone_cliente = $5 WHERE id_cliente = $6',
        array($novoNome, $novoEmail, $senhaParaSalvar, $novoCpf, $novoTelefone, $_SESSION['usuario_id'])
    );
    if ($update) {
        echo "<script>
            document.getElementById('msg').textContent = 'Dados atualizados com sucesso!';
            document.getElementById('msg').style.display = '';
            document.getElementById('nome').value = '".htmlspecialchars($novoNome, ENT_QUOTES)."';
            document.getElementById('email').value = '".htmlspecialchars($novoEmail, ENT_QUOTES)."';
        </script>";
    } else {
        echo "<script>
            document.getElementById('msg').textContent = 'Erro ao atualizar dados!';
            document.getElementById('msg').className = 'msg-erro';
            document.getElementById('msg').style.display = '';
        </script>";
    }
}
pg_close($conn);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Perfil do Usuário - Mecatec</title>
    <link rel="stylesheet" href="Style.css">
    <style>
        body {
            background-color: rgb(58, 2, 2);
            font-family: 'Poppins', sans-serif;
            background-image: url('../Imagens/motor.jpg.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
        .perfil-container {
               background: rgba(0, 0, 0, 0.8);
                max-width: 400px;
                margin: 80px auto;
                padding: 32px 32px 24px 32px;
                border-radius: 12px;
                box-shadow: 0 0 16px #0000005f;
                color: #fff;
        }
        .perfil-container h2 {
            text-align: center;
            margin-bottom: 28px;
            color:rgb(255, 255, 255);
        }
        .perfil-info label {
            font-weight: 600;
            color: #fff;
            display: block;
            margin-top: 18px;
            margin-bottom: 4px;
        }
        .perfil-info input {
            width: 100%;
            padding: 8px 10px;
            border-radius: 6px;
            border: 1px solid #444;
            background: #181b1d;
            color: #fff;
            font-size: 1em;
            margin-bottom: 10px;
        }
        .perfil-info input[readonly] {
            background: #23272a;
            color: #bbb;
            border: 1px solid #333;
        }
        .btn-editar, .btn-salvar, .btn-cancelar {
            background: #b30000;
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 10px 18px;
            font-weight: 700;
            margin-top: 18px;
            margin-right: 8px;
            cursor: pointer;
            transition: background 0.2s;
        }
        .btn-editar:hover, .btn-salvar:hover, .btn-cancelar:hover {
            background: #310404;
        }
        .msg-sucesso {
            color: #4caf50;
            margin-top: 12px;
            text-align: center;
        }
        .msg-erro {
            color: #ff5252;
            margin-top: 12px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="perfil-container">
        <h2>Meu Perfil</h2>
        <form id="perfilForm" method="post" autocomplete="off">
            <div class="perfil-info">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($usuario['nome_cliente'] ?? ''); ?>" readonly required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($usuario['email_cliente'] ?? ''); ?>" readonly required>

                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" placeholder="Digite nova senha para alterar" readonly>

                <label for="cpf">CPF</label>
                <input type="text" id="cpf" name="cpf" value="<?php echo htmlspecialchars($usuario['cpf_cliente'] ?? ''); ?>" readonly>

                <label for="telefone">Telefone</label>
                <input type="text" id="telefone" name="telefone" value="<?php echo htmlspecialchars($usuario['telefone_cliente'] ?? ''); ?>" readonly>
                
            </div>
            <button type="button" class="btn-editar" id="btnEditar">Editar</button>
            <button type="submit" class="btn-salvar" id="btnSalvar" style="display:none;">Salvar</button>
            <button type="button" class="btn-cancelar" id="btnCancelar" style="display:none;">Cancelar</button>
            <div id="msg" class="msg-sucesso" style="display:none;"></div>
        </form>
        <button onclick="window.location.href='../public/Mecatec.php'" style="margin-top:22px;width:100%;background:#23272a;color:#fff;border:1.5px solid #b30000;border-radius:8px;padding:12px 0;font-weight:700;cursor:pointer;transition:background 0.2s;">
        Voltar para o site
        </button>

    </div>
    <script>
    // Alterna entre modo leitura e edição
    const btnEditar = document.getElementById('btnEditar');
    const btnSalvar = document.getElementById('btnSalvar');
    const btnCancelar = document.getElementById('btnCancelar');
    const inputs = document.querySelectorAll('.perfil-info input');
    const msg = document.getElementById('msg');
    btnEditar.addEventListener('click', () => {
        inputs.forEach(inp => inp.removeAttribute('readonly'));
        btnEditar.style.display = 'none';
        btnSalvar.style.display = '';
        btnCancelar.style.display = '';
        msg.style.display = 'none';
    });
    btnCancelar.addEventListener('click', () => {
        window.location.reload();
    });
    </script>

</body>
</html>