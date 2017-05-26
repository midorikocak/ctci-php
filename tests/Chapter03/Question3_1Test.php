<?php

use Chapter03\Question3_1\FixedMultiStack;

class Question3_1Test extends \PHPUnit_Framework_TestCase
{
    /**
     * @var FixedMultiStack
     */
    protected $fixedMultiStack;

    protected function setUp()
    {
        $this->fixedMultiStack = new FixedMultiStack(5);
    }

    public function testPop()
    {
        $this->fixedMultiStack->push(4, 10);
        $this->fixedMultiStack->push(4, 20);
        $this->assertEquals(20, $this->fixedMultiStack->pop(4));
        $this->assertEquals(10, $this->fixedMultiStack->peek(4));
        $this->assertEquals(10, $this->fixedMultiStack->pop(4));
        $this->assertTrue($this->fixedMultiStack->isEmpty(4));
    }

    public function testPeek()
    {
        $this->fixedMultiStack->push(4, 10);
        $this->assertEquals(10, $this->fixedMultiStack->peek(4));

    }

    public function testIsEmpty()
    {
        $this->assertTrue($this->fixedMultiStack->isEmpty(0));
    }

    public function testIsFull()
    {
        $this->fixedMultiStack->push(4, 10);
        $this->fixedMultiStack->push(4, 20);
        $this->fixedMultiStack->push(4, 30);
        $this->fixedMultiStack->push(4, 40);
        $this->fixedMultiStack->push(4, 50);
        $this->assertTrue($this->fixedMultiStack->isFull(4));
    }

    public function testIndexOfTop()
    {
        $this->fixedMultiStack->push(4, 10);
        $this->fixedMultiStack->push(4, 20);
        $this->fixedMultiStack->push(4, 30);
        $this->fixedMultiStack->push(4, 40);
        $this->fixedMultiStack->push(4, 50);

        $this->assertEquals(24, $this->fixedMultiStack->indexOfTop(4));
    }
}