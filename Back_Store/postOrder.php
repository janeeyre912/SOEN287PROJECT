<?php
    //THIS SCRIPT IS ONLY MEANT TO BE ACCESSED VIA AJAX XMLHTTPREQUEST.

    //Don't do anything if there's no items.
    if(count($_GET['items']) == 0) {
        echo 'Please order at least one item.';
        die;
    }

    //Get the current array of orders from the json file (our database).
    $orders = json_decode(file_get_contents('../datas/orders.json'));
    //Add the new order to the beginning of the array.
    array_unshift($orders, $_GET);
    //Rewrite the array of orders which now contains our order to be added.
    file_put_contents('../datas/orders.json', json_encode($orders));

    echo 'Order recorded successfully.';
?>