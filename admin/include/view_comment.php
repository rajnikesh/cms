<table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Post Id</th>
                                    <th>Author</th>
                                    <th>Comment</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>In Response to</th>
                                    <th>Date</th>
                                    <th>Approve</th>
                                    <th>Unapprove</th>
                                    <th>delete</th>
                                </tr>
                            </thead>
                             <tbody>
                             <?php
                                  $query="SELECT * FROM comment";
                    $result=mysqli_query($conn,$query);
                                while($row=mysqli_fetch_assoc($result)){
                                    $comment_id=$row['comment_id'];
                                    $comment_author=$row['comment_author'];
                                    $comment_post_id=$row['comment_post_id'];
                                    $comment_status=$row['comment_status'];
                                    $comment_email=$row['comment_email'];
                                    $comment_date=$row['comment_date'];
                                    $comment_content=$row['comment_content'];
                                   
                               
                               echo "<tr>";
                                    echo "<td>$comment_id</td>";
                                    echo "<td>$comment_author</td>";
                                    echo "<td>$comment_content</td>";
                                    
                                    
                            /*   $query1="SELECT * FROM cat WHERE cat_id={$post_cat_id}";
                    $result1=mysqli_query($conn,$query1);
                
                     while($row=mysqli_fetch_assoc($result1)){
                    $cat_id=$row['cat_id'];
                     $cat_title=$row['cat_name'];
                        
                   
                                    
                                     echo "<td>{$cat_title}</td>";
                                    
                                    
                     } */
                                    
                                    echo "<td>$comment_email</td>";
                                   
                                    echo "<td>$comment_status</td>";
                                    
                                    $query1="SELECT * FROM post WHERE post_id=$comment_post_id";
                                    $select_post_id=mysqli_query($conn,$query1);
                                    while($row=mysqli_fetch_assoc($select_post_id)){
                                        $post_id=$row['post_id'];
                                         $post_title=$row['post_title'];
                                        echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
                                    }
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    echo "<td>$comment_date</td>";
                                    
                                    echo "<td><a href='comment.php?unapproved=$comment_id'>Unapproved</a></td>";
                                     echo "<td><a href='comment.php?approved=$comment_id'>Approved</a></td>";
                                    
                                   
                                     echo "<td><a href='comment.php?delete=$comment_id'>Delete</a></td>";
                                   
                                    echo "</tr>";
                                
                                }
                                 ?>
                            
                        </tbody>
                        </table>
                       
                       <?php
                        if(isset($_GET['unapproved'])){
                        $comment_id=$_GET['unapproved'];
                        $query="UPDATE comment SET comment_status='unapproved' WHERE comment_id=$comment_id";
                        $result=mysqli_query($conn,$query);
                        header("Location: comment.php");
                    }



                        if(isset($_GET['approved'])){
                        $comment_id=$_GET['approved'];
                        $query="UPDATE comment SET comment_status='approved' WHERE comment_id=$comment_id";
                        $result=mysqli_query($conn,$query);
                        header("Location: comment.php");
                    }






                    if(isset($_GET['delete'])){
                        $comment_id=$_GET['delete'];
                        $query="DELETE FROM comment WHERE comment_id={$comment_id}";
                        $result=mysqli_query($conn,$query);
                        header("Location: comment.php");
                    }
?>