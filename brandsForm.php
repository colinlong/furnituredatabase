<?php 
include 'dbConnection.php';


if (isset($_GET['brands_id'])) {
    
    $brands_id = $_GET['brands_id'];
    
    //Query DB for details on that object
    $brandsSQL = "SELECT * FROM brands where id = $brands_id;";
    $brands =  $conn->query($brandsSQL)->fetch_assoc();
}

include 'head.php';
include 'nav.php';
?>
  

  <body>
        <div class="container">
          <div class="wrapper">
            <form action="addBrands.php" method="post" class="form-signin">
          
            <?php if(isset($brands_id)) echo "<input type='hidden' name='id' value=" . $brands_id ." >"; ?>
          
          
            <h1 class="form-signin-heading" id="format">Enter Brand</h1>
    
            <label for="brandName">Brand:</label>
            <input type="text" name="brandName" class="form-control" placeholder="e.g., Knoll" autofocus required maxlength="255" <?php if (isset($brands['brandName'])) echo "value='" . $brands['brandName'] . "'"; ?>/>
    
            <label for="origin">Origin:</label>
            <input type="text" name="origin" class="form-control" placeholder="e.g., United States" required maxlength="255" <?php if (isset($brands['origin'])) echo "value='" . $brands['origin'] . "'"; ?>/>
    
            <label for="leadtime">Lead Time:</label>
            <input type="text" name="leadtime" class="form-control" placeholder="e.g., 10-12 weeks"required maxlength="255" <?php if (isset($brands['leadtime'])) echo "value='" . $brands['leadtime'] . "'"; ?>/>
    
            <label for="warehouse">Warehouse:</label>
            <input type="text" name="warehouse" class="form-control" placeholder="e.g., East Greenville, PA"required maxlength="255" <?php if (isset($brands['warehouse'])) echo "value='" . $brands['warehouse'] . "'"; ?>/>
            
            <label for="repname">Rep Name:</label>
            <input type="text" name="repname" class="form-control" placeholder="e.g., Mike Ippoliti" maxlength="255" <?php if (isset($brands['repname'])) echo "value='" . $brands['repname'] . "'"; ?>/>
            
            <label for="repcontact">Rep Contact:</label>
            <input type="text" name="repcontact" class="form-control" placeholder="e.g., mippoliti@knoll.com, 215-989-9900" maxlength="255" <?php if (isset($brands['repcontact'])) echo "value='" . $brands['repcontact'] . "'"; ?>/>
    
            <button type="submit" class="btn btn-lg btn-primary btn-block submitit">Submit</button>
          </div><!-- wrapper -->
      </form>
    </div>
    <?php include 'footer.php' ?>
  </body>
</html>

