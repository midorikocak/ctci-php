<?php

namespace Chapter02\Question4_4;

use CtCILibrary\TreeNode;

class QuestionB
{

    /** Efficient Solution
     *
     * @param TreeNode $root
     * @return bool
     */
    public static function checkHeight(TreeNode $root): bool
    {
        if ($root == null) {
            return -1;
        }
        $leftHeight = self::checkHeight($root->left);

        if ($leftHeight == PHP_INT_MIN) {
            return PHP_INT_MIN;
        }

        $rightHeight = self::checkHeight($root->right);

        if ($rightHeight == PHP_INT_MIN) {
            return PHP_INT_MIN;
        }

        $heightDifference = $leftHeight - $rightHeight;

        if (abs($heightDifference) > 1) {
            return PHP_INT_MIN;
        } else {
            return max($leftHeight, $rightHeight) + 1;
        }
    }

    public static function isBalanced(TreeNode $root): bool
    {
        return self::checkHeight($root) != PHP_INT_MIN;
    }

    /**
     * Using DFS
     *
     * @param TreeNode $root
     * @param int $currentLevel
     * @param int $maxHeight
     * @return bool
     */
    public static function calculateHeight(TreeNode $root, int $currentLevel, int $maxHeight): bool
    {
        if ($root == null) {
            return 0;
        }
        $currentLevel++;
        if ($currentLevel > $maxHeight) {
            $maxHeight = $currentLevel;
        }
        $leftSize = self::calculateHeight($root->left, $currentLevel, $maxHeight);
        $rightSize = self::calculateHeight($root->right, $currentLevel, $maxHeight);
        return abs($leftSize - $rightSize) < 2;
    }

}