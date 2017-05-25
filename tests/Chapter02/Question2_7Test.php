<?php

use Chapter02\Question2_7\Question;
use CTCILibrary\LinkedListNode;

class Question2_7Test extends \PHPUnit_Framework_TestCase
{
    /**
     * @var LinkedListNode
     */
    protected $first;

    /**
     * @var LinkedListNode
     */
    protected $second;

    /**
     * @var LinkedListNode
     */
    protected $intersection;

    protected function setUp()
    {
        $this->intersection = new LinkedListNode(20, new LinkedListNode(30));


        $this->first = new LinkedListNode(50, new LinkedListNode(50, $this->intersection));
        $this->second = new LinkedListNode(80, new LinkedListNode(90, $this->intersection));
    }

    public function testFindIntersection()
    {
        $intersection = Question::findIntersection($this->first, $this->second);
        $this->assertEquals($this->intersection, $intersection);
    }
}