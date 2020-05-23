<?php declare(strict_types=1);

namespace Jorpo\Specification;

abstract class AbstractSpecification implements Specification
{
    abstract public function isSatisfiedBy($object): bool;

    public function and(Specification $specification): Specification
    {
        return new AndSpecification($this, $specification);
    }

    public function or(Specification $specification): Specification
    {
        return new OrSpecification($this, $specification);
    }

    public function not(Specification $specification): Specification
    {
        return new NotSpecification($specification);
    }
}
