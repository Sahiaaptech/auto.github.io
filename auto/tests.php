<?php
 include 'connection.php';
include 'links.php';
  if(isset($_POST['submit']))
  {
    $test_name = $_POST['name'];

    $test_type = $_POST['type'];
    $insert = "insert into tests2(test_name,test_type) values('$test_name','$test_type')";
    $query = mysqli_query($con,$insert);
    echo $query;
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
    <h1>Add Tests</h1>
    <form action="" method="post">
        <div class="mb-3">
          <label for="" class="form-label">Test Name</label>
          <input type="text" class="form-control" name="name">
        </div>
   
             <div class="mb-3">
              <label for="" class="form-label">Test Type</label>
              <select class="form-select form-select-lg" name="type" >
                <option selected>Select one</option>
                <option value="Connectivity">Connectivity</option>
                <option value="Display">Display</option>
                <option value="Power">Power</option>
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