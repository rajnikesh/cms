<?php 

if(isset($_GET['p_id'])){
    
  $post_id= $_GET['p_id'];
}
   $query="SELECT * FROM post WHERE post_id=$post_id";
                    $result=mysqli_query($conn,$query);
 while($row=mysqli_fetch_assoc($result)){
                                    $post_id=$row['post_id'];
                                    $post_author=$row['post_author'];
                                    $post_title=$row['post_title'];
                                    $post_status=$row['post_status'];
                                    $post_image=$row['post_image'];
                                    $post_date=$row['post_date'];
                                    $post_tags=$row['post_tags'];
                                    $post_cat_id=$row['post_cat_id'];
                     $post_camment_count=$row['post_comment_count'];
                            $post_content=$row['post_content'];
 }

     if(isset($_POST['update_post'])){
         $post_author=$_POST['author'];
         $post_title=$_POST['title'];
         $post_status=$_POST['status'];
         $post_cat_id=$_POST['post_cat_id'];
         $post_image=$_FILES['image']['name'];
         $post_image_temp=$_FILES['image']['tmp_name'];
         $post_content=$_POST['post_content'];
         $post_tags=$_POST['post_tags'];
         move_uploaded_file($post_image_temp,"../images/$post_image");
         if(empty($post_image)){
             $query="SELECT * FROM post WHERE post_id=$post_id";
             $result=mysqli_query($conn,$query);
           while($row=mysqli_fetch_assoc($result)){
               $post_image=$row['post_image'];
           }
         }
     $query="UPDATE post SET ";
         $query .="post_title='{$post_title}', ";
         $query .="post_cat_id='{$post_cat_id}', ";
         $query .="post_date=now(), ";
         $query .="post_author='{$post_author}', ";
         $query .="post_status='{$post_status}', ";
         $query .="post_title='{$post_title}', ";
         $query .="post_tags='{$post_tags}', ";
         $query .="post_content='{$post_content}', ";
         $query .="post_image='{$post_image}' ";
         $query .="WHERE post_id={$post_id} ";
         
         $result=mysqli_query($conn,$query);
          if(!$result){
                    die("QUERY FAILED.".mysqli_error($conn));
                }
     }                          
?>
  

  
   <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" value="<?php  echo $post_title ?>" class="form-control" name='title'>
    </div>
    <div class="form-group">
        <label for="title">Post Category Id</label>
        <select name="post_cat_id" id="post_cat_id">
            <?php
                $query="SELECT * FROM cat";
                    $result=mysqli_query($conn,$query);
                if(!$result){
                    die("QUERY FAILED.".mysqli_error($conn));
                }
                     while($row=mysqli_fetch_assoc($result)){
                    $cat_id=$row['cat_id'];
                     $cat_title=$row['cat_name'];
                         echo "<option  value='{$cat_id}'>{$cat_title}</option>";
                     }
                    ?>
            
        </select>
    </div>
    <div class="form-group">
        <label for="title">Post Author</label>
        <input type="text" value="<?php  echo $post_author ?> "class="form-control" name='author'>
    </div>
    <div class="form-group">
        <label for="title">Post Status</label>
        <input value="<?php  echo $post_status ?>" type="text" class="form-control" name='status'>
    </div>
    <div class="form-group">
        <label for="title">Post Image</label>
        <input type="file" name='image'>
        <img src="../images/<?php echo $post_image?>" >
    </div>
    <div class="form-group">
        <label for="title">Post Tag</label>
        <input value="<?php  echo $post_tags ?>" type="text" class="form-control" name='post_tags'>
    </div>
    <div class="form-group">
        <label for="title">Post Content</label>
        <textarea  class="form-control" name='post_content' id="post_content" cols="30" rows="10"><?php  echo $post_content ?></textarea>
    </div>
    <div class="form-group">
       
        <input type="submit" class="btn btn-primary" name='update_post' value="Update Post">
    </div>
</form>