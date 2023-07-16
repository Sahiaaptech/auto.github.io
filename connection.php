<?php
$username = 'root';
$password = '';
$server = 'localhost';
$db = 'automation';

$con = mysqli_connect($server,$username,$password,$db) ;
if($con)
{
   ?>
   <!-- <script>
    alert("Connection Established");
   </script> -->

   <?php
}
else
{
    ?>
<!-- <script>
      alert("Connection Not Established");
</script> -->

<?php
}
?>