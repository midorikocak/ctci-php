<?php

namespace Chapter02\Question4_4;

use CtCILibrary\TreeNode;

class QuestionA
{

    /**
     * Non-efficient Solution
     *
     * @param TreeNode $root
     * @return int
     */
    public static function getHeight(TreeNode $root): int
    {
        if ($root == null) {
            return -1;
        }
        return max(self::getHeight($root->left), self::getHeight($root->right));
    }

    public static function isBalanced(TreeNode $root): bool
    {
        if ($root == null) {
            return true;
        }

        $heightDifference = self::getHeight($root->left) - self::getHeight($root->right);

        if (abs($heightDifference) > 1) {
            return false;
        } else {
            return self::isBalanced($root->left) && self::isBalanced($root->right);
        }
    }
}