<?php 
 
  /**
   * Elevator_Test
   * index.php
   * @author  MorelSami (06/06/2020)
   */

 class ElevatorController{
  
  //class instance variables
  public $elevatorCar_Count_Max;
  public $floorCountMax;
  public $elevatorCar;
  public $request; 

  public function __construct($newRequest){
     $this->elevatorCar_Count_Max= $_ENV['ELEVATOR_CAR_COUNT'];  //$maxElevatorCount
     $this->floorCountMax= $_ENV['FLOOR_COUNT'];  //$maxFloorCount
     $this->request = $newRequest;

  }
  
  
  /**
   * startElevator function to stop elevatorCar when requested
   * @return void, simply prints out the named action
   */
  public function startElevator(){
      echo "Elevator Car started!</br>";
  } 

  
  /**
  * stopElevator function to stop elevatorCar when requested
  * @return void, simply prints out the named action
  */
  public function stopElevator(){
     echo "Elevator Car Stopped!</br>";
  }


  /**
  * elevatorScan function to select the nearest elevatorCar to initial floor request
  * @return $selected elevatorCar 
  */

  public function elevatorScan(){
    
    $count = $this->elevatorCar_Count_Max;
    $requestedFloor = $this->request['startFloor'];
    $min = $this->floorCountMax;
    $selectedLift = 1;
    
    for($i = 1; $i <= $count; $i++){
    
      $this->elevatorCar = new ElevatorCar($i);
      $currentFloor = $this->elevatorCar->getCurrentFloor();

      $levelDiff = abs($currentFloor - $requestedFloor);

      if($levelDiff < $min ){
          $min= $levelDiff; 
          $selectedLift = $i;
        }
     }//end forloop

    return $selectedLift; //get the elevatorCar with the shortest distance from the request floor
    
   }

  
  /**
  * runElevator function to run elevatorCar to necessary floors as requested
  * @param elevatorNumber, the available elevatorCar at that moment
  * @return void, simply prints out the named action
  */

   public function runElevator($elevatorNumber){
     
     $this->elevatorCar = new ElevatorCar($elevatorNumber);
     $currentFloor = $this->elevatorCar->getCurrentFloor();
     echo "Current Floor:  ".$currentFloor."</br></br>";
           
     $fromFloor = $this->request['startFloor'];
     $toFloor = $this->request['stopFloor'];

      if($fromFloor < 1 || $fromFloor > $this->floorCountMax)
         exit("Error !! Wrong Floor");

      if($toFloor < 1 || $toFloor > $this->floorCountMax)
          exit("Error !! Wrong Floor");

       echo "Elevator Car ".$elevatorNumber." selected!</br></br>";

    /**
     ** move elevator to departure floor
     **/

      if($currentFloor == $fromFloor){
          $this->elevatorCar->openDoor();
       }
       else if($currentFloor < $fromFloor){ 

         $this->startElevator();
         while ($currentFloor < $fromFloor ) {
            $this->elevatorCar->moveUp();
            $currentFloor = $this->elevatorCar->getCurrentFloor();
          } //end while loop

          $this->stopElevator(); 
          $this->elevatorCar->openDoor();
        }
        else{
                    
          $this->startElevator();
          while ($currentFloor > $fromFloor ) {
            $this->elevatorCar->moveDown();
            $currentFloor = $this->elevatorCar->getCurrentFloor();
           } //end while loop

          $this->stopElevator();
          $this->elevatorCar->openDoor();

        }//endElse 

        /**
        ** move elevator to destination floor
        **/

        $this->elevatorCar->closeDoor();
        $this->startElevator();
           
        if($toFloor > $fromFloor){
          while ($currentFloor < $toFloor) {
            $this->elevatorCar->moveUp();
            $currentFloor = $this->elevatorCar->getCurrentFloor();
          }
        }
        else{

          while ($currentFloor > $toFloor) {
            $this->elevatorCar->moveDown();
            $currentFloor = $this->elevatorCar->getCurrentFloor();
          }
        }

        $this->stopElevator();
        $this->elevatorCar->openDoor();
        echo "Floor Number " .$currentFloor." , Arrived!</br>";

    }


 }

?>