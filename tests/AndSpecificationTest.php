<?php declare(strict_types=1);

namespace Jorpo\Specification;

use BadMethodCallException;
use PHPUnit\Framework\TestCase;
use StdClass;

class AndSpecificationTest extends TestCase
{
    public function testShouldCreateInstance()
    {
        $subject = $this->createInstanceWith(
            new AlwaysTrueSpecification(),
            new AlwaysTrueSpecification()
        );
        $this->assertInstanceOf(Specification::class, $subject);
    }

    public function testShouldBeSatisfiedBy()
    {
        $alwaysTrueSpecification = new AlwaysTrueSpecification();
        $alwaysFalseSpecification = new AlwaysFalseSpecification();

        $subject = $this->createInstanceWith($alwaysTrueSpecification, $alwaysTrueSpecification);
        $this->assertTrue($subject->isSatisfiedBy(new StdClass()));

        $subject = $this->createInstanceWith($alwaysFalseSpecification, $alwaysTrueSpecification);
        $this->assertFalse($subject->isSatisfiedBy(new StdClass()));

        $subject = $this->createInstanceWith($alwaysTrueSpecification, $alwaysFalseSpecification);
        $this->assertFalse($subject->isSatisfiedBy(new StdClass()));

        $subject = $this->createInstanceWith($alwaysFalseSpecification, $alwaysFalseSpecification);
        $this->assertFalse($subject->isSatisfiedBy(new StdClass()));
    }

    public function testShouldAddOtherSpecifications()
    {
        $alwaysTrueSpecification = new AlwaysTrueSpecification();

        $subject = $this->createInstanceWith($alwaysTrueSpecification, $alwaysTrueSpecification);
        $this->assertInstanceOf(AndSpecification::class, $subject->and($alwaysTrueSpecification));

        $subject = $this->createInstanceWith($alwaysTrueSpecification, $alwaysTrueSpecification);
        $this->assertInstanceOf(OrSpecification::class, $subject->or($alwaysTrueSpecification));

        $subject = $this->createInstanceWith($alwaysTrueSpecification, $alwaysTrueSpecification);
        $this->assertInstanceOf(NotSpecification::class, $subject->not($alwaysTrueSpecification));
    }

    public function testRequiresTwoOrMoreSpecifications(): void
    {
        $this->expectException(BadMethodCallException::class);
        $this->createInstanceWith(
            new AlwaysTrueSpecification()
        );
    }

    public function testThatMultipleSpecificationsCanBeChained(): void
    {
        $alwaysTrueSpecification = new AlwaysTrueSpecification();
        $alwaysFalseSpecification = new AlwaysFalseSpecification();

        $subject = $this->createInstanceWith(
            $alwaysTrueSpecification,
            $alwaysTrueSpecification,
            $alwaysFalseSpecification
        );

        $this->assertFalse($subject->isSatisfiedBy(new StdClass()));
    }

    private function createInstanceWith(Specification ...$specifications): AndSpecification
    {
        return new AndSpecification(...$specifications);
    }
}
