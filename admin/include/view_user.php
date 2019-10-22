<table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>User Id</th>
                                    <th>Username</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                   
                                    
                                </tr>
                            </thead>
                             <tbody>
                             <?php
                                  $query="SELECT * FROM users";
                    $result=mysqli_query($conn,$query);
                                while($row=mysqli_fetch_assoc($result)){
                                    $user_id=$row['user_id'];
                                    $username=$row['username'];
                                    $user_firstname=$row['user_firstname'];
                                    $user_lastname=$row['user_lastname'];
                                    $user_email=$row['user_email'];
                                    $user_image=$row['user_image'];
                                    $user_role=$row['role'];  
                                    $user_password=$row['user_password'];
                               echo "<tr>";
                                    echo "<td>$user_id</td>";
                                    echo "<td>$username</td>";
                                    echo "<td>$user_firstname</td>";
                                    
                                    
                            /*   $query1="SELECT * FROM cat WHERE cat_id={$post_cat_id}";
                    $result1=mysqli_query($conn,$query1);
                
                     while($row=mysqli_fetch_assoc($result1)){
                    $cat_id=$row['cat_id'];
                     $cat_title=$row['cat_name'];
                        
                   
                                    
                                     echo "<td>{$cat_title}</td>";
                                    
                                    
                     } */
                                    
                                    echo "<td>$user_lastname</td>";
                                   
                                    echo "<td>$user_email</td>";
                                     echo "<td>$user_role</td>";
                                    
                                    /*   $query1="SELECT * FROM post WHERE post_id=$comment_post_id";
                                 $select_post_id=mysqli_query($conn,$query1);
                                    while($row=mysqli_fetch_assoc($select_post_id)){
                                        $post_id=$row['post_id'];
                                         $post_title=$row['post_title'];
                                        echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
                                    }*/
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                   // echo "<td>$comment_date</td>";
                                    
                                    echo "<td><a href='users.php?change_to_admin=$user_id'>Admin</a></td>";
                                     echo "<td><a href='users.php?change_to_sub=$user_id'>Subscriber</a></td>";
                                    
                                   
                                     echo "<td><a href='users.php?delete=$user_id'>Delete</a></td>";
                                   
                                    echo "</tr>";
                                
                                }
                                 ?>
                            
                        </tbody>
                        </table>
                       
                       <?php
                        if(isset($_GET['change_to_admin'])){
                        $user_id=$_GET['change_to_admin'];
                        $query="UPDATE users SET role='admin' WHERE user_id=$user_id";
                        $result=mysqli_query($conn,$query);
                        header("Location: users.php");
                    }



                        if(isset($_GET['change_to_sub'])){
                        $user_id=$_GET['change_to_sub'];
                        $query="UPDATE users SET role='subscriber' WHERE user_id=$user_id";
                        $result=mysqli_query($conn,$query);
                        header("Location: users.php");
                    }






                    if(isset($_GET['delete'])){
                        $comment_id=$_GET['delete'];
                        $query="DELETE FROM users WHERE user_id={$user_id}";
                        $result=mysqli_query($conn,$query);
                        header("Location: users.php");
                    }
?>