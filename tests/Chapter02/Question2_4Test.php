<?php

use Chapter02\Question2_4\Question;
use CTCILibrary\LinkedListNode;

class Question2_4Test extends \PHPUnit_Framework_TestCase
{
    /**
     * @var LinkedListNode
     */
    protected $list;

    /**
     * @var LinkedListNode
     */
    protected $partitionedList;

    protected function setUp()
    {
        $this->list = new LinkedListNode(1, new LinkedListNode(2, new LinkedListNode(5, new LinkedListNode(3, new LinkedListNode(4, new LinkedListNode(6))))));
        $this->partitionedList = new LinkedListNode(3, new LinkedListNode(2, new LinkedListNode(1, new LinkedListNode(5, new LinkedListNode(4, new LinkedListNode(6))))));

    }

    public function testPartition()
    {
        $partitionedList = Question::partition($this->list, 4);
        $this->assertEquals($this->partitionedList->printForward(), $partitionedList->printForward());
    }
}