<?php
include 'dbConnection.php';


$sql = "SELECT
        id, brandName, origin, leadtime, warehouse, repname, repcontact
        FROM brands;";
        

$result = $conn->query($sql);


include 'nav.php';
include 'head.php';
?>

<body>
     <div class="container">
         <a href="brandsForm.php" class="btn btn-default" id="addbtn" style="float:right;">+ add brand</a>
         
     <table class = "table table-hover">
       
       <thead>
          <div class="row">
             <tr>
                 <th>Brand</th>
                 <th>Origin</th>
                 <th>Lead Time</th>
                 <th>Warehouse</th>
                 <th>Rep Name</th>
                 <th>Rep Contact</th>
                 <th></th>
                 <th></th>

              </tr>
            </div><!--row-->
       </thead>
       
           
       <tbody>
            <?php
              // output data of each row
              while($row = $result->fetch_assoc()) {
              echo "<tr><td>" . $row['brandName'] . "</td><td>" . $row['origin'] . "</td><td>" . $row['leadtime'] .
              "</td><td>" . $row['warehouse'] . "</td><td>" . $row['repname'] . "</td><td>" . $row['repcontact'] .
              "</td><td> <a href=deleteBrand.php?brands_id=" . $row['id']  . "> delete</a>" . 
              "</td><td> <a href=brandsForm.php?brands_id=" . $row['id']  . "> update</a>". "</td></tr>";
              }
            ?>
       </tbody>
       
    </table>


    </div><!--tablecontainer-->
    
    
    <?php include 'footer.php'; ?>
    
</body>
</html>