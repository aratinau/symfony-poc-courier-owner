<?php

namespace App\Factory;

use App\Entity\CourierOwner;
use App\Repository\CourierOwnerRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<CourierOwner>
 *
 * @method        CourierOwner|Proxy                     create(array|callable $attributes = [])
 * @method static CourierOwner|Proxy                     createOne(array $attributes = [])
 * @method static CourierOwner|Proxy                     find(object|array|mixed $criteria)
 * @method static CourierOwner|Proxy                     findOrCreate(array $attributes)
 * @method static CourierOwner|Proxy                     first(string $sortedField = 'id')
 * @method static CourierOwner|Proxy                     last(string $sortedField = 'id')
 * @method static CourierOwner|Proxy                     random(array $attributes = [])
 * @method static CourierOwner|Proxy                     randomOrCreate(array $attributes = [])
 * @method static CourierOwnerRepository|RepositoryProxy repository()
 * @method static CourierOwner[]|Proxy[]                 all()
 * @method static CourierOwner[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static CourierOwner[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static CourierOwner[]|Proxy[]                 findBy(array $attributes)
 * @method static CourierOwner[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static CourierOwner[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class CourierOwnerFactory extends ModelFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     */
    protected function getDefaults(): array
    {
        return [

        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(CourierOwner $courierOwner): void {})
        ;
    }

    protected static function getClass(): string
    {
        return CourierOwner::class;
    }
}
