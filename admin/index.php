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
                     
                       
                           
                    </div>
                </div>
                <!-- /.row -->

                  
                <!-- /.row -->
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
            <?php
      $query="SELECT * FROM post";
                $select_all=mysqli_query($conn,$query);
                $post_counts=mysqli_num_rows($select_all);
                echo "<div class='huge'>{$post_counts}</div>"              
        ?>
                    
                    
                
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="post.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                      <?php
      $query="SELECT * FROM comment";
                $select_all=mysqli_query($conn,$query);
                $comment_counts=mysqli_num_rows($select_all);
                echo "<div class='huge'>{$comment_counts}</div>"              
        ?>
                
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comment.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                     <?php
      $query="SELECT * FROM users";
                $select_all=mysqli_query($conn,$query);
                $user_counts=mysqli_num_rows($select_all);
                echo "<div class='huge'>{$user_counts}</div>"              
        ?>
                
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                       
                        <?php
      $query="SELECT * FROM cat";
                $select_all=mysqli_query($conn,$query);
                $categories_counts=mysqli_num_rows($select_all);
                echo "<div class='huge'>{$categories_counts}</div>"              
        ?>
                
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->
           
           
              <?php
             $query="SELECT * FROM post WHERE post_status='draft'";
                $select_all_draft=mysqli_query($conn,$query);
                $draft_post_counts=mysqli_num_rows($select_all_draft);
             
             
                $query="SELECT * FROM post WHERE post_status='published'";
                $select_all_published=mysqli_query($conn,$query);
            $published_post_counts=mysqli_num_rows($select_all_published);
             
                $query="SELECT * FROM users WHERE role='admin'";
                $select_all_admin=mysqli_query($conn,$query);
                $admin_user_counts=mysqli_num_rows($select_all_admin);
             
             $query="SELECT * FROM users WHERE role='subscriber'";
                $select_all_subscriber=mysqli_query($conn,$query);
            $subscriber_user_counts=mysqli_num_rows($select_all_subscriber);
             
        $query="SELECT * FROM comment WHERE comment_status='approved'";
                $select_all_approved=mysqli_query($conn,$query);
            $approved_comment_counts=mysqli_num_rows($select_all_approved);
             
     $query="SELECT * FROM comment WHERE comment_status='unapproved'";
                $select_all_unapproved=mysqli_query($conn,$query);
        $unapproved_comment_counts=mysqli_num_rows($select_all_unapproved);
             
                    ?>
           
           <div class="row">
               
               <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],
            
            <?php
      $element_text = ['All Posts', 'Active Posts', 'Draft post', 'All Comment', 'Active Comment', 'Unactive Comment', 'All_Users', 'Admin', 'Categories'];

$count=[$post_counts, $published_post_counts, $draft_post_counts, $comment_counts, $approved_comment_counts, $unapproved_comment_counts, $user_counts, $admin_user_counts, $categories_counts];
                   for($i =0;$i<9;$i++){
                       echo "['{$element_text[$i]}'" . "," . "{$count[$i]}],";
              
                   }
                                
                    ?>
            
      
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
          
<div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
 
           </div>
           
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

 <?php include "include/footer.php"; ?>