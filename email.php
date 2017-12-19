<?php
require_once("admin/session.php");
var_dump($_SESSION["cart_item"]);

// Passando os dados obtidos pelo formulário para as variáveis abaixo
$assunto  = "teste";
$emaildestinatario = 'andersonbrandaolustosa@gmail.com.br'; 
// Digite seu e-mail aqui, lembrando que o e-mail deve estar em seu servidor web

/*
$plano1   	   = $_POST['radio1'];
$nome   	   = $_POST['nome'];
$email          = $_POST['email'];
$genero   	   = $_POST['genero'];
$nascimento          = $_POST['nascimento'];
$cpf          = $_POST['cpf'];
$cep      	   = $_POST['cep'];
$endereco          = $_POST['endereco'];
$numero          = $_POST['numero'];
$municipio      	   = $_POST['municipio'];
$estado        = $_POST['estado'];
$telefone          = $_POST['telefone'];
$placa      	   = $_POST['placa'];
*/

 
/* Montando a mensagem a ser enviada no corpo do e-mail. */
$mensagemHTML = $_SESSION['cart_item'];



// O remetente deve ser um e-mail do seu domínio conforme determina a RFC 822.
// O return-path deve ser ser o mesmo e-mail do remetente.
$headers = "MIME-Version: 1.1\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";
$headers .= "From: $emailremetente\r\n"; // remetente
$headers .= "Return-Path: $emaildestinatario \r\n"; // return-path
$envio = mail($emaildestinatario, $assunto, $mensagemHTML, $headers); 
 
 if($envio)
echo "<script>location.href='index.php'</script>"; // Página que será redirecionada

?>