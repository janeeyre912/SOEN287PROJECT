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
            var orderlist = document.querySelector(".orderlist");
            if(orders.length == 0) {
                orderlist.innerHTML += `There are currently no orders.`;
            }
            else {
                orders.forEach(order => {
                orderlist.innerHTML +=
                    `<tr role="row">
                    <td row="cell" class="order">${order.orderid}</td>
                    <td row="cell" class="order">${order.orderdate}</td>
                    <td row="cell" class="order">${order.orderby}</td>
                    <td row="cell" class="order">${order.email}</td>
                    <td class="order">
                    <button type="button" class="btn btn-sm btn-dark" onclick ="window.location.href = 'index.php?edit_order&id=${order.orderid}'">Edit</button>
                    <button type="button" class="btn btn-sm btn-danger" onclick ="window.location.href = 'index.php?delete_user_id={$user->id}'">Delete</button>
                    </td> 
                    </tr> `;
                });
            }
        };

        //Send the request.
        request.send();
    };

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
            <h6 class="bg-success"><?php display_message(); ?></h6>
            <table class="table table-hover" role="table">
                <thead role="rowgroup">
                <tr role="row">
                    <th scope="col" role="columnheader">Order ID</th>
                    <th scope="col" role="columnheader">Order date</th>
                    <th scope="col" role="columnheader">Order by</th>
                    <th scope="col" role="columnheader">Email</th>
                    <th scope="col" role="columnheader"></th>
                </tr>
                </thead>
                <tbody role="rowgroup" class="orderlist">
                </tbody>
            </table>
</div>
