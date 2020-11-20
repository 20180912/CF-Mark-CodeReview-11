<?php 

require_once 'db_connect.php';

if ($_POST) {
    $name = $_POST['name'];
    $name = mysqli_real_escape_string($connect, $name);
    $image = $_POST['image'];
    $description = $_POST['description'];
    $description = mysqli_real_escape_string($connect, $description);
    $hobbies = $_POST['hobbies'];
    $location = $_POST['location'];
    $age = $_POST['age'];
    $size = $_POST['size'];

    $id = $_POST['id'];

   $sql = "UPDATE animals SET name='$name', image='$image', description='$description', hobbies='$hobbies', location='$location', age=$age, size='$size' WHERE animalID = '$id'" ;
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