<?php 

  class ElevatorCar{
  
  //class instance variables
  public $elevatorNumber;
  public $currentFloor;
  public $currentState; 
  
  ////Elevator new state must be either -1, 0, 1 respectively(movingDown, stationary, movingUp)

  //class default constructor
  public function __construct($number){ 
      
    $this->elevatorNumber= $number;
    $this->currentFloor = 1;
    $this->currentState = 0;

  }

  
  public function getElevatorNumber(){
    
    return $this->elevatorNumber;
  }

  public function getCurrentFloor(){
  	
  	return $this->currentFloor;
  }

  public function getCurrentState(){
    
    return $this->currentFloor;
  }


 public function setElevatorNumber($newNumber){

     $this->elevatorNumber = $newNumber;

  }

  public function setCurrentFloor($newFloor){

     $this->currentfloor = $newFloor;

  }

  public function setCurrentState($newState){
     $this->currentState = $newState;
  }


  /**
  * moveUp Function to call for a lift/elevator car
  * requesting to move up
  */

  public function moveUp(){
     $this->currentFloor = $this->currentFloor + 1;
     $this->setCurrentFloor($this->currentFloor);
     echo "Floor Number ". $this->currentFloor."↑ </br>";
  }


  /**
  * moveDqwn Function to call for a lift/elevator car
  * requesting to move down
  */

  public function moveDown(){
  	 $this->currentFloor = $this->currentFloor - 1;
     $this->setCurrentFloor($this->currentFloor);
     echo "Floor Number ". $this->currentFloor."↓ </br>";
  }


  /**
  * openDoor Function to request the lift/elevator car door 
  * to be opened
  */

  public function openDoor(){
  	 echo "Door Opened!</br>";
  }

  /**
  * closeDoor Function to request the lift/elevator car door 
  * to be closed
  */

  public function closeDoor(){
  	  echo "Door Closed!</br>";
  }

  /**
  * emergencyStop Function to request the lift/elevator car  
  * to stop whereever it is located
  */

  public function EmergencyStop(){
  	  echo "Elevator Stopped!</br>";
  }




  }

?>