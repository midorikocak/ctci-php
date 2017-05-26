<?php

use Chapter03\Question3_2\MinStack;

class Question3_2Test extends \PHPUnit_Framework_TestCase
{
    /**
     * @var MinStack
     */
    protected $minStack;
    protected $randomNumberArray;
    protected $min;

    protected function setUp()
    {
        $this->minStack = new MinStack();

        // https://stackoverflow.com/questions/10824770/generate-array-of-random-unique-numbers-in-php
        $random_number_array = range(0, 100);
        shuffle($random_number_array);
        $random_number_array = array_slice($random_number_array, 0, 10);

        $this->randomNumberArray = $random_number_array;

        foreach ($random_number_array as $num) {
            $this->minStack->push($num);
        }

        $this->min = min($random_number_array);
    }

    private static function removeItemFromArray(int $toDelete, &$array): bool
    {
        foreach ($array as $key => $value) {
            if ($value == $toDelete) {
                unset($array[$key]);
                return true;
            }
        }
        return false;
    }

    public function testPop()
    {
        $number = $this->minStack->pop();
        $this->assertEquals(array_pop($this->randomNumberArray), $number);
        $this->assertEquals(array_pop($this->randomNumberArray), $this->minStack->peek());
    }

    public function testMin()
    {
        $number = $this->minStack->pop();
        self::removeItemFromArray($number, $this->randomNumberArray);
        $newMin = min($this->randomNumberArray);

        $this->assertEquals($newMin, $this->minStack->min());
    }

    public function testPeek()
    {
        $this->assertEquals(end($this->randomNumberArray), $this->minStack->peek());
    }

    public function testIsEmpty()
    {
        $this->assertFalse($this->minStack->isEmpty());
    }
}