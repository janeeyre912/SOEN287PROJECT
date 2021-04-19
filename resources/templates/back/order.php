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

    <div class="main col-lg-9 col-md-9 py-3 flex-grow-1 ">
        <!--users information-->
            <!--    breadcrumb link-->
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Order List</li>
                </ol>
            </nav>
<div class="center-area">

    <!-- List of orders -->
    <table class="table table-hover" role="table">
      <thead role="rowgroup">
      <tr role="row">
          <th scope="col" role="columnheader">Ordered By</th>
          <th scope="col" role="columnheader">Ordered On</th>
          <th scope="col" role="columnheader">Order ID</th>
          <th scope="col" role="columnheader"></th>
      </tr>
      </thead>
      <tbody id="orders">
    
      </tbody>
  </table>
   <input type="submit" name="add_user" class="btn btn-dark pull-right" value="Save All" >
</div>
</div>
