<?php

namespace CtCILibrary;


class BTreePrinter
{
    public static function printNode(TreeNode $root)
    {
        $maxLevel = self::maxLevel($root);

        self::printNodeInternal([$root], 1, $maxLevel);
    }

    /**
     * @param TreeNode[] $nodes
     * @param int $level
     * @param int $maxLevel
     */
    private static function printNodeInternal(array $nodes, int $level, int $maxLevel)
    {
        if (empty($nodes) || self::isAllElementsNull($nodes)) {
            return;
        }

        $floor = $maxLevel - $level;
        $edgeLines = (int)pow(2, (max($floor - 1, 0)));
        $firstSpaces = (int)pow(2, $floor - 1);
        $betweenSpaces = (int)pow(2, $floor - 1) - 1;

        self::printWhiteSpaces($firstSpaces);

        $newNodes = [];

        foreach ($nodes as $node) {
            if ($node != null) {
                echo $node->data;
                array_push($newNodes, $node->left);
                array_push($newNodes, $node->right);
            } else {
                array_push($newNodes, null);
                array_push($newNodes, null);
                echo " ";
            }

            self::printWhiteSpaces($betweenSpaces);
        }

        echo "\n";

        for ($i = 0; $i <= $edgeLines; $i++) {
            for ($j = 0; $j < count($nodes); $j++) {
                self::printWhiteSpaces($firstSpaces - $i);
                if ($nodes[$j] == null) {
                    self::printWhiteSpaces($edgeLines + $edgeLines + $i + 1);
                    continue;
                }

                if ($nodes[$j]->left != null) {
                    echo "/";
                } else {
                    self::printWhiteSpaces(1);
                }

                self::printWhiteSpaces($i + $i + 1);

                if ($nodes[$j]->right != null) {
                    echo "\\";
                } else {
                    self::printWhiteSpaces(1);
                }

                self::printWhiteSpaces($edgeLines + $edgeLines - $i);
            }

            echo "\n";
        }

        self::printNodeInternal($newNodes, $level + 1, $maxLevel);
    }

    private static function printWhiteSpaces(int $count)
    {
        for ($i = 0; $i < $count; $i++) {
            echo " ";
        }
    }

    private static function isAllElementsNull(array $array): bool
    {
        foreach ($array as $item) {
            if ($item != null) {
                return false;
            }
        }

        return true;
    }

    private static function maxLevel(TreeNode $node): int
    {
        if ($node == null) {
            return 0;
        }

        return max(self::maxLevel($node->left), self::maxLevel($node->right)) + 1;
    }
}