<<?php
  
  include 'config.php';
  if(isset($_POST['submit'])){
     $name = $_POST['name'];
     $sql = mysqli_query($con,"SELECT * FROM `user` WHERE `name` = '".$name."'");
     if(mysqli_num_rows($sql) >= 0)
     {
       $user=mysqli_fetch_array($sql);
       $_SESSION['name']=$user['name'];
       header('location: index.php');
     }
     else{
       die('<center><h1>Error : Not logged in </h1></center>');
     }
  }
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Title Page</title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
    <script src="js/script.js"></script>

      <link rel="stylesheet" href="css/style.min.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <title></title>
  </head>
  <body>
    <div class="container">
      <form class="" action="" method="post" roles="form">
        <legend>Form Title</legend>
        <div class="form-group">
          <label for="">Name</label>
          <input type="text" name="name" value="" class="form-control" placeholder="Right your name">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>

  </body>
</html>
