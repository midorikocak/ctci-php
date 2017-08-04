<?php

namespace Chapter02\Question4_10;

use CtCILibrary\TreeNode;

/**
 * Check Subtree
 *
 * T2 is subtree of T1 if there exists a node
 * in T1, such that subtree of n is identical
 * to T2. If you cut of the tree at node n,
 * the two trees would be identical
 *
 * Class QuestionA
 * @package Chapter02\Question4_10
 */
class QuestionA
{
    public static function containsTree(TreeNode $haystack, TreeNode $needle)
    {
        $string1 = "";
        $string2 = "";

        self::getOrderString($haystack, $string1);
        self::getOrderString($needle, $string2);

        return strpos($string1, $string2) !== false;
    }

    /**
     * preorder traversal
     * O(n+m) space
     *
     * @param TreeNode $node
     * @param string $string
     */
    public static function getOrderString(TreeNode $node, string &$string)
    {
        if ($node == null) {
            $string .= "x";
            return;
        }
        $string .= $node->data . " ";
        self::getOrderString($node->left, $string);
        self::getOrderString($node->right, $string);
    }
}