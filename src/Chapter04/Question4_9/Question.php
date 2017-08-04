<?php

namespace Chapter02\Question4_9;

use CTCILibrary\LinkedList;
use CtCILibrary\TreeNode;

class Question
{
    public static function allSequences(TreeNode $node)
    {
        $result = [];
        if ($node == null) {
            array_push($result, []);
            return $result;
        }
        $prefix = [];
        array_push($prefix, $node->data);
        $leftSequence = self::allSequences($node->left);
        $rightSequence = self::allSequences($node->right);
        // veawe together
        foreach ($leftSequence as $left) {
            foreach ($rightSequence as $right) {
                $veawed = [];
                self::weaveLists($left, $right, $veawed, $prefix);
                $result = array_merge($result, $veawed);
            }
        }
        return $result;
    }

    public static function weaveLists(array $first, array $second, array &$results, array $prefix)
    {
        if (sizeof($first) == 0 && sizeof($second) == 0) {
            $result = $prefix;
            $result = array_merge($result, $first);
            $result = array_merge($result, $second);
            $results = array_merge($results, $result);
        }
    }
}