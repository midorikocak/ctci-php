<?php

use Chapter02\Question2_6\Question;
use CTCILibrary\LinkedListNode;

class Question2_6Test extends \PHPUnit_Framework_TestCase
{
    /**
     * @var LinkedListNode
     */
    protected $notPalindrome;

    /**
     * @var LinkedListNode
     */
    protected $palindrome;

    protected function setUp()
    {
        $this->palindrome = new LinkedListNode(1, new LinkedListNode(2, new LinkedListNode(3, new LinkedListNode(3, new LinkedListNode(2, new LinkedListNode(1))))));
        $this->notPalindrome = new LinkedListNode(3, new LinkedListNode(2, new LinkedListNode(1, new LinkedListNode(5, new LinkedListNode(4, new LinkedListNode(6))))));

    }

    public function testIsPalindrome()
    {
        $this->assertTrue(Question::isPalindrome($this->palindrome));
        $this->assertFalse(Question::isPalindrome($this->notPalindrome));
    }
}