<?php
/**
 * Created by IntelliJ IDEA.
 * User: fred
 * Date: 13/02/18
 * Time: 15:00
 */

namespace App\EventListener;


use App\Entity\Movie;
use Doctrine\Common\EventSubscriber;

class MovieSubscriber implements EventSubscriber
{

    /**
     * Returns an array of events this subscriber wants to listen to.
     *
     * @return array
     */
    public function getSubscribedEvents()
    {
        return [ 'postPersist', 'postUpdate'];
    }

    public function alertMail(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if($entity instanceof Movie){
            //Todo
        }
    }
}