<?php

include 'dbConnection.php';


$name = $conn->real_escape_string($_POST['name']);
$type = $conn->real_escape_string($_POST['type']);
$brand_id = $conn->real_escape_string($_POST['brand_id']);
$cost = $conn->real_escape_string($_POST['cost']);
$price = $conn->real_escape_string($_POST['price']);
$finish = $conn->real_escape_string($_POST['finish']);

if (isset($_POST['objects_id'])) {
    $objects_id = $_POST['objects_id'];
    $sql =  "UPDATE objects SET name='$name', type='$type', brand_id = '$brand_id', 
             cost='$cost', price = '$price', finish = '$finish'
             WHERE id = $objects_id";
} else {
    $sql = "INSERT INTO objects (name, type, brand_id, cost, price, finish)
    VALUES ('$name', '$type', '$brand_id', '$cost', '$price', '$finish')";
}

include 'head.php';
?>


  <body>
    <?php include 'nav.php';?>
    <div class="container">
      <div class="starter-template">
      <?php
        if ($conn->query($sql) === TRUE) {
            echo "<h1>New object entered successfully</h1> <br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
      ?>


      Name: <?php echo $name ?><br>
      Type: <?php echo $type ?><br>
      Brand: <?php echo $brand_id ?><br>
      Cost: <?php echo $cost ?><br>
      Price: <?php echo $price ?><br>
      Finish: <?php echo $finish ?><br>

    </div>
    </div>
  <?php include 'footer.php' ?>
  </body>
</html>