<!DOCTYPE html>
<head>
<title>Bocchi Eventos</title>
</head>
<body>
<?php

// busca a biblioteca recaptcha
require_once "recaptchalib.php";
// sua chave secreta
$secret = "6LdoDxATAAAAAKOJLiqSfG1P_9UfBGWBVNPBzpKm";
$lang = "en";
// resposta vazia
$response = null;
 
// verifique a chave secreta
$reCaptcha = new ReCaptcha($secret);

// se submetido, verifique a resposta
if ($_POST["g-recaptcha-response"]) {
$response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}
      if ($response != null && $response->success) {
        echo "Olá, " . $_POST["name"] . " (" . $_POST["email"] . "),";
      } else {}


//Importamos las variables del formulario de contacto
@$nome = addslashes($_POST['name']);
@$telefone = addslashes($_POST['telephone']);
@$email = addslashes($_POST['email']);
@$titulo = addslashes($_POST['request']);
@$comentario = addslashes($_POST['comment']);
 
//Preparamos el mensaje de contacto
$cabecalho = "From: $email\n"; //La persona que envia el correo
$assunto = "$titulo"; //asunto aparecera en la bandeja del servidor de correo
$email_to = "contato@bocchieventos.com.br"; //cambiar por tu email
$conteudo = "$nome\n"
. "\n"
. "Telefone: $telefone\n"
. "Email: $email\n"
. "Assunto: $titulo\n"
. "Mensagem: $comentario\n"
. "\n";
 
//Enviamos el mensaje y comprobamos el resultado
if (@mail($email_to, $asunto ,$conteudo ,$cabecalho)) {
 
//Si el mensaje se envía muestra una confirmación
die("Obrigado, sua mensagem foi enviada corretamente.");
}else{
 
//Si el mensaje no se envía muestra el mensaje de error
die("Error: Sua mensagem nao foi enviada, tente mais tarde");
}
?>
</body>
</html>