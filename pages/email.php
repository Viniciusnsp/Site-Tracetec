<?php

require("/home/tracelognet/public_html/PHPMailer-6.0.6/src/PHPMailer.php");

require("/home/tracelognet/public_html/PHPMailer-6.0.6/src/SMTP.php");

require'/home/tracelognet/public_html/PHPMailer-6.0.6/src/Exception.php';

$mail = new PHPMailer\PHPMailer\PHPMailer();

$mail->IsSMTP();
// $mail->SMTPDebug = 1;


$nome = $_POST['name'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$veiculos = $_POST['qtdVeiculo'];
$trace = $_POST['pesquisa'];
$pessoa = $_POST['person'];


$mensagem = "<strong>Nome: </strong>" .$nome;
$mensagem .= "<br><strong>E-mail: </strong>" .$email;
$mensagem .= "<br><strong>Telefone:  </strong>" .$telefone;
$mensagem .= "<br><strong>Quantidade de Veículos:  </strong>" .$veiculos;
$mensagem .= "<br><strong>Por onde nos conheceu:  </strong>" .$trace;
$mensagem .=  "<br><strong>Tipo de pessoa:  </strong>" .$pessoa;
$_POST['mensagem'];

// inlui o arquivo class.phpmailer.php localizado na pasta phpmailer



// inicia a classe PHPMailer


// define os dados do servidor e tipo de conexao

$mail->Host = "tracelog.net.br";  // endereco do servidor smtp
$mail->Port = 465;
$mail->SMTPAuth = false; //usa autenticacao smtp. (opcional)
$mail->SMTPSecure = 'ssl';
$mail->Username = 'formulario.site@tracelog.net.br';  //usuario do servidor smtp
$mail->Password = 'tra@sf20';


// define remetente
$mail->From = "formulario.site@tracelog.net.br";
$mail->FromName = "Site Trace Tec";

// define os destinatarios
$mail->AddAddress("comercial@tracelog.net.br");

// define os dados tecnicos da mensagem
$mail->IsHTML(true);

// define a mensagem (texto e assunto)
$mail->Subject = "Formulario da Landing Page";
$mail->Body = $mensagem;

  if(!$mail->Send()) {
       echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
      // echo "Mensagem enviada com sucesso";
       header('Location:./thanks.html');
    }



?>