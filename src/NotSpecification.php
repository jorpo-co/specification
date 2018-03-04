<?php declare(strict_types=1);

namespace Jorpo\Specification;

/**
 * NOT decorator, used to create a new specifcation that is the inverse (NOT) of the given spec.
 */
class NotSpecification extends AbstractSpecification
{
    /**
     * @var Specification
     */
    private $specification;

    /**
     * Create a new NOT specification based on another spec.
     *
     * @param Specification $specification instance to not.
     */
    public function __construct(Specification $specification)
    {
        $this->specification = $specification;
    }

    /**
     * @inherit
     */
    public function isSatisfiedBy(object $object): bool
    {
        return !$this->specification->isSatisfiedBy($object);
    }
}
