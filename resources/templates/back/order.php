<script>
    //Update the list of orders as soon as the page is done loading.
    window.onload = updateList;

    /** Fetches the list of orders in within the database. */
    function updateList() {
        //Create a new AJAX request to getOrders.php
        let request = new XMLHttpRequest();
        request.open('GET', 'getOrders.php');
        //Specify how the response should be intepreted.
        request.responseType = 'text';

        //Callback function.
        request.onload = () => {
            //Parse the returned JSON array.
            let orders = JSON.parse(request.response);
            let list = document.getElementById("orderlist");
            list.innerHTML = "";

            if(orders.length == 0) {
                list.innerHTML += `There are currently no orders.`;
            }
            else {
                orders.forEach(order => {
                list.innerHTML +=
                    `<tr role="row">
                    <td row="cell" class="order">${order.id}</td>
                    <td row="cell" class="order">${order.itemAmount}</td>
                    <td row="cell" class="order">${order.date}</td>
                    <td row="cell" class="order">${order.user}</td>
                    <td class="order">
                    <button type="button" class="btn btn-sm btn-dark" onclick ="window.location.href = 'index.php?edit_order&id=${order.id}'">Edit</button>
                    <button type="button" class="btn btn-sm btn-danger" onclick ="deleteOrder(${order.id});">Delete</button>
                    </td> 
                    </tr> `;
                });
            }
        };

        //Send the request.
        request.send();
    }

    /** Deletes the order from the database. */
    function deleteOrder(id) {
        //Create a new AJAX request to getOrders.php
        let request = new XMLHttpRequest();
        request.open('GET', 'deleteOrder.php?id=' + id);
        //Specify how the response should be intepreted.
        request.responseType = 'text';
        
        request.onload = () => {
            //If the deletion was successful, reload the list of orders.
            if(request.response == '200: Success') {
                updateList();
            }
            else {
                alert(request.response);
            }
        };
        request.send();
    }
</script>


<div class="main col-lg-9 col-md-9 py-3 flex-grow-1 ">
        <!--users information-->
            <!--    breadcrumb link-->
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Orders</li>
                </ol>
            </nav>
            <button type="button" class="btn btn-dark btn-adduser"onclick="window.location.href='index.php?addOrder'">Add Order</button>
            <button type="button" class="btn btn-dark btn-adduser"onclick="updateList();">Refresh</button>
            <h6 class="bg-success"><?php display_message(); ?></h6>
            <table class="table table-hover" role="table">
                <thead role="rowgroup">
                <tr role="row">
                    <th scope="col" role="columnheader">Order ID</th>
                    <th scope="col" role="columnheader">Item Amount</th>
                    <th scope="col" role="columnheader">Ordered On</th>
                    <th scope="col" role="columnheader">From User</th>
                    <th scope="col" role="columnheader"></th>
                </tr>
                </thead>
                <tbody role="rowgroup" id="orderlist">
                </tbody>
            </table>
</div>
