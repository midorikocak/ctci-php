<?php

namespace Chapter02\Question2_4;

use CTCILibrary\LinkedListNode;

class Question
{
    /**
     * Partition LinkedList around value.
     * Not In place solution
     *
     * @param LinkedListNode $node
     * @param int $value
     * @return LinkedListNode
     */
    public static function partition(LinkedListNode $node, int $value): LinkedListNode
    {
        $head = $node;
        $tail = $node;

        $current = $node;

        while ($current) {
            $next = $current->next;
            if ($current->data < $value) {
                $current->next = $head;
                $head = $current;
            } else {
                $tail->next = $current;
                $tail = $current;
            }
            $current = $next;
        }
        $tail->next = null;

        return $head;
    }
}