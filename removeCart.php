<?php

    session_start();
    if(isset($_GET['id']))
    {
        $pid = intval($_GET['id']);
        $max = count($_SESSION['product']);
        for($i = 0; $i < $max; $i++)
        {
            if($pid == $_SESSION['product'][$i])
            {
                unset($_SESSION['product'][$i]);
                break;
            }
        }
        $_SESSION['product'] = array_values($_SESSION['product']);
        header('location:cart.php');
    }

?>