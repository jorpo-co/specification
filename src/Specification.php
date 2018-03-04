<?php declare(strict_types=1);

namespace Jorpo\Specification;

interface Specification
{
    /**
     * Check if an object is satisfied by the specification.
     *
     * @param object $object
     * @return bool
     */
    public function isSatisfiedBy(object $object): bool;

    /**
     * Create a new specification that is the AND operation of this specification and another specification.
     *
     * @param Specification $specification to AND.
     * @return Specification  A new specification.
     */
    public function and(Specification $specification): Specification;

    /**
     * Create a new specification that is the OR operation of this specification and another specification.
     *
     * @param Specification $specification to OR.
     * @return Specification  A new specification.
     */
    public function or(Specification $specification): Specification;

    /**
     * Create a new specification that is the NOT operation of this specification.
     *
     * @param Specification $specification to NOT.
     * @return Specification A new specification.
     */
    public function not(Specification $specification): Specification;
}
