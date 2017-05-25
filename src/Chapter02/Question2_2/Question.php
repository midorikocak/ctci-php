<?php

namespace Chapter02\Question2_2;


use CTCILibrary\LinkedListNode;

class Question
{
    public static function nthToLast(LinkedListNode $head, int $fromLast): LinkedListNode
    {
        $last = $head;
        $nthToLast = $head;
        for ($i = 0; $i < $fromLast; $i++) {
            if ($last == null) {
                return null;
            }
            $last = $last->next;
        }

        while ($last->next) {
            $nthToLast = $nthToLast->next;
            $last = $last->next;
        }

        return $nthToLast;
    }
}