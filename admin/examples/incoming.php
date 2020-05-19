<?php

	require('includes/connection.php');
    
    $name = '';
    
    //session_start();

    if (isset($_POST['submit'])) 
    {
        
        $name       = $_POST['name'];
        
        $image_name = $_FILES['image']['name'];
        $tmp_name   = $_FILES['image']['tmp_name'];
        $path       = 'uploads/';

        // where FILE_NAME is the name attribute of the file input in your form
        $fileError = $_FILES["image"]["error"]; 
        switch($fileError) 
        {
            case UPLOAD_ERR_INI_SIZE:
        // Exceeds max size in php.ini
            echo "<script>alert('max size in php.ini')</script>";
            break;
            case UPLOAD_ERR_PARTIAL:
        // Exceeds max size in html form
            echo "<script>alert('max size in html form')</script>";
            break;
            case UPLOAD_ERR_NO_FILE:
        // No file was uploaded
            echo "<script>alert('No file was uploaded!')</script>";
            break;
            case UPLOAD_ERR_NO_TMP_DIR:
        // No /tmp dir to write to
            echo "<script>alert('Missing a temporary folder')</script>";
            break;
            case UPLOAD_ERR_CANT_WRITE:
        // Error writing to disk
            echo "<script>alert('Failed to write file to disk')</script>";
            break;
            default:
        // No error was faced! Phew!

                move_uploaded_file($tmp_name, $path.$image_name);

                //get the curretnt working directory
                // $curdir = getcwd();

                //session message 
                // if(is_dir($name))
                // {
                //     echo "<script>alert('This Directory Is Exists')</script>";
                // }
                // else
                // {
                //     mkdir('uploads/'.$name);
                //     echo "<script>alert('This Directory Is Created!')</script>";
                // }
                
                
                $query = "insert into incoming(name , img)
                          values('$name' , '$image_name')";

                // echo $query; die;

                mysqli_query($conn, $query);

                header('location:incoming.php');
        }
    }

    $id         = '';
    $name       = '';
    $image_name = '';

    if (isset($_POST['update'])) 
    {
        // echo "<pre>";
        // print_r($_POST);die;

        $id          = $_POST['id'];
        $name        = $_POST['name'];
        $image_name  = $_FILES['image']['name'];
        
        if($_FILES['image']['error'] == 0)
        {
            $query    = "update incoming set name = '$name',
                                             img  = '$image_name'
                     
                         where id = $id ";
            
            //echo $query;die;
            move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/'.$_FILES['image']['name']);
        }
        else
        {
            $query    = "update incoming set name = '$name'
                     
                         where id = $id ";
        }

        mysqli_query($conn , $query);

        header('location:incoming.php');
    }
?>



<?php include('includes/header.php');?>

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
                                    <h3 class="text-center title-2">Incoming Product Info</h3>
                                </div>
                                <hr>
                                <!-- start form -->
                                <form action="" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                    <div class="form-group has-success">
                                        <label for="cc-name" class="control-label mb-1">Product Name</label>
                                        <input id="name" name="name" type="text" class="form-control cc-name valid">
                                    </div> 
                                    <div class="form-group has-success">
                                        <label for="cc-name" class="control-label mb-1">Product Image</label>
                                        <input id="image" name="image" type="file" class="form-control cc-name valid" >
                                    </div>    
                                    <div>
                                        <button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info"> Save </button> 
                                    </div>
                                </form>
                                <!-- end form -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- start table -->
                <div class="row m-t-30">
                    <div class="col-md-12">
                        <!-- DATA TABLE-->
                        <div class="table-responsive m-b-40">
                            <table class="table table-borderless table-data3">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <td>Image</td>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   	<?php

                                       $query  = "select * from incoming";
                                       $result = mysqli_query($conn , $query);
                                       while ($incoming = mysqli_fetch_assoc($result)) 
                                       {
                                            //data-toggle='modal' data-target='#smallmodal'
                                           echo "<tr>";
                                               echo "<td>{$incoming['id']}</td>";
                                               
                                               echo "<td>{$incoming['name']}</td>";
                                               
                                               echo "<td><img src='uploads/{$incoming['img']}' width='250px' height='250px'></td>";
                                               
                                               echo "<td><button class='edit btn btn-info' data-id='{$incoming['id']}' data-name='{$incoming['name']}' data-image='{$incoming['img']}'>Edit</button></td>";
                                               
                                               echo "<td><a href='delete_come.php ?id={$incoming['id']}' class='btn btn-danger' name='delete'>Delete</a></td>";
                                           echo "</tr>";
                                       }

                                     ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- END DATA TABLE-->
                    </div>
                </div>
                <!-- end table -->
            </div>
        </div>
    </div>
    <!-- end main content -->
    
    <!-- edit  modal -->
    <div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="smallmodalLabel">update Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- start form -->
                <form action="" method="post" novalidate="novalidate" enctype="multipart/form-data">

                    <input type="hidden" name="id" id='update_id' class="form-control" value="<?php echo $id; ?>">
                    <div class="modal-body">
                        <label for="cc-name" class="control-label mb-1">Product Name</label>
                        <input id="update_name" name="name" type="text" class="form-control cc-name valid" value="<?php echo $name; ?>">
                        <label for="cc-name" class="control-label mb-1">Product Image</label>
                        <input id="update_img" name="image" type="file" class="form-control cc-name valid" value="<?php echo $image_name; ?>">
                    </div>                    
                    <div class="modal-footer">
                        <!-- data-id="{$category['cat_name']}" -->
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="update" class="btn btn-primary">update</button>
                    </div>

                </form>
                <!-- end form -->
            </div>
        </div>
    </div>
    <!-- end edit modal -->
   
<!-- start footer -->

<?php include('includes/footer.php');?>

<!-- end footer -->

<script type="text/javascript">
    
    $(document).ready(function()
    {

        $('.edit').click(function()
        {
            var id         = $(this).attr('data-id');
            var name       = $(this).attr('data-name');
            var image_name = $(this).attr('data-image');

            $('#smallmodal').modal('show');

            $('#update_id').val(id);
            $('#update_name').val(name);
            $('#update_img').val(image_name);
        });


        $('#submit').click(function()
        {

            var image_name = $('#image').val();
            if (image_name == '') 
            {
                alert('please select image');
                return false;
            }
            else
            {
                var ext = $('#image').val().split('.').pop().toLowerCase();
                if (jQuery.inArray(ext , ['jpg' , 'jpeg' , 'png' , 'pdf' , 'gif']) == -1) 
                {
                    alert('invalid Image file!');
                    $('#image').val('');
                    return false;
                }
            }

        });

    });

</script>
