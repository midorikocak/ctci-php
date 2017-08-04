<?php

namespace Chapter02\Question4_10;

use CtCILibrary\TreeNode;

class QuestionB
{
    public static function containsTree(TreeNode $node1, $node2)
    {
        if ($node2 == null) {
            return true; // Empty tree is a subtree of every tree
        } else {
            return self::subTree($node1, $node2);
        }
    }

    public static function subTree(TreeNode $node1, TreeNode $node2)
    {
        if ($node1 == null) {
            return false; // big tree empty & subtree still not found
        }
        if ($node1->data == $node2->data) {
            if (self::matchTree($node1, $node2)) {
                return true;
            }
        }
        return (self::subTree($node1->left, $node2)) || (self::subTree($node1->right, $node2));
    }

    /**
     * Check if the binary tree rooted at node1 contains the
     * binary tree rooted at node2 as a subtree starting at node1.
     *
     * @param TreeNode $node1
     * @param TreeNode $node2
     * @return bool
     */
    public static function matchTree(TreeNode $node1, TreeNode $node2): bool
    {
        if ($node2 == null && $node1 == null) {
            return true; // nothing left in the subtree
        }
        if ($node1 == null || $node2 == null) {
            return false; // big tree empty &subtree still not found
        }
        if ($node1->data != $node2->data) {
            return false; // data doesn't match
        }

        return self::matchTree($node1->left, $node2->left) && self::matchTree($node1->right, $node2->right);
    }
}