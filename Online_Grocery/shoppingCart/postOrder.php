<?php
    //Don't do anything if there's no items.
    if($_POST['itemAmount'] == 0) {
        print 'Please order at least one item.';
    }
    //If items are present, record the order as a JSON object.
    else {
        $output = fopen('../../datas/orders.json', "a+");
        flock($output);

        fwrite($output, '{items: [');
        
        $outStr = "";

        foreach($_POST['items'] as $outKey => $outVal) {
            
            if($outStr !== "") { $outStr .= ','; }

            $inStr = "";
            foreach($outVal as $inKey => $inVal) {

                if($inStr !== "") { $inStr .= ','; }
                $inStr .= "\"$inKey\": \"$inVal\"";
            }
            $outStr .= ('{' . $inStr . '}');
        }
        fwrite($output, $outStr . '],');
        fwrite($output, 'amount: ' . $_POST['itemAmount'] . ',');
        fwrite($output, 'price: ' . $_POST['totalPrice'] . ',');
        fwrite($output, "date: " . $_POST['date']);
        fwrite('}');

        print 'Order recorded successfully.';
    }
?>