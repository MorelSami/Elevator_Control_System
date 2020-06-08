<?php 

 class Dispatcher{
	
	public $request;
	public $requestQueue;

	public function __construct($request){
      
      $this->request= $request;
      $this->requestQueue = array();
	}

 /**
  * addRequest function to push an initial request into the request queue 
  * for processing
  */

	public function addRequest(){

		array_push($this->requestQueue, $this->request);
       
	}

 /**
  * getNextRequest function to fetch each submitted request for elevator controller
  * for processing
  */

	public function getNextRequest(){

		$processRequest = array_shift($this->requestQueue);
        return $processRequest;
	}

 /**
  * removeRequest function to remove a processed request from the request queue 
  */

	public function removeRequest(){
        
	}
  

}

?>