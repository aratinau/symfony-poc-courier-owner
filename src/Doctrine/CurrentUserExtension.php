<?php

namespace App\Doctrine;

use ApiPlatform\Doctrine\Orm\Util\QueryNameGeneratorInterface;
use App\Entity\Courier;
use App\Entity\Discussion;
use App\Entity\Message;
use App\Repository\ServiceRepository;
use Doctrine\ORM\QueryBuilder;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Bundle\SecurityBundle\Security;
use ApiPlatform\Doctrine\Orm\Extension\QueryCollectionExtensionInterface;
use ApiPlatform\Metadata\Operation;

class CurrentUserExtension implements QueryCollectionExtensionInterface
{
    public function __construct(
        private Security $security,
        private AuthorizationCheckerInterface $authorizationChecker,
        private ServiceRepository $serviceRepository
    ) {
    }

    public function applyToCollection(
        QueryBuilder $queryBuilder,
        QueryNameGeneratorInterface $queryNameGenerator,
        string $resourceClass,
        Operation $operation = null,
        array $context = []
    ): void {
        $user = $this->security->getUser();
        if (null === $user) {
            return ;
        }

        $rootAlias = $queryBuilder->getRootAliases()[0];

        $service = $this->serviceRepository->findOneBy([]);

        if ($resourceClass === Courier::class) {
            $queryBuilder
                ->leftJoin("$rootAlias.courierOwner", 'courierOwner')
                ->andWhere('courierOwner.owner = :owner OR courierOwner.service = :service')
                ->setParameter("owner", $user)
                ->setParameter("service", $service)
            ;
        }
    }
}
