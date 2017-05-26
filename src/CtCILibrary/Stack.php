<?php

namespace CTCILibrary;


class Stack
{

    /**
     * We can use array or linkedlist node for represent a stack.
     * In php it's relatively easy because of functions array_push
     * and array_pop. A nicer looking class parent would be a sink class
     * for stack and queue but hence this is not a oop book, we skip it.
     *
     * @var int[]
     */
    private $stack;

    public function __construct()
    {
        $this->stack = [];
    }

    public function push(int $value)
    {
        array_push($this->stack, $value);
    }

    public function pop(): int
    {
        return array_pop($this->stack);
    }

    public function peek(): int
    {
        return end($this->stack);
    }

    public function isEmpty(): bool
    {
        return empty($this->stack);
    }

}