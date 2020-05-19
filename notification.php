<?php

    include('admin/examples/includes/connection.php');

    include('includes/header.php');

?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="card-title">Notification Today , Answer Feedback</h1>
            </div>
        </div>
    </div>

<?php

    $query  = "select * from notification";
    $result = mysqli_query($conn , $query);
    while($row = mysqli_fetch_assoc($result)){
?>

    <div class="container mt-1">
        <div class="row">
            <div class="col-lg-12">
                <div class='alert alert-success'><?php echo $row['no_talk']; ?></div>
            </div>
        </div>
    </div>

    <?php } ?>


<?php include('includes/footer.php'); ?>