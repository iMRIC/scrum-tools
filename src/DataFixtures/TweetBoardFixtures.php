<?php

namespace App\DataFixtures;

use App\Entity\Sprint;
use App\Entity\TweetLike;
use App\Entity\TweetMessage;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class TweetBoardFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $sprint = new Sprint();
        $manager->persist($sprint);
        $sprint->setName('Sprint 18')
            ->setNumber(18);

        $message1 = new TweetMessage();
        $manager->persist($message1);
        $message1->setMessage('Great sprint! #jeVousKiff')
            ->setSprint($sprint);

        $message2 = new TweetMessage();
        $manager->persist($message2);
        $message2->setMessage('Very nice collaboration!')
            ->setSprint($sprint);

        $message3 = new TweetMessage();
        $manager->persist($message3);
        $message3->setMessage('I love you')
            ->setSprint($sprint);

        $like1 = new TweetLike();
        $manager->persist($like1);
        $like1->setMessage($message1);

        $like2 = new TweetLike();
        $manager->persist($like2);
        $like2->setMessage($message1);

        $like3 = new TweetLike();
        $manager->persist($like3);
        $like3->setMessage($message2);

        $manager->flush();
    }
}
