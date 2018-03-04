<?php declare(strict_types=1);

namespace Jorpo\Specification;

class AlwaysFalseSpecification extends AbstractSpecification
{
    /**
     * @inherit
     */
    public function isSatisfiedBy($object): bool
    {
        return false;
    }
}
