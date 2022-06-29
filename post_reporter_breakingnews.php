 <?php
 include("header.php");
 ?>
 <div id="page-wrapper">
     <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row" id="main" >
                <h3 style="text-align: center"> All Breaking News</h3>
                <hr>
             <div class="col-sm-12 col-md-12" id="content">
    <div class="row col-md-9 col-md-offset-1 custyle">
    <table class="table table-striped custab">
    <thead>
   
        <tr>
            <th>ID</th>
            <th>Breaking News</th>
            <th>News By</th>
            <th class="text-center">Edit</th>

            <th class="text-center">Delete</th>
        </tr>
    </thead>
    <?php
    include("db_config.php");
    $i=1;
    $sql=mysqli_query($con,"SELECT * FROM `breaking_news` where reporter='1' ");
    while($row=mysqli_fetch_assoc($sql))
    {
        ?>
            <tr>
                <td><?php echo $i; ?> </td>
                <td><?php echo $row['breaking_news']; ?></td>
                <td>

                    <?php
                        if(isset($row['reporter_name'])){
                            echo $row['reporter_name']."(reporter)";
                        }
                        else if(isset($row['user_name'])){
                            echo $row['user_name']."(user)";

                        }
                        else {
                            echo "Admin";
                        }

                    ?>
                        

                </td>
                <td class="text-center"><a class='btn btn-info btn-xs' href="post_br_news.php?id=<?php echo $row['id'];?>"><span class="glyphicon glyphicon-edit"></span> Post</a> <!-- /* <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a> --></td>
  
                 <td class="text-center"><a class='btn btn-info btn-xs' href="delete_breaking_news.php?id=<?php echo $row['id'];?>" ><span class="glyphicon glyphicon-trash"></span> delete</a> <!-- <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a></td> -->
            </tr>
         <?php
         $i++;
     }
         ?>
    </table>
         </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div><!-- /#wrapper -->
<?php
include("footer.php");
?>