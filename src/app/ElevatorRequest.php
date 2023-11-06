<?php

/**
   * Elevator Request
   * 
   * @author  MorelSami (06/06/2020)
   */


class ElevatorRequest{
    
    //class instance variable(s)
 	public $fromFloor;
 	public $toFloor;
 	public $request; 

    //default class constructor 
 	public function __construct($departure, $destination){ 
 		$this->fromFloor = $departure;
 		$this->toFloor = $destination;
 	}

  /**
  * getRequest function, elevatorRequest getter method
  * @return request 
  */
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