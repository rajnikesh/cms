<?php   
if(isset($_POST['checkBoxArray']))
{
   foreach($_POST['checkBoxArray'] as $postValueid){
       
   $bulk_options=$_POST['bulk_options'];
       
       switch($bulk_options){
               
   case 'published':

       $query1="UPDATE post SET post_status= '{$bulk_options}' WHERE post_id={$postValueid} ";
       $update_published=mysqli_query($conn,$query1);

       break;
    case 'draft':

       $query2="UPDATE post SET post_status= '{$bulk_options}' WHERE post_id={$postValueid} ";
       $update_draft=mysqli_query($conn,$query2);

       break;
       case 'delete':

$query3="DELETE  FROM POST  WHERE post_id={$postValueid} ";
$delete=mysqli_query($conn,$query3);

break;
       }
   }
}


?>
                    

                    
                    
                    <form action="" method="post">
                     

                           <table class="table table-bordered table-hover">
                   <div id="bulkOptionsContainer" class="col-xs-4" style="padding: 0px;" >
                    <select name="bulk_options" id="" class="form-control">
                                
                        <option value="" >Select Optoin</option>
                        <option value="published" >Publish</option>
                        <option value="draft" >Draft</option>
                        <option value="delete" >Delete</option>
                            </select>
                           </div>
               <div class="col-xs-4">
                   <input type="submit" name="submit" class="btn btn-success" value="Apply">
                   <a class="btn btn-primary" href="href="post.php?source=add_post"">Add New</a>

               </div>
                           
                            <thead>
                                <tr>
                                   <th><input type="checkbox" id="select"></th>
                                    <th>Post Id</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                    <th>Delete</th>
                                    <th>Update</th>
                                </tr>
                            </thead>
                             <tbody>
                             <?php
                                  $query="SELECT * FROM post";
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
                                   
                               
                               echo "<tr>";
                ?>
               <td><input type='checkbox' class='checkBoxes' name="checkBoxArray[]" value='<?php echo $post_id;  ?>'></td>
                <?php

                                    
                                    
                                    echo "<td>$post_id</td>";
                                    echo "<td>$post_author</td>";
                                    echo "<td>$post_title</td>";
                                    
                                    
                                     $query1="SELECT * FROM cat WHERE cat_id={$post_cat_id}";
                    $result1=mysqli_query($conn,$query1);
                
                     while($row=mysqli_fetch_assoc($result1)){
                    $cat_id=$row['cat_id'];
                     $cat_title=$row['cat_name'];
                        
                   
                                    
                                     echo "<td>{$cat_title}</td>";
                                    
                                    
                     }
                                    
                                    echo "<td>$post_status</td>";
                                    echo "<td><img width='100' height ='100' src='../images/$post_image' alt='image' </td>";
                                    
                                    echo "<td>$post_tags</td>";
                                    echo "<td>$post_camment_count</td>";
                                    echo "<td>$post_date</td>";
                                     echo "<td><a href='post.php?delete=$post_id'>Delete</a></td>";
                                    echo "<td><a href='post.php?source=edit_post&p_id=$post_id'>Update</a></td>";
                                 
                                    echo "</tr>";
                                
                                }
                                 ?>
                            
                        </tbody>
                        </table>
                       </form>
                       <?php
                    if(isset($_GET['delete'])){
                        $post_id=$_GET['delete'];
                        $query="DELETE FROM post WHERE post_id={$post_id}";
                        $result=mysqli_query($conn,$query);
                        header("Location: post.php");
                    }
?>


 
