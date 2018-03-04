<?php declare(strict_types=1);

namespace Jorpo\Specification;

class AndSpecification extends AbstractSpecification
{
    /**
     * @var Specification
     */
    private $specificationOne;

    /**
     * @var Specification
     */
    private $specificationTwo;

    /**
     * Create a new AND specification based on two other spec.
     *
     * @param Specification $specificationOne
     * @param Specification $specificationTwo
     */
    public function __construct(Specification $specificationOne, Specification $specificationTwo)
    {
        $this->specificationOne = $specificationOne;
        $this->specificationTwo = $specificationTwo;
    }

    /**
     * @inherit
     */
    public function isSatisfiedBy(object $object): bool
    {
        return $this->specificationOne->isSatisfiedBy($object) && $this->specificationTwo->isSatisfiedBy($object);
    }
}
