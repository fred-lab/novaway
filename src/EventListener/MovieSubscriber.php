<?php
/**
 * Created by IntelliJ IDEA.
 * User: fred
 * Date: 13/02/18
 * Time: 15:00
 */

namespace App\EventListener;


use App\Entity\Movie;
use App\Service\AlertMail;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;

class MovieSubscriber implements EventSubscriber
{
    /**
     * @var AlertMail
     */
    private $alertMail;

    /**
     * BookSubscriber constructor.
     * @param AlertMail $alertMail
     */
    public function __construct(AlertMail $alertMail)
    {
        $this->alertMail = $alertMail;
    }

    /**
     * Returns an array of events this subscriber wants to listen to.
     *
     * @return array
     */
    public function getSubscribedEvents()
    {
        return [ 'postPersist', 'postUpdate'];
    }

    /**
     * @param LifecycleEventArgs $args
     */
    public function postPersist(LifecycleEventArgs $args){
        $this->sendMailToSubscriber($args);
    }

    /**
     * @param LifecycleEventArgs $args
     */
    public function postUpdate(LifecycleEventArgs $args){
        $this->sendMailToSubscriber($args);
    }

    /**
     * Check if the entity has specifics keywords and send an email to the subscriber
     * of this alert list
     * @param LifecycleEventArgs $args
     */
    public function sendMailToSubscriber(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if($entity instanceof Movie){
            $keywords = [ $entity->getDirector()];

            foreach (explode(';', $entity->getActors()) as $actor)
            {
                $keywords[] = $actor;
            }

            $this->alertMail->checkAlertList($keywords);
        }
    }
}