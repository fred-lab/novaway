<?php
/**
 * Created by IntelliJ IDEA.
 * User: fred
 * Date: 10/02/18
 * Time: 16:05
 */

namespace App\DataFixtures;


use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixture extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    /**
     * UserFixture constructor.
     * @param UserPasswordEncoderInterface $encoder
     */
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('admin')
            ->setEmail('admin@admin.com')
            ->setPassword($this->encoder->encodePassword($user, 'test'))
            ->setRoles(['ROLE_ADMIN'])
        ;

        $manager->persist($user);
        $manager->flush();
    }
}