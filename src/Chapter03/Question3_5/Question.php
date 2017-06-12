<?php

namespace Chapter03\Question3_5;

use CTCILibrary\Stack;

class Question
{
    public static function sort(Stack $stack)
    {
        $buffer = new Stack();
        while (!$stack->isEmpty()) {
            $tmp = $stack->pop();

            while (!$buffer->isEmpty() && $buffer->peek() > $tmp) {
                $stack->push($buffer->pop());
            }
            $buffer->push($tmp);
        }
        while (!$buffer->isEmpty()) {
            $stack->push($buffer->pop());
        }
    }
}