<?php
ob_start();
session_start();
require_once 'actions/db_connect.php';

// if session is not set this will redirect to login page
if(isset($_SESSION['admin'])) {
    header("Location: admin.php");
    exit;
} elseif(!isset($_SESSION['user' ]) ) {
 header("Location: login.php");
 exit;
}
// select logged-in users details
$res=mysqli_query($connect, "SELECT * FROM users WHERE userID=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   
    <!-- Ajax, jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>   

    <title>Welcome - <?php echo $userRow['userName']; ?></title>

</head>
<body>

<div class ="container">
  
Hi <?php echo $userRow['userName' ]; ?>
           
           <a  href="logout.php?logout">Sign Out</a>
    
  <p class="display-3 text-info">Adopt a Pet</p>
  <p class="h3">All Pets</p>
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
             $sql = "SELECT * FROM animals";
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
  <hr>
  <p class="h3">By Category</p>
  
    <a href= "senior.php"><button type="button" class="btn btn-info">Seniors</button></a>
    <!-- Passing the size using the GET method allows using general.php for both size categories -->
    <a href= "general.php?size='small'"><button type="button" class="btn btn-info">Small Pets</button></a>
    <a href= "general.php?size='large'"><button type="button" class="btn btn-info">Large Pets</button></a>
  
<hr>

  <p class="h3">By Name</p>
  <form id="petnames" action="petnames.php" method="POST">
  <input type="text" name="name" id="name" placeholder="pet name">
  <div id="results"></div>
  </form>

  </div>
  
    <!-- The regular jQuery must not be included since it interferes with the ajax -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<script>
      var request;
      $("#name").keyup(function(event){

          var form = $(this);
          var inputs = form.find("input, select, button, textarea");
          var serializedData = form.serialize();
          inputs.prop("disabled", true);
          request = $.ajax({
              url: "petnames.php",
              type: "post",
              data: serializedData
          });

          request.done(function(response, textStatus, jqXHR){
              document.getElementById("results").innerHTML=response;
          });

          request.fail(function(jqXHR, textStatus, errorThrown){
              console.error(
                  "The following error occurred: " + textStatus, errorThrown
              );
          });

          request.always(function(){
              inputs.prop("disabled", false);
          });
      });
  </script>

</body>
</html>
<?php ob_end_flush(); ?>