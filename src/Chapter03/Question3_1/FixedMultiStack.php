<?php

namespace Chapter03\Question3_1;

class FixedMultiStack
{
    private $stackCapacity;

    /**
     * @var int[]
     */
    private $values;

    /**
     * @var int[]
     */
    private $sizes;

    /**
     * FixedMultiStack constructor.
     * @param $stackCapacity $stackSize in the Book
     */
    public function __construct($stackCapacity)
    {
        $this->stackCapacity = $stackCapacity;
        $this->values = [];
        $this->sizes = [];
        for ($i = 0; $i < $stackCapacity; $i++) {
            $this->sizes[$i] = 0;
        }
    }

    public function push(int $stackNum, int $value)
    {
        if ($this->isFull($stackNum)) {
            throw new \Exception('Stack is full');
        }

        if (!isset($this->sizes[$stackNum])) {
            $this->sizes[$stackNum] = 1;
        } else {
            $this->sizes[$stackNum]++;
        }

        $indexOfTop = $this->indexOfTop($stackNum);
        $this->values[$indexOfTop] = $value;
    }

    public function pop(int $stackNum): int
    {
        if ($this->isEmpty($stackNum)) {
            throw new \Exception('Stack is empty');
        }

        $indexOfTop = $this->indexOfTop($stackNum);
        $value = $this->values[$indexOfTop];

        // Clear value after pop
        $this->values[$indexOfTop] = 0;

        // Descrease amount of stack
        $this->sizes[$stackNum]--;

        return $value;
    }

    public function peek(int $stackNum): int
    {
        if ($this->isEmpty($stackNum)) {
            throw new \Exception('Stack is empty');
        }

        $indexOfTop = $this->indexOfTop($stackNum);
        return $this->values[$indexOfTop];
    }

    public function isEmpty(int $stackNum): bool
    {
        return !isset($this->sizes[$stackNum]) || $this->sizes[$stackNum] == 0;
    }

    public function indexOfTop(int $stackNum): int
    {
        $offset = $stackNum * $this->stackCapacity;
        $size = $this->sizes[$stackNum];

        return $offset + $size - 1;
    }

    public function isFull(int $stackNum): bool
    {
        return $this->sizes[$stackNum] == $this->stackCapacity;
    }

}