<?php

namespace Chapter04\Question4_7;

use Chapter04\Question4_7\Graph;
use Chapter04\Question4_7\Project;

class QuestionA
{

    public static function findBuildOrder(array $projects, array $dependencies)
    {
        $graph = self::buildGraph($projects, $dependencies);
        return self::orderProjects($graph->getNodes());
    }

    public static function buildGraph(array $projects, array $dependencies): Graph
    {
        $graph = new Graph();
        foreach ($projects as $project) {
            $graph->getOrCreateNode($project);
        }

        foreach ($dependencies as $dependency) {
            $first = $dependency[0];
            $second = $dependency[1];
            $graph->addEdge($first, $second);
        }
        return $graph;
    }

    public static function orderProjects(array $projects): array
    {
        /**
         * @var $order Project[]
         */
        $order = [];

        $endOfList = self::addNonDependent($order, $projects, 0);
        $toBeProcessed = 0;

        while ($toBeProcessed < sizeof($order)) {
            $current = $order[$toBeProcessed];
            if ($current == null) {
                return null;
            }
            $children = $current->getChildren();

            // Remove myself as a dependency

            /**
             * @var $child Project
             */
            foreach ($children as $child) {
                $child->decrementDependencies();
            }
            $endOfList = self::addNonDependent($order, $children, $endOfList);
        }

        return $order;
    }

    /**
     * @param array $order
     * @param Project[] $projects
     * @return int
     */
    public static function addNonDependent(array &$order, array $projects, int $offset)
    {
        foreach ($projects as $project) {
            if ($project->getDependencies() == 0) {
                $order[$offset] = $project;
                $offset++;
            }
        }
        return $offset;
    }
}