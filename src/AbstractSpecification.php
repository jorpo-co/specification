<?php declare(strict_types=1);

namespace Jorpo\Specification;

/**
 * @template TObject of object
 * @implements Specification<TObject>
 */
abstract class AbstractSpecification implements Specification
{
    /**
     * @param TObject $object
     */
    abstract public function isSatisfiedBy(object $object): bool;

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
