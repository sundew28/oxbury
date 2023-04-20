<?php

namespace tests;

use PHPUnit\Framework\TestCase;

use src\Map;

class PathFindTest extends TestCase
{
	/**
	 * Case 1 of successfull testing
	 **/
	public function testOneSuccessPathFinder()
	{
	    $map_pattern = ". P . . .
. # # # .
. . . . .
. . Q . .
. . . . .";

        // P coordinates
        $p = [1, 0];

        // Q coordinates
        $q = [2, 3];

        $firstTest = new Map($map_pattern, $p, $q);

        $firstTestValue = $firstTest->shortestPath();        

        // value is equal to actual or not
        $this->assertEquals(
            $firstTestValue,
            6,
            "Test value value is not equals to expected"
        );		

	}

	/**
	 * Case 2 of successfull testing
	 **/
	public function testTwoSuccessPathFinder()
	{
	    $map_pattern = ". P . . .
. . # # .
. . . . .
. . Q . .
. . . . .";

        // P coordinates
        $p = [1, 0];

        // Q coordinates
        $q = [2, 3];

        $firstTest = new Map($map_pattern, $p, $q);

        $firstTestValue = $firstTest->shortestPath();        

        // value is equal to actual or not
        $this->assertEquals(
            $firstTestValue,
            7,
            "Test value value is not equals to expected"
        );		

	}

	/**
	 * Case 3 of unsuccessfull testing / out of bounds
	 **/
	public function testTwoUnSuccessPathFinder()
	{
	    $map_pattern = ". P . . .
. . # # .
. . . . .
. . Q . .
. . . . .";

        // P coordinates
        $p = [-1, 0];

        // Q coordinates
        $q = [-2, 3];

        $firstTest = new Map($map_pattern, $p, $q);

        $firstTestValue = $firstTest->shortestPath();        

        // value is equal to actual or not
        $this->assertEquals(
            $firstTestValue,
            7,
            "Test value value is not equals to expected"
        );		

	}

	/**
	 * Case 4 of equal coordinates
	 **/
	public function testFourEqualPathFinder()
	{
	    $map_pattern = ". P . . .
. . # # .
. . . . .
. . Q . .
. . . . .";

        // P coordinates
        $p = [1, 0];

        // Q coordinates
        $q = [1, 0];

        $firstTest = new Map($map_pattern, $p, $q);

        $firstTestValue = $firstTest->shortestPath();        

        // value is equal to actual or not
        $this->assertEquals(
            $firstTestValue,
            0,
            "Test value value is not equals to expected"
        );		

	}
}