<?php include "include/header.php"; ?>
<?php include "include/db.php"; ?>
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
                     
                       <div class="col-xs-6">
                          <?php
                           if(isset($_POST['submit'])){
                              $cat_title=$_POST['cat_title'];
                               if($cat_title==""||empty($cat_title)){
                                   echo "This field cannot be empty";
                           }
                           else {
                            $query="INSERT INTO cat(cat_name) value('{$cat_title}')";
                               
                               $create_query=mysqli_query($conn,$query);
                               
                           }
                               }
                           
                           ?>
                          
                           <form action="" method="post">
                              <div class="form-group">
                                 <label for="cat-title">Add Categories</label>
                                  <input class="form-control" type="text" name="cat_title">
                              </div>
                               <div class="form-group">
                                  <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                              </div>
                               
                           </form>
                           
                            <form action="" method="post">
                              <div class="form-group">
                                 <label for="cat-title">Edit Categories</label>
                                  <?php 
                            if(isset($_GET['edit'])){
                                $cat_id=$_GET['edit'];
                               $query="SELECT * FROM cat WHERE cat_id=$cat_id";
                    $result=mysqli_query($conn,$query);
                     while($row=mysqli_fetch_assoc($result)){
                    $cat_id=$row['cat_id'];
                     $cat_title=$row['cat_name'];
                    ?>
                               
                               
                        <input value="<?php if(isset($cat_title)){echo $cat_title;} ?>" type="text" class="form-control" name="cat_title">        
                                
                         <?php  }}  ?>  
                                 
                               <?php
                                  
                                 if(isset($_POST['update'])){
                                     $the_cat=$_POST['cat_title'];
                                        $query="UPDATE cat SET cat_name='{$the_cat}' WHERE cat_id={$cat_id}";
                                        $update_query=mysqli_query($conn,$query);  
                                 }
                                  
                                  ?>
                                 
                                 
                                 
                              </div>
                               <div class="form-group">
                                  <input class="btn btn-primary" type="submit" name="update" value="Update Categories">
                              </div>
                               
                           </form>
                       </div>
                           
                        <div class="col-xs-6">
                           
                          
                     
                   
                           
                           
                           
                           
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                <th>Id</th>
                                   <th>Categories Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php
                                    $query="SELECT * FROM cat";
                    $result=mysqli_query($conn,$query);
                                while($row=mysqli_fetch_assoc($result)){
                    $cat_id=$row['cat_id'];
                     $cat_title=$row['cat_name'];
                                    echo " <tr>";
                                    echo "<td> {$cat_id}</td>";
                                     echo "<td>{$cat_title}</td>";
                                     echo "<td> <a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                                    echo "<td> <a href='categories.php?edit={$cat_id}'>Edit</a></td>";
                                    echo "</tr>";
                    }
                                ?>
                                   
                                <?php
                                    if(isset($_GET['delete'])){
                                     $the_cat_id=$_GET['delete'];
                                        $query="DELETE FROM cat WHERE cat_id={$the_cat_id}";
                                        $delete_query=mysqli_query($conn,$query);
                                        header("Location: categories.php");
                                    }
                                    
                                    ?>
                                        
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

 <?php include "include/footer.php"; ?>