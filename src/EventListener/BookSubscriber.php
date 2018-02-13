<?php
/**
 * Created by IntelliJ IDEA.
 * User: fred
 * Date: 13/02/18
 * Time: 14:50
 */

namespace App\EventListener;


use App\Entity\Book;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;

class BookSubscriber implements EventSubscriber
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

        if($entity instanceof Book){
            //Todo
        }
    }
}