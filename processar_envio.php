<?php

    require "Bibliotecas/PHPMailer/Exception.php";
    require "Bibliotecas/PHPMailer/PHPMailer.php";
    require "Bibliotecas/PHPMailer/SMTP.php";
   
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

    class Mensagem {

        private $para = null;
        private $assunto = null;
        private $mensagem = null;

        public function __set($atributo, $valor) {
            $this->$atributo = $valor;
        }

        public function __get($atributo){
            return $this->$atributo;
        }

        public function ValidarMensagem() {
            if(empty($this->para) || empty($this->assunto) || empty($this->mensagem)) {
                return false;
            } else {
                return true;
            }
        }

    }

    $mensagem = new Mensagem();

    $mensagem->para = $_POST['para'];
    $mensagem->assunto = $_POST['assunto'];
    $mensagem->mensagem = $_POST['mensagem'];

    if($mensagem->ValidarMensagem() == false) {
        header("Location: index.php?success=false");  
        exit();      
    } 

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'testemello00@gmail.com';               //SMTP username
        $mail->Password   = 'qein ayzo wnmu mryn';                  //SMTP password
        $mail->SMTPSecure = 'tls';                                  //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('testemello00@gmail.com', 'App Send Email');
        $mail->addAddress($mensagem->para); //Add a recipient
        $mail->addReplyTo('testemello00@gmail.com', 'App Send Email');
        // $mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com'); 

        /*//Attachments
        $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name*/

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $mensagem->assunto;
        $mail->Body    = $mensagem->mensagem;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        

        header("Location: index.php?success=true");  
        exit();      
    } catch (Exception $e) {
        echo "Mensagem não foi Enviada => Error: {$mail->ErrorInfo}";
    }

?>