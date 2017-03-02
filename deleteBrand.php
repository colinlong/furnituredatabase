<?php

    include 'dbConnection.php';
    
    $brands_id = $_GET['brands_id'];
    
    $sql = "DELETE FROM brands WHERE id=$brands_id";
    
    $result = $conn->query($sql);
    
    
    include 'head.php'; 
?>
    <div class="container">
      <div class="starter-template">
        <?php
            if ($conn->query($sql) === TRUE) {
                echo "<h1>Brand deleted successfully</h1>";
            } else {
                echo "Error deleting brand: " . $conn->error;
            }
            $conn->close();
        ?>
      </div>
    </div>
    


<body>
        <?php include 'nav.php' ?>
        <?php include 'footer.php' ?>
</body>
</html>    

