<?php
 include 'connection.php';
include 'links.php';
  if(isset($_POST['submit']))
  {
    $remarks = $_POST['remarks'];
    $output = $_POST['output'];
    $result = $_POST['type'];
    $testing_date = $_POST['testing_date'];
    $test_id = $_POST['test_id'];
    $product_id = $_POST['product_id'];
    $insert = "insert into testing_records2(remarks,output,result,testing_date,tes_id,prod_id) values('$remarks','$output','$result','$testing_date','$test_id','$product_id')";
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
      echo $insert;
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
          <label for="" class="form-label">testing_date</label>
          <input type="date" class="form-control" name="testing_date">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">remarks</label>
          <input type="text" class="form-control" name="remarks">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">output</label>
          <input type="text" class="form-control" name="output">
        </div>
        <div class="mb-3">
              <label for="" class="form-label">Result</label>
              <select class="form-select form-select-lg" name="type" >
                <option selected>Select one</option>
                <option value="fail">fail</option>
                <option value="pass">pass</option>
              </select>


             <div class="mb-3">
              <label for="" class="form-label">Test id</label>
              <select class="form-select form-select-lg" name="test_id" >
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
              <label for="" class="form-label">Product id</label>
              <select class="form-select form-select-lg" name="product_id" >
    <?php
   $products2="select * from products2";
   $query = mysqli_query($con,$products2);
   while($rows = mysqli_fetch_array($query))
   {
    ?>
   <option value="<?php echo $rows['product_id']?>"><?php echo $rows['product_name']?></option>
    <?php   
        }
    ?>
              </select>
             </div>


<!-- // <div class="mb-3">
              <label for="" class="form-label">Product id</label>
              <select class="form-select form-select-lg" name="type" >
    <?php
   $products2="select * from products2";
   $query = mysqli_query($con,$products2);
   while($rows = mysqli_fetch_array($query))
   {
    ?>
   <option value="<?php echo $rows['test_id']?>"><?php echo $rows['test_name']?></option>
    <?php   
        }
    ?>
              </select>
             </div>

 -->



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