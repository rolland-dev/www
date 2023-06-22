<?php
// src/AppBundle/DataFixtures/ORM/LoadUsers.php

namespace AppBundle\DataFixtures\ORM;

use Faker;

use Faker\Factory;
use AppBundle\Entity\User;
use Faker\ORM\Doctrine\Populator;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;

class LoadUsers extends AbstractFixture implements ContainerAwareInterface, FixtureInterface, OrderedFixtureInterface
{
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $em)
    {
        // initialisation de l'objet Faker
        // on peut préciser en paramètre la localisation, 
        // pour avoir des données qui semblent "françaises"
        $faker = Faker\Factory::create('fr_FR');

        $populator = new Populator($faker, $em);
        $populator->addEntity(User::class, 10); 
        // le deuxième paramètre (10) correspond au nombre d'objets qui vont être créés
        $insertedPKs = $populator->execute();
    }

    public function getOrder()
    {
        return 1;
    }
}