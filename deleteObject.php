<?php

    include 'dbConnection.php';
    
    $objects_id = $_GET['objects_id'];
    
    $sql = "DELETE FROM objects WHERE id=$objects_id";
    
    $result = $conn->query($sql);
    
    
    include 'head.php'; 
?>
    <div class="container">
        <div class="starter-template">
            <?php
                if ($conn->query($sql) === TRUE) {
                    echo "<h1>Object deleted successfully</h1>";
                } else {
                    echo "Error deleting record: " . $conn->error;
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

