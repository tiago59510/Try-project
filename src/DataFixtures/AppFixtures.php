<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Bike;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 1; $i < 30; $i++)
    {
         $bike = new Bike();
         $bike->setName('Velo n°'.$i);
         $bike->setDescription('Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.');
         $bike->setPrice(random_int(500, 800));

         $manager->persist($bike);
         $manager->flush();
    }
    }
}
