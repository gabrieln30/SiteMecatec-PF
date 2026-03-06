<?php
session_start();
require_once 'Config.php';

$valor = isset($_GET['valor']) ? floatval($_GET['valor']) : (isset($_SESSION['valor_total']) ? floatval($_SESSION['valor_total']) : 0);
$mensagem = '';
$payload = '';
$itens = isset($_SESSION['carrinho']) ? $_SESSION['carrinho'] : [];
$descricaoPix = '';
if (!empty($itens)) {
    $descArr = [];
    foreach ($itens as $item) {
        $descArr[] = $item['qtd'] . 'x ' . $item['nome'];
    }
    $descricaoPix = implode(', ', $descArr);
}
if ($valor > 0) {
    $payload = Config::gerarPayloadPix(number_format($valor, 2, '.', ''), $descricaoPix);
    Config::gerarQRCode($payload, 'qrcode_pix.png');
    $mensagem = "QR Code gerado para o valor R$ " . number_format($valor, 2, ',', '.');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Pagamento via Pix</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: rgb(58, 2, 2);
            font-family: 'Poppins', sans-serif;
            background-image: url('../Imagens/motor.jpg.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            min-height: 100vh;
        }
        .pagamento-container {
            background: rgba(0,0,0,0.85);
            max-width: 400px;
            margin: 80px auto;
            padding: 32px 32px 24px 32px;
            border-radius: 12px;
            box-shadow: 0 0 16px #0000005f;
            color: #fff;
            text-align: center;
        }
        .pagamento-container h2 {
            margin-bottom: 24px;
            font-weight: 700;
            color: #fff;
        }
        .pagamento-container img {
            margin: 18px 0 8px 0;
            max-width: 220px;
            border-radius: 8px;
            box-shadow: 0 0 8px #0000007a;
            background: #fff;
            padding: 8px;
        }
        .pagamento-container a {
            color: #fff;
            text-decoration: underline;
            display: inline-block;
            margin-top: 18px;
        }
        .pagamento-container p {
            margin: 0 0 12px 0;
        }
        .mensagem-erro {
            color: #ff6b6b;
        }
        .mensagem-sucesso {
            color: #4caf50;
        }
    </style>
</head>
<body>
    <div class="pagamento-container">
        <h2>Pagamento via Pix</h2>
        <?php if (!empty($mensagem)): ?>
            <?php if (!empty($itens)): ?>
                <div style="margin:18px 0 18px 0;text-align:left;background:rgba(255,255,255,0.07);padding:12px 14px 8px 14px;border-radius:8px;">
                    <label style="font-weight:700;font-size:17px;color:#fff;">Itens da compra:</label>
                    <ul style="padding-left:18px;margin:8px 0 0 0;">
                        <?php foreach($itens as $item): ?>
                            <li style="margin-bottom:4px;font-size:15px;">
                                <span style="font-weight:600; color:#ffe082;">x<?= $item['qtd'] ?></span> - 
                                <span style="color:#fff;"><?= htmlspecialchars($item['nome']) ?></span> 
                                <span style="color:#b2ff59;">(R$ <?= number_format($item['preco'],2,',','.') ?>)</span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <p class="mensagem-sucesso" style="margin-top:10px;"><?= $mensagem ?></p>
            <img src="qrcode_pix.png?ts=<?= time() ?>" alt="QR Code Pix">
            <div style="margin:18px 0 8px 0;">
                <label style="font-weight:600;">Pix copia e cola:</label>
                <textarea readonly style="width:100%;min-height:60px;resize:vertical;font-size:13px;padding:8px;border-radius:6px;margin-top:6px;"><?= htmlspecialchars($payload) ?></textarea>
            </div>
        <?php else: ?>
            <p class="mensagem-erro">Valor inválido para gerar o QR Code.</p>
        <?php endif; ?>
        <a href="../public/Mecatec.php">Voltar para a loja</a>
    </div>
</body>
</html>
