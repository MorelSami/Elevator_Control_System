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

 	public function getRequest(){

        $this->request = array("startFloor" => $this->fromFloor, "stopFloor" => $this->toFloor);
        echo "Elevator request >>> </br></br>";
        echo "Initial Floor: ".$this->fromFloor."</br>";
        echo "Destination  Floor : ".$this->toFloor."</br>";
        echo "</br>";
        return $this->request;
 	}

 }

?>