<?php

namespace Chapter02\Question2_7;


use CTCILibrary\LinkedListNode;

class Question
{

    /**
     *
     * Find lengths and tails
     * if tails are different return false
     * set two pointers to start
     * advance pointer of the longer list by difference
     * Traverse each list until pointers are same
     *
     * @param LinkedListNode $list1
     * @param LinkedListNode $list2
     * @return LinkedListNode
     */
    public static function findIntersection(LinkedListNode $list1, LinkedListNode $list2): LinkedListNode
    {
        // if we use == this line returns nesting level to deep fatal error
        // Check if lists are null (can't be null with parameter type), empty, one size
        if ($list1->data === $list2->data) {
            return $list1;
        }

        $size1 = self::getSize($list1);
        $tail1 = self::getTail($list1);
        $size2 = self::getSize($list2);
        $tail2 = self::getTail($list2);

        if ($tail1 != $tail2) {
            return false;
        }

        $difference = abs($size1 - $size2);
        $shorter = ($size1 > $size2) ? $list2 : $list1;
        $longer = ($size1 > $size2) ? $list1 : $list2;

        // advance pointer as difference
        for ($i = 0; $i < $difference; $i++) {
            $longer = $longer->next;
        }

        while ($shorter && $longer) {
            if ($shorter === $longer) {
                return $shorter;
            }
            $shorter = $shorter->next;
            $longer = $longer->next;
        }

        return null;
    }

    public static function getSize(LinkedListNode $node): int
    {
        $size = 0;
        while ($node) {
            $size++;
            $node = $node->next;
        }
        return $size;
    }

    public static function getTail(LinkedListNode $node)
    {
        while ($node->next) {
            $node = $node->next;
        }
        return $node;
    }

}