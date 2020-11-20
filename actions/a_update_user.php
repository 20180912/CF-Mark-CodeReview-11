<?php 

require_once 'db_connect.php';

if ($_POST) {
    $userName = $_POST['userName'];
    $userName = mysqli_real_escape_string($connect, $userName);
    $userEmail = $_POST['userEmail'];
    $userType = $_POST['userType'];
    
    $id = $_POST['userID'];

   $sql = "UPDATE users SET userName='$userName', userEmail='$userEmail', userType='$userType' WHERE userID = '$id'" ;
   if($connect->query($sql) === TRUE) {
       echo  "<p>Successfully Updated</p>";
       echo "<a href='../update.php?id=" .$id."'><button type='button'>Back</button></a>";
       echo  "<a href='../admin.php'><button type='button'>Home</button></a>";
   } else {
        echo "Error while updating record : ". $connect->error;
   }

   $connect->close();

}

?>