<?php

namespace Chapter02\Question2_1;

use CTCILibrary\LinkedListNode;

class Question
{
    public static function deleteDuplicates(LinkedListNode $node)
    {
        // using hashmap as buffer

        $set = [];
        $previous = null;
        $current = $node;

        while ($current) {
            if (!isset($set[$current->data])) {
                $set[$current->data] = true;
                $previous = $current;
            } else {
                $previous->next = $current->next;
            }
            $current = $current->next;
        }

        return $node;
    }

    // No buffer allowed
    public static function deleteDuplicates2(LinkedListNode $head)
    {
        $current = $head;
        while ($current) {
            $runner = $current;
            while ($runner->next) {
                if ($runner->next->data == $current->data) {
                    $runner->next = $runner->next->next;
                } else {
                    $runner = $runner->next;
                }
            }
            $current = $current->next;
        }

        return $head;
    }
}