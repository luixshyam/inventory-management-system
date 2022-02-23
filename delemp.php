
<?php
    session_start();
    include('connect.php');
    if(isset($_GET['id']))
     {
      $id=$_GET['id'];
    }
    $sql="delete from employee where id='$id'";
    $result=$con->query($sql);

    header('location:viewemployee.php');
    
?>

