<?php

namespace Chapter02\Question2_8;


use CTCILibrary\LinkedListNode;

class Question
{
    /**
     * Loop detection
     *
     * @param LinkedListNode $head
     * @return LinkedListNode
     */
    public static function findBeginning(LinkedListNode $head): LinkedListNode
    {
        $slow = $head;
        $fast = $head;
        while ($slow && $fast->next) {
            $slow = $slow->next;
            $fast = $fast->next->next;
            if ($slow == $fast) {
                break;
            }
        }

        // No loop
        if ($fast == null || $fast->next == null) {
            return null;
        }

        // Slow pointer back to beginning
        // advance both pointers by one step
        // when they collide, intersecting item found
        $slow = $head;
        while ($slow != $fast) {
            $slow = $slow->next;
            $fast = $fast->next;
        }
        return $fast;
    }

}