
 <?php 

 /**
   * Elevator_Test
   * index.php
   * @author  MorelSami (06/07/2020)
   */

 /**
  *for testing purposes or you can use RestEasy/Postman which are common used  REST API Clients
  */


    $elevator_request = {"startFloor":1, "stopFloor":5};
    $url = 'http://localhost/EFI/elevator_test/public/index.php/elevatorRequest';
    $user_agent = "Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:74.0) Gecko/20100101 Firefox/74.0";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_USERAGENT,$user_agent);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Accept: application/json"));
    curl_setopt($ch, CURLOPT_POST, true); 
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_request);    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
        
    if(!curl_errno($ch)){
        echo "Good Job</br>";
            
     } else {
        echo curl_error($ch)."</br>");
     }
      curl_close($ch);


  ?>
