<?php

use Chapter02\Question2_1\Question;
use CTCILibrary\LinkedListNode;

class Question2_1Test extends \PHPUnit_Framework_TestCase
{
    protected $listWithDuplicates;
    protected $listWithoutDuplicates;

    protected function setUp()
    {
        $this->listWithDuplicates = new LinkedListNode(1, new LinkedListNode(3, new LinkedListNode(5, new LinkedListNode(3))));
        $this->listWithoutDuplicates = new LinkedListNode(1, new LinkedListNode(3, new LinkedListNode(5)));

    }

    public function testRemoveDuplicates()
    {
        $listWithoutDuplicates = Question::deleteDuplicates($this->listWithDuplicates);
        $this->assertEquals($listWithoutDuplicates->printForward(), $this->listWithoutDuplicates->printForward());
    }

    public function testRemoveDuplicates2()
    {
        $listWithoutDuplicates = Question::deleteDuplicates2($this->listWithDuplicates);
        $this->assertEquals($listWithoutDuplicates->printForward(), $this->listWithoutDuplicates->printForward());
    }

}