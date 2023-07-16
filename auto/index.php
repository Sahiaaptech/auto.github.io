<?php
 include 'connection.php';
include 'links.php';
  if(isset($_POST['submit']))
  {
    $product_name = $_POST['product_name'];
    $product_type = $_POST['product_type'];
    
    $insert = "insert into products2(product_name,product_type) values('$product_name','$product_type')";
    $query = mysqli_query($con,$insert);

    if($query)
    {
        ?>
        <script>
            alert("Record inserted successfully");
        </script>
        <?php

    }
    else
    {
        ?>
        <script>
            alert("Record not inserted ");
        </script>
        <?php

    }
    

  }


?>


<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
 
</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main class="container mt-5">
    <h1>Add Products</h1>
    <form action="" method="post">
        
        <div class="mb-3">
          <label for="" class="form-label">Name</label>
          <input type="text" class="form-control" name="product_name">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Product type</label>
          <input type="text" class="form-control" name="product_type">
        </div>


             <div class="mb-3">
              <label for="" class="form-label">Test Type</label>
              <select class="form-select form-select-lg" name="type" >
    <?php
   $tests2="select * from tests2";
   $query = mysqli_query($con,$tests2);
   while($rows = mysqli_fetch_array($query))
   {
    ?>
   <option value="<?php echo $rows['test_id']?>"><?php echo $rows['test_name']?></option>
    <?php   
        }
    ?>
              </select>
             </div>
  

        <div class="mb-3">
          <input type="submit" class="btn btn-primary" name="submit">
        </div>
    </form>

  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
 
</body>

</html>