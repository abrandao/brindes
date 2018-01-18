<?php
require_once("admin/session.php");

// Passando os dados obtidos pelo formulário para as variáveis abaixo
$assunto  = "teste";
$emaildestinatario = 'andersonbrandaolustosa@gmail.com.br';

$arr = $_SESSION['cart_item'];

foreach ($arr as $key => $value) {
  $body .= "<br>";
  $body .=  $arr[$key]["title"];
  $body .= "<br>";
  $body .= $arr[$key]["code"];
  $body .= "<br>";
  $body .= $arr[$key]["quantity"];
  $body .= "<br>";
  $body .= $arr[$key]["qtd_min"];
  $body .= "<br>";
}

//echo apenas como forma de demonstrar o conteúdo do email armazenado na varíável.
echo $body;

/* Montando a mensagem a ser enviada no corpo do e-mail. */

// O remetente deve ser um e-mail do seu domínio conforme determina a RFC 822.
// O return-path deve ser ser o mesmo e-mail do remetente.
$headers = "MIME-Version: 1.1\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";
$headers .= "From: $emailremetente\r\n"; // remetente
$headers .= "Return-Path: $emaildestinatario \r\n"; // return-path
$envio = mail($emaildestinatario, $assunto, $body, $headers); 

if($envio)
echo "<script>location.href='index.php'</script>"; // Página que será redirecionada