<?php

namespace Chapter02\Question2_6;


use CTCILibrary\LinkedListNode;

class Question
{
    public static function isPalindrome(LinkedListNode $head): bool
    {
        $stack = [];
        // Go till to the end count the number, find the middle
        $fast = $head;
        $slow = $head;

        while ($fast != null && $fast->next != null) {
            // add first half elements
            array_push($stack, $slow->data);
            $slow = $slow->next;
            $fast = $fast->next->next;
        }
        // has odd elements, skip middle;
        if ($fast != null) {
            $slow = $slow->next;
        }

        // slow pointer goes till the end.
        while ($slow != null) {
            // start to compare elements
            $top = array_pop($stack);
            if ($top != $slow->data) {
                return false;
            }
            $slow = $slow->next;
        }
        return true;
    }

}