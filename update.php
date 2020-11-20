<?php 

ob_start();
session_start();
require_once 'actions/db_connect.php';

if( !isset($_SESSION['user']) && !isset($_SESSION["admin"]) ) {
    header("Location: login.php");
    exit;
   } elseif(isset($_SESSION["user"])){
     header("Location: index.php");
   }

if ($_GET['id']) {
   $id = $_GET['id'];

   $sql = "SELECT * FROM animals WHERE animalID = {$id}";
   $result = $connect->query($sql);

   $data = $result->fetch_assoc();

   $connect->close();

?>

<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

   <title>Update Pet</title>

</head>
<body>

<div class ="container">
<fieldset>
   <legend>Update Pet</legend>

   <form  action="actions/a_update.php" method= "post">
       <table class="table table-bordered">
           <tr>
               <th>Image</th >
               <td><input  type="text" name="image" value="<?php echo $data['image'] ?>" /></td >
           </tr>    
           <tr>
               <th>Name</th>
               <td><input  type="text" name= "name" value="<?php echo $data['name'] ?>" /></td>
           </tr>
           <tr>
               <th>Description</th>
               <td><input  type="text" name= "description" value="<?php echo $data['description'] ?>" /></td>
           </tr>
           <tr>
               <th>Hobbies</th>
               <td><input  type="text" name= "hobbies" value="<?php echo $data['hobbies'] ?>" /></td>
           </tr>
           <tr>
               <th>Location</th>
               <td><input  type="text" name= "location" value="<?php echo $data['location'] ?>" /></td>
           </tr>
           <tr>
               <th>Age</th>
               <td><input  type="text" name= "age" value="<?php echo $data['age'] ?>" /></td>
           </tr>
           <tr>
               <th>Size</th>
               <td>
               <input type="radio" id="small" name="size" value="small" <?php echo ($data['size']== 'small') ?  "checked" : "" ;  ?>>
               <label for="small">small</label><br>
               <input type="radio" id="large" name="size" value="large" <?php echo ($data['size']== 'large') ?  "checked" : "" ;  ?>>
               <label for="large">large</label><br>
               </td>
           </tr>
           <tr>
                <input type= "hidden" name= "id" value= "<?php echo $data['animalID']?>" />
                <td><a href= "admin.php"><button type="button" class="btn btn-info">Back</button></a></td>
                <td><button type="submit" class="btn btn-info">Save Changes</button></td>
           </tr >
       </table>
   </form>

</fieldset >
</div>

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body >
</html >

<?php
}
ob_end_flush();
?>