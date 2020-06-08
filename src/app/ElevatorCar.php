<?php 

  /**
   * Elevator_Test
   * index.php
   * @author  MorelSami (06/06/2020)
   */

  class ElevatorCar{
  
  //class instance variables
  public $elevatorNumber;
  public $currentFloor;

  //class default constructor
  public function __construct($liftNumber){ 
      
    $this->elevatorNumber= $liftNumber;
    $this->currentFloor = 1;

  }

  /** Class Setters and Getters **/

  public function getElevatorNumber(){
    
    return $this->elevatorNumber;
  }

  public function getCurrentFloor(){
  	
  	return $this->currentFloor;
  }


 public function setElevatorNumber($newNumber){

     $this->elevatorNumber = $newNumber;

  }

  public function setCurrentFloor($newFloor){

     $this->currentfloor = $newFloor;

  }

  /**
  * moveUp Function to call for a lift/elevator car
  * requesting to move 
  * @return void, simply prints out the named action
  */

  public function moveUp(){
     $this->currentFloor = $this->currentFloor + 1;
     $this->setCurrentFloor($this->currentFloor);
     echo "Floor Number ". $this->currentFloor."↑ </br>";
  }


  /**
  * moveDqwn Function to call for a lift/elevator car
  * requesting to move down
  * @return void, simply prints out the named action
  */

  public function moveDown(){
  	 $this->currentFloor = $this->currentFloor - 1;
     $this->setCurrentFloor($this->currentFloor);
     echo "Floor Number ". $this->currentFloor."↓ </br>";
  }


  /**
  * openDoor Function to request the lift/elevator car door 
  * to be opened
  * @return void, simply prints out the named action
  */

  public function openDoor(){
  	 echo "Door Opened!</br>";
  }

  /**
  * closeDoor Function to request the lift/elevator car door 
  * to be 
  * @return void, simply prints out the named action
  */

  public function closeDoor(){
  	  echo "Door Closed!</br>";
  }

  }

?>