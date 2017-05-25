<?php

use Chapter02\Question2_3\Question;
use CTCILibrary\LinkedListNode;

class Question2_3Test extends \PHPUnit_Framework_TestCase
{
    /**
     * @var LinkedListNode
     */
    protected $list;

    /**
     * @var LinkedListNode
     */
    protected $listWithoutMiddleNode;

    protected function setUp()
    {
        $this->list = new LinkedListNode(1, new LinkedListNode(2, new LinkedListNode(5, new LinkedListNode(3, new LinkedListNode(4)))));
        $this->listWithoutMiddleNode = new LinkedListNode(1, new LinkedListNode(2, new LinkedListNode(3, new LinkedListNode(4))));
    }

    public function testDeleteMiddleNode()
    {
        $listWithoutMiddleNode = Question::deleteMiddleNode($this->list);
        $this->assertEquals($this->listWithoutMiddleNode->printForward(), $listWithoutMiddleNode->printForward());
    }
}