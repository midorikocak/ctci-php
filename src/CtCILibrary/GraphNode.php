<?php

namespace CtCILibrary;


class GraphNode
{
    public $data;
    public $adjacent;

    public function __construct(int $data)
    {
        $this->data = $data;
        $this->adjacent = [];
    }

    public function addEdge(GraphNode $node)
    {
        if (!in_array($node, $this->adjacent)) {
            array_push($this->adjacent, $node);
        }
        $node->addEdge($this);
    }
}