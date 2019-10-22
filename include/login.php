<?php include "db.php";  ?>
<?php session_start();  ?>
<?php
if(isset($_POST['login'])){

 $username=$_POST['username'];
 $password=$_POST['password'];
    mysqli_real_escape_string($conn,$username);
     mysqli_real_escape_string($conn,$password);
    
    $query="SELECT * FROM users WHERE username='{$username}'";
    $select_user_query=mysqli_query($conn,$query);
    if(!$select_user_query){
        die("QUERY FAILED". mysqli_error($conn));
    }
    while($row=mysqli_fetch_array($select_user_query)){
       $db_id=$row['user_id'];
        $db_username=$row['username'];
      $user_firstname=$row['user_firstname'];
       $user_lastname=$row['user_lastname'];
        $db_password=$row['user_password'];
        $user_role=$row['role'];
    }
    if($username!==$db_username && $password!==$db_password){
        header("Location: ../index.php");
    }
else if($username==$db_username && $password==$db_password)
      {
    $_SESSION['username']=$db_username;
    $_SESSION['firstname']=$user_firstname;
    $_SESSION['lastname']=$user_lastname;
    $_SESSION['role']=$user_role;
    
     header("Location: ../admin");
}
    else {
        header("Location: ../index.php");
    }
    }
?>