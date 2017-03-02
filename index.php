<!-- phpmyadmin-ctl install -->

<?php
include 'dbConnection.php';

$sql = "SELECT objects.id AS objects_id, objects.name AS objectName, type, cost, price, finish,
        brands.brandName AS BrandName, origin, leadtime, warehouse, repname, repcontact
        FROM objects JOIN brands on objects.brand_id = brands.id";
//'SELECT * FROM objects JOIN brands on objects.brand_id = brands.id';  

$result = $conn->query($sql);

include 'head.php';
include 'nav.php';
?>

    
        <div class="container">
            
            <table class="table table-hover">
           
               <thead>
                  <tr>
                     <th>Object</th>
                     <th>Brand</th>
                     <th>Type</th>
                     <th>Origin</th>
                     <th>Lead Time</th>
                     <th>Warehouse</th>
                     <th>Rep Name</th>
                     <th>Rep Contact</th>
                     <th>Cost</th>
                     <th>Price</th>
                     <th></th>
                     <th></th>
        
                  </tr>
               </thead>
               
                   
               <tbody>
                    <?php
                      // output data of each row
                      while($row = $result->fetch_assoc()) {
                      echo "<tr><td>" . $row['objectName'] . "</td><td>" . $row['BrandName'] . "</td><td>" . $row['type'] . "</td><td>" . $row['origin'] .
                      "</td><td>" . $row['leadtime'] . "</td><td>" . $row['warehouse'] . "</td><td>" . $row['repname'] .
                      "</td><td>" . $row['repcontact'] . "</td><td>" . $row['cost'] . "</td><td>" . $row['price'] .
                      "</td><td> <a href=deleteObject.php?objects_id=" . $row['objects_id']  ."> delete</a>" . 
                      "</td><td> <a href=objectsForm.php?objects_id=" . $row['objects_id']  . "> update</a>". "</td></tr>";
                      }
                    ?>
               </tbody>
           
            </table>

        
        </div><!--container-->
        
    <?php include 'footer.php' ?>
    </body>
</html>