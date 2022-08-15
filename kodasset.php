<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>My Assets Report</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <style>
    	body {
		font-size: 14px;
		padding: 10px;
	  }
      table, th, td {
    border:1px solid black;
    }

    @media print{
      .dontdisplay{
        display:none;
      }
    }
    </style>
</head>
<body>
<header>
<div class="p-3 text-right" >
<button onclick="window.print()" class="dontdisplay">Print</button>
</div>
  <div class="p-5 text-center" >
    <h1 class="mb-1" style="font-size:22px">
      <b>Laporan Senarai Inventori</b>
    </h1>
  </div>
</header>
</body>

<?php
  $db_host = '127.0.0.1';
  $db_user = 'root';
  $db_password = '';
  $db_name = 'myasset_malaysia'; 

  // Establish DB connections
  $connection = mysqli_connect($db_host, $db_user, $db_password, $db_name) or die(mysqli_connect_error());
  /** 
  * SQL
  */
  //Retrieve code and stock description for class 1 and 2
  $result = mysqli_query($connection, "SELECT DISTINCT class1, stok_desc1 FROM inventori ORDER BY class1");
  while($row = mysqli_fetch_array($result)) 
  {
    echo '<b>'.$row[ "class1"].' '.$row["stok_desc1"].'</b><br>';

    $class1_code = $row["class1"];
    $result1 = mysqli_query($connection, "SELECT DISTINCT class1, class2, stok_desc2 FROM inventori WHERE class1 = '$class1_code'");

    while($row = mysqli_fetch_array($result1)) 
    {
      echo '&emsp;&emsp;<b>'.$row[ "class2"].' '.$row["stok_desc2"].'</b><br>';

      $class2_code = $row["class2"];
      $result2 = mysqli_query($connection, "SELECT DISTINCT class1, class2, class3, stok_desc3 FROM inventori WHERE class1 = '$class1_code' AND class2 = '$class2_code'");
      while($row = mysqli_fetch_array($result2)) 
      {
       echo '&emsp;&emsp;&emsp;&emsp;<b>'.$row[ "class3"].' '.$row["stok_desc3"].'</b><br>';

        $class3_code = $row["class3"];
        $result3 = mysqli_query($connection, "SELECT DISTINCT class1, class2, class3, code, stok_desc4 FROM inventori WHERE class1 = '$class1_code' AND class2 = '$class2_code' AND class3 =  $class3_code");
        while($row = mysqli_fetch_array($result3)) 
        {
         echo '&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;'.$row[ "code"].' '.$row["stok_desc4"].'<br>';
        }
      }
     }
  }

?>
</html>