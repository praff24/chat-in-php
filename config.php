<<?php
  session_start();
  $con = mysqli_connect('localhost','root','','chat');
  mysqli_set_charset($con,'utf8');

  function showChatBox($user_id, $path = null){
    global $con;
    if(is_null($path)){
      $chat = include 'chatBox.php';
    }
    else{
      $chat = include $path.'chatBox.php';
    }
    return $chat;
  }

  function auth()
  {
    global $con;
    if(isset($_SESSION['name'])){
        $sql = mysqli_query($con,"SELECT * FROM `user` WHERE `name` = '".$_SESSION['name']."'");
        $user=mysqli_fetch_object($sql);
        return $user;
    }
    else{
      return [];
    }
  }

  function user($id)
  {
    global $con;
    $sql = mysqli_query($con,"SELECT * FROM `user` WHERE `id` = " .$id);
    $user=mysqli_fetch_object($sql);
    return $user;

  }

  function activeChats()
  {
    return isset($_SESSION['chats']) ? $_SESSION['chats'] : [] ;
  }

  function addChat($id)
  {
    $chats = isset($_SESSION['chats']) ? $_SESSION['chats'] : [] ;

    if(!in_array($id,$chats)){
      $chats[$id] = $id;
        $_SESSION['chats'] = $chats;
        return true;
    }else{
      return false;
    }
}

  function removeChat($id)
  {
    $chats = isset($_SESSION['chats']) ? $_SESSION['chats'] : [] ;

    if(in_array($id, $chats)){
      unset($chats[$id]);

    }
    $_SESSION['chats'] = $chats;
  }

 ?>
