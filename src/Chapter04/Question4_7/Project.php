<?php

namespace Chapter04\Question4_7;


class Project
{
    private $children = [];
    private $map = [];
    private $name;
    private $dependencies = 0;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function addNeighbor(Project $node)
    {
        if (!isset($this->map[$node->name])) {
            array_push($this->children, $node);
            $this->map[$node->name] = $node;
            $node->incrementDependencies();
        }
    }

    public function incrementDependencies()
    {
        $this->dependencies++;
    }

    public function decrementDependencies()
    {
        $this->dependencies--;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getChildren(): array
    {
        return $this->children;
    }

    /**
     * @return int
     */
    public function getDependencies(): int
    {
        return $this->dependencies;
    }
}