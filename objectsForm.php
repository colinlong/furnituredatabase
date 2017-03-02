
<?php
include 'dbConnection.php';

//brand Query for related data dropdown
$sql = "SELECT id, brandName FROM brands";

$brands = $conn->query($sql);

//Check if a objects_id was supplied in the URL Query Parameter
if (isset($_GET['objects_id'])) {
    
    $objects_id = $_GET['objects_id'];
    
    //Query DB for details on that object
    $objectsSQL = "SELECT * FROM objects where id = $objects_id";
    $objects =  $conn->query($objectsSQL)->fetch_assoc();
    
}

include 'head.php';
?>


  <body>
        <?php include 'nav.php' ?>
        <div class="container">
        <form action="addObjects.php" method="post" class="form-signin">
          
        <?php if(isset($objects_id)) echo "<input type='hidden' name='objects_id' value=" . $objects_id ." >"; ?>
          
        <div class="wrapper">
          <h1 class="form-signin-heading">Enter Object</h1>
  
          <label for="name">Name:</label>
          <input type="text" name="name" class="form-control" placeholder="e.g., Aeron Task Chair" autofocus required maxlength="255" <?php if (isset($objects['name'])) echo "value='" . $objects['name'] . "'"; ?>/>
  
          <label for="brand_id">Brand:</label>
            <select name="brand_id" class="form-control" required>
              <option value="" disabled>Select brand</option>
              <?php
        
                if ($brands-> num_rows > 0) {
                  //output data of each row
                  while($brand = $brands->fetch_assoc()){
                    echo "<option value='" . $brand["id"] ."'";
                    if (isset($objects['brand_id']) and  $objects['brand_id'] == $brand["id"]) echo "selected";
                    echo ">" . $brand["brandName"] . "</option>";
                  }
                }
              ?>
            </select>

  
          <label for="type">Type:</label>
          <input type="text" name="type" class="form-control" placeholder="e.g., Office" required maxlength="255" <?php if (isset($objects['type'])) echo "value='" . $objects['type'] . "'"; ?>/>
  
          <label for="cost">Cost:</label>
          <input type="number" step="any" name="cost" class="form-control" placeholder="e.g., 329.50" required maxlength="11" <?php if (isset($objects['cost'])) echo "value='" . $objects['cost'] . "'"; ?>/>
          
          <label for="price">Price:</label>
          <input type="number" step="any" name="price" class="form-control" placeholder="e.g., 1200.00" required maxlength="11" <?php if (isset($objects['price'])) echo "value='" . $objects['price'] . "'"; ?>/>
          
          <label for="finish">Finish:</label>
          <input type="text" name="finish" class="form-control" placeholder="e.g., powder-coated metals, textiles, flex-plastic"required maxlength="255" <?php if (isset($objects['finish'])) echo "value='" . $objects['finish'] . "'"; ?>/>
  
          <button type="submit" class="btn btn-lg btn-primary btn-block">Submit</button>
        </div> <!-- wrapper -->
    
      </form>
    </div>
    <?php include 'footer.php' ?>
  </body>
</html>