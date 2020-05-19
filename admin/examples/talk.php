<?php

	require('includes/connection.php');
	if (isset($_POST['submit'])) 
    {
		
		$talk    = $_POST['no_talk'];


		$query = "insert into notification(no_talk)
				  values('$talk')";
		// echo $query; die;
		mysqli_query($conn, $query);

		header('location:talk.php');

	}

    $id         = '';
    $talk      = '';

    if(isset($_POST['update']))
    {

        $id       = $_POST['no_id'];
        $talk     = $_POST['no_talk'];

        $query = "update notification set no_talk = '$talk'
                 
                  where no_id = $id ";
        // echo $query;die;

        mysqli_query($conn , $query);

        header("location:talk.php");

    }

?>
<?php 
	include('includes/header.php');
?>
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header"></div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Talk</h3>
                                </div>
                                <hr>
                                <!-- start form --> 
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Talk</label>
                                        <input name="no_talk" type="text" class="form-control">
                                    </div> 
                                    <div>
                                        <button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info">Save</button>
                                    </div>
                                </form>
                                <!-- end form -->
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row m-t-30">
                    <div class="col-md-12">
                        <!-- DATA TABLE-->
                        <div class="table-responsive m-b-40">
                            <!-- start table -->
                            <table class="table table-borderless table-data3">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Talk</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        
                                        $query  = "select * from notification";
                                        $result = mysqli_query($conn , $query);
                                        while ($talk = mysqli_fetch_assoc($result)) 
                                        {
                                        	echo "<tr>";
                                            	echo "<td>{$talk['no_id']}</td>";
                                            	echo "<td>{$talk['no_talk']}</td>";
                                            			
                                            	//? id={$admin['admin_id']} >> get id in url
                                            	echo "<td><button class='edit btn btn-info' data-id='{$talk['no_id']}' data-talk='{$talk['no_talk']}'>Edit</button></td>";

                                            	echo "<td><a href='delete_talk.php ? id={$talk['no_id']}' class='btn btn-danger'>Delete</td>";
                                        	echo "</tr>";
                                        		}
                                        	?>
                                </tbody>
                            </table>
                            <!-- end table -->
                        </div>
                        <!-- END DATA TABLE-->
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- modal medium -->
    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Talk Time</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- start form --> 
                <form action="" method="post">
                    
                    <div class="modal-body">
                        <input type="hidden" name="no_id" id='update_id' class="form-control" value="<?php echo $id; ?>">
                        
                        <label for="cc-payment" class="control-label mb-1">Talk</label>
                        <input name="no_talk" id="update_talk" type="text" class="form-control" value="<?php echo $talk; ?>">
                    </div>  
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="update" class="btn btn-primary" value="update" >update</button>
                    </div>
                   
                </form>
                <!-- end form -->
            </div>
        </div>
    </div>
    <!-- end modal medium -->  


<!-- start footer -->

<?php include('includes/footer.php');?>

<!-- end footer -->


<script type="text/javascript">

    $(document).ready(function()
        {
            $('.edit').click(function()
            {
                var id        = $(this).attr('data-id');
                var talk      = $(this).attr('data-talk');


                $('#mediumModal').modal('show');

                $('#update_id').val(id);
                $('#update_talk').val(talk);
            });
    });

</script>