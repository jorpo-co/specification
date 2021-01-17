<?php declare(strict_types=1);

namespace Jorpo\Specification;

use StdClass;
use PHPUnit\Framework\TestCase;

class NotSpecificationTest extends TestCase
{
    public function testShouldCreateInstance()
    {
        $subject = $this->createInstanceWith(
            new AlwaysTrueSpecification,
            new AlwaysTrueSpecification
        );
        $this->assertInstanceOf(Specification::class, $subject);
    }

    public function testShouldBeSatisfiedBy()
    {
        $alwaysTrueSpecification = new AlwaysTrueSpecification;
        $alwaysFalseSpecification = new AlwaysFalseSpecification;

        $subject = $this->createInstanceWith($alwaysTrueSpecification);
        $this->assertFalse($subject->isSatisfiedBy(new StdClass));

        $subject = $this->createInstanceWith($alwaysFalseSpecification);
        $this->assertTrue($subject->isSatisfiedBy(new StdClass));
    }

    public function testShouldAddOtherSpecifications()
    {
        $alwaysTrueSpecification = new AlwaysTrueSpecification;

        $subject = $this->createInstanceWith($alwaysTrueSpecification, $alwaysTrueSpecification);
        $this->assertInstanceOf(AndSpecification::class, $subject->and($alwaysTrueSpecification));

        $subject = $this->createInstanceWith($alwaysTrueSpecification, $alwaysTrueSpecification);
        $this->assertInstanceOf(OrSpecification::class, $subject->or($alwaysTrueSpecification));

        $subject = $this->createInstanceWith($alwaysTrueSpecification, $alwaysTrueSpecification);
        $this->assertInstanceOf(NotSpecification::class, $subject->not($alwaysTrueSpecification));
    }

    private function createInstanceWith(Specification $specification): NotSpecification
    {
        return new NotSpecification($specification);
    }
}
