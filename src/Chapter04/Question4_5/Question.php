<?php

namespace Chapter02\Question4_5;

use CtCILibrary\TreeNode;

/**
 * Validate if BST
 *
 * Implement a function to check if a binary tree is
 * a valid binary search tree.
 * A valid binary search tree is that
 * 1. it's all left descendants are smaller than root value,
 * 2. it's all right descendants are bigger than root value.
 *
 * Class Question
 * @package Chapter02\Question4_5
 */
class Question
{
    public static function checkBst(TreeNode $node, int $lastValue = null)
    {
        // is it?
        if ($node == null) {
            return true;
        }

        if (!self::checkBst($node->left, $lastValue)) {
            return false;
        }

        if ($lastValue != null && $node->data <= $lastValue) {
            return false;
        }

        $lastValue = $node->data;
        // $last value is current value of node.
        if (!self::checkBst($node->right, $lastValue)) {
            return false;
        }
        return true;
    }
}