<?php
 
?>

<script>
    window.onload = () => {
        //Create a new AJAX request to getOrders.php
        let request = new XMLHttpRequest();
        request.open('GET', 'getOrders.php');
        //Specify how the response should be intepreted.
        request.responseType = 'text';

        //Callback function.
        request.onload = () => {
            //Parse the returned JSON array.
            let orders = JSON.parse(request.response);

            if(orders.length == 0) {
                document.getElementById('orders').innerHTML += `There are currently no orders.`;
            }
            else {
                console.log(orders);
                orders.forEach(order => {
                document.getElementById('orders').innerHTML +=
                    `<tr><td>${order.user}</td>
                    <td>${order.date}</td>
                    <td>#${order.id}</td>
                    <td>
                    <button type="button" class="edit-btn" onclick="window.location.href='EditOrderProfile.html'">Edit Order</button>
                    <button type="button" class="cancel-btn">Delete Order</button>
                    </td></tr>`;
                });
            }
        };

        //Send the request.
        request.send();
    };

</script>

<!-- Content -->
<div class="center-area">

    <!-- Shows the user where they are in the website. -->
    <nav class="aside-nav">
        <ul class="group" style="margin: 20px;">
            <li><a href="index_bs.html">Home</a><span> / &nbsp;</span></li>
            <li>Order List</li>
        </ul>
    </nav>

    <!-- List of orders -->
    <table>
        <thead>
            <th>Ordered By</th>
            <th>Ordered On</th>
            <th>Order ID</th>
            <th></th>
        </thead>
        <tbody id="orders">

        </tbody>
    </table>
    <button type="submit" class="save-btn">Save All</button>
</div>
