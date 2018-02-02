<?php
require_once("session.php");

echo "<h1>DEMONSTRAÇÃO DO E-MAIL</h1>";
// Passando os dados obtidos pelo formulário para as variáveis abaixo
$assunto  = "teste";
$emaildestinatario = 'andersonbrandaolustosa@gmail.com.br';

$arr = $_SESSION['cart_item'];

$name = $_POST['name'];
$business = $_POST['business'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$city = $_POST['city'];
$state = $_POST['state'];
$jotting = $_POST['jotting'];

foreach ($arr as $key => $value) {
  $body .= "<br>";
  $body .= "Código: " . $arr[$key]["code"];
  $body .= "<br>";
  $body .= "Título: " . $arr[$key]["title"];
  $body .= "<br>";
  $body .= "Descrição: " . $arr[$key]["description"];
  $body .= "<br>";
  $body .= "Tamanho: " . $arr[$key]["size"];
  $body .= "<br>";
  $body .= "Impressão: " . $arr[$key]["printing"];
  $body .= "<br>";
  $body .= "Tipo de Impressão: " . $arr[$key]["print_type"];
  $body .= "<br>";
  $body .= "Comentário: " . $arr[$key]["comments"];
  $body .= "<br>";  
  $body .= "Quantidade Mínima: " . $arr[$key]["qtd_min"];
  $body .= "<br>";
  $body .= "Quantidade 1: " . $arr[$key]["quantity1"];
  $body .= "<br>";
  $body .= "Quantidade 2: " . $arr[$key]["quantity2"];
  $body .= "<br>";
  $body .= "Quantidade 3: " . $arr[$key]["quantity3"];
  $body .= "<br>";
  $body .= "Mensagem: " . $arr[$key]["message"];
  $body .= "<br>";
}

$body .= "<hr>";
$body .= "Nome: " . $name;
$body .= "<br>";
$body .= "Nome: " . $business;
$body .= "<br>";
$body .= "Nome: " . $email;
$body .= "<br>";
$body .= "Nome: " . $phone;
$body .= "<br>";
$body .= "Nome: " . $city;
$body .= "<br>";
$body .= "Nome: " . $state;
$body .= "<br>";
$body .= "Nome: " . $jotting;
$body .= "<br>";

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