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
                            <small>Author</small>
                        </h1>
                        
                        
                        
                        <?php
                        if(isset($_GET['source'])){
                           $source=$_GET['source'];
                        }else
                        {
                            
                        $source='';    
                        }
                        switch($source){
                                case 'add_post';
                                include "include/add_post.php";
                                break;
                                case 'edit_post';
                                include "include/edit_post.php";
                                break;
                                case '300';
                                echo "NICE 100";
                                break;
                            default:
                                include "include/view_comment.php";
                                break;
                        }
                        
                        
                
                        ?>
                        
                        
                        
                        
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

 <?php include "include/footer.php"; ?>