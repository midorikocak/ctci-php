<?php

namespace Chapter04\Question4_7;


class QuestionB
{

    /**
     * Using DFS
     *
     * @param array $projects
     * @param array $dependencies
     * @return array|null
     */
    public static function findBuildOrder(array $projects, array $dependencies)
    {
        $graph = self::buildGraph($projects, $dependencies);
        return self::orderProjects($graph->getNodes());
    }

    /**
     * @param array $projects
     * @param array $dependencies
     * @return Graph
     */
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

    /**
     * @param Project[] $projects
     * @return array|null
     */
    public static function orderProjects(array $projects)
    {
        $stack = [];
        foreach ($projects as $project) {
            if ($project->getState() == "blank") {
                if (!self::doDFS($project, $stack)) {
                    return null;
                }
            }
        }
        return $stack;
    }

    public static function doDFS(ProjectWithState $project, array &$stack)
    {
        if ($project->getState() == "partial") {
            return false; // Cycle
        }

        if ($project->getState() == "blank") {
            $project->setState("partial");
            $children = $project->getChildren();
            foreach ($children as $child) {
                if (!self::doDFS($child, $stack)) {
                    return false;
                }
            }
            $project->setState("complete");
            array_push($stack, $project);
        }
        return true;
    }
}

class ProjectWithState extends Project
{
    private $state = "blank";

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param string $state
     */
    public function setState(string $state)
    {
        $this->state = $state;
    }
}