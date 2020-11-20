<?php
ob_start();
session_start();
require_once 'actions/db_connect.php';

// if session is not set this will redirect to login page
if( !isset($_SESSION['user' ]) && !isset($_SESSION["admin"]) ) {
    header("Location: login.php");
    exit;
   }

$name = isset($_POST['name']) ? $_POST['name'] : null;

$sql = "SELECT * FROM animals WHERE name LIKE '{$name}%'";
$result = mysqli_query($connect, $sql);
if ($name == "") {
    exit;
} elseif ($result->num_rows == 0){
    echo '<div class="alert alert-danger" role="danger">No pet with such a name</div>';
} elseif ($result->num_rows >0){
    while($row = $result->fetch_assoc()) {
        $tmp .= $row['name']."<br>";
    }
    echo '<div class="alert alert-success" role="success">'.$tmp.'</div>';
}
?>