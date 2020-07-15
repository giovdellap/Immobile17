<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/SMTP.php";

/**
 * Class CMail
 * Contiene funzioni per l'invio di mail preimpostate in caso di attivazione account, password dimenticata e modifica calendario utente
 * Utilizza PHPMailer e gestisce le impostazione dell'Account GMail
 * @author Della Pelle - Di Domenica - Foderà
 * @package controller
 */
class CMail
{
    /**
     * Invia la mail con l'url di attivazione account all'utente
     * @param MCliente $cliente
     * @param string $code
     * @return bool
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
     * Invia la mail con la nuova password all'utente
     * @param MCliente $cliente
     * @param string $password
     * @return bool
     * @throws Exception
     */
    public static function sendForgotPasswordEmail(MCliente $cliente, string $password): bool
    {
        $name = $cliente->getFullName();
        $subject = 'NUOVA PASSWORD - IMMOBILE17';
        $body = 'Ciao '.$name.'<br>
                    Questa è la tua nuova password: <br>'.$password;
        $mail = new MMail($cliente->getEmail(), $name, $subject, $body);
        return self::send($mail);
    }

    /**
     * Invia all'utente una mail di notifica che il suo calendario appuntamenti è stato modificato
     * @param MCliente $cliente
     * @throws Exception
     */
    public static function modificaAppuntamentoMail(MCliente $cliente)
    {
        $name = $cliente->getFullName();
        $subject = 'MODIFICA APPUNTAMENTO - IMMOBILE17';
        $body = 'Ciao '.$name.'<br>
                    La tua lista appuntamenti è stata modificata <br>
                    Controlla il tuo calendario per visualizzare le modifiche';
        $mail = new MMail($cliente->getEmail(), $name, $subject, $body);
        self::send($mail);
    }

    /**
     * Metodo per l'invio di un'oggetto MMail tramite PHPMailer e l'account email impostato
     * @param MMail $email
     * @return bool
     * @throws Exception
     */
    private static function send(MMail $email): bool {
        $mailer = new PHPMailer(true);

        $mailer->isSMTP();
        $mailer->isHTML(true);

        $mailer->SMTPDebug = 0;
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