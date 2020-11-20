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

   $sql = "SELECT * FROM users WHERE userID = {$id}";
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

   <title>Edit User Priviliges</title>

</head>
<body>

<div class ="container">
<fieldset>
   <legend>Edit User Priviliges</legend>

   <form  action="actions/a_update_user.php" method= "post">
       <table class="table table-bordered">
           <tr>
               <th>Name</th >
               <td><input  type="text" name="userName" value="<?php echo $data['userName'] ?>" /></td >
           </tr>    
           <tr>
               <th>Email</th>
               <td><input  type="text" name= "userEmail" value="<?php echo $data['userEmail'] ?>" /></td>
           </tr>
           <tr>
               <th>Type</th>
               <td>
               <input type="radio" id="user" name="userType" value="user" <?php echo ($data['userType']== 'user') ?  "checked" : "" ;  ?>>
               <label for="user">user</label><br>
               <input type="radio" id="admin" name="userType" value="admin" <?php echo ($data['userType']== 'admin') ?  "checked" : "" ;  ?>>
               <label for="admin">admin</label><br>
               </td>
           </tr>
           <tr>
                <input type= "hidden" name= "userID" value= "<?php echo $data['userID']?>" />
                <td><a href= "admin.php"><button type="button" class="btn btn-info">Back</button></a></td>
                <td><button type="submit" class="btn btn-info">Save Changes</button></td>
           </tr >
       </table>
   </form>

   <form action ="actions/a_delete_user.php" method="post">

        <input type="hidden" name= "id" value="<?php echo $data['userID'] ?>" />
        <button type="submit" class="btn btn-danger">Delete User</button >

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