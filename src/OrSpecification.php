<?php declare(strict_types=1);

namespace Jorpo\Specification;

class OrSpecification extends AbstractSpecification
{
    private Specification $specificationOne;
    private Specification $specificationTwo;

    public function __construct(Specification $specificationOne, Specification $specificationTwo)
    {
        $this->specificationOne = $specificationOne;
        $this->specificationTwo = $specificationTwo;
    }

    public function isSatisfiedBy($object): bool
    {
        return $this->specificationOne->isSatisfiedBy($object) || $this->specificationTwo->isSatisfiedBy($object);
    }
}
