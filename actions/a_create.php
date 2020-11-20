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

    $sql = "INSERT INTO animals (name, image, description, hobbies, location, age, size) VALUES ('$name', '$image', '$description', '$hobbies', '$location', $age, '$size')";
    if($connect->query($sql) === TRUE) {
        echo "<p>New Record Successfully Created</p>" ;
        echo "<a href='../create.php'><button type='button' class='btn btn-info'>Back</button></a>";
        echo "<a href='../admin.php'><button type='button' class='btn btn-info'>Home</button></a>";
    } else  {
        echo "Error " . $sql . ' ' . $connect->connect_error;
    }

    $connect->close();
}

?>