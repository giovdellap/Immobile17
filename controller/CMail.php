<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/SMTP.php";
class CMail
{
    public static function sendConfermationEmail(MCliente $cliente, string $code)
    {
        $name = $cliente->getNome()." ".$cliente->getCognome();
        $subject = 'CONFERMA REGISTRAZIONE - IMMOBILE17';
        $url = $GLOBALS['path'].'Utente/confermaAccount/id/'.$cliente->getId().'/codice/'.$code;
        $body = 'Ciao '.$name.'<br>
                    Clicca sul link per attivare il tuo account <a href='.$url.'></a>';
        $mail = new MMail($cliente->getEmail(), $name, $subject, $body);
        self::send($mail);
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

        $mailer->SMTPAuth   = true;
        $mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mailer->Host       = 'smtp.gmail.com';
        $mailer->Port       = '465';
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
            return false;
        }
    }
}