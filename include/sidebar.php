  <?php include "db.php"?>
  <div class="col-md-4">
   
               
                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="s.php" method="post">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button  name="submit" class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Login Well -->
                <div class="well">
                    <h4>Login</h4>
                    <form action="include/login.php" method="post">
                    <div class="form-group">
                        <input name="username" type="text" class="form-control" placeholder="Enter Username">
                      
                    </div>
                    <div class="input-group">
                        <input name="password" type="password" class="form-control" placeholder="Enter Password">
                      <span class="input-group-btn">
                          <button class="btn btn-primary" name="login" type="submit">Submit</button>
                      </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>
               
               
               
               
               
               
                <!-- Blog Categories Well -->
                <div class="well">
                   <?php 
                    $query="SELECT * FROM cat";
                    $result=mysqli_query($conn,$query);
                   
                    ?>
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                               <?php
                                while($row=mysqli_fetch_assoc($result)){
                    $cat_title=$row['cat_name'];
                                     $cat_id=$row['cat_id'];
                    echo "<li> <a href='cat.php?category=$cat_id'>{$cat_title}</a></li>";
                    }
                                ?>
                                <li><a href="#">Category Name</a>
                                </li>
                               
                            </ul>
                        </div>
                        
                        
                        
                        
                        <!-- /.col-lg-6 -->
                      
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
               <?php include "widget.php";?>
            </div>

        
       