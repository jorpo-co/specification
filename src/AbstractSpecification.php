<?php declare(strict_types=1);

namespace Jorpo\Specification;

abstract class AbstractSpecification implements Specification
{
    /**
     * @inherit
     */
    abstract public function isSatisfiedBy(object $object): bool;

    /**
     * @inherit
     */
    public function and(Specification $specification): Specification
    {
        return new AndSpecification($this, $specification);
    }

    /**
     * @inherit
     */
    public function or(Specification $specification): Specification
    {
        return new OrSpecification($this, $specification);
    }

    /**
     * @inherit
     */
    public function not(Specification $specification): Specification
    {
        return new NotSpecification($specification);
    }
}
