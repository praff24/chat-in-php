
<div class="col-md-4 chat-box" user-id=" <?php echo $user_id; ?> ">
  <div class="panel panel-primary">
    <?php
      $query = mysqli_query($con, "SELECT * FROM `chats`
                WHERE `from` IN ('".$user_id."', '".auth()->id."')
                AND `to` IN ('".$user_id."', '".auth()->id."')
                ");
      // $userquery = mysqli_query($con , "SELECT * FROM `user` WHERE `id` = '".$user_id."'");
      // $user = mysqli_fetch_array($userquery);
      $user = mysqli_fetch_array(mysqli_query($con, " SELECT * FROM `user` WHERE `id`=".$user_id));

     ?>
    <div class="panel-heading">

      <?php
        echo $user['name'];
       ?>
      <!-- <button type="button" class="pull-right close-chat">X</button> -->
    </div>
    <div class="panel-body chat-user-<?= $user_id; ?>">
      <?php
        while ($row = mysqli_fetch_array($query)) {

          $alert = $row['from'] == auth()->id? 'alert-info': 'alert-success';
          ?>
          <div class="alert <?php echo $alert; ?> ">
            <?php
              echo user($row['from'])->name.': '. $row['message'];
             ?>
          </div>

          <?php
        }
       ?>

    </div>
    <div class="panel-footer">
<input type="text" name="message" class="form-control send-message" placeholder="write message">
    </div>
  </div>
</div>
