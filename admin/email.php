<?php
require_once("session.php");

// Passando os dados obtidos pelo formulário para as variáveis abaixo

$arr = $_SESSION['cart_item'];

$name = $_POST['name'];
$business = $_POST['business'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$city = $_POST['city'];
$state = $_POST['state'];
$jotting = $_POST['jotting'];

$assunto  = "Orçamento: " . $name;
$emaildestinatario = 'vendas@epontual.com.br';

$body .= "<hr>";
$body .= "INFORMAÇÕES DO REQUISITANTE:";
$body .= "<br>";
$body .= "<br>";
$body .= "Nome: " . $name;
$body .= "<br>";
$body .= "Empresa: " . $business;
$body .= "<br>";
$body .= "E-mail: " . $email;
$body .= "<br>";
$body .= "Telefone: " . $phone;
$body .= "<br>";
$body .= "Cidade: " . $city;
$body .= "<br>";
$body .= "Estado: " . $state;
$body .= "<br>";
$body .= "Anotações: " . $jotting;
$body .= "<br>";

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

/* Montando a mensagem a ser enviada no corpo do e-mail. */
// O remetente deve ser um e-mail do seu domínio conforme determina a RFC 822.
// O return-path deve ser ser o mesmo e-mail do remetente.
$headers = "MIME-Version: 1.1\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";
$headers .= "From: $email\r\n"; // remetente
$headers .= "Return-Path: $emaildestinatario \r\n"; // return-path
$envio = mail($emaildestinatario, $assunto, $body, $headers); 

if($envio)
echo "<script>location.href='index.php'</script>"; // Página que será redirecionada

?>

<h3 align="center">OBRIGADO!</h3>
<p align="center">Sua solicitação foi enviada, em breve, entraremos em contato.</p>