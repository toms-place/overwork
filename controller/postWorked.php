<?php

require ("config.php");

$c_1 = test_input($_POST[c_1]);
$c_2 = test_input($_POST[c_2]);
$c_3 = test_input($_POST[c_3]);

//tests input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  };

  if(!empty($c_1) && !empty($c_2) && !empty($c_3)) {

        $worked_price = $c_2 / 60 * $c_1;

        $insertquery="insert into worked (customer_id, date, minutesworked, price)
        select (select customer_id from customers 
            where customer_id = all (
                select selectedcustomer from users
                where userid = 1)),
                 '$c_3', $c_1, $worked_price";
        
        $result = pg_query($insertquery); 

        if ($result){
            echo "worked";
        }
    } else {
        echo "e100";
  }


?>