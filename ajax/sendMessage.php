<?php
include '../config.php';

error_reporting(E_ALL);

require('../php/Pusher.php');

if(isset($_POST))
{
  $pusher = new Pusher('16118eb1440f8b51d212', '1d84aa860991716a7f68' , '362983');

  $from = auth()->id;
  $to = $_POST['to'];
    $name_to = user($_POST['to'])->name;
    $name_from = user($from)->name;
  $message =  $_POST['message'];

  $alert = $from == auth()->id ? 'alert-info' : 'alert-success' ;

  $data['message'] = $message;
  $data['to'] = $to;
  $data['from'] = $from;
  $data['alert'] = $alert;
$data['name_from']= $name_fromt;
$data['name_to']= $name_to;
  $pusher->trigger('chats', 'my-event', $data);
  // $pusher->trigger('show_chat_box', 'my-event', $data);

  mysqli_query($con,"INSERT INTO `chats`(`from`,`to`,`message`,`typing`,`read`,`seen`)VALUES ('".$from."','".$to."','".$message."','0','0','0')");
}
  ?>
