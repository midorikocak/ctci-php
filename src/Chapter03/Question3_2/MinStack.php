<?php

namespace Chapter03\Question3_2;

use CTCILibrary\Stack;

class MinStack extends Stack
{
    /**
     * Array to keep minimum values
     *
     * @var Stack
     */
    private $minStack;

    public function __construct()
    {
        parent::__construct();
        $this->minStack = new Stack();
    }

    public function push(int $value)
    {
        if ($value <= $this->min()) {
            $this->minStack->push($value);
        }
        parent::push($value);
    }

    public function pop(): int
    {
        $value = parent::pop();
        if ($value == $this->min()) {
            $this->minStack->pop();
        }
        return $value;
    }

    public function min(): int
    {
        if ($this->minStack->isEmpty()) {
            return PHP_INT_MAX;
        } else {
            return $this->minStack->peek();
        }
    }
}