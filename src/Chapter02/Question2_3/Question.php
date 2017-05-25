<?php

namespace Chapter02\Question2_3;

use CTCILibrary\LinkedListNode;

class Question
{
    /**
     * Find middle node, copy next's value to itself, delete next
     *
     * @param LinkedListNode $node
     * @return LinkedListNode
     */
    public static function deleteMiddleNode(LinkedListNode $node): LinkedListNode
    {
        $middle = $node;
        $last = $node;

        // fast runner
        while ($last && $last->next) {
            $middle = $middle->next;
            $last = $last->next->next;
        }

        $next = $middle->next;
        $middle->data = $next->data;
        $middle->next = $next->next;

        return $node;
    }
}