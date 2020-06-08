
<?php

  /**
   * Elevator_Test
   * index.php
   * @author  MorelSami (06/06/2020)
   */

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

/*use  \Dotenv\Dotenv
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

//fetch configured environmental variable
$maxElevatorCount = getenv('ELEVATOR_CARS_COUNT');
$maxFloorCount = getenv('FLOOR_COUNT'); 
*/

include ('../src/app/ElevatorRequest.php');
include ('../src/app/ElevatorController.php');
include ('../src/app/ElevatorCar.php');

//configurations
$config = [
    'settings' => [
        'displayErrorDetails' => true,
        'addContentLengthHeader' => false
    ]
]; 


//Intro


$app = new \Slim\App();
$app->post('/elevatorRequest', function (Request $request, Response $response, array $args) {
    
  if($request->isPost()){
  	 
  	 $contentType = $request->getContentType();
     
     if($contentType == 'application/json')
  	   $newRequest = $request->getParsedBody();
     else
     	exit("JSON ContentType Required!");

    $body="Welcome to my new elevator system !!</br></br>";

    $req = new ElevatorRequest($newRequest['startFloor'], $newRequest['stopFloor']);
    $elevatorRequest= $req->getRequest();

    $controller = new ElevatorController($elevatorRequest);

    $lift_number = $controller->elevatorScan();

    $controller->runElevator($lift_number);
 
    $response->getBody()->write("Hello Shawn, $body");

  }
  else{

  	 $response->getBody()->write("Wrong HTTP Request! POST required...");

  }

    return $response;
});
$app->run()


?>


