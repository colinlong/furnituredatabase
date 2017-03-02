<?php

include 'dbConnection.php';


$brandName = $conn->real_escape_string($_POST['brandName']);
$origin = $conn->real_escape_string($_POST['origin']);
$leadtime = $conn->real_escape_string($_POST['leadtime']);
$warehouse = $conn->real_escape_string($_POST['warehouse']);
$repname = $conn->real_escape_string($_POST['repname']);
$repcontact = $conn->real_escape_string($_POST['repcontact']);


if (isset($_POST['id'])) {
    $brands_id = $_POST['id'];
    $sql =  "UPDATE brands SET brandName='$brandName', origin='$origin', leadtime = '$leadtime', 
             warehouse='$warehouse', repname = '$repname', repcontact = '$repcontact'
             WHERE id = $brands_id";
} else {
    $sql = "INSERT INTO brands (brandName, origin, leadtime, warehouse, repname, repcontact)
    VALUES ('$brandName', '$origin', '$leadtime', '$warehouse', '$repname', '$repcontact')";
}


include 'head.php';
?>


  <body>
    <?php include 'nav.php' ?>
    <div class="container">
      <div class="starter-template">
      <?php
        if ($conn->query($sql) === TRUE) {
            echo "<h1>New brand entered successfully</h1> <br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
      ?>


      Brand: <?php echo $brandName ?><br>
      Origin: <?php echo $origin ?><br>
      Lead Time: <?php echo $leadtime ?><br>
      Warehouse: <?php echo $warehouse ?><br>
      Rep Name: <?php echo $repname ?><br>
      Rep Contact: <?php echo $repcontact ?><br>

    </div>
    </div>
    <?php include 'footer.php' ?>
  </body>
</html>