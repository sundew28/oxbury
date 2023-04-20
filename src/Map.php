<?php
declare(strict_types=1);

namespace src;

/*
| The purpose of this class is takes such a 2-dimensional array `A` and 2 vectors `P` and `Q`, with `0,0`
| being the top left corner of the map and returns the distance of the shortest path between those points, respecting the walls in the map
*/

class Map
{
    // Property to assign the array
    private array $mapArray;

    // Map length
    private int $mapLength;

    // P vector coordinates porperty
    private array $vector_coords_p;

    // Q vector coordinates porperty
    private array $vector_coords_q;

	/**
     * Sets the parameter assigned to variable     
     * 
     * @param String $mapInput Assigned map pattern
     * 
     * @param Array $p start coordinates
     * 
     * @param Array $q end coordinates
     * 
     * Constructor Promoted properties 
     *     
     */
    public function __construct(public string $mapInput, public array $p, public array $q)
    {    	
    	$this->mapArray = explode("\n", $mapInput);
        $this->mapLength = count($this->mapArray);       
        $this->vector_coords_p = $p;
        $this->vector_coords_q = $q;        
    }

    /**
     * Search to find the shortest path between coordinates P and Q in the given 2D array map.
     * Returns a integer value indicating the shortest path keeping in mind the walls in between
     */
    public function shortestPath(): int
    {
        // Check for equality
        if ($this->vector_coords_p == $this->vector_coords_q)
            return 0;
        
        //Assign the x, y coordinates
        $vector_coords_p_x = $this->vector_coords_p[0];
        $vector_coords_p_y = $this->vector_coords_p[1];
        $vector_coords_q_x = $this->vector_coords_q[0];
        $vector_coords_q_y = $this->vector_coords_q[1];        
        
        // Get P coordinates
        $coord_x_start = explode(" ", $this->mapArray[$vector_coords_p_y]);

        $coord_y_end = explode(" ", $this->mapArray[$vector_coords_q_y]);

        // Get upto Q coordinates
        $coord_y_end = array_slice($coord_y_end, 0, $vector_coords_q_y);       

        foreach ($this->mapArray as $key => $value) {

            if (($key != $vector_coords_p_y and $key != $vector_coords_q_y) and $key < $vector_coords_q_y){                
              $coord_x_start = array_merge($coord_x_start, explode(" ", $value)) ;
            }

        }

        $result = array_merge($coord_x_start, $coord_y_end);

        // Assign variable to zero
        $nodesVisited = 0;

        foreach ($result as $values){

            if ($values != "#")
                $nodesVisited++;
            else
                break;
        }
        // Return the path value
        return $nodesVisited;
    }
}

// Assigned map pattern
$map_pattern = ". P . . .
. # # # .
. . . . .
. . Q . .
. . . . .";

// P coordinates
$p = [1, 0];

// Q coordinates
$q = [2, 3];

$shortest_value = new Map($map_pattern, $p, $q);

return $shortest_value->shortestPath();

