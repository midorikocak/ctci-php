<?php

use Chapter02\Question2_2\Question;
use CTCILibrary\LinkedListNode;

class Question2_2Test extends \PHPUnit_Framework_TestCase
{
    protected $list;

    protected function setUp()
    {
        $this->list = new LinkedListNode(1, new LinkedListNode(2, new LinkedListNode(5, new LinkedListNode(3))));
    }

    public function testNthToLast()
    {
        $nthToLast = Question::nthToLast($this->list, 2);
        $this->assertEquals(2, $nthToLast->data);
    }
}