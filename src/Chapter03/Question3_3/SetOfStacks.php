<?php

namespace Chapter03\Question3_3;

use CTCILibrary\Stack;

class SetOfStacks
{
    /**
     * @var StackWithCapacity[]
     */
    private $stacks = [];
    public $capacity;

    public function __construct(int $capacity)
    {
        $this->capacity = $capacity;
    }

    public function push(int $data)
    {
        $last = $this->getLastStack();
        if ($last != null && !$last->isFull()) {
            $last->push($data);
        } else {
            $stack = new StackWithCapacity($this->capacity);
            $stack->push($data);
            array_push($this->stacks, $stack);
        }
    }

    public function pop(): int
    {
        $last = $this->getLastStack();
        if ($last == null) {
            throw new \Exception('Stack is emtpy');
        }
        $data = $last->pop();
        if ($last->isEmpty()) {
            unset($this->stacks[sizeof($this->stacks) - 1]); // array_pop($this->stacks);
        }
        return $data;
    }

    public function popAt(int $index): int
    {
        return $this->leftShift($index, true);
    }

    private function leftShift(int $index, bool $removeTop)
    {
        $stack = $this->stacks[$index];
        $removedItem = $removeTop ? $stack->pop() : $stack->shift();
        if ($stack->isEmpty()) {
            unset($this->stacks[$index]);
        } elseif (sizeof($this->stacks) > $index + 1) {
            //not the last stack
            $value = $this->leftShift($index + 1, false);
            $stack->push($value);
        }

        return $removedItem;
    }

    public function getLastStack(): StackWithCapacity
    {
        if (sizeof($this->stacks) == 0) {
            return null;
        };
        return $this->stacks[sizeof($this->stacks) - 1]; // end($this->stacks);
    }

    public function isEmpty(): bool
    {
        $last = $this->getLastStack();
        return $last == null || $last->isEmpty();
    }
}

class StackWithCapacity extends Stack
{

    private $capacity;

    public function __construct(int $capacity)
    {
        parent::__construct();
        $this->capacity = $capacity;
    }

    public function push(int $value)
    {
        if (sizeof($this->stack) >= $this->capacity) {
            return false;
        }

        parent::push($value);
        return true;
    }

    public function pop(): int
    {
        return parent::pop();
    }

    public function isEmpty(): bool
    {
        return parent::isEmpty();
    }

    public function shift()
    {
        return array_shift($this->stack);
    }

    public function isFull()
    {
        return $this->capacity == sizeof($this->stack);
    }
}