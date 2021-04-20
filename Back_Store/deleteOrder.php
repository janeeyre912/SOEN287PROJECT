<?php
    //THIS SCRIPT IS ONLY MEANT TO BE ACCESSED VIA AJAX XMLHTTPREQUEST.

    //Don't do anything if the provided id isn't a number (if any).
    if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        echo "400: Please provide a valid integer ID.";
        die;
    }

    //Tracks if an matching order was found.
    //Assume that no matching order will be found.
    $found = false;

    //Get the current array of orders from the json file (our database).
    $orders = json_decode(file_get_contents('../datas/orders.json'), true);

    foreach($orders as $key => $elem) {
        //Check if the ID matches.
        if($elem['id'] == $_GET['id']) {
            //If it does, remove the order.
            array_splice($orders, $key, 1);
            //Correct our assumption.
            $found = true;
            //Stop looping.
            break;
        }
    }

    //Only write to the file if an order was deleted (if the array was altered).
    if($found) {
        file_put_contents('../datas/orders.json', json_encode($orders));
        echo "200: Success";
    }
    else {
        echo "404: No matching order was found.";
    }
?>