<?php declare(strict_types=1);

namespace Jorpo\Specification;

/**
 * @template TObject of object
 */
interface Specification
{
    /**
     * @param TObject $object
     */
    public function isSatisfiedBy(object $object): bool;

    public function and(Specification $specification): Specification;

    public function or(Specification $specification): Specification;

    public function not(Specification $specification): Specification;
}
