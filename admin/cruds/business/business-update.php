<?php

require_once("../../class/Company.php");
require_once("../../class/Sql.php");

$cnpj = $_POST['cnpj'];
$address = $_POST['address'];
$tel1 = $_POST['tel1'];
$tel2 = $_POST['tel2'];
$tel3 = $_POST['tel3'];
$email1 = $_POST['email1'];
$email2 = $_POST['email2'];
$email3 = $_POST['email3'];


  //Updating Category

  $data = new Company();
  //$data->loadById($id);
  $data->update($cnpj, $address, $tel1, $tel2, $tel3, $email1, $email2, $email3);

v
?>

<h1>Dados da empresa editados com sucesso!</h1>
<p>CNPJ:<? echo " " .  $cnpj; ?></p>
<p>Endereço:<? echo " " . $address; ?></p>
<p>Telefone 1:<? echo " " . $tel1; ?></p>
<p>Telefone 2:<? echo " " . $tel2; ?></p>
<p>Telefone 3:<? echo " " . $tel3; ?></p>
<p>Email 1:<? echo " " . $email1; ?></p>
<p>Email 2:<? echo " " . $email2; ?></p>
<p>Email 3:<? echo " " . $email3; ?></p>
<a href="update.php">Retornar menu o formulário de atualização dos dados da empresa</a>
<br>
<br>
<a href="../../../admin.php">Retornar o menu de administração</a>