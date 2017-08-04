<?php

namespace Chapter02\Question4_6;

use CtCILibrary\TreeNode;

class Question
{

    public static function findMinimum(TreeNode $node)
    {
        if ($node === null) {
            return null;
        }
        if ($node->left === null) {
            return $node;
        }

        return self::findMinimum($node->left);
    }

    public static function inOrderSuccessor(TreeNode $root, TreeNode $node)
    {
        if ($node->right !== null) {
            return self::findMinimum($node->right);
        }

        $successor = null;

        while ($root !== null) {
            // Should find in left
            if ($root->data > $node->data) {
                $successor = $root;
                $root = $root->left;
            } elseif ($root->data < $node->data) {
                $root = $root->right;
            } else {
                return $successor;
            }
        }
        return null;
    }
}