  <?php
if(isset($_POST['create_user'])){
    $username=$_POST['username'];
     $user_firstname=$_POST['user_firstname'];
     $user_lastname=$_POST['user_lastname'];
     $user_email=$_POST['user_email'];
    
    // $post_image=$_FILES['image']['name'];
    //$post_image_temp=$_FILES['image']['tmp_name'];
    
    
    
        
     $user_password=$_POST['user_password'];
    // $post_date=date('d-m-y');
     $user_role=$_POST['user_role'];
    // $post_comment_count='4';
    
   // move_uploaded_file($post_image_temp,"../images/$post_image");
    
    $query ="INSERT INTO users(username,user_firstname,user_lastname,user_email,user_password,role) value('{$username}','{$user_firstname}','{$user_lastname}','{$user_email}','{$user_password}','{$user_role}')";
    
    $result=mysqli_query($conn,$query);
    
    if(!$result){
                    die("QUERY FAILED.".mysqli_error($conn));
                }
    else{
        echo "successful";
    }
   
    
    
}
?>
    <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Firstname</label>
        <input type="text" class="form-control" name='user_firstname'>
    </div>
    <div class="form-group">
        <label for="title">Lastname</label>
        <input type="text" class="form-control" name='user_lastname'>
    </div>
    <div class="form-group">
        <label for="title">Role</label>
        <select name="user_role" id="">
          <option value="subscriber">Select Options</option>
            <option value="admin">Admin</option>
             <option value="subscriber">Subscriber</option>
            
        </select>
    </div>
    
   <!--
    <div class="form-group">
        <label for="title">Post Image</label>
        <input type="file" name='image'>
    </div>-->
    <div class="form-group">
        <label for="title">Username</label>
        <input type="text" class="form-control" name='username'>
    </div>
     <div class="form-group">
        <label for="title">user_email</label>
        <input type="email" class="form-control" name='user_email'>
    </div>
     <div class="form-group">
        <label for="title">user_password</label>
        <input type="email" class="form-control" name='user_password'>
    </div>
    <div class="form-group">
       
        <input type="submit" class="btn btn-primary" name='create_user' value="Add User">
    </div>
</form>