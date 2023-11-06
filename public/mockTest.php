 <?php 

 /**
   * Elevator_Mock_Test
   * mockTest.php
   * @author  MorelSami (06/07/2020)
   */

 /**
  *for testing purposes or you can use RestEasy or Postman which are commonly used REST API Clients
  */

    phpinfo();

    $data = array('startFloor' => 4, 'stopFloor'=> 2);
    $elevator_request = json_encode($data);  //{"startFloor": 1, "stopFloor": 5};  //json format
    $url = 'http://localhost/EFI/elevator_test/public/index.php/elevatorRequest';
    $user_agent = "Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:74.0) Gecko/20100101 Firefox/74.0";

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_USERAGENT,$user_agent);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json"));
    curl_setopt($ch, CURLOPT_POST, true); 
    curl_setopt($ch, CURLOPT_POSTFIELDS, $elevator_request);  
    $response = curl_exec($ch);          

    curl_close($ch);


  ?>