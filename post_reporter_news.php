 <?php
 include("header.php");
 ?>

 <div id="page-wrapper">
     <div class="container-fluid">
            <!-- Page Heading -->
    <div class="row" id="main" >
        <h3 style="text-align: center"> All News</h3>
                <hr>
    <div class="col-sm-12 col-md-12 custyle" id="content">
    
    <table class="display" id="example">
    <thead>
   
        <tr>
           <th>ID</th> 
            <th>Title</th>
            <th>CategoryType</th>
            <th>News Type</th>
            <th style="width: 200px">Content</th>
            <th>Image</th>
            <th >VideoLink</th>
            <th>Location</th>
            <th>Name</th>
            <!-- <th class="text-center">Edit</th> -->
            <th class="text-center">Delete</th>
            <th class="text-center">Post</th>
        </tr>
    </thead>
    <?php
    include("db_config.php");

    $i=1;
    $sql=mysqli_query($con,"SELECT news.id,news.title,category_type.category_type as category_type,news.content,news.type,news.image,news.video_link,news_location.location,news.reporter_name,news.status
    FROM news 
    JOIN category_type ON news.category_type=category_type.id
    JOIN news_location on news.location=news_location.id 
	where reporter=1 
    ORDER BY id DESC");

    while($row=mysqli_fetch_assoc($sql))
    {

        ?>
            <tr>
                 <td><?php echo $i; ?> </td> 
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['category_type']; ?></td>
                <td><?php echo $row['type']; ?></td>
                <td><?php echo $row['content']; ?></td>

               
                
                <td><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo $row['id'];?>">View Images</button></td>
                <div class="modal fade" id="myModal<?php echo $row['id'];?>" role="dialog">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Uploded Images</h4>
                        </div>
                        <div class="modal-body">
                          <!-- <p>This is a small modal.</p> -->
                          <?php
                         
                         $data=$row['image'];
                            $arr=explode(",",$data);
                            unset($arr[0]);    //removes the first value
                            unset($arr[count($arr)-1]); 
                            foreach($arr as $k){
                            ?>

                           <img src="upload/<?php echo $k; ?>"  height="150px" width="150px" style="float: left"> 
                           <?php } ?>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                </div>

                <td><?php echo $row['video_link']; ?></td>
                <td><?php echo $row['location']; ?></td>
                <td><?php
                        if(isset($row['reporter_name'])){
                            echo $row['reporter_name']."(reporter)";
                        }
                        else if(isset($row['user_name'])){
                            echo $row['user_name']."(user)";

                        }
                        else {
                            echo "Admin";
                        }

                    ?></td>
                <!-- <td class="text-center"><a class='btn btn-info btn-xs' href="edit_news.php?id=<?php echo $row['id'];?>" ><span class="glyphicon glyphicon-edit"></span> Edit</a>  -->

                <td class="text-center">
                <?php
                if($row['status']=='unposted')
                    {
                        ?><a class='btn btn-info btn-xs' href="delete_news.php?id=<?php echo $row['id'];?>"><span class="glyphicon glyphicon-trash"></span> delete</a></td>
				<td class="text-center"><a class='btn btn-info btn-xs' href="post_news.php?id=<?php echo $row['id'];?>"></span> post</a>
                <?php
            }
            else{
                echo "</td><td>";
                echo "Posted";
            }
            ?>
            </td>
            </tr>
    <?php
         $i++;
     }
         ?>


    </table>
         
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
<script>
    $(document).ready(function() {
    $('#example').DataTable( {
        "searching": true,
        "paging":   true,
        // "ordering": false,
        // "info":     false
    } );
} );
</script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>