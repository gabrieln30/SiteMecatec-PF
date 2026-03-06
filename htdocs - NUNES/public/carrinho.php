<?php
session_start();
$kit = isset($_GET['nome']) ? $_GET : ['nome'=>'Kit Exemplo','preco'=>150];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Carrinho - Mecatec</title>
    <link rel="stylesheet" href="Style.css">
    <style>
        .carrinho-container { max-width: 400px; margin: 60px auto; background: #222; color: #fff; border-radius: 10px; padding: 32px; }
        .carrinho-container h2 { margin-bottom: 18px; }
        .carrinho-container .kit { margin-bottom: 18px; }
        .carrinho-container button { width: 48%; margin: 8px 1%; }
    </style>
</head>
<body>
    <div class="carrinho-container">
        <h2>Seu Carrinho</h2>
        <div class="kit">
            <strong><?php echo htmlspecialchars($kit['nome']); ?></strong><br>
            <span>Preço: R$ <?php echo number_format($kit['preco'],2,',','.'); ?></span>
        </div>
        <form method="POST" action="finalizar_compra.php">
            <input type="hidden" name="nome" value="<?php echo htmlspecialchars($kit['nome']); ?>">
            <input type="hidden" name="preco" value="<?php echo htmlspecialchars($kit['preco']); ?>">
            <button type="submit" name="pagamento" value="pix">Pagar com Pix</button>
            <button type="submit" name="pagamento" value="boleto">Pagar com Boleto</button>
        </form>
    </div>
</body>
</html>