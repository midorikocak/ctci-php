<?php

use Chapter02\Question2_8\Question;
use CTCILibrary\LinkedListNode;

class Question2_8Test extends \PHPUnit_Framework_TestCase
{
    /**
     * @var LinkedListNode
     */
    protected $list;

    /**
     * @var LinkedListNode
     */
    protected $loop;

    protected function setUp()
    {
        $tail = new LinkedListNode(15);
        $this->loop = new LinkedListNode(20, new LinkedListNode(30, $tail));
        $tail->setNext($this->loop);

        $this->list = new LinkedListNode(150, new LinkedListNode(50, new LinkedListNode(50, $this->loop)));
    }

    public function testFindIntersection()
    {
        $loop = Question::findBeginning($this->list);
        $this->assertEquals($this->loop, $loop);
    }
}