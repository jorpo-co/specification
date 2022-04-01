<?php declare(strict_types=1);

namespace Jorpo\Specification;

use BadMethodCallException;

class AndSpecification extends AbstractSpecification
{
    private const PATTERN = '$this->specifications[%d]->isSatisfiedBy($object)';

    private array $specifications;

    public function __construct(Specification ...$specifications)
    {
        if (2 > count($specifications)) {
            throw new BadMethodCallException('Two or more Specifications are required.');
        }

        $this->specifications = $specifications;
    }

    public function isSatisfiedBy($object): bool
    {
        $executable = '';

        foreach ($this->specifications as $key => $specification) {
            $executable .= ' && ' . sprintf(self::PATTERN, $key);
        }

        return eval('return ' . ltrim($executable, '& ') . ';');
    }
}
