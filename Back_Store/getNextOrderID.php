<?php
    //Get the number from the ID file.
    $id = (int)(file_get_contents('../datas/orderID.txt'));
    //Increment the number on the file.
    file_put_contents('../datas/orderID.txt', ++$id);
    //Return the ID.
    echo $id;
?>