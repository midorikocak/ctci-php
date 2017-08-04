<?php

namespace Chapter02\Question4_8;

use CtCILibrary\TreeNode;

class Question
{
    public static function commonAncestor(TreeNode $root, TreeNode $node1, TreeNode $node2)
    {
        if ($root == null) {
            return null;
        }

        if ($root == $node1 && $root == $node2) {
            return $root;
        }

        $left = self::commonAncestor($root->left, $node1, $node2);
        if ($left != null && $left != $node1 && $left != $node2) {
            return $left;
        }

        $right = self::commonAncestor($root->right, $node1, $node2);
        if ($right != null && $right != $node1 && $left != $node2) {
            return $right;
        }

        if ($left != null && $right != null) {
            return $root;
        } elseif ($root == $node1 || $root == $node2) {
            return $root;
        } else {
            return $left == null ? $right : $left;
        }
    }
}