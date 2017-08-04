<?php

namespace Chapter02\Question4_3;

use CTCILibrary\LinkedListNode;
use CtCILibrary\TreeNode;

class Question
{

    /**
     * Create LinkedList from Binary Tree
     *
     * @param TreeNode $treeNode
     * @return LinkedListNode
     */
    public static function linkedListFromTree(TreeNode $treeNode): LinkedListNode
    {
        if ($treeNode == null) {
            return null;
        }

        $queue = [];
        $current = new LinkedListNode($treeNode->data);
        $head = $current;
        array_push($queue, $treeNode->left);
        array_push($queue, $treeNode->right);

        while (!empty($queue)) {

            /**
             * @var $node TreeNode
             */
            $node = array_shift($queue);
            $next = new LinkedListNode($node->data);

            $current->next = $next;
            $current = $next;
            if ($node->left !== null) {
                array_push($queue, $node->left);
            }

            if ($node->right !== null) {
                array_push($queue, $node->right);
            }
        }
        return $head;
    }
}