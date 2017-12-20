<?php
require_once("admin/session.php");

// Passando os dados obtidos pelo formulário para as variáveis abaixo
$assunto  = "teste";
$emaildestinatario = 'andersonbrandaolustosa@gmail.com.br';

$count = 0;

$arr = $_SESSION['cart_item'];

foreach ($arr as $row) {
   
  $body .= "<br>";
  $body .= $_SESSION['cart_item'][$count]["title"];  
  $body .= "<br>";
  $body .= $_SESSION['cart_item'][$count]["code"];
  $body .= "<br>";
  $body .= $_SESSION['cart_item'][$count]["quantity"];
  $body .= "<br>";
  $body .= $_SESSION['cart_item'][$count]["qtd_min"];
  $body .= "<br>"; 

  $count += 1;
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
