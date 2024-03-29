  <?php
if(isset($_POST['create_post'])){
    $post_title=$_POST['title'];
     $post_author=$_POST['author'];
     $post_cat_id=$_POST['post_cat_id'];
     $post_status=$_POST['status'];
    
     $post_image=$_FILES['image']['name'];
    $post_image_temp=$_FILES['image']['tmp_name'];
    
    
    
        
     $post_tags=$_POST['post_tags'];
     $post_date=date('d-m-y');
     $post_content=$_POST['post_content'];
    // $post_comment_count='4';
    
    move_uploaded_file($post_image_temp,"../images/$post_image");
    
    $query ="INSERT INTO post(post_cat_id,post_image,post_date,post_title,post_tags,post_content,post_author,post_status) value({$post_cat_id},'{$post_image}',now(),'{$post_title}','{$post_tags}','{$post_content}','{$post_author}','{$post_status}')";
    
    $result=mysqli_query($conn,$query);
    
    if($result){
        
        $post_id=mysqli_insert_id($conn);
        
         echo "<p class='bg-success'>Post Created. <a href='../post.php?p_id={$post_id}'>View Post</a> or <a href='post.php'>Edit More Post</a></p>";
    }
   
    
    
}
?>
    <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name='title'>
    </div>
    <div class="form-group">
        <label for="title">Post Category Id</label>
        <select name="post_cat_id" id="">
            <?php
                $query="SELECT * FROM cat";
                    $result=mysqli_query($conn,$query);
                if(!$result){
                    die("QUERY FAILED.".mysqli_error($conn));
                }
                     while($row=mysqli_fetch_assoc($result)){
                    $cat_id=$row['cat_id'];
                     $cat_title=$row['cat_name'];
                         echo "<option value='{$cat_id}'>{$cat_title}</option>";
                     }
                    ?>
            
        </select>
    </div>
    
    <div class="form-group">
        <label for="title">Post Author</label>
        <input type="text" class="form-control" name='author'>
    </div>
    
    
    
    
    <div class="form-group">
       
        
        <select name="status" id="">
            <option value="draft">Post Status</option>
             <option value="published">Publish</option>
              <option value="draft">Draft</option>
            
        </select>
        
        
    </div>
    
    
    
    
    <div class="form-group">
        <label for="title">Post Image</label>
        <input type="file" name='image'>
    </div>
    <div class="form-group">
        <label for="title">Post Tag</label>
        <input type="text" class="form-control" name='post_tags'>
    </div>
    <div class="form-group">
        <label for="title">Post Content</label>
        <textarea  class="form-control" name='post_content' id="body" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group">
       
        <input type="submit" class="btn btn-primary" name='create_post' value="Publish Post">
    </div>
</form>