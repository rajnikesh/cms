<?php include "include/header.php"; ?>
<?php include "include/db.php"; ?>

<?php
if(isset($_SESSION['username'])){
$username= $_SESSION['username'];
$query="SELECT * FROM users WHERE username='{$username}' ";
$select_user_profile=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($select_user_profile)){
 
                     $user_id=$row['user_id'];   $username=$row['username'];
             $user_firstname=$row['user_firstname'];
             $user_lastname=$row['user_lastname'];
                $user_email=$row['user_email'];
                
                $user_role=$row['role'];  
             $user_password=$row['user_password'];
    
    
}
}
?>

<?php
if(isset($_POST['update'])){
 
$username=$_POST['username'];
$user_firstname=$_POST['user_firstname'];
$user_lastname=$_POST['user_lastname'];
$user_email=$_POST['user_email'];
$user_password=$_POST['user_password'];

$query="UPDATE users SET ";
$query .="user_firstname='{$user_firstname}', ";
$query .="user_lastname='{$user_lastname}', ";
$query .="user_email='{$user_email}', ";
$query .="username='{$username}', ";
$query .="user_password='{$user_password}' ";
$query .="WHERE username='{$username}' ";

$edit_user=mysqli_query($conn,$query);

}
?>



<body>

    <div id="wrapper">

        <!-- Navigation -->
<?php include "include/navigation.php"; ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small><?php echo $_SESSION['username'] ?></small>
                        </h1>
                        
                        
                        
   <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">First Name</label>
        <input type="text" value="<?php  echo $user_firstname ?>" class="form-control" name='user_firstname'>
    </div>
    
    <div class="form-group">
        <label for="title">Last Name</label>
        <input type="text" value="<?php  echo $user_lastname ?> "class="form-control" name='user_lastname'>
    </div>
    <div class="form-group">
        <label for="title">Username</label>
        <input value="<?php  echo $username ?>" type="text" class="form-control" name='username'>
    </div>
   
    <div class="form-group">
        <label for="title">Email Id</label>
        <input value="<?php  echo $user_email ?>" type="email" class="form-control" name='user_email'>
    </div>
    <div class="form-group">
        <label for="title">Password</label>
       <input value="<?php  echo $user_password ?>" type="password" class="form-control" name='user_password'>
    </div>
    <div class="form-group">
       
        <input type="submit" class="btn btn-primary" name='update' value="Update">
    </div>
</form>
                        
                        
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

 <?php include "include/footer.php"; ?>