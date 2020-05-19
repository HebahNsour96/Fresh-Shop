<?php 

    include('admin/examples/includes/connection.php');
    // session_start(); 

    if(isset($_POST['checkout']))
    {
       
        header("location:signin.php");
        
    }

    include('includes/header.php'); 
?>


    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Cart</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Images</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- foreach start -->
                            <?php 
                                $total = 0;
                                $sum   = 0;
                                    // print_r($_SESSION);die;
                                if(!empty($productCart))
                                {

                                foreach($productCart as $singleProduct)
                                { 

                                    $sum += $singleProduct['pro_price'];
                                    $subtotal = $singleProduct['pro_price'] * $singleProduct['pro_qty'];
                                    $total += $subtotal;
                                        
                                    $_SESSION['total']  = $total;
                                    $_SESSION['pro_id'] = $pro_id;
                                    // print_r($_SESSION);die;
                               
                            ?>
                                <form method="post" enctype="multipart/form-data">
                                    <tr class="repeat">
                                        <td class="thumbnail-img">
                                        <img class="img-fluid" src="<?php echo "admin/examples/uploads/{$singleProduct['pro_img']}"; ?>" alt="" />
                                        </td>
                                        <td class="name-pr" name='pro_name'>
                                        <?php echo $singleProduct['pro_name']; ?>
                                        </td>
                                        <td class="price-pr" name='pro_price'>
                                            <?php echo $singleProduct['pro_price']; ?>
                                        </td>
                                        <td name='pro_qty'>
                                            <?php echo $singleProduct['pro_qty'];  ?>
                                        </td> 
                                        <td class="total-pr" name='pro_total'>
                                            <?php 
                                                echo $subtotal; 
                                            ?> 
                                        </td>
                                        <td class="remove-pr">
                                            <a href="<?php echo "removeCart.php?id= {$singleProduct['pro_id']};"?>" name='remove'>
                                                <i class="fas fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </form>
                            </tbody>
                            <!-- foreach end -->
                            <?php 
                                }
                            } 
                            else
                            {
                                echo "<div class='alert alert-warning'>Go Shopping Your Cart is empty!</div>";
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        
        <div class="row my-5">
                <div class="col-lg-8 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    <div class="order-box">
                        <h3>Order summary</h3>
                        <div class="d-flex">
                            <h4>Sub Total</h4>
                            <div class="ml-auto font-weight-bold total"> JOD <?php echo $total; ?></div>
                        </div>
                        <div class="d-flex">
                            <h4>Shipping Cost</h4>
                            <div class="ml-auto font-weight-bold"> Free </div>
                        </div>
                        <hr>
                        <div class="d-flex gr-total">
                            <h5>Grand Total</h5>
                            <div class="ml-auto h5">JOD <?php echo $total; ?></div>
                        </div>
                        <hr> </div>
                </div>
                <form method="post">
                    <div class="col-12 d-flex shopping-box">
                        <button type="submit" name="checkout" class="ml-5 p-3 btn hvr-hover text-white">Checkout</button>
                    </div>
                </form>
            </div>
    </div>              
                                
            </div>
    <!-- End Cart -->

<!-- start footer -->
<?php include('includes/footer.php'); ?>
<!-- end footer -->

<script>

// function CalculateItemsValue() {
//     var total = 0;
//     for (i=1; i<=total_items; i++) {
         
//         itemID = document.getElementById("qnt_"+i);
//         if (typeof itemID === 'undefined' || itemID === null) {
//             alert("No such item - " + "qnt_"+i);
//         } else {
//             total = total + parseInt(itemID.value) * parseInt(itemID.getAttribute("data-price"));
//         }
         
//     }
//     document.getElementById(".total").innerHTML = "$" + total;
     
// }

// $(document).ready(function()
// {
//     $(".quantity").change(function() 
//     {
// 		var product_id = $(this).attr("data-id");
// 		var price      = parseFloat($(".price_pr" + product_id).html());
// 		var subtotal   = parseFloat($(".total-pr" + product_id).html());
// 		var qty        = $(this).val();
// 		var total      = price * qty; 
// 		$(".total-pr" + product_id).html(total.toFixed(2));
// 		var all_total  = parseFloat($(".total").html()) - subtotal + total;
// 		$(".total").html(all_total.toFixed(2));
// 		$(".total").html(all_total.toFixed(2));
// 		$.ajax({
// 			type: 'GET',
// 			url: "cart.php?pro_id = " + product_id + "&qty=" + qty,
//         });
// 	});
//     $('td').each(function()
//     {
//         $('.qty').keyup(function()
//         {
//             var qty   = $('.qty').val();
//             var price = $('.price-pr').html();
//             var multi = qty * price;
//             $('.total').val(multi);
//         }) 
//     });
// });

// $('.qty').keyup('input', function(){
//     var form = $(this).closest('form');
//     var totalAmt = form.find('.price-pr').html();
//     var quantity =$(this).val();

//     form.find('.total').text(totalAmt*quantity);
// });


</script>