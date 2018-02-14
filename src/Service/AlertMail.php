<?php
/**
 * Created by IntelliJ IDEA.
 * User: fred
 * Date: 13/02/18
 * Time: 15:04
 */

namespace App\Service;


use Swift_Mailer;
use Swift_Message;

class AlertMail
{

    /**
     * @var Swift_Mailer
     */
    private $mailer;

    /**
     * Alert list
     * @var array
     */
    private $alertList = [
        [ 'type' => 'acteur',       'keywords' => ['Leonardo Dicaprio', 'Jean Dujardin'],                           'email' => 'jonathan@novaway.fr'],
        [ 'type' => 'réalisateur',  'keywords' => ['Steven Spielberg', 'Woody Allen'],                              'email' => 'cedric@novaway.fr'],
        [ 'type' => 'auteur',       'keywords' => ['Jean Anouilh', 'Guillaume Musso', 'Franz-olivier Giesbert'],    'email' => 'laurence@novaway.fr'],
        [ 'type' => 'acteur',       'keywords' => ['Edward Norton', 'Jack Nicholson', 'Robert De Niro'],            'email' => 'jonathan@novaway.fr']
    ];

    /**
     * AlertMail constructor.
     * @param Swift_Mailer $mailer
     */
    public function __construct(Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * @return Swift_Mailer
     */
    public function getMailer(): Swift_Mailer
    {
        return $this->mailer;
    }

    /**
     * @return array
     */
    public function getAlertList(): array
    {
        return $this->alertList;
    }

    /**
     * Check in the alert list if the list of needle match with one keyword
     * @param array $needles
     */
    public function checkAlertList(array $needles)
    {
        foreach ($needles as $needle){
            foreach ($this->getAlertList() as $alert){
                if(in_array($needle, $alert['keywords'])){
                    $this->sendMail($alert['email'], $alert['keywords']);
                }
            }
        }
    }

    /**
     * Send an email
     * @param string $to
     * @param array $keywords
     */
    public function sendMail(string $to, array $keywords)
    {
        $message = (new Swift_Message('Alert nouveau media ajouté'))
            ->setFrom('no-reply@novaway.com')
            ->setTo($to)->setBody(
                'Un nouveau média contenant les mots-clés : " ' . implode(' ', $keywords) .' " a été ajouté',
                'text/plain'
            );

        $this->getMailer()->send($message);
    }

}