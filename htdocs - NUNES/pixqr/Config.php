<?php
require_once 'vendor/autoload.php';
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

class Config {

    private const CHAVE_PIX = '+5521966819449';
    private const NOME_RECEBEDOR = 'CARLOS EDUARDO';
    private const CIDADE_RECEBEDOR = 'RIO DE JANEIRO';

    public static function gerarPix(string $valor): void {
        $payload = self::gerarPayloadPix($valor);
        self::gerarQRCode($payload, 'qrcode_pix.png');
        echo "<pre>Payload gerado:\n" . $payload . "</pre>";
    }

    public static function gerarPayloadPix(string $valor, string $descricao = ''): string {
        $chave = self::CHAVE_PIX;
        $nome = strtoupper(self::removerAcentos(self::NOME_RECEBEDOR));
        $cidade = strtoupper(self::removerAcentos(self::CIDADE_RECEBEDOR));
        if(strlen($nome) > 25) $nome = substr($nome, 0, 25);
        if(strlen($cidade) > 15) $cidade = substr($cidade, 0, 15);
        $gui = '0014BR.GOV.BCB.PIX';
        $chavePixField = sprintf('01%02d%s', strlen($chave), $chave);
        $merchantAccountInfo = '26' . sprintf('%02d', strlen($gui.$chavePixField)) . $gui . $chavePixField;
        $valorCampo = sprintf('54%02d%s', strlen($valor), $valor);
        // Remove campo de descrição do payload Pix, usa campo adicional padrão
        $adicional = '62070503***';
        $payloadSemCRC = '000201' . $merchantAccountInfo . '52040000' . '5303986' . $valorCampo .
                          '5802BR' . sprintf('59%02d%s', strlen($nome), $nome) .
                          sprintf('60%02d%s', strlen($cidade), $cidade) .
                          $adicional . '6304';
        $crc = self::calcularCRC16($payloadSemCRC);
        return $payloadSemCRC . $crc;
    }

    public static function gerarQRCode(string $texto, string $arquivo): void {
        $options = new QROptions([
            'outputType' => QRCode::OUTPUT_IMAGE_PNG,
            'scale' => 10,
            'imageBase64' => false,
        ]);

        $qrcode = new QRCode($options);
        $imagem = $qrcode->render($texto);

        file_put_contents(__DIR__ . '/' . $arquivo, $imagem);
    }

    public static function removerAcentos(string $texto): string {
        return preg_replace(['/[áàãâä]/u','/[éèêë]/u','/[íìîï]/u','/[óòõôö]/u','/[úùûü]/u','/[ç]/u'],
                            ['a','e','i','o','u','c'], mb_strtolower($texto));
    }

    public static function calcularCRC16(string $payload): string {
        $pol = 0x1021;
        $crc = 0xFFFF;
        foreach(str_split($payload) as $c){
            $crc ^= (ord($c) << 8);
            for($i = 0; $i < 8; $i++){
                if($crc & 0x8000){
                    $crc = ($crc << 1) ^ $pol;
                } else {
                    $crc <<= 1;
                }
                $crc &= 0xFFFF;
            }
        }
        return strtoupper(sprintf('%04X', $crc));
    }
}
?>
