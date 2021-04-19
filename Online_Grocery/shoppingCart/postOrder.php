<?php
    //THIS SCRIPT IS ONLY MEANT TO BE ACCESSED VIA AJAX XMLHTTPREQUEST.

    //Don't do anything if there's no items.
    if($_POST['itemAmount'] == 0) {
        die('Please order at least one item.');
    }

    //Try to open the JSON file
    $output = fopen('../../datas/orders.json', "r+");

    //Check if file opening was usuccessful.
    if($output === false) {
        die('Could not find output file.');
    }

    //Prevent other accesses to the file while we'll be writing to it.
    flock($output, LOCK_EX);
    
    //Move pointer until the beginning of the JSON array.
    while(fgetc($output) !== '[') {
        //If the end of file is reached, then there was no JSON array.
        if(feof($output)) {
            die('Could not find JSON array.');
        }
    }

    //Write the beginning of the JSON object.
    fwrite($output, '{items: [');
    
    //Will track the content of the items array to be printed.
    $outStr = "";
    foreach($_POST['items'] as $outKey => $outVal) {

        //Add a comma if not the first element.
        if($outStr !== "") { $outStr .= ','; }

        //Will track the content of the items array's element.
        $inStr = "";
        foreach($outVal as $inKey => $inVal) {
            //Add a comma if not the first element.
            if($inStr !== "") { $inStr .= ','; }
            //Print the key-value pair in JSON format.
            $inStr .= "\"$inKey\": \"$inVal\"";
        }
        //Print the item array's element as a sub-object.
        $outStr .= ('{' . $inStr . '}');
    }
    //Write the contents of the items array with the closing bracket.
    fwrite($output, $outStr . '],');
    //Write the amount of items key-value pair.
    fwrite($output, "\"amount\": \"" . $_POST['itemAmount'] . "\",");
    //Write the total order price key-value pair.
    fwrite($output, "\"price\": \"" . $_POST['totalPrice'] . "\",");
    //Write the estimated delivery date key-value pair.
    fwrite($output, "\"date\": \"" . $_POST['date'] . "\"}");

    //Output message.
    print 'Order recorded successfully.';
?>