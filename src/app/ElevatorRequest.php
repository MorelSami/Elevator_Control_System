<?php

class ElevatorRequest{
    
    //class instance variable(s)
 	public $fromFloor;
 	public $toFloor;
 	public $request; 

 	public function __construct($departure, $destination){ 
 		$this->fromFloor = $departure;
 		$this->toFloor = $destination;
 	}

 	public function placeRequest(){

        $this->request = array("initFloor" => $this->fromFloor, "endFloor" => $this->toFloor);
        return $this->request;
 	}

 }

?>