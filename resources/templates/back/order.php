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
                    `<tr><td>${"PLACEHOLDER NAME"}</td>
                    <td>${order.date}</td>
                    <td>#${"PLACEHOLDER ID"}</td>
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
            <tr>
                <td>Peter Serafinowicz</td>
                <td>2021-02-12</td>
                <td>#421481</td>
                <td>
                    <button type="button" class="edit-btn" onclick="window.location.href='EditOrderProfile.html'">Edit Order</button>
                    <button type="button" class="cancel-btn">Delete Order</button>
                </td>
            </tr>
            <tr>
                <td>Linus Sebastian</td>
                <td>2021-02-2</td>
                <td>#421482</td>
                <td>
                    <button type="button" class="edit-btn">Edit Order</button>
                    <button type="button" class="cancel-btn">Delete Order</button>
                </td>
            </tr>
            <tr>
                <td>Jeremy Elbertson</td>
                <td>2021-01-30</td>
                <td>#421483</td>
                <td>
                    <button type="button" class="edit-btn">Edit Order</button>
                    <button type="button" class="cancel-btn">Delete Order</button>
                </td>
            </tr>
            <tr>
                <td>John Charest</td>
                <td>2021-1-27</td>
                <td>#421484</td>
                <td>
                    <button type="button" class="edit-btn">Edit Order</button>
                    <button type="button" class="cancel-btn">Delete Order</button>
                </td>
            </tr>
            <tr>
                <td>Lou Albano</td>
                <td>2021-1-16</td>
                <td>#421485</td>
                <td>
                    <button type="button" class="edit-btn">Edit Order</button>
                    <button type="button" class="cancel-btn">Delete Order</button>
                </td>
            </tr>
        </tbody>
    </table>
    <button type="submit" class="save-btn">Save All</button>
</div>
