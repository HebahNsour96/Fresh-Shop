<?php
    require('includes/connection.php');
    
    $id           = '';
    $name         = '';
    $qty          = 0 ;
    $desc         = '';
    $price        = 0 ;
    $image_name   = '';
    $cat_id       = '';

    if (isset($_POST['submit'])) 
    {
		
        $name        = $_POST['pro_name'];
        $qty         = $_POST['pro_qty'];
        $price       = $_POST['pro_price'];
        $desc        = $_POST['pro_desc'];
		$cat_id      = $_POST['cat_id'];
        
        // echo "<pre>";
        // print_r($_FILES);die;

        $image_name  = $_FILES['image']['name'];
        $tmp_name    = $_FILES['image']['tmp_name'];
        $path        = 'uploads/';

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
        
            //add new record to DB
            $query = "insert into product(pro_name , pro_qty , pro_price  , pro_desc , pro_img  , cat_id)
                  values('$name' , '$qty' , $price , '$desc' , '$image_name'  , $cat_id)";
            
            // echo $query; die;

            mysqli_query($conn, $query);
        
            header('location:product.php');
            
            // break;
        }           
    }
    

    if (isset($_POST['update'])) {

        $id              = $_POST['pro_id'];
        $name            = $_POST['pro_name'];
        $qty             = $_POST['pro_qty'];
        $price           = $_POST['pro_price'];
        $cat_id          = $_POST['cat_id'];
        $desc            = $_POST['pro_desc'];
        $image_name      = $_FILES['image']['name'];
        
        if($_FILES['image']['error'] == 0)
        {
            $query = "update product set pro_name      = '$name',
                                         pro_qty       =  $qty,
                                         pro_price     =  $price,
                                         pro_desc      = '$desc',
                                         cat_id        =  $cat_id,
                                         pro_img  = '$image_name'
                  
                      where pro_id = $id ";

            move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/'.$image_name);
        }

        else
        {
            $query = "update product set pro_name      = '$name',
                                         pro_qty       =  $qty,
                                         pro_price     =  $price,
                                         pro_desc      = '$desc',
                                         cat_id        =  $cat_id 
                                         
                      where pro_id = $id ";
        }
        
        
        // print_r($query);die;
        
        mysqli_query($conn, $query);
            
        header('location:product.php');
            
        // echo $query; die;

        // else if(($_FILES['image']['error'] == '') && $qty == '' && $price == '' && $cat_id == '' && $desc == '')
        // {
        //     $query = "update product set pro_name  = '$name'
                  
        //               where pro_id = $id ";
        // }
        // else if(($_FILES['image']['error'] == '') && $name == '' && $price == '' && $cat_id == '' && $desc == '')
        // {
        //     $query = "update product set pro_qty  = '$qty'
                  
        //               where pro_id = $id ";
        // }
        // else if(($_FILES['image']['error'] == '') && $name == '' && $qty == '' && $cat_id == '' && $desc == '')
        // {
        //     $query = "update product set pro_price  = '$price'
                  
        //               where pro_id = $id ";
        // }
        // else if(($_FILES['image']['error'] == '') && $name == '' && $price == '' && $qty == ''  && $desc == '')
        // {
        //     $query = "update product set cat_id  = '$cat_id'
                  
        //               where pro_id = $id ";
        // }
        // else if(($_FILES['image']['error'] == '') && $name == '' && $price == '' && $qty == '' && $cat_id == '')
        // {
        //     $query = "update product set pro_desc  = '$desc'
                  
        //               where pro_id = $id ";
        // }

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
                                    <h3 class="text-center title-2">Product Info</h3>
                                </div>
                                <hr>
                                <!-- start form -->
                                <form action="" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                    <div class="form-group has-success">
                                        <label for="cc-payment" class="control-label mb-1">Product Name</label>
                                        <input name="pro_name" type="text" class="form-control">
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="cc-payment" class="control-label mb-1">Product Quantity</label>
                                        <input type="number" name="pro_qty" value="1" min="0" size="4" max="4" step="1" class="c-input-text p-2 qty text">
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="cc-name" class="control-label mb-1">Product Price</label>
                                        <input id="price" name="pro_price" type="number" class="form-control cc-name valid" >
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="cc-name" class="control-label mb-1">Product Image</label>
                                        <input id="image" name="image" type="file" class="form-control cc-name valid" >
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="cc-payment" class="control-label mb-1">Product Description</label>
                                        <input name="pro_desc" type="text" class="form-control">
                                    </div>
                                    <div class="form-group has-success">
                                        <label>Category Name</label>
                                        <select name='cat_id' class="form-control">
                                            <?php
                                                //get data from category
                                                $query  = "select * from category";
                                                $result = mysqli_query($conn , $query);
                                                while ($category = mysqli_fetch_assoc($result)) 
                                                {
                                                    echo "<option value ='{$category['cat_id']}'>{$category['cat_name']}</option>";
                                                }

                                            ?>
                                        </select>
                                    </div> 
                                    <div>
                                        <button id="submit" type="submit" name="submit" class="btn btn-lg btn-info"> Save </button>
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
                                        <th>Product Name</th>
                                        <th>Product Quantity</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                        <th>Description</th>
                                        <th>Category Name</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        
                                        $query="select * from product
                                                inner join category on category.cat_id=product.cat_id";
                                        $result = mysqli_query($conn , $query);
                                        
                                        while ($product = mysqli_fetch_assoc($result)) 
                                        {
                                            echo "<tr>";
                                                echo "<td>{$product['pro_id']}</td>";
                                                
                                                echo "<td>{$product['pro_name']}</td>";

                                                echo "<td>{$product['pro_qty']}</td>";
                                                
                                                echo "<td>{$product['pro_price']}</td>";
                                                
                                                echo "<td><img src='uploads/{$product['pro_img']}' width='300px' height='200px'></td>";
                                                
                                                echo "<td>{$product['pro_desc']}</td>";
                                                
                                                echo "<td>{$product['cat_name']}</td>";
                                                
                                                echo "<td><button class='edit btn btn-info' data-id='{$product['pro_id']}' data-name='{$product['pro_name']}' data-qty='{$product['pro_qty']}' data-price='{$product['pro_price']}' data-desc='{$product['pro_desc']}' data-cat='{$product['cat_name']}' data-image='{$product['pro_img']}'>Edit</button></td>";
                                                
                                                echo "<td><a href='delete_pro.php ? id={$product['pro_id']}' class='btn btn-danger'>Delete</a></td>";
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


    <!-- modal medium -->
    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- start form --> 
                <form action="" method="post" enctype="multipart/form-data">
                    
                    <div class="modal-body">
                        
                        <input type="hidden" name="pro_id" id='update_id' class="form-control" value="<?php echo $id; ?>">
                        
                        <label for="cc-payment" class="control-label mb-1">Product Name</label>
                        <input name="pro_name" id='update_name' type="text" class="form-control" value="<?php echo $name; ?>">
                        
                        <label for="cc-payment" class="control-label mb-1">Product Quantity</label>
                        <input type="number" name="pro_qty" id="update_qty" value="<?php echo $qty; ?>" min="0" size="4" max="4" step="1" class="c-input-text qty text p-2">
                        <br>
                        <label for="cc-name" class="control-label mb-1">Product Price</label>
                        <input name="pro_price" id='update_price' type="number" class="form-control cc-name valid" value="<?php echo $price; ?>">
                        
                        <label for="cc-payment" class="control-label mb-1">Product Description</label>
                        <input name="pro_desc" id='update_desc' type="text" class="form-control" value="<?php echo $desc; ?>">
                       
                        <label>Category Name</label>
                        <select name='cat_id' id='update_option' class="choose form-control">
                            <?php
                                    
                                $query  = "select * from category";
                                $result = mysqli_query($conn , $query);
                                                
                                while ($row = mysqli_fetch_array($result))
                                {
                                    //echo "<option value='{$product['cat_id']}'>{$product['cat_name']}</option>";
                                                    
                                    if($row['cat_id'] == $product['cat_id'])
                                    {
                                        echo "<option selected value='{$product['cat_id']}'>{$product['cat_name']}</option>";
                                     }
                                    else
                                    {
                                         echo "<option value='{$row['cat_id']}'>{$row['cat_name']}</option>";
                                    }
                                }

                            ?>
                        </select>

                        <label for="cc-name" class="control-label mb-1">Product Image</label>
                        <input name="image" id="update_image" type="file" class="form-control cc-name valid" value="<?php echo $image_name; ?>">

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
            var id          = $(this).attr('data-id');
            var name        = $(this).attr('data-name');
            var qty         = $(this).attr('data-qty');
            var price       = $(this).attr('data-price');
            var desc        = $(this).attr('data-desc');
            var cat         = $(this).attr('data-cat');
            var image_name  = $(this).attr('data-image');


            $('#mediumModal').modal('show');

            $('#update_id').val(id);
            $('#update_name').val(name);
            $('#update_qty').val(qty);
            $('#update_price').val(price);
            $('#update_desc').val(desc);
            $('#update_option').val(cat);
            $('#update_image').val(image_name);
                
        });

        // $('.choose').change(function()
        // {
        //     var opt = $(".choose option:selected" ).val();
        // });

       
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