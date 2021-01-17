<?php declare(strict_types=1);

namespace Jorpo\Specification;

class AlwaysTrueSpecification extends AbstractSpecification
{
    public function isSatisfiedBy($object): bool
    {
        return true;
    }
}
