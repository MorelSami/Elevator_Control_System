<?php 

 class ElevatorController{
  
  //class instance variables
  public $elevatorCar_Count_Max;
  public $floorCountMax;
  public $elevatorCar;
  public $request; 

  public function __construct($newRequest){
     $this->elevatorCar_Count_Max= 1;
     $this->floorCountMax= 6;
     $this->request = $newRequest;

  }
  
  
  /**
   * startElevator function to stop elevatorCar when
   * when requested
   */
  public function startElevator(){
      echo "Elevator Car started!</br>";
  } 

  
  /**
  * stopElevator function to stop elevatorCar when
  * when requested
  */
  public function stopElevator(){
     echo "Elevator Car Stopped!</br>";
  }


  /**
  * elevatorScan function to select the nearest elevatorCar to  initial floor request 
  */

  public function elevatorScan(){
    
    $count = $this->elevatorCar_Count_Max;
    $requestedFloor = $this->request['initFloor'];
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
  */

   public function runElevator($elevatorNumber){
     
     $this->elevatorCar = new ElevatorCar($elevatorNumber);
     $currentState= $this->elevatorCar->getCurrentState();
     $currentFloor = $this->elevatorCar->getCurrentFloor();

     echo "Elevator Car ".$elevatorNumber." selected!";
           
     $fromFloor = $this->request['initFloor'];
     $toFloor = $this->request['endFloor'];

      if($fromFloor < 1 || $fromFloor > $this->floorCountMax)
        return "Error !! Wrong Floor";

      if($toFloor < 1 || $toFloor > $this->floorCountMax)
              return "Error !! Wrong Floor";

    /**
     ** move elevator to departure floor
     **/

     switch ($currentState){ 

        case -1: //elevatorCar currentState[moving down]
                  
          if($currentFloor == $fromFloor){
              
            stopElevator();
            $this->elevatorCar->openDoor();
          }//end if
          else if($currentFloor > $fromFloor){ 

            while ($currentFloor > $fromFloor ) {
              $this->elevatorCar->moveDown();
              $currentFloor = $this->elevatorCar->getCurrentFloor();
            } //end while loop

            stopElevator(); 
            $this->elevatorCar->openDoor();
            }//end elseif
          else{

            while ($currentFloor > 1) { //elevatorCar continues to move down until bottom floor
              $this->elevatorCar->moveDown();
              $currentFloor = $this->elevatorCar->getCurrentFloor();
            } 
            stopElevator(); //when reached bottom floor
                     
            startElevator();
            while($currentFloor < $fromFloor){ //elevatorCar moves up after reaching bottom floor
              $this->elevatorCar->moveUp();
              $currentFloor = $this->elevatorCar->getCurrentFloor();
            }

            stopElevator(); //when reached destination;
            $this->elevatorCar->openDoor();
          } //end else

         break; //end currentState[moving down]

        case 1: //elevatorCar currentState[moving up]
                   
          if($currentFloor == $fromFloor){
              
            $this->stopElevator();
            $this->elevatorCar->openDoor();
           }//end if
           else if($currentFloor < $fromFloor){ 

               while ($currentFloor < $fromFloor ) {
                 $this->elevatorCar->moveUp();
                 $currentFloor = $this->elevatorCar->getCurrentFloor();
                } //end while loop

                stopElevator(); 
                $this->elevatorCar->openDoor();
           }//end elseif
           else{

              while ($currentFloor < $this->floorCountMax) { //elevatorCar continues to move up until top floor
                  $this->elevatorCar->moveUp();
                  $currentFloor = $this->elevatorCar->getCurrentFloor();
              } 
                      stopElevator(); //when reached top floor
                     
              startElevator();
              while($currentFloor > $fromFloor){ //elevatorCar moves down after reaching top floor
                $this->elevatorCar->moveDown();
                $currentFloor = $this->elevatorCar->getCurrentFloor();
              }

              stopElevator(); //when reached destination;
              $this->elevatorCar->openDoor();

              } //endElse

          break; //end currentState[Movingup]
         
         default: //elevatorCar currentState[stationary]

          if($currentFloor == $fromFloor){
            $this->elevatorCar->openDoor();
          }
          else if($currentFloor < $fromFloor){ 

             startElevator();
             while ($currentFloor < $fromFloor ) {
              $this->elevatorCar->moveUp();
              $currentFloor = $this->elevatorCar->getCurrentFloor();
             } //end while loop

             stopElevator(); 
             $this->elevatorCar->openDoor();
           }
          else{
                    
              startElevator();
              while ($currentFloor > $fromFloor ) {
                $this->elevatorCar->moveDown();
                $currentFloor = $this->elevatorCar->getCurrentFloor();
              } //end while loop

              stopElevator();
              $this->elevatorCar->openDoor();

          }//endElse

          break; //end currentState[Stationary]

       } //end switch  


        /**
        ** move elevator to destination
        **/

          $this->elevatorCar->closeDoor();
          startElevator();
           
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

          stopElevator();
          $this->elevatorCar->openDoor();
          echo "Floor Number " .$currentFloor." , Arrived!</br>";

       
      
    }


 }

?>