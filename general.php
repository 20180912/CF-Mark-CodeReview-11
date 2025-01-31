<?php

ob_start();
session_start();
require_once 'actions/db_connect.php';

if( !isset($_SESSION['user']) && !isset($_SESSION["admin"]) ) {
    header("Location: login.php");
    exit;
   }

if ($_GET['size']) {
   $size = $_GET['size'];

?>

<!DOCTYPE html>
<html>
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   
    <title>Adopt a Pet</title>

</head>
<body>

<div class ="container">
    
  <p class="display-3 text-info">Adopt a Pet</p>
  <p class="h3">Pets</p>
     <table class="table table-bordered mt-5">
         <thead>
             <tr>
                 <th scope="col">Image</th>
                 <th scope="col">Name</th>
                 <th scope="col">Description</th>
                 <th scope="col">Hobbies</th>
                 <th scope="col">Location</th>
                 <th scope="col">Age</th>
                 <th scope="col">Size</th>
             </tr>
  
         </thead>
  
         <tbody>
  
         <?php
             //$sql = "SELECT * FROM animals WHERE size='small'";
             $sql = "SELECT * FROM animals WHERE size = $size";
             $result = $connect->query($sql);
  
              if($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                     echo  "<tr>
                         <td><img src={$row['image']} alt='image' class='img-thumbnail' style='width:15em; object-fit:cover;'></td>
                         <td>" .$row['name']."</td>
                         <td>" .$row['description']."</td>
                         <td>" .$row['hobbies']."</td>
                         <td>" .$row['location']."</td>
                         <td>" .$row['age']."</td>
                         <td>" .$row['size']."</td>
                     </tr>" ;
                 }
             } else  {
                 echo  "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
             }

              ?>
  
         </tbody>
     </table>
  
<a href= "index.php"><button type="button" class="btn btn-info">Back</button></a>
  
  </div>
  
  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>
</html>
<?php
}
ob_end_flush();
?>