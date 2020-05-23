<?php declare(strict_types=1);

namespace Jorpo\Specification;

class NotSpecification extends AbstractSpecification
{
    private Specification $specification;

    public function __construct(Specification $specification)
    {
        $this->specification = $specification;
    }

    public function isSatisfiedBy($object): bool
    {
        return !$this->specification->isSatisfiedBy($object);
    }
}
