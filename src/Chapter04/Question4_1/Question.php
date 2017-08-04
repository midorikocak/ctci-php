<?php

namespace Chapter02\Question4_1;

use CtCILibrary\GraphNode;

class Question
{
    /**
     * Route between nodes.
     * Simple graph traversal. Breadth First Search. Use Queues.
     *
     * @param GraphNode $start
     * @param GraphNode $end
     * @return bool
     */
    public static function search(GraphNode $start, GraphNode $end): bool
    {
        if ($start == $end) {
            return true;
        }

        /**
         * @var $queue GraphNode[]
         */
        $queue = [];

        $visited = [];


        array_push($queue, $start);
        array_push($visited, $start);

        // !empty($queue)
        while (sizeof($queue) > 0) {
            /**
             * @var $node GraphNode
             */
            $node = array_shift($queue);
            array_push($visited, $node);

            foreach ($node->adjacent as $child) {
                if (!(in_array($visited, $child))) {
                    if ($child == $end) {
                        return true;
                    } else {
                        array_push($queue, $child);
                    }
                }
            } // all children added
        }
        return false;
    }
}