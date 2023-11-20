<?php

namespace App\DataFixtures;

use App\Entity\CourierOwner;
use App\Entity\User;
use App\Factory\CourierFactory;
use App\Factory\CourierOwnerFactory;
use App\Factory\ServiceFactory;
use App\Factory\UserFactory;
use App\Repository\CourierRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function __construct(
        private CourierRepository $courierRepository,
        private EntityManagerInterface $entityManager
    ) {

    }

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        UserFactory::createMany(20, [
            'password' => 'password',
        ]);
        UserFactory::createOne([
            'email' => 'casper.cristina@gmail.com',
            'password' => 'password',
        ]);

        $serviceDirectionRH = ServiceFactory::createOne([
            'title' => 'Direction RH'
        ]);
        ServiceFactory::createOne([
            'title' => 'Direction Finances'
        ]);
        ServiceFactory::createOne([
            'title' => 'Service Achats'
        ]);
        ServiceFactory::createOne([
            'title' => 'Service Courrier'
        ]);

        CourierFactory::createMany(100);

        $manager->flush();
    }
}
