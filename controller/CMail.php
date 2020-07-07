<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/SMTP.php";
class CMail
{
    /**
     * @param MCliente $cliente
     * @param string $code
     * @throws Exception
     */
    public static function sendConfermationEmail(MCliente $cliente, string $code): bool
    {
        $name = $cliente->getNome()." ".$cliente->getCognome();
        $subject = 'CONFERMA REGISTRAZIONE - IMMOBILE17';
        $url = 'localhost'.$GLOBALS['path'].'Utente/confermaAccount/id/'.$cliente->getId().'/codice/'.$code;
        $body = 'Ciao '.$name.'<br>
                    Clicca sul link per attivare il tuo account <br><a href='.$url.'>ATTIVA ACCOUNT</a>';
        $mail = new MMail($cliente->getEmail(), $name, $subject, $body);
        return self::send($mail);
    }

    /**
     * @param MMail $email
     * @return bool
     * @throws Exception
     */
    private static function send(MMail $email): bool {
        $mailer = new PHPMailer(true);

        $mailer->isSMTP();
        $mailer->isHTML(true);

        $mailer->SMTPDebug = 2;
        $mailer->SMTPAuth   = true;
        $mailer->SMTPSecure = 'ssl';
        $mailer->SMTPAutoTLS = false;
        $mailer->Host       = 'smtp.gmail.com';
        $mailer->Port       = 465;
        $mailer->Username   = 'immobile17.agenzia@gmail.com';
        $mailer->Password   = 'CiroImmobile';

        $mailer->setFrom('immobile17.agenzia@gmail.com', 'Immobile17');
        $mailer->addAddress($email->getRecipient(), $email->getRecipientName());
        $mailer->Subject    = $email->getSubject();
        $mailer->Body       = $email->getBody();
        $mailer->AltBody    = $email->getBody(); //Non HTML clients

        try {
            return $mailer->send();
        } catch (Exception $e) {
            echo $mailer->ErrorInfo();
            return false;
        }
    }
}