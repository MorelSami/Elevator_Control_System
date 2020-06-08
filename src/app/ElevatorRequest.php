<?php

class ElevatorRequest extends Button{
    
    //class instance variable(s)
 	public $fromFloor;
 	public $toFloor;

 	public function __construct($departure, $destination){ 
 		$this->fromFloor = $departure;
 		$this->toFloor = $destination;
 	}

 	public function placeRequest(){

        $request = array("initFloor" => $this->fromFloor, "endFloor" => $this->toFloor);
        return $request;
 	}

 }

?>