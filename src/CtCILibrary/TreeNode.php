<?php

namespace CtCILibrary;


class TreeNode
{
    public $data;

    /**
     * @var TreeNode
     */
    public $left;

    /**
     * @var TreeNode
     */
    public $right;

    /**
     * @var TreeNode
     */
    public $parent;

    public $size = 0;

    function __construct(int $data)
    {
        $this->data = $data;
        $this->size = 1;
    }

    public function setLeftChild(TreeNode $left)
    {
        $this->left = $left;

        // Set parent pointer
        if ($left != null) {
            $left->parent = $this;
        }
    }

    public function setRightChild(TreeNode $right)
    {
        $this->right = $right;

        // Set parent pointer
        if ($right != null) {
            $right->parent = $this;
        }
    }

    public function insertInOrder(int $data)
    {
        if ($data <= $this->data) {
            if ($this->left == null) {
                $this->setLeftChild(new TreeNode($data));
            } else {
                $this->left->insertInOrder($data);
            }
        } else {
            if ($this->right == null) {
                $this->setRightChild(new TreeNode($data));
            } else {
                $this->right->insertInOrder($data);
            }
        }
        $this->size++;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function isBst(): bool
    {
        if ($this->left != null) {
            if ($this->data < $this->left->data || !$this->left->isBst()) {
                return false;
            }
        }

        if ($this->right != null) {
            if ($this->data >= $this->right->data || !$this->right->isBst()) {
                return false;
            }
        }

        return true;
    }

    public function height()
    {
        $leftHeight = $this->left != null ? $this->left->height() : 0;
        $rightHeight = $this->right != null ? $this->eight->height() : 0;
        return 1 + max($leftHeight, $rightHeight);
    }

    /**
     * Should return TreeNode only, but to do that,
     * we should implement NullTreeNode or EmptyTreeNode.
     *
     * @param int $data
     * @return $this|TreeNode|null
     */
    public function find(int $data)
    {
        if ($data == $this->data) {
            return $this;
        } elseif ($data <= $this->data) {
            return $this->left != null ? $this->left->find($data) : null;
        } elseif ($data > $this->data) {
            return $this->right != null ? $this->right->find($data) : null;
        }
        return null;
    }

    public function createMinimalBST(array $array, int $start = null, int $end = null)
    {
        if ($start == null) {
            $start = 0;
        }
        if ($end == null) {
            $end = sizeof($array) - 1;
        }

        if ($end < $start) {
            return null;
        }

        $middle = (int)floor(($end + $start) / 2);

        $node = new TreeNode($array[$middle]);
        $node->setLeftChild($this->createMinimalBST($array, $start, $middle - 1));
        $node->setRightChild($this->createMinimalBST($array, $middle + 1, $end));

        return $node;
    }

    public function printNode()
    {
        BTreePrinter::printNode($this);
    }
}