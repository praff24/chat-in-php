<!DOCTYPE html>

<?php
  include 'config.php';
  if(!isset($_SESSION['name'])){
    header('location:login.php');
    die();
  }
  //unset($_SESSION['chats']);

 ?>


<html lang="" auth = "<?php echo auth()->id; ?>">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Title Page</title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>


      <link rel="stylesheet" href="css/style.min.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


  </head>
  <body>
    <<?php

     ?>
  <div class="row">
    <div class="col-md-2 sidebar">
      <?php

        $query = mysqli_query($con, "SELECT * FROM `user` WHERE `name` != '".$_SESSION['name']."'");
       ?>
<ul>
  <?php

    while ($row = mysqli_fetch_array($query))
    {  ?>
       <!-- <p>hello</p> -->
        <li><a href="javascript:;" class="namesclick" user-id = "<?=$row['id']; ?>"> <?=$row['name']; ?></a></li>
    <?php }
   ?>

</ul>
    </div>
    <div class="col-md-10">
    <div class="row chat-container">
      <?php
        foreach (activeChats() as $id) {
          echo showChatBox($id);
        }
       ?>
    </div>
  </div>
    </div>
  </div>
</div>
  <script src="https://js.pusher.com/4.0/pusher.min.js"></script>
<script src="js/script.js"></script>
<script src="js/my_pusher.js"></script>
  </body>
</html>
