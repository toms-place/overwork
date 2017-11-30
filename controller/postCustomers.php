<?php
$dbconn = pg_connect("host=localhost dbname=h1553755 user=h1553755 password=h1553755");

$c_1 = test_input($_POST[c_1]);
$c_2 = test_input($_POST[c_2]);
$c_3 = test_input($_POST[c_3]);
$table = test_input($_POST[table]);

//tests input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  };

  if(!empty($c_1) && !empty($c_2) &&!empty($c_3))
  {
      //defines query
      switch ($table) {
        case 'customers':
            $insertquery="insert into customers values('$c_1', '$c_2', '$c_3')";
            break;
        case 'worked':
            $insertquery="insert into worked values('$c_1', '$c_2', '$c_3')";
            break;
        case 'payment':
            $insertquery="insert into payment values('$c_1', '$c_2', '$c_3')";
            break;
        }
        
        $result = pg_query($insertquery); 

        if ($result){
            echo $table;           
        } else {
            echo "e110";
    }

  } else {
        echo "e100";
  }


?>