﻿<!DOCTYPE html>
<head>
<title>Bocchi Eventos</title>
</head>
<body>
<?php
//Importamos las variables del formulario de contacto
@$nome = addslashes($_POST['namee']);
@$telefone = addslashes($_POST['telephonee']);
@$email = addslashes($_POST['emaile']);
@$titulo = addslashes($_POST['tituloe']);
@$comentario = addslashes($_POST['comentariose']);
 
//Preparamos el mensaje de contacto
$cabecalho = "From: $email\n"; //La persona que envia el correo
$assunto = "$titulo"; //asunto aparecera en la bandeja del servidor de correo
$email_to = "sciontechbr@gmail.com"; //cambiar por tu email
$conteudo = "$nome\n"
. "\n"
. "Telefone: $telefone\n"
. "Email: $email\n"
. "Assunto: $titulo\n"
. "Mensagem,: $comentario\n"
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