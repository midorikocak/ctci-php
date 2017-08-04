<?php

namespace Chapter04\Question4_7;


class Graph
{
    /**
     * @var Project[]
     */
    private $nodes = [];
    private $map = [];

    /**
     * @param string $name
     * @return Project
     */
    public function getOrCreateNode(string $name)
    {
        if (!isset($this->map[$name])) {
            $node = new Project($name);
            array_push($this->nodes, $node);
            $this->map[$name] = $node;
        }
        return $this->map[$name];
    }

    public function addEdge(string $startName, string $endName)
    {

        /**
         * @var $start Project
         */
        $start = $this->getOrCreateNode($startName);

        /**
         * @var $end Project
         */
        $end = $this->getOrCreateNode($endName);
        $start->addNeighbor($end);
    }

    /**
     * @return Project[]
     */
    public function getNodes(): array
    {
        return $this->nodes;
    }
}