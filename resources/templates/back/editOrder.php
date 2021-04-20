<script>
    //Record the ID.
    const ID = Number(<?php echo $_GET['id'] ?>);
    let order;


    //Fetch the order form the server and update the page with its information.
    window.onload = () => {

        //Create a new AJAX request to getOrders.php
        let request = new XMLHttpRequest();
        request.open('GET', 'getOrders.php');
        //Specify how the response should be intepreted.
        request.responseType = 'text';

        //Callback function.
        request.onload = () => {
            //Parse the returned JSON array.
            let orderList = JSON.parse(request.response);
            orderList.forEach(elem => {
                if(elem.id == ID) {
                    order = elem;
                }
            });
            //Update the page.
            updateList();
        }

        //Send the request.
        request.send();
    }

    
    /** Updates the page with the order's information. */
    function updateList() {
        document.getElementById('id').innerHTML = `Order ID: ${order.id}`;
        document.getElementById('date').innerHTML = `Ordered on: ${order.date}`;
        document.getElementById('user').innerHTML = `Ordered by: ${order.user}`;


        let list = document.getElementById("itemlist");
        list.innerHTML = "";

        if(order.items.length == 0) {
            list.innerHTML += `This order doesn't have any items.`;
        }
        else {
            order.items.forEach(item => {
            list.innerHTML +=
                `<tr role="row">
                <td row="cell" class="item">${item.name}</td>
                <td row="cell" class="item">${item.price}$</td>
                <td row="cell" class="item">
                <input type="number" name="amount" min="0" value="${item.amount}" onblur="setAmount(\'${item.name}\', this.value);"></td>
                <td class="item">
                <button type="button" class="btn btn-sm btn-danger" onclick ="removeItem(\'${item.name}\');">Remove</button>
                </td></tr>`;
            });

        }
    }


    /** Removes the item from the order. */
    function removeItem(name) {
        //Find the item whose name matches the one to be deleted.
        for (let i = 0; i < order.items.length; i++) {
            if(order.items[i].name == name) {
                //Remove the element from the array, but save it for the calculations below.
                let rItem = order.items.splice(i,1)[0];

                //Deduct from the amount of items.
                order.itemAmount -= rItem.amount;

                //Deduct from the total price.
                order.totalPrice -= rItem.price * rItem.amount;
                //Reduce to two decimal places (removes any floating-point error).
                order.totalPrice = order.totalPrice.toFixed(2);


                //Don't loop any further.
                break;
            }
        }

        updateList();
    }


    /** Set the amount of a certain item to a new value. */
    function setAmount(name, value) {
        //Find the item whose name matches the one to be deleted.
        for (let i = 0; i < order.items.length; i++) {
            if(order.items[i].name == name) {

                //Get the difference from the previous value.
                let diff = order.items[i].amount - value;

                //Deduct from total amount.
                order.itemAmount -= diff;
                //Deduct from total price.
                order.totalPrice -= (order.items[i].price * diff);
                order.totalPrice = order.totalPrice.toFixed(2);

                //Set the new item amount.
                order.items[i].amount = value;
                
                //Don't loop any further.
                break;
            }
        }
    }


    /** Saves the order to the server. */
    function saveOrder() {
        //Create a new AJAX request to getOrders.php
        let delOrder = new XMLHttpRequest();
        delOrder.open('GET', 'deleteOrder.php?id=' + ID, true);
        //Specify how the response should be intepreted.
        delOrder.responseType = 'text';
        
        delOrder.onload = () => {
            //If the deletion was successful, reload the list of orders.
            if(delOrder.response == '200: Success') {
                //Create a new AJAX request to postOrder.php
                let postOrder = new XMLHttpRequest();
                postOrder.open('GET', 'postOrder.php?' + toQueryStr(order), true);
                //Specify how the response should be intepreted.
                postOrder.responseType = 'text';
                
                postOrder.onload = () => {
                    alert(postOrder.response);
                };
                postOrder.send();
            }
            else {
                alert(delOrder.response);
            }
        };
        delOrder.send();
    }

    /**
     * Converts the js object to a query string.
     * Found at: https://stackoverflow.com/questions/56173848/want-to-convert-a-nested-object-to-query-parameter-for-attaching-to-url
     */
    function toQueryStr(obj) {

        //Iterable function.
        let getPairs = (obj, keys = []) =>
        //For each element in the passed 'obj', execute the anonymous function. 
        Object.entries(obj).reduce((pairs, [key, value]) => {
        //If the value is also a js object, recusively call this function on that element.
        //Add what's is returned to the 'pairs' array.
        if (typeof value === 'object') {
            pairs.push(...getPairs(value, [...keys, key]));
        }
        //Otherwise, add the key-value pair (as an array of length 2) to the 'pairs' array.
        else {
            pairs.push([[...keys, key], value]);
        }
        //Return the array of 'pairs' (key-value arrays of length 2).
        return pairs;
        }, []);

        //Return a stringified version of the array using the following method.
        return getPairs(obj).map(([[elemKey, ...subKeys], value]) =>
        //Add each property of each element in the format: 'elementKey[subKey1][subKey2][...]=value'.
        `${elemKey}${subKeys.map(key => `[${key}]`).join('')}=${value}`)
        //Join each of the printed proterties with '&'.
        .join('&');
    }
</script>


<div class="main col-lg-9 col-md-9 py-3 flex-grow-1 ">
        <!--users information-->
            <!--    breadcrumb link-->
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="index.php?orders">Orders</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit an Order</li>
                </ol>
            </nav>
            <h6 class="bg-success"><?php display_message(); ?></h6>
            
            <h5>Order Properties</h5>
            <table class="table table-hover" role="table">
                    <tr role="row" id="id"></tr>
                    <tr role="row" id="date"></tr>
                    <tr role="row" id="user"></tr>
            </table>
            <br/>
            <h5>Contents</h5>
            <table class="table table-hover" role="table">
                <thead role="rowgroup">
                <tr role="row">
                    <th scope="col" role="columnheader">Item Name</th>
                    <th scope="col" role="columnheader">Price</th>
                    <th scope="col" role="columnheader">Amount</th>
                    <th scope="col" role="columnheader"></th>
                </tr>
                </thead>
                <tbody role="rowgroup" id="itemlist">
                </tbody>
            </table>
            <div class="row justify-content-end">
                <button type="button" class="btn btn-dark" style="margin-right:25px;" onclick="saveOrder();">Save</button>
            </div>
</div>