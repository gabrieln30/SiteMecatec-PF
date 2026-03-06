<?php
require '../src/Exception.php';
require '../src/PHPMailer.php';
require '../src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


function enviarCodigoVerificacao(string $toEmail, string $toName, string $codigo): array {
    $smtpUser = 'filavirtualetesc@gmail.com'; 
    $smtpPass = 'hkilfzxendhkozmg';         
    $fromEmail = $smtpUser;
    $fromName = 'Mecatec Cadastro';
    

    if (!filter_var($toEmail, FILTER_VALIDATE_EMAIL)) {
        return ['success'=>false, 'message'=>'E-mail inválido: '.$toEmail];
    }

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $smtpUser;
        $mail->Password = $smtpPass;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        
        $mail->SMTPOptions = [
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            ]
        ];

        $mail->setFrom($fromEmail, $fromName);
        $mail->addAddress($toEmail, $toName);

        $mail->isHTML(true);
        $mail->Subject = 'Mecatec: Seu Código de Verificação de Cadastro';
        $mail->Body = '<div style="background:#f6f7fb;padding:32px 20px;border-radius:12px;color:#222;font-family:Poppins,sans-serif;max-width:480px;margin:auto;box-shadow:0 0 16px #00000022">
            <h2 style="color:#420902;margin-top:0;text-align:center;">Confirmação de Cadastro Mecatec</h2>
            <p style="font-size:1.05rem;margin:20px 0 12px 0">Olá, ' . htmlspecialchars($toName) . '!</p>
            <p style="margin:8px 0 24px 0">Para confirmar seu cadastro, utilize o código de verificação abaixo:</p>
            
            <div style="background:#420902;color:#ffffff;padding:15px 20px;border-radius:8px;font-size:1.8rem;font-weight:700;text-align:center;letter-spacing:5px;">
                ' . htmlspecialchars($codigo) . '
            </div>
            
            <p style="margin-top:24px;font-size:.95rem;color:#666">Insira este código na tela de confirmação.</p>
            
            <hr style="border:none;border-top:1px solid #ececf6;margin:28px 0 8px 0">
            <div style="font-size:.9rem;color:#8d8fa3">Equipe Mecatec</div>
        </div>';

        $mail->send();
        return ['success'=>true, 'message'=>'E-mail de verificação enviado com sucesso.'];
    } catch (Exception $e) {
        return ['success'=>false, 'message'=>'Erro ao enviar e-mail: '.$mail->ErrorInfo];
    }
}
?>