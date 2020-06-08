<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';


//Initial test
include ('../src/app/Button.php');
include ('../src/app/ElevatorRequest.php');
include ('../src/app/Dispatcher.php');
include ('../src/app/ElevatorController.php');
include ('../src/app/ElevatorCar.php');


//load .env file
/*$dotenv = new Dotenv\Dotenv('../src');
$dotenv->load();

//fetch configured environmental variable
$maxLift = env('ELEVATOR_cARS_COUNT');
$maxFloor = env('FLOOR_COUNT'); 

//configurations
$config = [
    'settings' => [
        'displayErrorDetails' => true,

        'logger' => [
            'name' => 'slim-app',
            'level' => Monolog\Logger::DEBUG,
            'path' => __DIR__ . '/../logs/app.log',
        ],

        'addContentLengthHeader' => false
    ],
];
*/


/*$app = new \Slim\App();
$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");


    return $response;
});
$app->run();*/





echo "Welcome to our elevator system program"."\n"; 

$user = new ElevatorRequest(1, 5);
$request= $user->placeRequest();

print_r($request);

$dispatcher = new Dispatcher($request);
$dispatcher->addRequest();
$nextRequest = $dispatcher->getNextRequest();

echo  "/n";
$controller = new ElevatorController($nextRequest);
$lift_number = $controller->elevatorScan();
$controller->runElevator($lift_number);










?>


