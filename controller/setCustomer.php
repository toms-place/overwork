<?php
$dbconn = pg_connect("host=localhost dbname=h1553755 user=h1553755 password=h1553755");

$selectName = test_input($_POST[selectName]);
$table = test_input($_POST[table]);

//tests input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  };

  if(!empty($selectName))
  {
      //defines query
        $insertquery="update users set selectedCustomer = $selectName where UserID = 1";

        $result = pg_query($insertquery); 

        if ($result){
            echo $table;
        }
        else {
            echo "<script>alert('error: wrong table');</script>";
        };
  } else {
        echo "e100";    
  }


?>