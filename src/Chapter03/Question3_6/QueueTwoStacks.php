<?php

namespace Chapter03\Question3_6;

use CTCILibrary\LinkedListNode;

class Animal
{
    private $order;
    protected $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function setOrder(int $order)
    {
        $this->order = $order;
    }

    public function getOrder(): int
    {
        return $this->order;
    }

    public function isOlderThan(Animal $animal): bool
    {
        return $this->order < $animal->getOrder();
    }
}

class AnimalQueue
{
    /**
     * @var Dog[]
     */
    private $dogs;

    /**
     * @var Cat[]
     */
    private $cats;

    /**
     * Act as timestamp
     *
     * @var int
     */
    private $order = 0;

    function __construct()
    {
        // using array as queue
        $this->dogs = [];
        $this->cats = [];
    }

    public function enqueue(Animal $animal)
    {
        $animal->setOrder($this->order);
        $this->order++;

        if ($animal instanceof Dog) {
            array_push($this->dogs, $animal);
        } elseif ($animal instanceof Cat) {
            array_push($this->cats, $animal);
        }
    }

    public function dequeueAny()
    {
        if (sizeof($this->dogs) == 0) {
            return $this->dequeueCats();
        } elseif (sizeof($this->cats) == 0) {
            return $this->dequeueDogs();
        }

        $dog = reset($this->dogs);
        $cat = reset($this->cats);

        if ($dog->isOlderThan($cat)) {
            return $this->dequeueDogs();
        } else {
            return $this->dequeueCats();
        }
    }

    public function dequeueDogs(): Animal
    {
        return array_shift($this->dogs);
    }

    public function dequeueCats(): Animal
    {
        return array_shift($this->cats);
    }
}

class Dog extends Animal
{
    public function __construct($name)
    {
        parent::__construct($name);
    }
}

class Cat extends Animal
{
    public function __construct($name)
    {
        parent::__construct($name);
    }
}