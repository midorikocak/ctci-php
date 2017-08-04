<?php

namespace Chapter02\Question4_2;

use CtCILibrary\TreeNode;

class Question
{
    /**
     * Given sorted array of unique elements, create a binary search tree with minimal height.
     * @param array $array
     * @return TreeNode
     */
    public static function createMinimalBST(array $array, int $start = 0, int $end = null): TreeNode
    {
        if ($end == null) {
            $end = sizeof($array) - 1;
        }

        if ($start > $end) {
            return null;
        }

        $middle = (int)floor(($start + $end) / 2);
        $root = new TreeNode($array[$middle]);

        $root->left = self::createMinimalBST($array, 0, $middle - 1);
        $root->right = self::createMinimalBST($array, $middle + 1, $end);

        return $root;

    }
}