<?php

namespace Chapter03\Question3_4;

use CTCILibrary\Stack;

class QueueTwoStacks
{

    private $stackNewest;
    private $stackOldest;

    public function __construct()
    {
        $this->stackNewest = new Stack();
        $this->stackOldest = new Stack();
    }

    public function add(int $data)
    {
        $this->stackNewest->push($data);
    }

    public function peek(): int
    {
        $this->shiftStacks();
        return $this->stackOldest->peek();
    }

    public function remove(): int
    {
        $this->shiftStacks();
        return $this->stackOldest->pop();
    }

    private function shiftStacks()
    {
        if ($this->stackOldest->isEmpty()) {
            while (!$this->stackNewest->isEmpty()) {
                $this->stackOldest->push($this->stackNewest->pop());
            }
        }
    }

}